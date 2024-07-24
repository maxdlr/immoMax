<form action="{{ route('lodging_filter') }}" method="POST">
    @csrf
    <div class="row justify-content-center">
        <div class="col-6 col-md-3">
            <select name="lodgingType" id="lodgingType" class="form-select rounded-pill col-3">

                @if( @isset($currentLodgingType) )
                    <option value="{{ $currentLodgingType }}"> Filtered: {{ $currentLodgingType->name }}</option>
                @endif

                <option value="">All</option>
                @foreach($lodgingTypes as $lodgingType)
                    <option value="{{ $lodgingType->id }}">{{ $lodgingType->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="col-6 col-md-3">
            @include('shared/_button',
            [
                'label' => 'filter',
                'colorClass' => 'primary',
                'iconClass' => 'funnel-fill',
                'extraClasses' => 'w-100'
            ])
        </div>
    </div>
</form>
