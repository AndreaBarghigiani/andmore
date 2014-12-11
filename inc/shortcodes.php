<?php
/*
 * This file will keep all the shortcodes to create the material elements and effects
 *
 * 1. Toasts
 */

/*
* 1. Toasts
*/

function am_tooltip( $attr, $content=null ){

  //Extract Attributes
  extract(
    shortcode_atts(
      array(
        'text' => 'Test',
        'position' => 'bottom'
      ),
      $attr
    )
  );

  //Check Content
  if( $content ){
    $ele = '<a class="btn tooltipped" data-position="' . $position . '" data-tooltip="' . $text . '">' . $content . '</a>';
  }

  return $ele;
}

add_shortcode( 'tooltip', 'am_tooltip' );
