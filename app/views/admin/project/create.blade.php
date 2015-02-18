@extends('admin.layouts.layout_edit')
@section('title_page')
    Nueva entrada
@stop

@section('portfolio_active')
    class="active"
@stop

@section('Open_form')
    {{ Form::open(array('method' => 'POST', 'name' => 'saveForm')) }}
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
	<textarea style="height: 300px; width: 100%;" cols="50" id="area5">HTML <b>content</b> <i>default</i> in textarea</textarea>


    <input type="hidden" id="content_post"  name="content_post" />

<!-- Inicializar Editor JavaScript -->
<script src="/admin/scripts/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
    // new nicEditor().panelInstance('area1');
    // new nicEditor({fullPanel : true}).panelInstance('area2');
    // new nicEditor({iconsPath : '../nicEditorIcons.gif'}).panelInstance('area3');
    // new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
    new nicEditor({maxHeight : 309, fullPanel : true}).panelInstance('area5');
});
</script>
@stop

@section('Close_form')
    {{ Form::close() }}
@stop


