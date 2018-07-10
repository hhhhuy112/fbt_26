<div class="col-sm-3 sidenav">
    {!! Form::open(['url' => '#', 'id' => 'form-search']) !!}
        <legend>{!! trans('message.legend-search') !!}</legend>
        <div class="form-group">
            {!! Form::label('name', trans('message.itinerary-name')) !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('duration', trans('message.duration')) !!}
            {!! Form::number('duration', old('duration'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('number_of_passengers', trans('message.number_of_passengers')) !!}
            {!! Form::number('number_of_passenger', old('number_of_passenger'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('start_date', trans('message.start_date')) !!}
            {!! Form::date('start_date', old('start_date'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('price', trans('message.price')) !!}
            {!! Form::number('price', old('price'), ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit(trans('message.search_tour'), ['class' => 'btn btn-primary btn-search']) !!}
    {!! Form::close() !!}
</div>
