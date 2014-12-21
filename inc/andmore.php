<?php

/**
 *
 * Questo è un file generale all'interno del quale verranno dapprima inseriti
 * i vari file JavaScript provenienti da Materialize CSS che verranno
 * compressi grazie a Grunt in un unico file
 *
 * -- TABELLA MODIFICHE
 * 1. Classica Inclusione Librerie (Off Default)
 * 2. Inclusione Librerie via materialize.js
 * 3. Carico CSS Materialize
 * 4. Modifico il menu per farlo diventare adatto a Materialize
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
 wp_enqueue_script( 'amcode', get_template_directory_uri() . '/js/amcode.js', array('jquery'), '0.0.2', true );
}

// 3. Carico CSS Materialize
add_action( 'wp_enqueue_scripts', 'add_css_materialize' );

function add_css_materialize(){
  wp_enqueue_style( 'materializecss', get_template_directory_uri() . '/css/materialize.css' );
}

// 4. Creo la Walker per Materialize

class materialize_menu extends Walker_Nav_Menu {
  public function start_lvl( &$output, $depth = 0, $args = array() ) {
    $output .= "\n<ul class=\"sub-menu mio-menu\">\n";
  }
}

class themeslug_walker_nav_menu extends Walker_Nav_Menu {

  // add classes to ul sub-menus
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
      'sub-menu',
      ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
      ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
      'menu-depth-' . $display_depth
    );
    $class_names = implode( ' ', $classes );

    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
  }

  // add main/sub classes to li's and links
  function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

    // depth dependent classes
    $depth_classes = array(
      ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
      ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
      ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
      'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
    $args->before,
    $attributes,
    $args->link_before,
    apply_filters( 'the_title', $item->title, $item->ID ),
    $args->link_after,
    $args->after
    );

    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}
