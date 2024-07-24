@if(@isset($route))
    <a
        href="{{$route}}"
        class="btn btn-{{$colorClass}} rounded-pill text-nowrap btn-{{$size ?? ''}} {{$extraClasses ?? ''}}"
    >
        <i class="bi bi-{{$iconClass}}"></i>
        {{ucfirst($label)}}
    </a>
@else
    <button
        class="btn btn-{{$colorClass}} rounded-pill text-nowrap btn-{{$size ?? ''}} {{$extraClasses ?? ''}}"
        @if(@isset($onClick)) onclick="{{ $onClick }}" @endif
        @if(@isset($form)) form="{{$form}}" @endif
        type="{{$type ?? 'submit' }}"
    >
        <i class="bi bi-{{$iconClass}}"></i>
        {{ucfirst($label)}}
    </button>
@endif
