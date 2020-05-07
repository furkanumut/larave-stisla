@extends('layouts.admin.app', ['title' => 'User Detail'])

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>User Data</h4>
          <div class="card-header-form">
            <a href="{{ route('admin.user.index') }}" class="btn btn-primary">
              <i class="fas fa-angle-left mr-1"></i>
              Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item">
              <h6 class="mb-0 mt-1">Name</h6>
              <p class="mb-0">{{ $user->name }}</p>
            </li>
            <li class="list-group-item">
              <h6 class="mb-0 mt-1">Email</h6>
              <p class="mb-0">{{ $user->email }}</p>
            </li>
            <li class="list-group-item">
              <h6 class="mb-0 mt-1">Role</h6>
              <p class="mb-0">{{ $user->roles->pluck('name')->first() }}</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection