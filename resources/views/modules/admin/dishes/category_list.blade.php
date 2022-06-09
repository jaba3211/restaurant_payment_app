@foreach($list as $row)
        <option
            {{ $templateName == 'create'? (old('category_id') == $row['id'] ? "selected" : '') : ($category_id == $row['id'] ? "selected" : '') }}
            data-id="{{ $row['id'] }}" value="{{ $row['id'] }}">{{ $row['name'] }}
        </option>
@endforeach
