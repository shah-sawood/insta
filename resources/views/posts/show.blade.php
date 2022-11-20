@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 offset-md-2">
            <img src="/storage/{{ $post->image }}" class="img-fluid">
        </div>
        <div class="col-md-4">
            <div class="card-header">{{ $post->caption }}</div>
        </div>
    </div>
</div>
@endsection