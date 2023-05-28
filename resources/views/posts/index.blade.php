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
                                <h4 class="card-title">{{ $post->title }}</h4>
                                <h5 class="card-title">By {{ $post->user->name }}<span>
                                        || {{ $post->created_at->diffForHumans() }} </span></h5>
                                <p class="card-text"> {{ $post->body }}.</p>
                                <div class="text-right d-flex">
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
                                @endauth
                                <span>{{ $post->likes->count() }}
                                    {{ Str::plural('like', $post->likes->count()) }}</span>
                            @endforeach
                        @else
                            <div class="my-5">
                                Ooops..No Posts Yet!
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
