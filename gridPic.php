<?php
/**
 * Plugin Name: GridPics
 * Plugin URI: http://nickgrant.io
 * Description: A plugin to display a grid of responsive images
 * Version: 1.1
 * Author: Nick Grant
 * Author URI: http://nickgrant.io
 * License: GPL2
 */

if(!class_exists('CPT')){
    include_once('CPT.php');
}
$pics = new CPT(array(
    'post_type_name' => 'gridpic',
    'singular' => 'GridPic',
    'plural' => 'GridPics',
    'slug' => 'gridpic'
),array(
    'supports' => array('title','thumbnail')
));
$pics->columns(array( 
    'cb' => '<input type="checkbox" />',
    'icon' => __('Icon'),
    'title' => __('Title')
));
$pics->menu_icon('dashicons-camera');

function gridpics_func( $atts ) {
    extract( shortcode_atts( array(
            'rows' => 4,
            'columns' => 4,
            'random' => true,
            'caption' => false
    ), $atts ) );
    $args = array( 'post_type' => 'gridpic', 'posts_per_page' => $rows * $columns, 'orderby' => 'rand' );
    if($random == false || $random == 'false'){
        $args['orderby'] = 'date';
    }
    $caption_pos = array('left','right','top','bottom','inner-top','inner-bottom');
    $caption_inner = false;
    $wrapper_class = 'gridpics-pic';
    if($caption && in_array($caption,$caption_pos)){
        $wrapper_class .= ' caption-'.$caption;
    }
    $loop = new WP_Query( $args );
    $output = '';
    if($loop->have_posts()){
        $output .= '<div class="gridpics" data-rows="'.$rows.'" data-columns="'.$columns.'">';
        $i = 1;
        while ( $loop->have_posts() ) : $loop->the_post();
            if (has_post_thumbnail()){
                $output .= '<div class="'.$wrapper_class.'">';
                if($caption && $caption != 'bottom'){
                    $output .= '<div class="caption">'.get_the_title($loop->post->ID).'</div>';
                }
                $domsxe = simplexml_load_string(get_the_post_thumbnail($loop->post->ID, 'gridpics'));
                $thumbnailsrc = $domsxe->attributes()->src;
                $output .= '<img src="'.$thumbnailsrc.'"/>';
                if($caption && $caption == 'bottom'){
                    $output .= '<div class="caption">'.get_the_title($loop->post->ID).'</div>';
                }
                $output .= '</div>';
            }
            if($i == $columns){
                $i = 1;
                $output .= '<div class="clear"></div>';
            }else{
                $i++;
            }
        endwhile;
        $output .= '</div>';
    }
    wp_reset_postdata();
    return $output;
}

function gridpics_enqueue_scripts(){
    wp_enqueue_script('gridpics',plugins_url( '/gridpics.js' , __FILE__ ), array( 'jquery' ));
    if(file_exists(get_template_directory().'/gridpics.css')){
        wp_enqueue_style('gridpics',get_template_directory_uri().'/gridpics.css');
    }else{
        wp_enqueue_style('gridpics',plugins_url( '/gridpics.css' , __FILE__ ));
    }
}
if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'gridpics', 500, 500, true ); //(cropped)
}

function gridpics_image_box() {
    remove_meta_box('postimagediv', 'gridpic', 'side');
    add_meta_box('postimagediv', __('Photo'), 'post_thumbnail_meta_box', 'gridpic', 'normal', 'low');
}

add_action('do_meta_boxes', 'gridpics_image_box');
add_action('wp_enqueue_scripts','gridpics_enqueue_scripts');
add_shortcode( 'gridpics', 'gridpics_func' );