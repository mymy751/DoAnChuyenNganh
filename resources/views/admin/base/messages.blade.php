@if (session()->has('messages'))
    <div class="alert {{ session()->get('type') }}">
        {{ session()->get('messages') }}
    </div>
@endif
