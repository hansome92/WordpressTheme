<?php

class lionbridge_Walker extends Walker_Nav_Menu {


// add main/sub classes to li's and links
 function start_el( &$output, $item, $depth, $args ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
        ( $depth >=2 ? 'sub-sub-menu-item' : '' )
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );


    // build html
    if ( $depth == 1 ) {

        $output .= $indent . '<li class="' . $depth_class_names . '' . $class_names . '"><div class="title">';

    } elseif ( $depth == 2 ) {

        $output .= $indent . '<li class="' . $depth_class_names . ' ' . $class_names . '">';

    } else {

        $output .= $indent . '<li class="' . $depth_class_names . '' . $class_names . '">';

    }


    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    //$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

      // build html
    if ( $depth == 1 ) {

        $item_output = sprintf( '%1$s<a class="lettering"%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
    );

    } else {

      $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );


    }

    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}


        /**
        * @see Walker::start_lvl()
        *
        * @param string $output Passed by reference. Used to append additional content.
        * @return void
        */
        public function start_lvl( &$output, $depth ) {

            if ( '1' < $depth+1 ) {
                $output .= '</div>';
                $output .= '<div class="children"><ul class="children-menu">';
            } else {
                $output .= '<ul class="sub-menu">';
            }
        }

        /**
        * @see Walker::end_lvl()
        *
        * @param string $output Passed by reference. Used to append additional content.
        * @return void
        */
        public function end_lvl( &$output, $depth ) {

            if ( '1' < $depth+1 ) {
                $output .= '</ul></div>';
            } else {
                $output .= '</ul>';
            }
        }
    }
    

?>