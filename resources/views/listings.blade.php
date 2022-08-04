<h1>{{$heading}}</h1>

@if(count($listings) ==0)
<p>No listing found</p>
@endif

@foreach($listings as $listing)
<h2>
    <a href="/laravel/project/public/listings/{{$listing['id']}}">
     {{$listing['title']}}
    </a>
   
</h2>
<p>{{$listing['description']}}</p>

@endforeach