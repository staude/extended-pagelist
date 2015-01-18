<?php
/*  Copyright 2014-2015  Frank Staude  (email : frank@staude.net)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

class extended_pagelist {

    /**
     *
     */
    function __construct() {
        add_shortcode( 'pagelist', array( 'extended_pagelist', 'pagelist' ) );
        define( 'EXTENDED_PAGELIST_ABSPATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
    }

    /**
     *
     * @param array $atts
     * @return string
     */
    static function pagelist( $atts = array() ) {
        global $post;

        $args = array();
        $content = '';
        extract( shortcode_atts( array(
            'type' => 'subpages',
            'parent' => $post->ID,
            'orderby' => 'post_title',
            'order' => 'asc',
            'post_id' => $post->ID,
            'template' => '',
            'output' => 'list',
            'depth' => 1,
            'nopaging' => 'nopaging',
        ), $atts ) );

        switch ( $type ) {
            case 'subpages' :   $args = array(
                                    'post_type' =>   'page',
                                    'post_parent' => $parent,
                                    'orderby'      => $orderby,
                                    'order'     => $order,
                                    'posts_per_page' => 99
                                );
                                break;
            case 'siblings' :   if ( $post_id == $parent ) {
                                    $page = get_post( $parent );
                                    $parent = $page->post_parent;
                                }
                                $args = array(
                                    'post_type' =>   'page',
                                    'post_parent' => $parent,
                                    'orderby'      => $orderby,
                                    'order'     => $order,
                                    'post__not_in' => array( $post_id )
                                );


        }

        $content = extended_pagelist::build_content( $args, 1, $depth, $output, $template );
        return $content;
    }


    /**
     * Create the content.
     *
     * Create recursively the content of the pagelist.
     *
     * @param $args WP_Query Arguments
     * @param int $depth depth counter for subpages
     * @param int $max_depth max deepth for subpages
     * @param string $output typo of output, list, div or template
     * @param string $template name of template
     * @return string content for actuell depth
     */
    static public function build_content( $args, $depth = 1, $max_depth = 1, $output = 'list', $template = '' ) {
        $content = '';

        $pagelist = new WP_Query( $args, $depth, $max_depth );
        if ( $template != '' ) {
            $output = 'template';
        }
        if ( $pagelist->have_posts() ) {
            if ( $output == 'list' ) {
                $content .= "<ul class=\"pagelist level_{$depth}\">";
            }
            if ( $output == 'div' ) {
                $content .= "<div class=\"pagelist level_{$depth}\">";
            }
            if ( $output == 'template' ) {
                $content .= extended_pagelist::get_template( 'open', $template );
            }
            while ( $pagelist->have_posts() ) {
                $pagelist->the_post();
                if ( $output == 'list' ) {
                    $content .= "<li class=\"pagelist_element level_{$depth}\"><a href=\"" . get_permalink() . "\">" . get_the_title() . "</a></li>";
                }
                if ( $output == 'div' ) {
                    $content .= "<div class=\"pagelist_element level_{$depth}\"><a href=\"" . get_permalink() . "\">" . get_the_title() . "</a></div>";
                }
                if ( $output == 'template' ) {
                    $content .= extended_pagelist::get_template( 'content', $template );
                }
                if ( $depth < $max_depth ) {
                    $args['post_parent'] = get_the_ID();
                    $content .= extended_pagelist::build_content( $args, $depth + 1, $max_depth,$output, $template );
                }
            }
            if ( $output == 'list' ) {
                $content .= "</ul>";
            }
            if ( $output == 'div' ) {
                $content .= "</div>";
            }
            if ( $output == 'template' ) {
                $content .= extended_pagelist::get_template( 'close', $template );
            }
        }
        return $content;
    }

    /**
     * @param $type
     * @param $template
     * @return string
     */
    static public function get_template( $type, $template ) {
        $path = locate_template( apply_filters( 'extended_pagelist_template_folder', 'epl-templates' ) . '/' . $template. '/' . $type . '.php' );
        if ( $path != '' ) {
            // Load from theme directory
            ob_start();
            require ( $path );
            return ob_get_clean();
        } else {
            // Load from plugin directory
            $path = EXTENDED_PAGELIST_ABSPATH . "/templates/". $template. '/' . $type . '.php';
            if ( file_exists( $path ) ) {
                ob_start();
                require ( $path );
                return ob_get_clean();
            }
        }
    }
}
