@if ($alert = session()->pull('success'))
    <div class="alert alert-success mb-0 text-center py-0 small">
        {{ $alert}}
    </div>
@else
    @php($danger = session()->pull('danger'))
    <div class="alert alert-danger mb-0 text-center py-0 small">
        {{ $danger}}
    </div>
@endif
