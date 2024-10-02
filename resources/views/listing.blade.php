<h1>{{ $heading }}</h1>

@unless (count($listings) == 0)

        @foreach ($listings as $listing)
                <h1>{{ $listing["description"] }} </h1>
        @endforeach
     @else
                <h1>No listing found</h1>
@endunless
        
