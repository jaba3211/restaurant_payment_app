@php
  $url = !empty(session('restaurant_id')) ? route('search') : route('scan.QR');
@endphp
<form action="{{ $url }}" method="GET" class="d-flex">
    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit" style="background: #153a1e; color:#fff;">Search</button>
</form>
