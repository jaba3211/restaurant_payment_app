@php
    if($templateName == 'create'){
        $url = route('restaurants.create');
    }elseif ($templateName == 'update'){
        $url = route('restaurants.update', ['restaurant_id' => $row->id]);
    }
@endphp
<form action="{{ $url }}" method="POST" class="w-100 create_form">
    @csrf
    <div class="form-group mb-3">
        <label for="restaurant_name" class="form-label">Restaurant Name</label>
        <input type="text" name="name" id="restaurant_name" class="form-control"
               value="{{ $templateName == 'create'? old('name') : $row->name }}"
        >
    </div>
    @error('name')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
        <label for="description" class="form-label">About Restaurant</label>
        <textarea class="form-control" name="description" id="description" rows="5"
        >{{ $templateName == 'create'? old('description') : $row->description }}</textarea>
    </div>

    <button type="submit" class="btn" style="background:#153a1e; color:#fff">Add</button>
</form>
