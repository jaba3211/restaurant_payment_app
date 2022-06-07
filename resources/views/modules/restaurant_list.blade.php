@foreach($list as $row)
    <option
        {{ old('restaurant_id') == $row['id'] ? "selected" : '' }}
        data-id="{{ $row['id'] }}" value="{{ $row['id'] }}">{{ $row['name'] }}
    </option>
@endforeach
