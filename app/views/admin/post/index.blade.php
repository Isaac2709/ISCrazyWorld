@extends('admin.layouts.layout')
@section('tittle_page')
    Entradas
@stop

@section('tittle_container')
	Entradas
@stop

@section('post_active')
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
                @if($posts)
                    @foreach($posts as $post)
                    <tr class="even gradeC">
                        <td>{{ $post->titulo }}</td>
                        <td>{{ $post->date }}</td>
                        <?php
                            $body = substr(strip_tags($post->body), 0, 40);
                            if(strlen($post->body) > 40){
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
        <a class="btn btn-success" href="{{action('PostController@getCreate')}}"> Nueva Publicación </a>
    </div>

    <style type="text/css">
        .ISC_table{
            display: table;
            width: 100%;
            border: 1px solid rgba(237, 206, 206, 0.91);
            border-radius: 5px;
        }

        .table_row_group{
            display: table-row-group;
        }
        .table_row_group:hover{
            background:rgba(65, 218, 194, 0.71);
        }

        .table_cell{
            display: table-cell;
            padding-left: 10px;
            padding-top: 6px;
        }
        .table_row_bottom{
            display: table-row;
        }

        .table_row_bottom .table_cell{
            border-bottom: 1px solid rgba(70, 79, 81, 0.47);
            padding-bottom: 6px;
        }

        .table_column{
            display: table-column;
        }

        .table_row{
            display: table-row;
        }
        .table_row:hover{

        }
        .tittle_cell_table{
            color: rgba(122, 81, 81, 0.95);
            font-weight: bold;
            float: left;
        }
        .tittle_cell_table:hover{
            color: rgba(15, 13, 13, 0.95);
        }
        .btn_cell_table{

        }
        .date_cell_table{
            text-align: right;
            padding-right: 10px;
        }
        .head_table{
            display: table-row;
            font-family: "lucida sans unicode","lucida grande",sans-serif;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 0pt;
            color: #333;
            background-color: rgba(113, 230, 255, 0.9);
            border-color: #DDD;
        }
        .head_cell_table{
            display: table-cell;
            padding-left: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>

    <div class="ISC_table">
        <div class="table_column"></div><div class="table_column"></div><div class="table_column"></div>
        <div class="head_table">
            <div class="head_cell_table">
                Nombre
            </div>
            <div class="head_cell_table">

            </div>
            <div class="head_cell_table date_cell_table">
                Fecha&nbsp;&nbsp;
            </div>
        </div>
        @foreach($posts as $post)
            <div class="table_row_group">
                <div class="table_row">
                    <div class="table_cell">
                        <div class="tittle_cell_table">
                            {{ $post->titulo }}
                        </div>
                     </div>

                    <div class="table_cell">

                    </div>

                    <div class="table_cell">
                        <div class="date_cell_table">
                            {{ $post->date }}
                        </div>
                    </div>
                </div>
                <div class="table_row_bottom">
                    <div class="table_cell">
                        <a href="{{ action('PostController@getEdit', $post->id) }}" class="btn btn-warning">Editar</a>
                        <input type="button" class="btn btn-danger" value="Eliminar">
                    </div>
                    <div class="table_cell">

                    </div>
                    <div class="table_cell">

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.table-responsive -->
    <!-- WELL -->
    <!-- <div class="well">
        <h4>DataTables Usage Information</h4>
        <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
        <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
    </div> -->

	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <!-- <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script> -->
@stop