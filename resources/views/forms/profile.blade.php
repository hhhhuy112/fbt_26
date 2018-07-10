<div class="form-group row">
    {!! Form::label('name', trans('message.name'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('name', old('name'), ['class' => ['form-control', $errors->has('name') ? ' is-invalid' : ''], 'required' => 'required', 'id' => 'name', 'autofocus']) !!}
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
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
    {!! Form::label('address', trans('message.address'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('address', old('address'), ['class' => ['form-control', $errors->has('address') ? ' is-invalid' : ''], 'required' => 'required', 'id' => 'address']) !!}
        @if ($errors->has('address'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {!! Form::label('phone', trans('message.phone'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('phone', old('phone'), ['class' => ['form-control', $errors->has('phone') ? ' is-invalid' : ''], 'required' => 'required', 'id' => 'phone']) !!}
        @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {!! Form::label('date_of_birth', trans('message.birthday'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::date('date_of_birth', old('date_of_birth'), ['class' => ['form-control', $errors->has('date_of_birth') ? ' is-invalid' : ''], 'required' => 'required', 'id' => 'date_of_birth']) !!}
        @if ($errors->has('date_of_birth'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('date_of_birth') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {!! Form::label('gender', trans('message.gender'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::radio('gender', 'male') !!} {!! trans('message.male') !!}
        {!! Form::radio('gender', 'female') !!} {!! trans('message.female') !!}
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
    {!! Form::label('password-confirm', trans('message.confirm_password'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'id' => 'password-confirm']) !!}
    </div>
</div>
