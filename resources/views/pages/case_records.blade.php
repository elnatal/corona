@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-record-rec"></i>
        </span> Case records </h3>
    </div>

    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  {{-- <th>Name</th>
                  <th>phone number</th>
                  <th>status</th> --}}
                </tr>
              </thead>
              <tbody>
                  @foreach ($cases as $case)
                    <tr>
                        {{-- <td>{{ $device->name }}</td>
                        <td>{{ $device->phone }}</td>
                        <td>{{ $device->status }}</td> --}}
                    </tr>
                  @endforeach
              </tbody>
            </table>
            
            <div class="col-md-12">
                <div class="float-right">
                    {{ $cases->links() }}
                </div>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
@endsection