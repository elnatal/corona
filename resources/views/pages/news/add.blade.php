@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-newspaper"></i>
        </span> Add news </h3>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('store-news') }}">
                    @csrf
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                    </div>
                    
                    <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="6"></textarea>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="/news" class="btn btn-light">Cancel</a>
                  </form>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection