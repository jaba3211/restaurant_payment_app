@foreach($list as $row)
    <option
        {{ $templateName == 'create'? (old('restaurant_id') == $row['id'] ? "selected" : '') : ($restaurant_id == $row['id'] ? "selected" : '') }}
        data-id="{{ $row['id'] }}" value="{{ $row['id'] }}">{{ $row['name'] }}
    </option>
@endforeach
