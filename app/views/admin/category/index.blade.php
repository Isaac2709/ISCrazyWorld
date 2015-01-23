@extends('admin.layouts.layout')
@section('title_page')
	Categorias
@stop

@section('title_container')
	Categorias
@stop

@section('manage_active')
    class="active"
@stop

@section('category_active')
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
                    <th>Nombre</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            @if(count($categories)>0)
                @foreach($categories as $category)
                    <tr class="odd gradeX">
                        <td>{{ $category->name }}</td>
						<td class="center">
						<center>
                            <a href="{{ action('CategoryController@getEdit', $category->id) }}" class="btn btn-warning center">Modificar</a>
                            {{ Form::model($category, array('action' => array('CategoryController@postDelete', $category->id), 'method' => 'POST', 'role' => 'form')) }}
                            	{{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        </center>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="odd gradeX">
                	<td>Todavia no hay ninguna consulta.</td>
                	<td class="center"></td>
				</tr>
            @endif
            </tbody>
        </table>
    </div>
    <div class="form-group">
        <a class="btn btn-success" href="{{action('CategoryController@getCreate')}}"> Nueva categoria </a>
    </div>

    <!-- /.table-responsive -->
    <!-- WELL -->
    <!-- <div class="well">
        <h4>DataTables Usage Information</h4>
        <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB category, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
        <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
    </div> -->

	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
@stop

@section('js_functions')
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
@stop