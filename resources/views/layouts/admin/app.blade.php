<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ? config('app.short_name').' - '.$title : config('app.name')}}</title>

  <!-- Scripts -->
  <script>
    const baseURL = `{{ url('/') }}`;
  </script>
  <script src="{{ asset('js/app.js') }}" defer></script>


  <!-- Styles -->
  <link href="{{ mix('assets/dashboard/css/userPanelapp.css') }}" rel="stylesheet">
  @stack('css')
</head>

<body>
  <div id="app">
    <div class="main-wrapper-1">
      <div class="navbar-bg"></div>

      @include('layouts.admin.navbar')
      @include('layouts.admin.sidebar')
      
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{ $title }}</h1>
          </div>

          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>

      @include('layouts.admin.footer')
    </div>
  </div>

  @stack('modal')

  {{-- CDN --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <script src="{{ mix('assets/dashboard/js/userPanelapp.js') }}"></script>

  @stack('js')
</body>

</html>