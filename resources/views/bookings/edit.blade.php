@extends('layouts.app')

@section('content')
    @include('layouts.header')
    <div class="row content">
        @include('layouts.sidebar')
        <div class="col-sm-9">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-center">@lang('message.edit-mytravel')</div>
                            <div class="card-body">
                                {!! Form::model($booking, ['route' => ['booking.update', $booking->id], 'method' => 'put']) !!}
                                    @include('forms.booking')
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            {!! Form::submit(trans('message.edit'), ['class' => 'btn btn-primary']) !!}
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection
