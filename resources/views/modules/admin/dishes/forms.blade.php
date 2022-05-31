@php
    if($templateName == 'create'){
        $url = route('dishes.create', ['restaurant_id' => $restaurant_id]);
    }elseif ($templateName == 'update'){
        $url = route('dishes.update', ['restaurant_id' => $restaurant_id, 'dish_id' => $row->id]);
    }
@endphp
<form action="{{ $url }}" method="POST" class="w-100" enctype="multipart/form-data">
    @csrf

    @if(!empty(session('success')))
        <h1 style="color: green">{{ session('success') }}</h1>
    @endif
    @if(!empty(session('error')))
        <h1 style="color: green">{{ session('error') }}</h1>
    @endif
    <div class="form-group mb-3">
        <label for="name" class="form-label">დასახელება</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $templateName == 'create'? old('name') : $row->name }}">
    </div>
    @error('name')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
        <label for="category_id" class="form-label">კატეგორია</label>
        <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
            <option>აირჩიეთ კატეგორია</option>
            @include('modules.admin.dishes.category_list',
                 ['category_id' => $templateName == 'create'? '' : $row->category_id]
            )
        </select>
    </div>
    @error('category_id')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
        <label for="price" class="form-label">ფასი</label>
        <input type="price" name="price" id="price" class="form-control"
           value="{{ $templateName == 'create'? old('price') : $row->price }}"
        >
    </div>
    @error('price')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
        <label for="image" class="form-label">ფოტო</label>
        <input class="form-control" type="file" id="image" name="image"
           value="{{ $templateName == 'create'? old('image') : $row->image }}"
        >
    </div>
    @error('image')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
        <label for="short_desc" class="form-label">მოკლე აღწერა</label>
        <textarea name="short_desc" id="short_desc" name="short_desc" rows="4" class="form-control"
        >{{ $templateName == 'create'? old('short_desc') : $row->short_desc }}</textarea>
    </div>
    <div class="form-group mb-3">
        <label for="description" class="form-label">აღწერა</label>
        <textarea name="description" id="description" name="description" rows="5" class="form-control"
        >{{ $templateName == 'create'? old('description') : $row->description }}</textarea>
    </div>
    <input id="submit" class="btn" type="submit" style="background:#153a1e; color:#fff" value="დამატება" />
</form>
