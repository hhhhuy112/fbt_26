@extends('layouts.app')

@section('content')
    @include('layouts.header')
    <div class="row content">
        @include('layouts.sidebar')
        <div class="col-sm-9">
            <div class="container booking">
                <h2 class="text-center h2-booking">@lang('message.mytravel')</h2>
                <table class="table table-striped table-booking">
                    <thead>
                        <tr>
                            <th>@lang('message.tour-name')</th>
                            <th>@lang('message.price')</th>
                            <th>@lang('message.capacity')</th>
                            <th>@lang('message.date-booking')</th>
                            <th>@lang('message.total')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>
                                {!! Html::image($booking->tour->image, trans('message.image')) !!}
                                <p><strong>{{ $booking->tour->name }}</strong></p>
                            </td>
                            <td>{{ $booking->tour->price }}</td>
                            <td>{{ $booking->number_of_passengers }}</td>
                            <td>{{ $booking->booking_date }}</td>
                            <td>{{ $booking->grand_total }}</td>
                            <td>
                                {!! Form::open(['route' => ['booking.cancel', $booking->id]]) !!}
                                {!! Form::submit(trans('message.cancel'), ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                {!! Form::open(['route' => ['booking.destroy', $booking->id], 'method' => 'delete']) !!}
                                {!! Form::submit(trans('message.delete'), ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                {!! Form::open(['route' => ['booking.edit', $booking->id], 'method' => 'get']) !!}
                                {!! Form::submit(trans('message.edit'), ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('booking.cancelList') }}">@lang('message.view-cancel')</a>
            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection
