@extends('admin.layouts.layout')
@section('tittle_page')
    Entradas
@stop

@section('tittle_container')
    Entradas
@stop

@section('manage_active')
    class="active"
@stop

@section('admin_active')
    class="active"
@stop

@section('container')
<div class="row">
<div class="col-lg-9" ng-controller = "iscrazyworldAdminCtrl as admin">
 @if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Por favor corrige los siguentes errores:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif
    {{ Form::open(array('method' => 'POST', 'role' => 'form', 'class' => 'form-horizontal', 'name' => 'userForm', 'novalidate')) }}
        <!-- CEDULA -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.username.$invalid && !userForm.username.$pristine,  'has-success' : userForm.username.$valid && !userForm.username.$pristine  }">
            {{ Form::label('usernameLabel', 'Nombre de usuario', array('class' => 'col-sm-3 control-label')) }}
            <div class='col-sm-9'>
                {{ Form::text('username', null, array('name' => 'username','class' => 'form-control', 'ng-model' => 'admin.username', 'required')) }}
                <p ng-show="userForm.username.$invalid && !userForm.username.$pristine" class="help-block">El nombre de usuario es requerido.</p>
            </div>
        </div>

        <!-- Nombre -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.name.$invalid && !userForm.name.$pristine,  'has-success' : userForm.name.$valid && !userForm.name.$pristine  }">
            {{ Form::label('nameLabel', 'Nombre', array('class' => 'col-sm-3 control-label') ) }}
            <div class='col-sm-9'>
                {{ Form::text('name', null, array('name' => 'name','class' => 'form-control', 'ng-model' => 'admin.name', 'required')) }}
                <p ng-show="userForm.name.$invalid && !userForm.name.$pristine" class="help-block">El nombre es requerido.</p>
            </div>
        </div>

        <!-- Primer apellido -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.first_surname.$invalid && !userForm.first_surname.$pristine,  'has-success' : userForm.first_surname.$valid && !userForm.first_surname.$pristine  }">
            {{ Form::label('first_surnameLabel', 'Primer apellido', array('class' => 'col-sm-3 control-label') ) }}
            <div class='col-sm-9'>
                {{ Form::text('first_surname', null, array('name' => 'first_surname','class' => 'form-control', 'ng-model' => 'admin.first_surname', 'required')) }}
                <p ng-show="userForm.first_surname.$invalid && !userForm.first_surname.$pristine" class="help-block">El primer apellido es requerido.</p>
            </div>
        </div>

        <!-- Segundo apellido -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.second_surname.$invalid && !userForm.second_surname.$pristine, 'has-success' : userForm.second_surname.$valid && !userForm.second_surname.$pristine  }">
            {{ Form::label('second_surnameLabel',  'Segundo apellido', array('class' => 'col-sm-3 control-label') ) }}
            <div class='col-sm-9'>
                {{ Form::text('second_surname', null, array('name' => 'second_surname','class' => 'form-control', 'ng-model' => 'admin.second_surname', 'required')) }}
                <p ng-show="userForm.second_surname.$invalid && !userForm.second_surname.$pristine" class="help-block">El segundo apellido es requerido.</p>
            </div>
        </div>

        <!-- Email -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.email.$invalid && !userForm.email.$pristine, 'has-success' : userForm.email.$valid && !userForm.email.$pristine  }">
            {{ Form::label('emailLabel', 'Correo electrónico', array('class' => 'col-sm-3 control-label') ) }}
            <div class='col-sm-9'>
                {{ Form::email('email', null, array('name' => 'email','class' => 'form-control', 'ng-model' => 'admin.email', 'required')) }}
                <p ng-show="userForm.email.$invalid && !userForm.email.$pristine" class="help-block">Ingrese un email valido.</p>
            </div>
        </div>

        <!-- Teléfono -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.phone_number.$invalid && !userForm.phone_number.$pristine, 'has-success' : userForm.phone_number.$valid && !userForm.phone_number.$pristine }">
            {{ Form::label('telefono_habLabel', 'Teléfono', array('class' => 'col-sm-3 control-label')) }}
            <div class='col-sm-9'>
                {{ Form::text('phone_number', null, array('name' => 'phone_number','class' => 'form-control', 'ng-model' => 'admin.phone_number', 'required')) }}
                <p ng-show="userForm.phone_number.$invalid && !userForm.phone_number.$pristine" class="help-block">Ingrese un telefono habitacional valido.</p>
            </div>
        </div>
    <center>
    {{ Form::submit('Crear' , array('class'=> 'btn btn-success', 'ng-disabled' => 'userForm.$invalid')) }}
    </center>
    {{ Form::close() }}
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
    <script src="/admin/js/controller_admin.js"></script>
</div>
</div>
@stop