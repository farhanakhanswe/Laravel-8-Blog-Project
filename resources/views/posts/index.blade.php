@extends ('layouts.app')

@section('content')
    <div class="container border p-4">
        <form method="POST" action="/posts">
            @csrf
            <div class="mb-3">
                <label for="post" class="form-label">Write a Blog Post</label>
                <input type="text" class="form-control" id="body" name="body" aria-describedby="description">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container border p-4 my-5">
        <div class="card p-2">
            @forelse($posts as $post)
                <div class="card-title">
                    {{ $post->user->name }}<span> {{ $post->created_at->diffForHumans() }} </span>
                </div>
                <div class="card-body">
                    {{ $post->body }}
                </div>
                <form>
                    <button class="btn btn-primary">Like</button>
                </form>
                <form>
                    <button class="btn btn-dark"> Unlike </button>
                </form>
            @empty
                No Posts
            @endforelse
        </div>

    </div>
@endsection
