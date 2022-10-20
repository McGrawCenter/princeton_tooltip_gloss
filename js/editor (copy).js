(function() {


    tinymce.PluginManager.add('princeton_tooltip_gloss_tc_button', function( editor, url ) {

        editor.addButton( 'gloss', {
            text: 'Gloss',
	    tooltip : 'Insert Gloss',
            icon: false,
            onclick: function() {
			selection = tinyMCE.activeEditor.selection.getContent();
			editor.insertContent("[gloss message=\"Translation\"]"+selection+"[/gloss]");
            }
        });



    });



})();
