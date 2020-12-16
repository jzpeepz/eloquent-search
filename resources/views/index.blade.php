@if ($results->isEmpty())
    <p>No results found for <strong>{{ request()->input('q') }}</strong>.</p>
@endif

@foreach ($results as $result)
    <div>
        <h3><a href="{{ $result->searchable->url() }}">{{ $result->title }}</a></h3>
        <p>{!! $result->searchable->getSearchDescription() !!}</p>
    </div>
@endforeach