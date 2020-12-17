<p class="pb-4 mb-4 border-b border-gray-200">
    {{ $results->isEmpty() ? 'No' : $results->total() }} results found for <span class="font-bold">{{ request()->input('q') }}</span>.
</p>

@foreach ($results as $result)
    <div class="pb-4 mb-4 border-b border-gray-200">
        <div class="mb-1">
            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                {{ $result->searchable->getSearchTypeLabel() }}
            </span>
        </div>
        <div class="mb-1"><a href="{{ $result->searchable->url() }}" class="text-2xl font-body text-fsbRed hover:underline">{{ $result->title }}</a></div>
        <p class="text-lg">{!! $result->searchable->getSearchDescription() !!}</p>
    </div>
@endforeach
{{ $results->links() }}