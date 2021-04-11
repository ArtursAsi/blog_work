@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add post') }}</div>

                    <div class="card-body">
                        <form method="POST"  action="{{route('posts.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="active"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Active') }}</label>

                                <div class="col-md-6">
                                    <select id="active" name="active" autofocus>
                                        <option
                                            value="1" >
                                            Yes
                                        </option>
                                        <option
                                            value="0">
                                            No
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror"
                                           name="title"  required
                                           autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="picture"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}</label>

                                <div class="col-md-6">
                                    <input id="picture" type="file"
                                           class="form-control @error('picture') is-invalid @enderror" name="picture"
                                           value="{{ old('picture') }}"  autocomplete="picture" autofocus>

                                    @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="body"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                                <div class="col-md-6">
                                    <textarea id="body" type="text"
                                              class="form-control @error('body') is-invalid @enderror"
                                              name="body"  required
                                              autocomplete="bio" autofocus>{{ old('body')}}
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
