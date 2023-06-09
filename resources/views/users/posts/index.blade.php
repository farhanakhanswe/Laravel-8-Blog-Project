@extends('layouts.web.app')

@section('content')

    <!-- Blog Section -->
    <section class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2>Recent Blog Posts by {{ $user->name }}</h2>
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
                                    <h5 class="card-title">
                                        {{ $post->created_at->diffForHumans() }}</h5>
                                    <p class="card-text"> {{ $post->body }}.</p>
                                    <div class="row mx-1">
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

                                        @endauth
                                    </div>
                                    <span class="mx-1">{{ $post->likes->count() }}
                                        {{ Str::plural('like', $post->likes->count()) }}</span>
                                    <hr>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
