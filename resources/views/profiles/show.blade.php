@extends('layouts.app')

@section('content')
    @include('layouts.header')
    <div class="row justify-content-center">
        @include('layouts.sidebar')
        <div class="col-sm-9">
            <div class="card card-profile">
                <div class="card-header text-center">{{ trans('message.profile') }}</div>
                <div class="card-body card-body-profile">
                    <div class="row">
                        <div class="col-sm-9 col-profile">
                            <p><strong>@lang('message.name'):</strong> {{ $user->name }} </p>
                            <p><strong>@lang('message.email'):</strong> {{ $user->email }}</p>
                            <p><strong>@lang('message.address'):</strong> {{ $user->address }}</p>
                            <p><strong>@lang('message.phone'):</strong> {{ $user->phone }}</p>
                            <p><strong>@lang('message.birthday'):</strong> {{ $user->date_of_birth }}</p>
                            <p><strong>@lang('message.gender'):</strong> {{ $user->gender }}</p>
                        </div>
                        <div class="col-sm-3">
                            {{ Html::image('/img/214280-200.png', 'avatar', ['class' => 'responsive']) }}
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        {!! Form::open(['route' => ['user.edit', $user->id], 'method' => 'GET']) !!}
                            {!! Form::submit(trans('message.edit'), ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection
