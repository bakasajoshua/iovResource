@extends('layouts.admin-layout')

@section('content')

<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         @if($errors->any())
            <div class="col-sm-12">
               <div class="iq-card">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
               </div>
            </div>
         @endif
        
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">
                        @empty($sermon)
                           Add Sermon
                        @else
                           Edit Sermon
                        @endempty
                     </h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <form method="POST" enctype='multipart/form-data'
                     action="
                        @empty($sermon)
                           {{ route('admin.sermons.store') }}
                        @else
                           {{ route('admin.sermons.update', $sermon->id) }}
                        @endempty
                     "
                  >
                     @csrf
                     @isset($sermon)
                        @method('PUT')
                     @endisset

                    <div class="form-group">
                        <label>Category:</label>
                        <select name="category_id" class="form-control" required>
                           <option value="">Select Category</option>
                           @foreach($categories as $category)
                              <option value="{{ $category->id }}" {{ (old('category_id') ?? $sermon->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                           @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Sermon Title:</label>
                        <input type="text" name="title" value="{{ old('title') ?? $sermon->title ?? '' }}" id="title" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Speaker:</label>
                        <select name="speaker_id" class="form-control" required>
                           <option value="">Select Speaker</option>
                           @foreach($speakers as $speaker)
                              <option value="{{ $speaker->id }}" {{ (old('speaker_id') ?? $sermon->speaker_id ?? '') == $speaker->id ? 'selected' : '' }}>{{ $speaker->name }}</option>
                           @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Cover Image:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="cover_image" name="cover_image">
                            <label class="custom-file-label" for="cover_image">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Upload Type:</label>
                        <select name="type" class="form-control" required>
                           <option value="">Select Upload Type</option>
                           @foreach($allowedTypes as $type)
                              <option value="{{ $type }}" {{ (old('type') ?? $sermon->type ?? '') == $type ? 'selected' : '' }}>{{ $type }}</option>
                           @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Sermon Content:</label>
                        <textarea name="content" id="content" required class="form-control">{{ old('content') ?? $sermon->content ?? '' }}</textarea>
                    </div>

                     <button type="submit" class="btn btn-primary">Submit</button>
                     <button type="reset" class="btn btn-danger">Reset</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection