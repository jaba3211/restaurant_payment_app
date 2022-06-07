@php
    if($templateName == 'create'){
        $url = route('categories.create');
    }elseif ($templateName == 'update'){
        $url = route('categories.update', ['category_id' => $row->id]);
    }
@endphp
<form action="{{ $url }}" method="POST" class="w-100" enctype="multipart/form-data">
    @csrf
    @if(!empty(session('error')))
        <h1 style="color: red">{{ session('error') }}</h1>
    @endif
    <div class="form-group mb-3">
        <label for="restaurant_name" class="form-label">Category Name</label>
        <input type="text" name="name" id="restaurant_name" class="form-control"
            value="{{ $templateName == 'create'? old('name') : $row->name }}"
        >
    </div>
    <div class="form-group mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image" name="image" value="{{ old('image') }}">
    </div>
    @error('image')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <button type="submit" class="btn" style="background:#153a1e; color:#fff">Add</button>
</form>
