@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your posts') }}
                    <span><a href="{{route('posts.create')}}" ><button class="btn btn-outline-primary">+</button></a></span>

                </div>
                <div class="card-body">
                    @forelse($posts as $post)
                        <div class="row" >
                            <div class="col-9">
                                <a href="{{route('posts.show',$post)}}"><h4>{{$post->title}}</h4></a>
                            </div>
                            <div class="col-3" >
                                <form action="{{route('posts.destroy',$post->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">X</button>
                                </form>
                                <a href="{{route('posts.edit',$post->id)}}"><button class="btn btn-outline-primary">Edit</button></a>
                            </div>
                        </div>
                    @empty
                        You currently have no posts yet!
                    @endforelse

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
