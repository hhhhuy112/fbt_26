@extends('layouts.app')

@section('content')
    @include('layouts.header')
    <div class="row justify-content-center">
        @include('layouts.sidebar')
        <div class="col-sm-9">
            <div class="card card-profile">
                <div class="card-header text-center">@lang('message.edit-profile')</div>
                <div class="card-body">
                    {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put']) !!}
                        @include('forms.profile')
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::submit(trans('message.update'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection
