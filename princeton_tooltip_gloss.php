<?php
/*
	Plugin Name: Princeton Tooltip Gloss
	Plugin URI:
	Description: Gloss terms in posts and/or pages with the [gloss message='..']glossed text[/gloss] shortcode
	Version: 1.0
	Author: Ben Johnston
*/

// INCLUDE FILE FOR BUTTON IN WYSIWYG TOOLBAR
require_once( plugin_dir_path( __FILE__ ).'/editor.php'); 

class PUTooltipGloss {

   function __construct() {
      add_action( 'wp_enqueue_scripts', array( $this, 'princeton_glossary_scripts') ); 
      add_shortcode( 'gloss', array( $this, 'princeton_tooltip_gloss') ); 
   }
   

   function princeton_glossary_scripts() {
      wp_register_script('princeton_glossary_js', plugins_url('js/princeton-tooltip-gloss.js', __FILE__), array('jquery'),'1.1', true);
      wp_enqueue_script('princeton_glossary_js');
      wp_register_style('princeton_glossary_css', plugins_url('css/princeton-tooltip-gloss.css',__FILE__ ));
      wp_enqueue_style('princeton_glossary_css');
   }


   function princeton_tooltip_gloss( $atts, $content = null ){
      if(isset($atts['message'])) { $message = $atts['message']; } else { $message = 'message'; }

      if(substr($message,0,4)=="http") { $message = "<img src='{$message}' height='180'/>"; }

      $content = strip_tags(trim($content));
      $content = preg_replace( "/{$content}/i" , "<a href='#' class='glossary'>{$content}</a><span class='popup' >{$message}</span>", $content);
      return $content;
   }


}

new PUTooltipGloss();
