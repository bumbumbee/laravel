@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card mt-2">
                    <h5 class="card-header">{{ $post->title }}</h5>
                    <div class="card-body">
                        <p class="card-text">
                            {{ $post->content }}
                        </p>
                        <small> {{ $post->created_at }} </small>
                        Author: <span class="badge badge-info"> {{ $post->thisIsUserObject->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
