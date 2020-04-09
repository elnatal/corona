@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-contacts"></i>
        </span> Add emergency contact </h3>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('store-emergency-contact') }}">
                    @csrf
                    <div class="form-group">
                      <label for="region">Region</label>
                      <input type="text" class="form-control" name="region" id="region" placeholder="Region">
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                      </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a href="/emergency-contact" class="btn btn-light">Cancel</a>
                  </form>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection