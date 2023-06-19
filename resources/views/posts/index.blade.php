@extends('layouts.web.app')

@section('content')

    <!-- Blog Post Form -->
    <section class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Write an instant blog!</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="/">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="title">Content</label>
                        <textarea class="form-control" id="content" rows="3" placeholder="Enter content" id="body" name="body"
                            required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2>Recent Blog Posts</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        @if (!empty($posts))
                            @foreach ($posts as $post)
                                <div class="my-2">
                                    <h4 class="card-title">{{ $post->title }}</h4>
                                    <h5 class="card-title">By <a href="{{ route('users.posts', $post->user) }}">
                                            {{ $post->user->name }} </a><span>
                                            || {{ $post->created_at->diffForHumans() }} </span></h5>
                                    <p class="card-text"> {{ $post->body }}.</p>
                                    <span class="mx-1">{{ $post->likes->count() }}
                                        {{ Str::plural('like', $post->likes->count()) }}</span>
                                    <div class="row m-1">
                                        @auth
                                            @if (!$post->likedBy(auth()->user()))
                                                <form method="POST" action="{{ route('posts.likes', $post) }}">
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm" type="submit">Like</button>

                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('posts.likes', $post) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit">Unlike</button>
                                                </form>
                                            @endif

                                            @can('delete', $post)
                                                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-secondary btn-sm" type="submit">Delete</button>
                                                </form>
                                            @endcan
                                        </div>
                                        <div class="row mx-1">
                                            <form method="POST" action="{{ route('posts.comments', $post) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" name="comment_body"
                                                        placeholder="Enter a comment"><span>
                                                        <button type="submit">Enter</button></span>
                                                </div>
                                            </form>
                                        </div>
                                    @endauth

                                    <div class="row mx-1">
                                        <div class="comment-history w-100">
                                            <h6 class="comment-history-title">Comment History</h6>
                                            <ul class="comment-list">
                                                @forelse($post->comments as $comment)
                                                    <li class="comment-item">
                                                        <div class="comment-content">
                                                            <div class="comment-header">
                                                                <h6 class="comment-author">{{ $comment->user->name }}</h6>
                                                                <p class="comment-time">
                                                                    {{ $comment->created_at->diffForHumans() }}</p>
                                                                @auth
                                                                    @can('delete', $comment)
                                                                        <div class="delete-comment">
                                                                            <form method="POST"
                                                                                action="{{ route('posts.comments.destroy', $comment) }}">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button class="btn btn-link delete-comment-btn"
                                                                                    type="submit">Delete</button>
                                                                            </form>
                                                                        </div>
                                                                    @endcan
                                                                @endauth
                                                            </div>
                                                            <p class="comment-body">{{ $comment->body }}</p>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li class="comment-item">
                                                        <p class="no-comments-text">No comments yet.</p>
                                                    </li>
                                                @endforelse
                                            </ul>
                                        </div>


                                    </div>


                                </div>
                            @endforeach

                            <div class="my-4 d-flex justify-content-end">
                                {!! $posts->links() !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
