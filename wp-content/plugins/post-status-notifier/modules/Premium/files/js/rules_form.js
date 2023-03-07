jQuery(document).ready( function($) {

    var textarea = $('textarea[name="dyn_match"]');
    textarea.hide();
    textarea.closest('li').append('<div id="dyn_match_editor"></div>');

    var editorFilters = ace.edit("dyn_match_editor");

    editorFilters.setTheme("ace/theme/github");
    editorFilters.getSession().setMode("ace/mode/twig");
    editorFilters.getSession().setValue(textarea.val());

    editorFilters.getSession().on('change', function() {
        textarea.val(editorFilters.getSession().getValue());
    });
});