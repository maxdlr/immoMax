@if(@isset($route))
    <a
        href="{{$route}}"
        class="btn btn-{{$colorClass}} rounded-pill text-nowrap btn-{{$size}}"
    >
        <i class="bi bi-{{$iconClass}}"></i>
        {{ucfirst($label)}}
    </a>
@else
    <button
        class="btn btn-{{$colorClass}} rounded-pill text-nowrap btn-{{$size}}"
        type="{{$type ?? 'submit' }}"
    >
        <i class="bi bi-{{$iconClass}}"></i>
        {{ucfirst($label)}}
    </button>
@endif
