@foreach($list as $row)
    <div class="card mb-2">
        <h5 class="card-header">{{ $row->username }}</h5>
        <h6 class="card-header text-success bg-transparent">{{ $row->restaurant->name }}</h6>
        <div class="card-body">
            <a href="{{ route('staff.edit', ['username' => $row->username]) }}" class="btn btn-warning">UPDATE</a>
            <a href="{{ route('staff.delete', ['username' => $row->username]) }}" class="btn btn-danger">DELETE</a>
        </div>
    </div>
@endforeach
