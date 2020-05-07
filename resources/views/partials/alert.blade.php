@foreach ($errors as $error)
<x-alert type="danger" :message="$error" />
@endforeach

@if ($alert)
  @php $alert = request()->session()->get('alert') @endphp
  <x-alert :type="$alert['type']" :message="$alert['message']" />
@endif