@extends('admin.layouts.layout')
@section('tittle_page')
    Administradores
@stop

@section('tittle_container')
	Administradores
@stop

@section('manage_active')
    class="active"
@stop

@section('admin_active')
    class="active"
@stop

@section('container')
@if($errors->any())
 <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{ $errors->first() }}</strong>
</div>
@endif
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Nombre de Usuario</th>
                    <th>Correo electronico</th>
                    <th>Número de teléfono</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            @if(count($admins)===1)
                @foreach($admins as $admin)
                    <tr class="odd gradeX">
                        <td>{{ $admin->person->name }} {{ $admin->person->first_surname }} {{ $admin->person->second_surname }}</td>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->person->email }}</td>
                        <td class="center">{{ $admin->person->phone_number }}</td>
                        <td>
                            <!-- <a href=" action('PacientesController@getShow', $paciente->cedula) " class="btn btn-primary center">Expediente</a> -->
                            <a href="{{ action('AdminController@getEdit', $admin->id_people) }}" class="btn btn-warning center">Modificar</a></center>
                            {{ Form::model($admin, array('action' => array('AdminController@postDelete', $admin->id_people), 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form')) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="odd gradeX"><td>Todavia no hay ninguna consulta.</td>
                        <td></td>
                        <td></td>
                        <td class="center"></td>
                    </tr>
            @endif
            </tbody>
        </table>
    </div>
    <div class="form-group">
        <a class="btn btn-success" href="{{action('AdminController@getCreate')}}"> Nuevo Administrador </a>
    </div>

    <!-- /.table-responsive -->
    <!-- WELL -->
    <!-- <div class="well">
        <h4>DataTables Usage Information</h4>
        <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
        <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
    </div> -->

	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
@stop