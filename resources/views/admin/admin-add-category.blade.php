@extends('layouts.admin-layout')

@section('content')

<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         @if($errors->has('name'))
            <div class="col-sm-12">
               <div class="iq-card">
                  <span class="error">{{ $errors->get('name') }}</span>
               </div>
            </div>
         @endif
        
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">
                        @empty($sermonCategory)
                           Add Category
                        @else
                           Edit Category
                        @endempty
                     </h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <form method="POST"
                     action="
                        @empty($sermonCategory)
                           {{ route('admin.sermons-category.store') }}
                        @else
                           {{ route('admin.sermons-category.update', $sermonCategory->id) }}
                        @endempty
                     "
                  >
                     @csrf
                     @isset($sermonCategory)
                        @method('PUT')
                     @endisset
                     <div class="form-group">
                        <label>Category Name:</label>
                        <input type="text" name="name" value="{{ old('name') ?? $sermonCategory->name ?? '' }}" id="name" required class="form-control">
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