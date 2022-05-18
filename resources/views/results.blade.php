@forelse ($results as $post)
    <div class="col-5 mb-3"><div class="card"><div class="card-body">
        <h5 class="card-title"> {{ $post->title }} </h5><h6 class="card-subtitle mb-2 text-muted"> {{ $post->date }} </h6>
            <p class="card-text"> {{ $post->description }} </p>
            <p class="card-text text-muted fst-italic">{{ $post->categories }} </p>
            <a href="{{ $post->url }}" class="card-link"> {{ $post->url }} </a>
        </div>
    </div>
    </div>
@empty
    <li><a href="#" data-id="0">Sorry, there's no posts with your search "{{ $search }}"</a></li>
@endforelse