@php $user = auth()->user(); @endphp
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      @if ($user->image)
      <img alt="image" src="{{ asset($user->image) }}" class="rounded-circle mr-1"
        style="background-size: cover; width: 30px; height: 30px">
      @endif
      <div class="d-sm-none d-lg-inline-block">Hi, {{ $user->name }}</div></a>
    <div class="dropdown-menu dropdown-menu-right">
      <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
        <i class="far fa-user"></i> Profile
      </a>
      <div class="dropdown-divider"></div>
      <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout">
        @csrf
      </form>
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();"
        class="dropdown-item has-icon text-danger">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </div>
  </li>
  </ul>
</nav>