
@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h1>{{$post->title}} </h1>


                    </div>

                    <div class="card-body">
                        @if("/storage/".$post->picture != "/storage/")
                            <img src="{{"/storage/".$post->picture}}" alt="" style="height: 200px;object-fit: cover" class="p-2 mb-3 w-100 d-inline-block">
                        @else
                            <img style="display: none">

                        @endif
                            <div class="m-5">
                                <h5>{{$post->body}}</h5>
                            </div>
                    </div>


                    </div>
                </div>
            </div>
        </div>
@endsection
