@extends('layouts.admin.app', ['title' => 'Permissions'])

@section('content')
<div class="row">
  <div class="col-12">  
    @includeIf('partials.alert', ['errors' => $errors->all(), 'alert' => request()->session()->has('alert')])
    <div class="card">
      <div class="card-header">
        <h4>Permission List</h4>
        @can('add_permission')
        <div class="card-header-form">
          <button type="button" class="btn btn-primary" id="addPermission">
            <i class="fas fa-plus mr-1"></i>
            Permission
          </button>
        </div>
        @endcan
      </div>
      <div class="card-body">
        <div class="row">
          @forelse ($permissions as $permission)
          <div class="col-md-4 col-lg-3">
            <div class="card mb-3 border role">
              <div class="card-body d-flex align-items-between justify-content-between py-2 px-3">
                <h6 class="mb-0 text-break text-center">{{ $permission->name }}</h6>

                <div class="text-right mx-1">
                  <button class="btn btn-danger btn-sm" id="deletepermission" data-id="{{ $permission->id }}"><i class="fas fa-trash"></i></button>
                </div>

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

<form action="{{ route('admin.permissions.store') }}" class="d-none" method="POST" id="addPermissionForm">
  @csrf
  <input type="text" name="name" id="name">
</form>

<form class="d-none" method="POST" id="deletePermissionForm">
  @csrf 
  @method('delete')
</form>

@endsection

@push('js')
<script>  
  const maxHeight = Math.max(
    ...$('.role').map(function(i, e) {
      return Number($(e).css('height').replace('px', ''));
    })
  );
  $('.role').css('height', `${maxHeight}px`);

  
  $('button#addPermission').on('click', async function() {
    const roleId = $(this).data('id');
    const form = $('form#addPermissionForm');

    const { value: permissionName } = await Swal.fire({
      title: 'Enter permission name',
      input: 'text',
      showCancelButton: true,
      inputValidator: value => !value && 'The permission name field is required.'
    })

    if ( permissionName ) {
      form.find('input#name').val(permissionName);
      form.submit();
    }
  });

  
  $('button#deletepermission').on('click', function(e) {
    e.preventDefault();

    const permissionId = $(this).data('id');
    const form = $('form#deletePermissionForm');

    form.attr('action', `${baseURL}/admin/permissions/${permissionId}`);
    swalDelete(result => result && form.submit());
  });
</script>
@endpush