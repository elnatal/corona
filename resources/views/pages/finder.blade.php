@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-account-search"></i>
        </span> Finder </h3>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="search-field" style="border: solid lightblue 1px">
                <form class="d-flex align-items-center" action="/search" method="GET" role="search">
                    {{-- @csrf --}}
                    <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                    </div>
                    <input type="text" name="q" id="q" class="form-control bg-transparent border-0" placeholder="Search">
                    </div>
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>phone number</th>
                  <th>status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($devices as $device)
                    <tr>
                        <td>{{ $device->name }}</td>
                        <td>{{ $device->phone }}</td>
                        <td>{{ $device->status }}</td>
                        <td><a href="/contact/{{ $device->id }}"><i class="mdi mdi-lan-connect menu-icon"></i></a></td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      </div>
  </div>
@endsection