<?php

/**
 *
 * Questo è un file generale all'interno del quale verranno dapprima inseriti
 * i vari file JavaScript provenienti da Materialize CSS che verranno
 * compressi grazie a Grunt in un unico file
 *
 * -- TABELLA MODIFICHE
 * 1. Classica Inclusione Librerie (Off Default)
 * 2. Inclusione Librerie via materialize.min.js
 * 3. Carico CSS Materialize
 */


/*
 * Decommenta questo blocco quando sarai pronto ad andare in produzione ed attivare soltanto le librerie di cui hai bisogno

// 1. Classica Inclusione Librerie
add_action( 'wp_enqueue_scripts', 'add_single_js_materialize' );

//Commenta le singole librerie che non ti interessano
function add_single_js_materialize(){
  wp_enqueue_script( 'collapsiblejs', get_template_directory_uri() . '/materialize/js/collapsible.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'pickerjs', get_template_directory_uri() . '/materialize/js/date_picker/picker.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'pickerdatejs', get_template_directory_uri() . '/materialize/js/date_picker/picker.date.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'dropdownjs', get_template_directory_uri() . '/materialize/js/dropdown.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'formsjs', get_template_directory_uri() . '/materialize/js/forms.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'hammerjs', get_template_directory_uri() . '/materialize/js/hammer.min.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'jqhammer', get_template_directory_uri() . '/materialize/js/jquery.hammer.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'jqeasing', get_template_directory_uri() . '/materialize/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
  wp_enqueue_script( 'leanModaljs', get_template_directory_uri() . '/materialize/js/leanModal.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'materialboxjs', get_template_directory_uri() . '/materialize/js/materialbox.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'parallaxjs', get_template_directory_uri() . '/materialize/js/parallax.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'scrollspyjs', get_template_directory_uri() . '/materialize/js/scrollspy.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'sideNavjs', get_template_directory_uri() . '/materialize/js/sideNav.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'tabsjs', get_template_directory_uri() . '/materialize/js/tabs.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'toastsjs', get_template_directory_uri() . '/materialize/js/toasts.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'tooltipjs', get_template_directory_uri() . '/materialize/js/tooltip.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'velocityjs', get_template_directory_uri() . '/materialize/js/velocity.min.js', array('jquery'), '0.0.2', true );
  wp_enqueue_script( 'wavesjs', get_template_directory_uri() . '/materialize/js/waves.js', array('jquery'), '0.0.2', true );
}
*/

// 2. Inclusione Librerie via materialize.min.js
add_action( 'wp_enqueue_scripts', 'add_js_materialize' );

function add_js_materialize(){
 wp_enqueue_script( 'materializejs', get_template_directory_uri() . '/materialize/js/bin/materialize.js', array('jquery'), '0.0.2', true );
}

// 3. Carico CSS Materialize
add_action( 'wp_enqueue_scripts', 'add_css_materialize' );

function add_css_materialize(){
  wp_enqueue_style( 'materializecss', get_template_directory_uri() . '/css/materialize.css' );
}
