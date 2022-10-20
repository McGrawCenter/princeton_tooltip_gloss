(function() {


    tinymce.PluginManager.add('princeton_tooltip_gloss_tc_button', function( editor, url ) {

        editor.addButton( 'gloss', {
            text: 'Gloss',
	    tooltip : 'Insert Gloss',
            icon: false,
            onclick: function() {
			selection = tinyMCE.activeEditor.selection.getContent();

			editor.windowManager.open( {
			      title: 'Gloss '+selection,
			      body: [
{
				type: 'container',
				name: 'container',
				label: 'container',
				html: 'Enter a translation or other gloss for <i>'+selection+'</i>.<br />You may also enter the full URL of an image on the web.'
			      },
			      {
				type: 'textbox',
				name: 'gloss',
				label: 'Message'
			      }],
			      onsubmit: function( e ) {
				editor.insertContent( "[gloss message=\""+e.data.gloss+"\"]"+selection+"[/gloss]" );
			      }



			    });

            }
        });



    });



})();
