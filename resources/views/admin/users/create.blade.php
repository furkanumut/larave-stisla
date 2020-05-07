@extends('layouts.admin.app', ['title' => 'Add User'])

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>User Form</h4>
          <div class="card-header-form">
            <a href="{{ route('admin.user.index') }}" class="btn btn-primary">
              <i class="fas fa-angle-left mr-1"></i>
              Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
              @error('name')
              <p class="invalid-feedback d-block">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
              @error('email')
              <p class="invalid-feedback d-block">{{ $message }}</p>
              @enderror
            </div>
            <div class="form-group">
              <label for="role">Role</label>
              <select class="form-control" name="role" id="role">
                @foreach ($roles as $role)
                <option value="{{ $role }}">{{ $role }}</option>
                @endforeach
              </select>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                  @error('password')
                  <p class="invalid-feedback d-block">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="password_confirmation">Confirm Password</label>
                  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection