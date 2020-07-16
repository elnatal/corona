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
                        <td><label class="badge badge-secondary">@if($device->status == '1') Normal @endif @if($device->status == '2') Infected @endif @if($device->status == '3') Dead @endif @if($device->status == '4') Recovered @endif </label></td>
                        <td>
                          <a href="/contact/{{ $device->id }}"><i class="mdi mdi-lan-connect menu-icon"></i></a>
                          <a href="#" class="btn btn-primary btn-sm" onclick="event.preventDefault();
                            document.getElementById('infected-form{{$device->id}}').submit();">Infected</a>
                          <form id="infected-form{{$device->id}}" action="{{ route('update-device', $device->id) }}" method="POST" style="display: none;">
                            @csrf
                            <input type="text" name="status" id="status" value="2">
                        </form>

                        <a href="#" class="btn btn-success btn-sm" onclick="event.preventDefault();
                            document.getElementById('recover-form{{$device->id}}').submit();">Recovered</a>

                        <form id="recover-form{{$device->id}}" action="{{ route('update-device', $device->id) }}" method="POST" style="display: none;">
                          @csrf
                          <input type="text" name="status" id="status" value="4">
                        </form>

                        
                        <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault();
                        document.getElementById('dead-form{{$device->id}}').submit();">Dead</a>
                        <form id="dead-form{{$device->id}}" action="{{ route('update-device', $device->id) }}" method="POST" style="display: none;">
                          @csrf
                          <input type="text" name="status" id="status" value="3">
                      </form>
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
@endsection