jQuery(document).ready(function(){



	jQuery(".glossary").hover(function(e){
	    e.preventDefault();
	    var position = jQuery(this).position();
	    var popup = jQuery(this).next(".popup");
	    var popup_height = popup.height();
	    popup.css({top: position.top-(popup_height + 20), left: position.left, position:'absolute'});
	    popup.fadeToggle("fast");
	    popup.css({ display: 'table'});

	});

	jQuery(".glossary").click(function(e){
	    e.preventDefault();
	});



});


