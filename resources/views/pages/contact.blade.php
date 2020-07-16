@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-lan-connect"></i>
        </span> Contacts </h3>
    </div>

    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>length</th>
                  <th>date</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ ($contact->user) ? $contact->user->name : $contact->user2 }}</td>
                        <td>{{ $contact->length }}</td>
                        <td>{{ $contact->time }}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
            
            {{-- <div class="col-md-12">
                <div class="float-right">
                    {{ $contacts->links() }}
                </div>
            </div> --}}
          </div>
        </div>
      </div>
      </div>
  </div>
@endsection