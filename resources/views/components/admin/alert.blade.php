@if (session()->has('alert'))
    <div class="col-lg-6 p-0">
        @if (session('alert')['type'] == 'success')
            <div class="alert alert-success" role="alert">
                {!!session('alert')['message']!!}
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                {!!session('alert')['message']!!}
            </div>
        @endif
    </div>
@endif
