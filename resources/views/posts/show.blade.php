@extends('layouts.app')
@inject('beautifulTimeFormat', '\Carbon\Carbon')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-2">
            <img src="/storage/{{ $post->image }}" class="img-fluid">
        </div>
        <div class="col-md-4">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle img-fluid">
                </div>
                <div class="col-md-4">
                    <a href="{{ route('profile.show', [$post->user->id]) }}" class="text-decoration-none text-dark">
                        {{ $post->user->name }}
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="text-decoration-none text-dark fw-bold" href="#">{{ __('Follow') }}</a>
                </div>
            </div>
            <small>{{ $beautifulTimeFormat::parse($post->created_at)->diffForHumans() }}</small>
            <hr>
            <div class="col-12">
                <br>
                {{ $post->caption }}
            </div>
        </div>
    </div>
</div>
@endsection