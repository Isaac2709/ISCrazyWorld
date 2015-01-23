@extends('admin.layouts.layout')
@section('title_page')
    Entradas
@stop

@section('title_container')
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
                        <td>{{ $post->title }}</td>
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
        .table_row_group:hover{
            cursor:pointer;
        }
        .title_cell_table{
            color: rgba(122, 81, 81, 0.95);
            font-weight: bold;
            float: left;
        }
        .title_cell_table:hover{
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
        .tags_cell_table{
            margin: 0px 0px 0px 10px;
            display: inline-block;
        }
        /*.table_row_group .btn.{
            visibility: hidden;
        }*/
    </style>
    <div class="loading text-center" style="opacity: 0">
        <img src="http://www.clinicabaviera.com/imagenes/cargando.gif" alt="loading" width="40px">
    </div>

    <div class="ISC_table">
        <div class="table_column"></div><div class="table_column"></div><div class="table_column"></div>
        <!-- Header of the table -->
        <div class="head_table">
            <div class="head_cell_table">
                Nombre
            </div>
            <div class="head_cell_table">
                Autor
            </div>
            <div class="head_cell_table date_cell_table">
                Fecha&nbsp;&nbsp;
            </div>
        </div>
        @foreach($posts as $post)
            <div class="table_row_group">
                <!-- First Panel - The information area post -->
                <div class="table_row">
                    <!-- First Column - The title post and the tags of the post -->
                    <div class="table_cell">
                        <!-- title post -->
                        <div class="title_cell_table">
                            {{ $post->title }}
                        </div>
                        <!-- List of tags post -->
                        <div class="tags_cell_table">
                            <ul class="list-inline">
                            @foreach($post->tags as $tag)
                                <li><a href="" class=""><small>{{ $tag->name }}</small></a></li>
                            @endforeach
                            </ul>
                        </div>
                     </div>
                    <!-- Second Column - The name of the autor of the post -->
                    <div class="table_cell">
                        {{ $post->admin->person->name }}
                    </div>
                    <!-- Third Column - The publication date of the post-->
                    <div class="table_cell">
                        <div class="date_cell_table">
                            {{ $post->date }}
                        </div>
                    </div>
                </div>
                <!-- Second Panel - The buttons area -->
                <div class="table_row_bottom">
                    <input class="id_post" type="text" value="{{ $post->id }}" style="display: none">
                    <div class="table_cell">
                        <a href="{{ '/post/'.$post->id }}" class="btn btn-info"> Ver </a>
                        <a href="{{ action('PostController@getEdit', $post->id) }}" class="btn btn-warning">Editar</a>
                        <input type="button" class="btn btn-danger" value="Eliminar">
                        <div class="btn">
                            <select name="" id="" class="category_post form-control">
                                @if($post->category!=null)
                                    <option value="{{ $post->category->id }}" selected> {{ $post->category->name }} </option>
                                    @foreach($categories as $category)
                                        @if($category->id != $post->category->id)
                                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="null" selected> Seleccione una categoría </option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                    </div>
                    <!-- NOT Completed -->
                    <div class="table_cell">

                    </div>
                    <div class="table_cell">

                    </div>
                </div>
            </div>
        @endforeach
        <!-- {{ json_encode($post) }} -->
    </div>

    <!-- AngularJS v1.2.25 -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script> -->

    <!-- /.table-responsive -->
    <!-- WELL -->
    <!-- <div class="well">
        <h4>DataTables Usage Information</h4>
        <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
        <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
    </div> -->

	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <!-- <script>
        $('.ISC_table').ready(function() {
            // $('#dataTables-example').dataTable();
            $('#table_row_group').click(function(){
                $(this).hide();
            });
        });
    </script> -->
    <!-- jQuery -->
@stop

@section('js_functions')
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();

            $(".category_post").change(function(){
                $(".loading").animate({
                    opacity: 1},
                    400);
                $(this).find("option[value='null']").remove();
                $.post('',
                    {
                        id_post:$(this).closest(".table_row_bottom").find(".id_post").val(),
                        category_post:$(this).val()
                    })
                    .done(function( data ) {
                        // Hiding the icon of progress
                        $(".loading").animate({opacity: 0}, 300, function() {
                            // Replacement progress-icon for that of success-icon
                            $(".loading").children('img').attr('src', 'http://4.bp.blogspot.com/-rdtQ8b-E6xU/UFte_R46gyI/AAAAAAAAAiI/dylOpDmAJHU/s1600/Ok%5B1%5D.png');
                            // Showing the icon of success
                            $(".loading").animate({opacity: 1}, 400, function(){
                                    // Hiding the icon of success
                                    $(".loading").animate({opacity: 0}, 200, function(){
                                        // Replacement success-icon for that of default icon (progress-icon)
                                        $(".loading").children('img').attr('src', 'http://www.clinicabaviera.com/imagenes/cargando.gif');
                                    });
                            });
                        });
                    })
                    .error(function(data) {
                        // Hide the icon
                        $(".loading").css({opacity: 0});
                        // Replace the icon of progress for tha error-icon
                        $(".loading").children('img').attr('src', 'http://www.itlp.edu.mx/img/error.png');
                        // Showing the icon of error
                        $(".loading").animate({opacity: 1}, 300, function() {
                            // Replacement progress-icon for that of success-icon
                            // $(".loading").children('img').attr('src', 'http://www.itlp.edu.mx/img/error.png');
                            // Showing the icon of success
                            // $(".loading").animate({opacity: 1}, 400, function(){
                            //         // Hiding the icon of success
                            //         $(".loading").animate({opacity: 0}, 200, function(){
                            //             // Replacement success-icon for that of default icon (progress-icon)
                            //             $(".loading").children('img').attr('src', 'http://www.clinicabaviera.com/imagenes/cargando.gif');
                            //         });
                            // });
                        });
                        //
                    });;
            });
            // $('.table_row_group').click(function(){
            //     // $(this).hide();
            //     $(location).attr( 'href', $(this).find('.btn.btn-info').attr('href') );
            // });
            // $(".table_row_group").hover( function(){
            //   $(this).animate({ opacity: 0.50}, 300);
            // }, function(){
            //   $(this).animate({opacity: 1,left: "-=50"}, 300);
            // });
            $(".table_row_group").find('.btn').css({
                opacity: '0',
            });
            $(".table_row_group").hover( function(){
              $(this).find('.btn').animate({ opacity: 1}, 200);
            }, function(){
              $(this).find('.btn').animate({opacity: 0}, 200);
            });
        });
    </script>
@stop