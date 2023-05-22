@extends ('layouts.app')

@section('content')
    @auth
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
    @endauth

    <div class="container border p-4 my-5">
        <div class="card p-2">
            @forelse($posts as $post)
                <div class="card-title">
                    {{ $post->user->name }}<span> {{ $post->created_at->diffForHumans() }} </span>
                </div>
                <div class="card-body">
                    {{ $post->body }}
                </div>
                @auth
                    @if (!$post->likedBy(auth()->user()))
                        <form method="POST" action="{{ route('posts.likes', $post) }}">
                            @csrf
                            <button class="btn btn-primary" type="submit">Like</button>

                        </form>
                    @else
                        <form method="POST" action="{{ route('posts.likes', $post) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-dark" type="submit">Unlike</button>
                        </form>
                    @endif

                    @can('delete', $post)
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    @endcan

                @endauth
                <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
            @empty
                No Posts
            @endforelse
        </div>

    </div>
@endsection
