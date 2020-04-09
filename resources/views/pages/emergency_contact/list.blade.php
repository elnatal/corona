@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-contacts"></i>
        </span> Emergency contact </h3>
        <nav aria-label="breadcrumb">
          <a href="/emergency-contact/add" class="btn btn-primary">Add contact</a>  
        </nav>
    </div>

    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Region</th>
                  <th>phone number</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($emergencyContact as $contact)
                    <tr>
                        <td>{{ $contact->region }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td><a href="/emergency-contact/{{ $contact->id }}"><i class="mdi mdi-eye"></i></a></td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
            
            <div class="col-md-12">
                <div class="float-right">
                    {{ $emergencyContact->links() }}
                </div>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
@endsection