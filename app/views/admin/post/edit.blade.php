@extends('admin.layouts.layout_edit')
@section('title_page')
    Editar entrada
@stop

@section('post_active')
    class="active"
@stop

@section('Open_form')
<link rel="stylesheet" type="text/css" href="/admin/css/mycss/tags.css">
<div ng-controller="postCtrl as vm">
<!-- Form::open(array('action' => array('PostController@postEdit', $post->id), 'method' => 'POST', 'name' => 'userForm', 'editable-form')) -->
<form ng-submit="vm.enviar()">
@stop

@section('title_container')
<!-- LABELS EDITABLES -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js"></script> -->

    <!-- <link href="/pru/css/xeditable.css" rel="stylesheet">
    <script src="/pru/js/xeditable.js"></script>
                <div ng-controller="Ctrl" style="float:left;">
                    <a href="#" editable-text="user.name"> <% user.name || "empty" %> </a>
                </div> -->

	<div style="float:left;" class="div_name_post" id="div_label_name_post">
        {{ Form::label('title_post_label', $post->title, array('class'=>'control-label', 'id' => 'title_post_label', 'onclick'=>'cambiarTituloText()')) }}
    </div>
    <div style="float:left;" class="div_name_post col-sm-9" id="div_text_title_post" style="display: none;">
        <input type="text" name="title_post" value="{{ $post->title }}" style="display:none;" class= "form-control" id="title_post" onBlur="cambiarTituloLabel()" ng-model="vm.fdatos.title_post">
    </div>
	<div class="form-group" style="text-align:right;">
        {{ Form::submit('Guardar' , array('class'=> 'btn btn-success', 'style' => 'float:right;display:none;', 'id' => 'btnSave')) }}
        <div class="form-group ">
            <input id="btnEdit" class="btn btn-info" type="button" onclick="edit()" value="Editar" />
            <input id="btnPreview" class="btn btn-info" type="button" onclick="SaveAndCloseAllEditors()" style="display:none" value="Vista Previa" />
        </div>
    </div>
@stop

@section('container')
	<div class="row-fluid">
        <div class="span12">
            <div id="content">
               {{ $post->body }}
            </div>
        </div>
    </div>

    <input type="hidden" id="content_post"  name="content_post" ng-model="vm.fdatos.content_post" />
    <!-- <script type="text/javascript">
        var app = angular.module("iscrazyworldApp", ["xeditable"], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
        app.run(function(editableOptions) {
            editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
        });
        app.controller('Ctrl', function($scope) {
            $scope.user = {
                name: 'awesome user'
            };
        });
    </script> -->
@stop



@section('tags')
    <div>
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
    </div>
@stop

@section('Close_form')
    {{ Form::close() }}
</div>
    <!-- AngularJS v1.2.25 -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
    <!-- <script src="/admin/js/controller_admin.js"></script> -->

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/ng-tags-input/2.0.1/ng-tags-input.min.css" />
    <script src="http://cdnjs.cloudflare.com/ajax/libs/ng-tags-input/2.0.1/ng-tags-input.min.js"></script>

    <script type="text/javascript">
        // var app = angular.module("iscrazyworldApp", ['ngTagsInput']);
        // app.controller('iscrazyworldAdminCtrl', function(){
        //     var vm = this;
        //     vm.submitForm = function(isValid) {
        //         // check to make sure the form is completely valid
        //         if (isValid) {
        //             alert('our form is amazing');
        //         }
        //     };
        // });
        var app = angular.module('iscrazyworldApp', ['ngTagsInput'], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        })/*.config(function(tagsInputConfigProvider) {
            tagsInputConfigProvider
                .setDefaults('tagsInput', {
                    placeholder: 'New tag',
                    addOnEnter: false
                })
                .setDefaults('autoComplete', {
                    maxResultsToShow: 20,
                    debounceDelay: 1000
                })
                .setActiveInterpolation('tagsInput', {
                    placeholder: true,
                    addOnEnter: true,
                    removeTagSymbol: true
                })
                .setTextAutosizeThreshold(15);
        })*/;
        app.controller('postCtrl',['$log','$http', function($log,$http) {
                var vm = this;

                //inicializo un objeto en los datos de formulario
                vm.fdatos = {
                    title_post:"{{$post->title}}",
                    content_post:$("#content_post").val(),
                    id:"{{$post->id}}",
                    movies: {{ json_encode($post->tags()->lists('name')) }}
                };
                // $.get('/admin/posts/data', { post_id:'{{$post->id}}'  }, 'JSON')
                //     .success(function(data, status) {
                //         vm.datos = data.tags;//así enviamos los posts a la vista
                //         vm.fdatos.tittle_post = data.post.titulo;
                //         vm.fdatos.content_post = data.post.body;
                //         vm.fdatos.id = data.post.id;
                //         // vm.fdatos.movies = data.tags;

                //     })
                //     .error(function(data, status) {
                //         alert("Ha fallado la petición. Estado HTTP:"+status);
                //     }
                // );

                // $log.debug("Acabamos de crear el $scope");
                // $http({
                //     method: 'GET',
                //     url: '/admin/posts/data',
                //     data: { post_id:'{{$post->id}}'  }
                //   }).success(function(data, status, headers, config) {

                //         vm.datos = data.tags;//así enviamos los posts a la vista
                //         // vm.fdatos.tittle_post = data.post.titulo;
                //         // vm.fdatos.content_post = data.post.body;
                //         // vm.fdatos.id = data.post.id;
                //         vm.fdatos.movies = data.tags;

                //   }).error(function(data, status, headers, config) {

                //       alert("Ha fallado la petición. Estado HTTP:"+status);

                //   });
                    // $tags = [
                    //         'The Dark Knight',
                    //         'Heat',
                    //     ];
                    // $tags = $.get('/getTagss', {},'JSON');
                    // console.log($tags);
                    // vm.fdatos.movies = $.get('/getTagss', {},'JSON');
                vm.loadMovies = function(query) {
                    // return $http.get('/admin/js/tags.json');
                    // $.ajax({url:"/admin/posts/tags",dataType: 'JSON',error: function() {
                    //    $("#respuesta").show().html('Ha surgido un error.');
                    // },
                    // success:function(result){
                    //     // $("#content").html(result);
                    //     $("#respuesta").hide.html('');
                    //     return result;
                    // }
                    // });
                    // $.get('/tags', function(data){
                    //     return data;
                    // })
                    return $.get('/getTags', {tag_name:$(".input").val()}, 'JSON');
                };

                vm.showButtonsToEdit = function(query){
                    var activer_editor_id = $('#content').data('liveEdit').getActiveEditorId()
                    if (!activer_editor_id) {
                        $('#btnEdit').css('display', 'inline');
                        $('#btnPreview').css('display', 'none');
                        $('#btnSave').css('display', 'inline');
                        $('#div_text_title_post').css('display', 'none');
                    }
                };

                 // declaro la función enviar
                vm.enviar = function(){
                    vm.fdatos.content_post = $("#content_post").val();
                    $http.post("", vm.fdatos)
                        .success(function(res){
                            console.log(res);

                            //por supuesto podrás volcar la respuesta al modelo con algo como vm.res = res;
                        }
                    );
                };
            }]
        );
    </script>


@stop