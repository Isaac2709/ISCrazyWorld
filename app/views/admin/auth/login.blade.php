@extends('admin.layouts.layout_login')
@section('container')
{{ Form::open(array('method' => 'POST', 'role' => 'form-horizontal')) }}
<fieldset>
@if($errors->any())
     <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{ $errors->first() }}</strong>
    </div>
@endif
    <div class="form-group">
        <input class="form-control" placeholder="E-mail" name="username" type="text" autofocus>
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="Password" name="password" type="password" value="">
    </div>
    <div class="checkbox">
        <label>
            <input name="remember" type="checkbox" value="Remember Me">Remember Me
        </label>
    </div>
     {{ Form::submit('Login', array('class'=> 'btn btn-lg btn-success btn-block')) }}
     {{ Form::close() }}
    </p>
    <a href="/save">Admin</a>
</fieldset>

@stop