@foreach($list as $row)
    @php
        $url = $templateName == 'staff' ? route('user.edit', ['username' => $row->username]) : route('user.reset.password', ['username' => $row->username]);
        $buttonName = $templateName == 'staff' ? 'UPDATE' : 'RESET PASSWORD';
    @endphp
    <div class="card mb-2">
        <h5 class="card-header">{{ $row->username }}</h5>
        @if($templateName == 'staff')
            <h6 class="card-header text-success bg-transparent">{{ $row->restaurant->name }}</h6>
        @endif
        <div class="card-body">
            <a href="{{ $url }}" class="btn btn-warning">{{ $buttonName }}</a>
            <a href="{{ route('user.delete', ['username' => $row->username]) }}" class="btn btn-danger">DELETE</a>
        </div>
    </div>
@endforeach
