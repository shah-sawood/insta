@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-md-3">
            <div class="text-center">
                <img src="{{ asset('images/logo.webp') }}" width="250" class="rounded-circle">
            </div>
        </div>
        <div class="col-md-9">
            <h1>Insta</h1>
            <div></div>
            
        </div>
    </div>
</div>
@endsection
