@if(@isset($route))
    <a
        href="{{$route}}"
        class="btn btn-{{$colorClass}} rounded-pill"
    >
        <i class="bi bi-{{$iconClass}}"></i>
        {{ucfirst($label)}}
    </a>
@else
    <button
        class="btn btn-{{$colorClass}} rounded-pill"
        type="{{$type ?? 'submit' }}"
    >
        <i class="bi bi-{{$iconClass}}"></i>
        {{ucfirst($label)}}
    </button>
@endif
