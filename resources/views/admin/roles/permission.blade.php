@extends('layouts.admin.app', ['title' => 'Permissions (' . $role['name'] . ')'])

@section('content')
  <div class="row">
    <div class="col-12">
      @includeIf('partials.alert', ['errors' => $errors->all(), 'alert' => request()->session()->has('alert')])
    </div>
    <div class="col-12">  
      <div class="card">
        <div class="card-header">
          <h4>Permission List</h4>
          <div class="card-header-form">
            @can('manage_role_permissions')
            <a href="{{ route('admin.role.edit', $role['id']) }}" class="btn btn-success mr-2">
              <i class="fas fa-pencil-alt mr-1"></i>
              Permission
            </a>
            @endcan
            <a href="{{ route('admin.role.index') }}" class="btn btn-primary">
              <i class="fas fa-angle-left mr-1"></i>
              Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            @forelse ($permissions as $permission)
            <div class="col-md-4 col-lg-3">
              <div class="card mb-3 border role">
                <div class="card-body d-flex align-items-center justify-content-center py-2 px-3">
                  <h6 class="mb-0 text-break text-center">{{ $permission->name }}</h6>
                </div>
              </div>
            </div>
            @empty
              <div class="col-12 py-5">
                <h5 class="mb-0 text-center">Data empty</h5>
              </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>  
  const maxHeight = Math.max(
    ...$('.role').map(function(i, e) {
      return Number($(e).css('height').replace('px', ''));
    })
  );
  $('.role').css('height', `${maxHeight}px`);
</script>
@endpush