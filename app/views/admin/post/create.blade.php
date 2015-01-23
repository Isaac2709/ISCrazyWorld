@extends('admin.layouts.layout_edit')
@section('title_page')
    Nueva entrada
@stop

@section('post_active')
    class="active"
@stop

@section('Open_form')
    {{ Form::open(array('method' => 'POST', 'name' => 'saveForm')) }}
    <!-- <link rel="stylesheet" type="text/css" href="/admin/css/mycss/tags.css">
<div ng-controller="postCtrl as vm"> -->
<!-- Form::open(array('action' => array('PostController@postEdit', $post->id), 'method' => 'POST', 'name' => 'userForm', 'editable-form'))
<form ng-submit="vm.enviar()"> -->
@stop

@section('title_container')
    <div class="row">
    	<div style="float:left;" class="form-group col-sm-6">
            <input name="title_post" id="title_post" type="text" data-type="text" data-placement="right" placeholder="Nombre del post" class="form-control" name="title_post" />
        </div>
    	<div style="text-align:right;">
            <div class="col-sm-6">
                {{ Form::submit('Guardar' , array('class'=> 'btn btn-success', 'style' => 'float:right;', 'id' => 'btnSave')) }}
                <div class="form-group">
                    <input id="btnEdit" class="btn btn-info" type="button" onclick="edit()" value="Editar" />
                    <input id="btnPreview" class="btn btn-info" type="button" onclick="SaveAndCloseAllEditors()" style="display:none" value="Vista Previa" />
                </div>

            </div>
        </div>
    </div>

@stop

@section('container')
	<div class="row-fluid">
        <div class="span12">
            <div id="content">

            </div>
        </div>
    </div>

    <input type="hidden" id="content_post"  name="content_post" />

<!-- Inicializar Editor JavaScript -->
<script language="javascript">
    window.onload = function() {
        edit();
    }
</script>
@stop

@section('tags')
    <!-- <div>
        <tags-input class="bootstrap"
                    id="tag_name"
                    ng-model="vm.fdatos.movies"
                    placeholder="Agregar un tag"
                    on-tag-added="vm.showButtonsToEdit($query)"
                    on-tag-removed="vm.showButtonsToEdit($query)"
                    replace-spaces-with-dashes="false">
          <auto-complete source="vm.loadMovies($query)"
                         min-length="0"
                         loadOnEmpty="true"
                         debounce-delay="0"
                         max-results="10"></auto-complete>
        </tags-input>
    </div> -->
@stop

@section('Close_form')
    {{ Form::close() }}
@stop


