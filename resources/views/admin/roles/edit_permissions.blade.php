@extends('layouts.admin.app', ['title' => 'Manage Permissions (' . $role['name'] . ')'])

@section('content')
  <div class="row">
    <div class="col-12">  
      <div class="card">
        <div class="card-header">
          <h4>Permission List</h4>
          <div class="card-header-form">
            <a href="{{ route('admin.role.show', $role['id']) }}" class="btn btn-primary">
              <i class="fas fa-angle-left mr-1"></i>
              Back
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <button type="button" class="btn btn-success btn-sm mr-2" id="selectAllRole">Select All</button>
              <button type="button" class="btn btn-success btn-sm" id="unselectAllRole">Unselect All</button>
              <hr>
            </div>
            @forelse ($permissions as $permission)
            <div class="col-md-4 col-lg-3">
              <div class="card mb-3 border role selectable {{ !$permission->isCurrentPermission ?: 'bg-info is-selected' }}" style="cursor: pointer" data-permission="{{ $permission->name }}">
                <div class="card-body d-flex align-items-center justify-content-center py-2 px-3">
                  <h6 class="mb-0 text-break text-center" style="user-select: none">{{ $permission->name }}</h6>
                </div>
              </div>
            </div>
            @empty
              <div class="col-12 py-5">
                <h5 class="mb-0 text-center">Data empty</h5>
              </div>
            @endforelse
            <div class="col-12">
              <form action="{{ route('admin.setRolePermissions', $role['id']) }}" method="POST">
                @csrf @method('put')
                <input type="hidden" name="permissions" id="permissions" value="{{ $currentPermissions }}">
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>  
  const roles = $('.role');

  const maxHeight = Math.max(
    ...roles.map(function(i, e) {
      return Number($(e).css('height').replace('px', ''));
    })
  );
  
  roles.css('height', `${maxHeight}px`);

  function setRolesToSubmit() {
    const inputField = $('input#permissions');
    const roles = $('.role.is-selected').map(function(i, role) {
      return $(role).data('permission');
    });

    inputField.val(JSON.stringify(roles.toArray()));
  }


  $('#selectAllRole').on('click', function() {
    $('.role').addClass('bg-info is-selected');
    setRolesToSubmit();
  });

  $('#unselectAllRole').on('click', function() {
    $('.role').removeClass('bg-info is-selected');
    setRolesToSubmit();
  });

  roles.on('click', function() {
    $(this).toggleClass('bg-info is-selected');
    setRolesToSubmit();
  });
</script>
@endpush