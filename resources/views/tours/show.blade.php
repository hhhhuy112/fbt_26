@extends('layouts.app')

@section('content')
    @include('layouts.header')
    <div class="row content">
        @include('layouts.sidebar')
        <div class="col-sm-9">
            <div class="tab">
                {!! Form::button(trans('message.description'), ['class' => 'tablinks defaultOpen', 'id' => 'blocka']) !!}
                {!! Form::button(trans('message.booking'), ['class' => 'tablinks', 'id' => 'blockb']) !!}
                {!! Form::button(trans('message.review'), ['class' => 'tablinks', 'id' => 'blockc']) !!}
            </div>

            <div id="description" class="tabcontent">
                <div class="panel panel-primary tour-detail">
                    {!! Html::image($tour->image, trans('message.image'), ['class' => 'responsive']) !!}
                    <div class="panel-heading panel-tour">
                        <h1>{{ $tour->name }}</h1>
                        <p>@lang('message.from') <span class="price">{{ $tour->price }} @lang('message.per-person')</span></p>
                        <p>@lang('message.number_of_days') {{ $tour->duration }}</p>
                        <p>@lang('message.itinerary') {{ $tour->itinerary }}</p>
                        <div class="rate">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="fa-stack stars">
                                    <i class="fa fa-star fa-stack-1x"></i>
                                        @if($average_rating > 0.5)
                                            <i class="fa fa-star fa-stack-1x"></i>
                                        @elseif($average_rating < 0.5 && $average_rating > 0)
                                            <i class="fa fa-star-half-o fa-stack-1x fa-inverse"></i>
                                        @else
                                            <i class="fa fa-star fa-stack-1x fa-inverse"></i>
                                        @endif
                                    @php $average_rating--; @endphp
                                </span>
                            @endfor
                            <p>{{ $total_reviews }} @lang('message.review')</p>
                        </div>
                    </div>
                    <div class="panel-body">
                        <h2>@lang('message.description')</h2>
                        <p>{{ $tour->description }}</p>
                        <h3>@lang('message.activity')</h3>
                        @foreach($activities as $activity)
                            <h4><strong>{{ $activity->name }}</strong></h4>
                            <p>{{ $activity->description }}</p>
                        @endforeach
                        <h3>@lang('message.package')</h3>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>@lang('message.name')</th>
                                <th>@lang('message.description')</th>
                                <th>@lang('message.discount')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($packages as $package)
                                <tr>
                                    <td>{{ $package->name }}</td>
                                    <td>{{ $package->description }}</td>
                                    <td>{{ $package->discount }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="booking" class="tabcontent">
                @include('bookings.create')
            </div>

            <div id="review" class="tabcontent">
                @include('reviews.index')
            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection


