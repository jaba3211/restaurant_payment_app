@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    @if(isset($list[0]))
                    <h2 class="menu_title my-5">
                        {{ $list[0]->restaurant->name }}
                    </h2>
                    @else
                        <h2 class="menu_title my-5 text-danger">
                            No Dishes!
                        </h2>
                    @endif
                    @include('modules.frontend.dishes.list')
                </div>
            </div>
        </div>
    </main>
@endsection
