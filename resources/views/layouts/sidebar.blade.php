<div class="col-sm-3 sidenav">
    {!! Form::open(['route' => 'tour.search', 'id' => 'form-search']) !!}
        <legend>{!! trans('message.legend-search') !!}</legend>
        <div class="form-group">
            {!! Form::label('name_itinerary', trans('message.itinerary-name')) !!}
            {!! Form::text('name_itinerary', '', ['class' => 'form-control', 'id' => 'name', 'autofocus']) !!}
            @if ($errors->has('name_itinerary'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name_itinerary') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('duration', trans('message.duration')) !!}
            {!! Form::number('duration', old('duration'), ['class' => 'form-control', 'id' => 'duration']) !!}
            @if ($errors->has('duration'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('duration') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('start_date', trans('message.start_date')) !!}
            {!! Form::date('start_date', null, ['class' => 'form-control', 'id' => 'start_date']) !!}
            @if ($errors->has('start_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('start_date') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('price', trans('message.price')) !!}
            {!! Form::number('price', old('price'), ['class' => 'form-control', 'id' => 'price', 'step' => 0.01]) !!}
            @if ($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        {!! Form::submit(trans('message.search_tour'), ['class' => 'btn btn-primary btn-search']) !!}
    {!! Form::close() !!}
</div>
