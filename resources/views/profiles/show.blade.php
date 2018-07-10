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
                        <div class="col-sm-9">
                            <p>{{ trans('message.name') }}: </p>
                            <p>{{ trans('message.email') }}:</p>
                            <p>{{ trans('message.address') }}:</p>
                            <p>{{ trans('message.phone') }}:</p>
                            <p>{{ trans('message.birthday') }}:</p>
                            <p>{{ trans('message.gender') }}:</p>
                        </div>
                        <div class="col-sm-3">
                            {{ Html::image('/img/214280-200.png', 'avatar', ['class' => 'responsive']) }}
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection
