@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-newspaper"></i>
        </span> News </h3>
        <nav aria-label="breadcrumb">
          <a href="/news/add" class="btn btn-primary">Add news</a>  
        </nav>
    </div>
    <div class="row">
        @foreach ($news as $n)
            <a href="/news/{{$n->id}}" class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $n->title }}</h4>
                    <p class="card-description"> {{ $n->description }}</p>
                </div>
            </div>
            </a>
        @endforeach
        <div class="col-md-12">
            <div class="float-right">
                {{ $news->links() }}
            </div>
        </div>
      </div>
  </div>
@endsection