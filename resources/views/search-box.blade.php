<form class="form-inline" action="{{ route('eloquent-search') }}" method="get">
    <div class="form-group">
      <input type="text" class="form-control" id="sitesearch" name="q" placeholder="Search For..." value="{{ request()->input('q') }}">
    </div>
    {{-- <button type="submit" class="btn btn-default">Search</button> --}}
</form>