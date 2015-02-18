@extends('admin.layouts.layout')
@section('title_page')
    Entradas
@stop

@section('title_container')
	Entradas
@stop

@section('portfolio_active')
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
                    <th>Título</th>
                    <th>Fecha</th>
                    <th>Cuerpo</th>
                </tr>
            </thead>
            <tbody>
                @if($projects)
                    @foreach($projects as $project)
                    <tr class="even gradeC">
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->date }}</td>
                        <?php
                            $body = substr(strip_tags($project->body), 0, 40);
                            if(strlen($project->body) > 40){
                                $body = $body.'...';
                            }
                        ?>
                        <td>{{ $body }}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <!-- BOTON -->
    <div class="form-group">
        <a class="btn btn-success" href="{{action('ProjectController@getCreate')}}"> Añadir Projecto </a>
    </div>


@stop

@section('js_functions')
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
@stop