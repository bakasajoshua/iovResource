<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Sermon;
use App\Models\SermonCategory;
use App\Models\SermonNote;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $sermons = Sermon::get();
        $featured_note = SermonNote::first();
        $sermonNotes = SermonNote::when($featured_note, function($query) use ($featured_note) {
                            return $query->where('id', '<>', $featured_note->id);
                        })->get();
        return view('iov_welcome', ['sermons' =>$sermons, 'featured_note' => $featured_note, 'sermonNotes' => $sermonNotes]);
    }

    public function sermons () {
        $categories = SermonCategory::get();
        // dd($categories);
        return view('home.sermons', ['categories'=>$categories]);
    }
    
    public function events(){
        return view('home.events');
    }

    public function publications(){
        $publications = Publication::get();
        return view('home.publications', ['publications'=>$publications]);
    }

    public function sermonContent(Request $request){
        $sermon = Sermon::findOrFail($request->input('sermon'));
        
        return view('home.sermonContent', ['sermon' => $sermon]);
    }
    public function blogs(){
        return view('home.blogs');
    }
    public function home_test(){
        return view('home.home_test');
    }

    public function dashboard(){
        $this->active = '';
        $data = [
            'active' => $this->active,
            'sermons'   => Sermon::count(),
            'publications' => Publication::count(),
            'upcoming_events' => 0,
            'users' => User::count(),
        ];
        return view('admin.admin-dashboard', $data);
    }
}
