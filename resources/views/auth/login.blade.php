@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ trans('message.login') }}</div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'login', 'aria-lable' => trans('message.login')]) !!}
                            <div class="form-group row">
                                {!! Form::label('email', trans('message.email'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                                <div class="col-md-6">
                                    {!! Form::email('email', old('email'), ['class' => ['form-control', $errors->has('email') ? ' is-invalid' : ''], 'required' => 'required', 'id' => 'email']) !!}
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('password', trans('message.password'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                                <div class="col-md-6">
                                    {!! Form::password('password', ['class' => ['form-control', $errors->has('password') ? ' is-invalid' : ''], 'required' => 'required', 'id' => 'password']) !!}
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        {!! Form::checkbox('remember', old('remember') ? 'checked' : ''); !!} {{ trans('message.remember-me') }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {!! Form::submit(trans('message.login'), ['class' => 'btn btn-primary']) !!}
                                    <a class="btn-link" href="{{ route('password.request') }}">
                                        {{ trans('message.forget-password') }}
                                    </a>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        <div class="social text-center">
                            <div class="line"></div>
                            <div class="line-center text-center">{{ trans('message.or') }}</div>
                            <div class="line"></div>
                        </div>
                        <div class="login-social">
                            {!! Form::open(['url' => '#', 'method' => 'get']) !!}
                                {!! Form::button('<i class="fas fa-facebook"></i>'.trans('message.login-with').' Facebook', ['type' => 'submit', 'class' => 'btn btn-social facebook']) !!}
                            {!! Form::close() !!}
                            {!! Form::open(['url' => '#', 'method' => 'get']) !!}
                                {!! Form::button('<i class="fas fa-twitter"></i>'.trans('message.login-with').' Twitter', ['type' => 'submit', 'class' => 'btn btn-social google']) !!}
                            {!! Form::close() !!}
                            {!! Form::open(['url' => '#', 'method' => 'get']) !!}
                                {!! Form::button('<i class="fas fa-google"></i>'.trans('message.login-with').' Google', ['type' => 'submit', 'class' => 'btn btn-social twitter']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
