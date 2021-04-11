@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Blog Work</h1>
        @forelse($posts as $post)
                    <div class="row mt-5">
                        <div class="col-8">
                            <a href="{{route('posts.target',$post)}}"><h4>{{$post->title}}</h4></a>

                        </div>
                        <div class="col-4">
                            <h6>Published: {{$post->publish_date}}</h6>
                        </div>
                        </div>
                @empty
            There currently are no  active posts!
                @endforelse
            </div>
            <div class="row justify-content-center">
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
