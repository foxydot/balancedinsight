<?php
/*
* Add styles and scripts
*/
add_action('wp_enqueue_scripts', 'msd_add_styles');

function msd_add_styles() {
    global $is_IE;
    if(!is_admin()){
        wp_enqueue_style('font-awesome-style','//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css',array('bootstrap-style'));
        wp_enqueue_style('msd-style',get_stylesheet_directory_uri().'/lib/css/style.css');
        if($is_IE){
            wp_enqueue_script('ie-style',get_stylesheet_directory_uri().'/lib/css/ie.css');
        }
        if(is_front_page()){
            wp_enqueue_style('msd-homepage-style',get_stylesheet_directory_uri().'/lib/css/homepage.css');
        }
    }
}
add_action('wp_enqueue_scripts', 'msd_add_scripts');

function msd_add_scripts() {
    global $is_IE;
    if(!is_admin()){
        wp_enqueue_script('msd-jquery',get_stylesheet_directory_uri().'/lib/js/theme-jquery.js',array('jquery'));
        if($is_IE){
            wp_enqueue_script('columnizr',get_stylesheet_directory_uri().'/lib/js/jquery.columnizer.js');
            wp_enqueue_script('ie-fixes',get_stylesheet_directory_uri().'/lib/js/ie-jquery.js');
        }
        if(is_front_page()){
            wp_enqueue_script('msd-homepage-jquery',get_stylesheet_directory_uri().'/lib/js/homepage-jquery.js',array('jquery','jquery-scrollto'));
        }
        if(is_page('consensus')){
            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script('jquery-ui-accordion');
            wp_enqueue_style('jquery-ui-style','//code.jquery.com/ui/1.10.3/themes/lightness/jquery-ui.css');
            add_action('wp_print_footer_scripts','msdlab_print_consensus_scripts', 40);
        }
    }
}

function msdlab_print_consensus_scripts(){
    print '<script> 
        jQuery(function($) {
            $( "#accordion" ).accordion();
        });
    </script>';
}
