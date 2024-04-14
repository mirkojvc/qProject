@props(['field'])

@if ($errors->has($field))
    <div class="bw-alert bw-alert-danger">
        {{ $errors->first($field) }}
    </div>
@elseif (session()->has('error') && $field == 'session')
    <div class="bw-alert bw-alert-danger">
        {{ session('error') }}
    </div>
@endif