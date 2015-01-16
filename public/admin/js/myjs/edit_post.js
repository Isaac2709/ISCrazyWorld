/**
 * Método JQUERY para el manejo del editor de texto personalizado
 * @param  {[type]} ) [description]
 */
$(document).ready(function () {
    // $(".input").attr("name", "tag_name");

    $('#content').liveEdit({
        css: ['/admin/css/bootstrap.min.css', '/admin/bootstrap/bootstrap_extend.css'] /* Apply bootstrap css into the editing area */,
        groups: [
                ["group1", "", ["Bold", "Italic", "Underline", "ForeColor", "RemoveFormat"]],
                ["group2", "", ["Bullets", "Numbering", "Indent", "Outdent"]],
                ["group3", "", ["Paragraph", "FontSize", "FontDialog", "TextDialog"]],
                ["group4", "", ["LinkDialog", "ImageDialog", "TableDialog", "Emoticons", "Snippets"]],
                ["group5", "", ["Undo", "Redo", "FullScreen", "SourceDialog"]]
                ] /* Toolbar configuration */
    });
});

/**
 * [edit description]
 * @return {[type]} [description]
 */
function edit() {

    SaveAndCloseAllEditors();

    $('#content').data('liveEdit').startedit();

    $('#content').type = 'text';

    $('#btnEdit').css('display', 'none');
    $('#btnPreview').css('display', 'inline');
    $('#btnSave').css('display', 'none');
}

function SaveAndCloseAllEditors() {
    var activer_editor_id = $('#content').data('liveEdit').getActiveEditorId();
    if (!activer_editor_id) return;
    load_content_post();
    var sHtml = $('#' + activer_editor_id).data('liveEdit').getXHTMLBody(); //Use before finishedit()
    $('#' + activer_editor_id).data('liveEdit').finishedit();

    $('#btnEdit').css('display', 'inline');
    $('#btnPreview').css('display', 'none');
    $('#btnSave').css('display', 'inline');
    $('#div_text_tittle_post').css('display', 'none');
    EmbedFont();
}
function SaveAndCloseEditor() {
    var activer_editor_id = $('#content').data('liveEdit').getActiveEditorId()
    if (!activer_editor_id) return;
    var sHtml = $('#' + activer_editor_id).data('liveEdit').getXHTMLBody(); //Use before finishedit()
    $('#' + activer_editor_id).data('liveEdit').finishedit();

    $('#btnEdit').css('display', 'inline');
    $('#btnPreview').css('display', 'none');
    $('#btnSave').css('display', 'inline');

    EmbedFont();
}

function load_content_post(){
    var var_content_post= $('#content').data('liveEdit').getXHTMLBody();
    document.getElementById('content_post').value  = var_content_post;
}

function load_content(){
    document.getElementById('content_post').value  = $('#content').html();
}

function cambiarTituloText(){
    $('#tittle_post').css('display', 'inline');
    $('#div_text_tittle_post').css('display', 'inline');
    $('#tittle_post_label').css('display', 'none');
    $('#div_label_name_post').css('display', 'none');
    document.getElementById('tittle_post').focus();
    document.getElementById('tittle_post').select();

}
function cambiarTituloLabel(){
    $('#tittle_post').css('display', 'none');
    $('#div_text_tittle_post').css('display', 'none');
    $('#tittle_post_label').css('display', 'inline');
    $('#div_label_name_post').css('display', 'inline');
    if($('#tittle_post').val()==''){
        $('#tittle_post').val($('#tittle_post_label').html());
    }
    if($('#tittle_post_label').html() != $('#tittle_post').val() && document.getElementById('btnPreview').style.display != "inline"){
        $('#btnSave').css('display', 'inline');
        load_content();
    }
    $('#tittle_post_label').html($('#tittle_post').val());
}

