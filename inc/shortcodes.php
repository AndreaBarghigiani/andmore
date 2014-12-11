<?php
/*
 * This file will keep all the shortcodes to create the material elements and effects
 *
 * 1. Toasts
 */

/*
* 1. Toasts
*/

function am_toasts( $attr, $content=null ){

  //Extract Attributes
  extract(
    shortcode_atts(
      array(
        'text' => 'Test',
        'time' => 2000
      ),
      $attr
    )
  );

  //Check Content
  if( $content ){
    $ele = "<a class='btn' onclick='toast(\'$text\', $time)'>$content</a>";
  }

  return $ele;
}

add_shortcode( 'toasts', 'am_toasts' );
