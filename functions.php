<?php
    function university_files(){
        wp_enqueue_style('fonts_google', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

        if(strstr($_SERVER['SERVER_NAME'], 'fictional-university.local')){
            wp_enqueue_script('main-university-js', 'http://localhost:3000/bundled.js', NULL, 1.0,true);

        } else{
            wp_enqueue_script('our-vendors-js',get_theme_file_uri('/bundled-assets/vendors~scripts.8c97d901916ad616a264.js') , NULL, 1.0,true);
            wp_enqueue_script('main-university-js',get_theme_file_uri('/bundled-assets/scripts.291f4fbd3120f33dcc5a.js') , NULL, 1.0,true);
            wp_enqueue_style('our-main-styles', get_theme_file_uri('/bundled-assets/styles.291f4fbd3120f33dcc5a.css'));

        }
    }

    add_action('wp_enqueue_scripts', 'university_files');

    function university_features(){
        add_theme_support('title-tag');
    }

    add_action('after_setup_theme', 'university_features');


    function university_post_types(){
        register_post_type('event', array(
            'public' => true,
            'labels' => array(
                'name' => 'events'
            ),
            'menu_icon' => 'dashicons-calendar'
        ));
    }
    add_action('init', 'university_post_types');

