<div-row>
    <div-col-12>
        @if (session()->has('Success'))
            <div class="alert alert-success text-center">
                {{ session()->get('Success') }}
            </div>
        @elseif(session()->has('Error'))
            <div class="alert alert-danger text-center">
                {{ session()->get('Error') }}
            </div>
        @endif
    </div-col-12>
</div-row>
