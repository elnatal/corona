@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-record-rec"></i>
        </span> Tracker </h3>
    </div>

    <div class="row">
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
                        <td><a href="/contact/{{ $device->id }}"><i class="mdi mdi-lan-connect menu-icon"></i></a></td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
            
            <div class="col-md-12">
                <div class="float-right">
                    {{ $devices->links() }}
                </div>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
@endsection