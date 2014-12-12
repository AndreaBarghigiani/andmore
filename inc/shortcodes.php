<?php
/*
 * This file will keep all the shortcodes to create the material elements and effects
 *
 * 1. Toasts
 * 2. Tooltop
 * 3. Modal
 */

/*
 * 1. Toasts
 *
 * NON RIESCO A FARLO FUNZIONARE


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
  //Create HTML Container
  $ele = '<a class="btn" onclick="toast("' . $text . '", ' . $time . ')">';

  //Add Content
  if( $content ){
    $ele .= $content;
  }

  $ele .= '</a>';

  //Return Block
  return $ele;
}

add_shortcode( 'toasts', 'am_toasts' );
*/

/*
 * 2. Tooltip
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

/*
 * 3. Modal
 *
 * For this one I have to work later on with TinyMCE to add an interface
 * to better insert the text and options available
 */

 function am_modal( $atts ){
   //Extract Attributes
   $a = shortcode_atts( array(
     'btn_text' => 'Test',
     'tit_modal' => 'Titolo Finestra',
     'txt_modal' => 'Testo Finestra',
     'cta_modal' => 'Clicca'
   ), $atts );

   //Create HTML Container
   $ele = '<a class="waves-effect waves-light btn modal-trigger" href="#modal1">' . $a["btn_text"] . '</a>';
   $ele .= '<div id="modal1" class="modal">';
   $ele .= '<h4>' . $a["tit_modal"] . '</h4>';
   $ele .= '<p>' . $a["txt_modal"] . '</p>';
   $ele .= '<a href="#" class="waves-effect btn-flat modal_close">' . $a["cta_modal"] . '</a>';
   $ele .= '</div>';

   //Return Block
   return $ele;
 }

 add_shortcode( 'modal', 'am_modal' );
