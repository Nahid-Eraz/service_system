@extends('backend.layout.master')
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                      <h2 class="text-center">Total Services</h2>
                      <h5 class="text-center">{{ App\Models\Categories::get()->count() }}</h5>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                      <h2 class="text-center">Total User</h2>
                      <h5 class="text-center">{{ App\Models\User::where("user_type",'customer')->get()->count() }}</h5>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                      <h2 class="text-center">Total Job Post</h2>
                      <h5 class="text-center">{{ App\Models\WorkOrder::get()->count() }}</h5>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
