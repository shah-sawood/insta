@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row align-items-center g-3">
                        <div class="col-12">
                            <div class="text-center text-bg-secondary rounded p-1">
                                <h3>{{ $user->username ?? 'N/A' }}</h3>
                            </div>
                        </div>
                        <div class="col-md-1 offset-md-1">
                            <div class="text-center">
                                <img src="{{ $user->profile->profileImage() }}"
                                    class="img-thumbnail border-danger rounded-circle">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row text-center gx-3">
                                <div class="col-12 col-md-2">
                                    <strong>{{ $user->posts->count()}}</strong>
                                    <div class="text-muted">
                                        <small>posts</small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <strong>150k</strong>
                                    <div class="text-muted">
                                        <small>followers</small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <strong>15</strong>
                                    <div class="text-muted">
                                        <small>following</small>
                                    </div>
                                </div>
                                @can('update', $user->profile)
                                <div class="col-12 col-md-2">
                                    <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">New Post</a>
                                </div>
                                <div class="col-12 col-md-2">
                                    <a href="{{ route('profile.edit', [$user->id]) }}" class="btn btn-sm btn-dark">Edit
                                        Profile</a>
                                </div>
                                @endcan
                                <div class="col-12 col-md-2">
                                    <follow-button></follow-button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 offset-1">
                        <div class="text-muted fw-bold">{{ $user->profile->title ?? 'N/A' }}</div>
                        <p class="fw-light">{{ $user->profile->description ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
            <div class="row g-2">

                @forelse($user->posts as $post)
                <div class="col-sm-2 col-md-3 col-lg-4">
                    <a href="{{ route('post.show', [$post->id]) }}">
                        <img src="/storage/{{ $post->image }}" class="img-fluid" alt="an image">
                    </a>
                </div>
                @empty
                <div class="col-12 text-center">
                    {{ $user->username }} hasn't posted anything yet.
                </div>
                @endforelse

            </div>
        </div>
    </div>
</div>
@endsection