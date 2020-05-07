@extends('layouts.admin.app', ['title' => 'Roles'])

@section('content')
<div class="row">
  <div class="col-12">
    @includeIf('partials.alert', ['errors' => $errors->all(), 'alert' => request()->session()->has('alert')])
    <div class="card">
      <div class="card-header">
        <h4>Role List</h4>
        @can('add_role')
        <div class="card-header-form">
          <button type="button" class="btn btn-primary" id="addRole">
            <i class="fas fa-plus mr-1"></i>
            Role
          </button>
        </div>
        @endcan
      </div>
      <div class="card-body">
        <div class="row">
          @foreach ( $roles as $role )
          <div class="col-6 col-lg-3">
            <div class="card role border shadow-sm">
              <div class="card-body py-0 pl-3 pr-2 d-flex align-items-center justify-content-between">
                <h6 class="my-3 text-primary text-uppercase">{{ $role->name }}</h6>
                <div class="text-right mx-1">
                  <div class="dropdown">
                    <i class="btn btn-light btn-sm border-0 shadow-none bg-transparent fas fa-ellipsis-v" id="roleMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer"></i>
                    <div class="dropdown-menu pt-0" aria-label="roleMenu">
                      <p class="dropdown-header mb-0 pl-3">Total: {{ $role->users->count() }}</p>
                      <hr class="my-0">
                      @can('see_role_permissions')
                      <a href="{{ route('admin.role.show', $role->id) }}" class="dropdown-item">
                        Permissions
                      </a>
                      @endcan
                      @can('edit_role')
                      <a href="/" class="dropdown-item" id="editRole" data-id="{{ $role->id }}" data-role="{{ $role->name }}">
                        Edit
                      </a>
                      @endcan
                      @can('delete_role')
                      <a href="/" class="dropdown-item" id="deleteRole" data-id="{{ $role->id }}">
                        Delete
                      </a>
                      @endcan
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<form action="#" method="POST" class="d-none" id="deleteRoleForm">
  @csrf @method('delete')
</form>

<form action="{{ route('admin.role.store') }}" class="d-none" method="POST" id="addRoleForm">
  @csrf
  <input type="text" name="name" id="name">
</form>

<form action="#" class="d-none" method="POST" id="editRoleForm">
  @csrf @method('put')
  <input type="text" name="name" id="name">
</form>
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

  $('button#addRole').on('click', async function() {
    const userId = $(this).data('id');
    const form = $('form#addRoleForm');

    const { value: roleName } = await Swal.fire({
      title: 'Enter role name',
      input: 'text',
      showCancelButton: true,
      inputValidator: value => !value && 'The role name field is required.'
    })

    if ( roleName ) {
      form.find('input#name').val(roleName);
      form.submit();
    }
  });

  $('a#deleteRole').on('click', function(e) {
    e.preventDefault();

    const userId = $(this).data('id');
    const form = $('form#deleteRoleForm');

    form.attr('action', `${baseURL}/admin/role/${userId}`);
    swalDelete(result => result && form.submit());
  });

  $('a#editRole').on('click', async function(e) {
    e.preventDefault();

    const roleId = $(this).data('id');
    const form = $('form#editRoleForm');

    form.attr('action', `${baseURL}/admin/role/${roleId}`);

    const { value: roleName } = await Swal.fire({
      title: 'Edit role name',
      input: 'text',
      inputValue: $(this).data('role'),
      showCancelButton: true,
      inputValidator: value => !value && 'The role name field is required.'
    })

    if ( roleName ) {
      form.find('input#name').val(roleName);
      form.submit();
    }
  });
</script>
@endpush