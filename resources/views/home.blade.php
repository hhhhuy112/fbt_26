@extends('layouts.app')

@section('content')
    @include('layouts.header')
    <div class="row content">
        @include('layouts.sidebar')
        <div class="col-sm-9">
            <div class="row content">
                <div class="col-sm-5 tour">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Best of the North 6 days
                        </div>
                        <div class="panel-body">
                            {!! Html::image('img/img_snow_wide.jpg','Image', ['class' => 'responsive']) !!}
                        </div>
                        <div class="panel-footer">
                            <p>{!! trans('message.from') !!} <span class="price">351.1 (per person)</span></p>
                            <p>{!! trans('message.number_of_days') !!} 6-day</p>
                            <p>{!! trans('message.group_size') !!} 12-25pax</p>
                            {!! Form::open(['url' => '#', 'method' => 'get', 'class' => 'detail']) !!}
                                {!! Form::submit(trans('message.view_detail'), ['class' => 'btn btn-primary btn-detail']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 tour">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Best of the North 6 days
                        </div>
                        <div class="panel-body">
                            {!! Html::image('img/img_nature_wide.jpg', 'Image', ['class' => 'responsive']) !!}
                        </div>
                        <div class="panel-footer">
                            <p>{!! trans('message.from') !!} <span class="price">351.1 (per person)</span></p>
                            <p>{!! trans('message.number_of_days') !!} 6-day</p>
                            <p>{!! trans('message.group_size') !!} 12-25pax</p>
                            {!! Form::open(['url' => '#', 'method' => 'get', 'class' => 'detail']) !!}
                                {!! Form::submit(trans('message.view_detail'), ['class' => 'btn btn-primary btn-detail']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 tour">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Best of the North 6 days
                        </div>
                        <div class="panel-body">
                            {!! Html::image('img/img_mountains_wide.jpg', 'Image', ['class' => 'responsive']) !!}
                        </div>
                        <div class="panel-footer">
                            <p>{!! trans('message.from') !!} <span class="price">351.1 (per person)</span></p>
                            <p>{!! trans('message.number_of_days') !!} 6-day</p>
                            <p>{!! trans('message.group_size') !!} 12-25pax</p>
                            {!! Form::open(['url' => '#', 'method' => 'get', 'class' => 'detail']) !!}
                                {!! Form::submit(trans('message.view_detail'), ['class' => 'btn btn-primary btn-detail']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 tour">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Best of the North 6 days
                        </div>
                        <div class="panel-body">
                            {!! Html::image('img/img_snow_wide.jpg', 'Image', ['class' => 'responsive']) !!}
                        </div>
                        <div class="panel-footer">
                            <p>{!! trans('message.from') !!} <span class="price">351.1 (per person)</span></p>
                            <p>{!! trans('message.number_of_days') !!} 6-day</p>
                            <p>{!! trans('message.group_size') !!} 12-25pax</p>
                            {!! Form::open(['url' => '#', 'method' => 'get', 'class' => 'detail']) !!}
                                {!! Form::submit(trans('message.view_detail'), ['class' => 'btn btn-primary btn-detail']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 tour">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Best of the North 6 days
                        </div>
                        <div class="panel-body">
                            {!! Html::image('img/img_snow_wide.jpg', 'Image', ['class' => 'responsive']) !!}
                        </div>
                        <div class="panel-footer">
                            <p>{!! trans('message.from') !!} <span class="price">351.1 (per person)</span></p>
                            <p>{!! trans('message.number_of_days') !!} 6-day</p>
                            <p>{!! trans('message.group_size') !!} 12-25pax</p>
                            {!! Form::open(['url' => '#', 'method' => 'get', 'class' => 'detail']) !!}
                                {!! Form::submit(trans('message.view_detail'), ['class' => 'btn btn-primary btn-detail']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 tour">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Best of the North 6 days
                        </div>
                        <div class="panel-body">
                            {!! Html::image('img/img_nature_wide.jpg', 'Image', ['class' => 'responsive']) !!}
                        </div>
                        <div class="panel-footer">
                            <p>{!! trans('message.from') !!} <span class="price">351.1 (per person)</span></p>
                            <p>{!! trans('message.number_of_days') !!} 6-day</p>
                            <p>{!! trans('message.group_size') !!} 12-25pax</p>
                            {!! Form::open(['url' => '#', 'method' => 'get', 'class' => 'detail']) !!}
                                {!! Form::submit(trans('message.view_detail'), ['class' => 'btn btn-primary btn-detail']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection
