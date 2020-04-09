@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-newspaper"></i>
        </span> Edit news </h3>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('update-news', $news->id) }}">
                    @csrf
                    <div class="form-group">
                      <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $news->title }}" id="title" placeholder="Title">
                    </div>
                    
                    <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" value="{{ $news->description }}" rows="6">{{ $news->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                    <a href="/news" class="btn btn-light">Cancel</a>
                  </form>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection