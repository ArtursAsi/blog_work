@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update post') }}</div>

                    <div class="card-body">
                        <div class="form-group row justify-content-center">

                            <div class="col-md-6">

                                @if("/storage/".$post->picture != "/storage/")
                                    <img src="{{"/storage/".$post->picture}}" alt="" style="height: 200px;object-fit: cover" class=" w-100 d-inline-block">
                                @else
                                    <img style="display: none">

                                @endif
                                <form action="{{route('posts.updatePicture',$post)}}" enctype="multipart/form-data"
                                      method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="file" name="picture">
                                    <button class="btn btn-outline-success">Upload</button>
                                </form>
                                <form action="{{route('posts.deletePicture',$post)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </div>

                        <form method="post" action="{{route('posts.update',$post)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')




                            <div class="form-group row">
                                <label for="active"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Active') }}</label>

                                <div class="col-md-6">
                                    <select id="active" name="active" autofocus>
                                        <option
                                            value="1" {{ old('active',$post->active) == 1 ? 'selected' : ''}}>
                                            Yes
                                        </option>
                                        <option
                                            value="0" {{ old('active',$post->active) == 0 ? 'selected' : ''}}>
                                            No
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="body"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                                <div class="col-md-6">
                                    <textarea id="body" type="text"
                                              class="form-control @error('body') is-invalid @enderror"
                                              name="body"  required
                                              autocomplete="bio" autofocus>{{ old('body',$post->body)}}
</textarea>
                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
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
