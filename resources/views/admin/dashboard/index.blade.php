@extends('layouts.admin.app', ['title' => 'Dashboard'])

@section('content')
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-users-cog"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Admin</h4>
        </div>
        <div class="card-body">
          {{$totalAdmin}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
