@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="header_page">
                <h1>{{ $post->title }}</h1>
            </div>

            @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            @if(Session::has('error'))
                <p class="alert alert-success">{{ Session::get('error') }}</p>
            @endif

            <form method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                @include('posts/form/post')
            </form>

        </div>
    </div>
</div>
@endsection
