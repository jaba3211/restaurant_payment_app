@php
    if($templateName == 'create'){
        $url = route('restaurants.create');
    }elseif ($templateName == 'update'){
        $url = route('restaurants');
    }
@endphp
<form action="{{ $url }}" method="POST" class="w-100">
    @csrf
    <div class="form-group mb-3">
        <label for="restaurant_name" class="form-label">რესტორნის დასახელება</label>
        <input type="text" name="name" id="restaurant_name" class="form-control" value="{{ old('name') }}">
    </div>
    @error('name')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
        <label for="description" class="form-label">რესტორნის შესახებ</label>
        <textarea class="form-control" name="description" id="description" rows="5" value="{{ old('description') }}"></textarea>
    </div>

    <button type="submit" class="btn" style="background:#153a1e; color:#fff">დამატება</button>
</form>
