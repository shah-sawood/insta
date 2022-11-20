@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (!(Auth::user()->profile ?? ''))
        <div class="alert alert-warning">
            Please complete your profile to view your all data.
        </div>
        @endif
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="col-md-3">
            <div class="text-center">
                <img src="{{ asset('images/logo.webp') }}" width="250" class="img-fluid">
            </div>
        </div>
        <div class="col-md-9">
            <div class="row row-cols-1 g-3">
                <div class="col d-flex justify-content-between align-items-center">
                    <h1 class="text-uppercase">{{ $user->username ?? 'N/A' }}</h1>
                    @if (Auth::user()->id == $user->id)
                    <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">New Post</a>
                    @endif
                </div>
                <div class="col">
                    <div class="row row-cols-4">
                        <div class="col"><strong>{{ $user->posts->count()}}</strong> posts</div>
                        <div class="col"><strong>150k</strong> followers</div>
                        <div class="col"><strong>15</strong> following</div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-muted"><a href="#">{{ $user->profile->title ?? 'N/A' }}</a></div>
                    <p>{{ $user->profile->description ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-2">

        @forelse($user->posts as $post)
        <div class="col-sm-2 col-md-3 col-lg-4">
            <a href="{{ route('post.show', [$post->id]) }}">
                <img src="/storage/{{ $post->image }}" class="img-thumbnail rounded" alt="">
            </a>
        </div>
        @empty
        <div class="col-12 text-center">
            {{ $user->username }} hasn't posted anything yet.
        </div>
        @endforelse
    </div>
</div>
@endsection