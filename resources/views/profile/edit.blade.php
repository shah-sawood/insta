@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update', [$user->id]) }}">
                        @csrf
                        @method('PATCH')

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Bio') }}</label>

                            <div class="col-md-6">
                                <input id="title" class="form-control @error('title') is-invalid @enderror" name="title"
                                    placeholder="Your bio goes here"
                                    value="{{ (old('title') ?? $user->profile->title) ?? '' }}" required
                                    autocomplete="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('About')
                                }}</label>

                            <div class="col-md-6">
                                <textarea id="description"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    placeholder="Say something about your self" required
                                    autocomplete="current-description">{{ (old('description') ?? $user->profile->description) ?? '' }}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="url" class="col-md-4 col-form-label text-md-end">{{ __('URL')
                                }}</label>

                            <div class="col-md-6">
                                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror"
                                    name="url" value="{{ (old('url') ?? $user->profile->url) ?? '' }}" required
                                    placeholder="example: http://www.example.com" autocomplete="current-url">

                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Profile
                                Picture')
                                }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file"
                                    class="form-control @error('image') is-invalid @enderror"
                                    name="image" autocomplete="current-image">

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection