@extends('layouts.admin.app', ['title' => 'Users'])

@section('content')
<div class="row">
  <div class="col-12">
    @includeIf('partials.alert', ['errors' => $errors->all(), 'alert' => request()->session()->has('alert')])
    <div class="card">
      <div class="card-header">
        <h4>User List</h4>
        @can('add_user')
        <div class="card-header-form">
          <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i>
            User
          </a>
        </div>
        @endcan
      </div>
      <div class="card-body">
        <table class="table datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Created At</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $i => $user)
              <tr>
                <th scope="row">{{ $i + 1 }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  <div class="badge badge-primary badge-sm">
                    {{ $user->roles->pluck('name')->first() }}
                  </div>
                </td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                <td>
                  <div class="dropdown">
                    <i class="btn btn-light btn-sm border-0 shadow-none bg-transparent fas fa-ellipsis-v" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer"></i>
                    <div class="dropdown-menu dropdown-menu-right pt-0" aria-label="userMenu">
                      @can('see_user')
                      <a href="{{ route('admin.user.show', $user->id) }}" class="dropdown-item">
                        Detail
                      </a>
                      @endcan
                      @can('edit_user')
                      <a href="{{ route('admin.user.edit', $user->id) }}" class="dropdown-item">
                        Edit
                      </a>
                      @endcan
                      @can('delete_user')
                      <a href="/" class="dropdown-item" id="deleteButton" data-id="{{ $user->id }}">
                        Delete
                      </a>
                      @endcan
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<form action="#" method="POST" class="d-none" id="deleteUserForm">
  @csrf @method('delete')
</form>
@endsection

@push('js')
<script>
  $('a#deleteButton').on('click', function(e) {
    e.preventDefault();

    const userId = $(this).data('id');
    const form = $('form#deleteUserForm');

    form.attr('action', `${baseURL}/admin/user/${userId}`);

    swalDelete(result => result && form.submit());
  });
</script>
@endpush