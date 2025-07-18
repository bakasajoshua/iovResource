<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use App\Models\SermonCategory;
use App\Models\Speaker;
use Illuminate\Http\Request;

class SermonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index()
    {
        $this->active = 'sermons';
        $data = [
            'active' => $this->active,
            'sermons' => Sermon::all(),
        ];

        return view('sermon.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->active = 'sermons';
        return view ('sermon.create', [
            'active' => $this->active,
            'categories' => SermonCategory::all(),
            'speakers' => Speaker::all(),
            'allowedTypes' => Sermon::$allowedTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:sermon_categories,id',
            'title' => 'required',
            'speaker_id' => 'required|exists:speakers,id',
            'type' => 'required|in:' . implode(',', Sermon::$allowedTypes),
            'content' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $sermon = new Sermon();
        $sermon->title = $request->input('title');
        $sermon->speaker_id = $request->input('speaker_id');
        $sermon->sermon_category_id = $request->input('category_id');
        $sermon->type = $request->input('type');
        $sermon->sermon_content = $request->input('content');
        $sermon->uploaded_by = auth()->id();
        $sermon->uploaded_at = now();
        $sermon->sermon_series_id = $request->input('sermon_series_id', null); // Optional field

        // Handle file upload for cover image
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/uploads/sermons/covers'), $filename);
            // Save the filename to the sermon record
            
            $sermon->cover_image = config('app.url') . '/img/uploads/sermons/covers/' . $filename;
            $sermon->save();
        }

        return redirect()->route('admin.sermons.index')->with('success', 'Sermon created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sermon = Sermon::findOrFail($id);
        $this->active = 'sermons';
        return view('sermon.create', [
            'active' => $this->active,
            'sermon' => $sermon,
            'categories' => SermonCategory::all(),
            'speakers' => Speaker::all(),
            'allowedTypes' => Sermon::$allowedTypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sermon = Sermon::findOrFail($id);

        // Validate the request data
        $request->validate([
            'category_id' => 'required|exists:sermon_categories,id',
            'title' => 'required',
            'speaker_id' => 'required|exists:speakers,id',
            'type' => 'required|in:' . implode(',', Sermon::$allowedTypes),
            'content' => 'required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $sermon->title = $request->input('title');
        $sermon->speaker_id = $request->input('speaker_id');
        $sermon->sermon_category_id = $request->input('category_id');
        $sermon->type = $request->input('type');
        $sermon->sermon_content = $request->input('content');
        $sermon->uploaded_by = auth()->id();
        $sermon->uploaded_at = now();
        $sermon->sermon_series_id = $request->input('sermon_series_id', null); // Optional field

        // Handle file upload for cover image
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/uploads/sermons/covers'), $filename);
            // Save the filename to the sermon record
            
            $sermon->cover_image = config('app.url') . '/img/uploads/sermons/covers/' . $filename;
        }
        
        $sermon->save();

        return redirect()->route('admin.sermons.index')->with('success', 'Sermon Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sermon = Sermon::findOrFail($id);
        // dd(basename($sermon->cover_image));
        try {
            // Delete all notes in the sermon
            $sermon->sermonNotes()->delete();
            // Delete the cover image if it exists
            if ($sermon->cover_image) {
                $coverImagePath = public_path('img/uploads/sermons/covers/' . basename($sermon->cover_image));
                if (file_exists($coverImagePath)) {
                    unlink($coverImagePath);
                }
            }
            // Delete the sermon
            $sermon->delete();     
        } catch (\Throwable $th) {
            throw $th;
        }
        
        return redirect()->route('admin.sermons.index');
    }
}
