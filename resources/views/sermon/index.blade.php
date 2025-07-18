@extends('layouts.admin-layout')

@section('content')
    <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Sermons</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <a href="{{ route('admin.sermons.create') }}" class="btn btn-primary">Add New Sermon</a>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="data-tables table table-striped table-bordered" style="width:100%">
                              <thead>
                                 <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 5%;">Image</th>
                                    <th style="width: 15%;">Sermon</th>
                                    <th style="width: 15%;">Category</th>
                                    <th style="width: 10%;">Speaker</th>
                                    <th style="width: 10%;">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                @foreach($sermons as $sermon)
                                 <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                       <img src="{{ $sermon->cover_image }}" class="img-fluid avatar-50 rounded" alt="{{ $sermon->title }}">
                                    </td>
                                    <td>{{ $sermon->title }}</td>
                                    <td>{{ $sermon->sermonCategory->name }}</td>
                                    <td>{{ $sermon->speaker->name }}</td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                          <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('admin.sermons.edit', $sermon->id) }}"><i class="ri-pencil-line"></i></a>
                                          <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{ route('admin.sermons.destroy', $sermon->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $sermon->id }}').submit();"><i class="ri-delete-bin-line"></i></a>
                                          <form id="delete-form-{{ $sermon->id }}" action="{{ route('admin.sermons.destroy', $sermon->id) }}" method="POST" style="display: none;">
                                             @csrf
                                             @method('DELETE')
                                          </form>
                                       </div>
                                    </td>
                                 </tr>
                                @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
    </div>
@endsection