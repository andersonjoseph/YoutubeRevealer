<?php
/**
* Plugin Name: Youtube Revealer
* Version: 1.0
* Description: Mostrar elemento luego de ver un vídeo
* Author: Anderson Joseph <andersonjoseph@mailfence.com>
* Author URI: https://andersonjoseph.github.tio
*/

require_once plugin_dir_path( __FILE__ ) . 'Widget.php';

function register_scripts() {
    wp_enqueue_script( 'youtube_api', 'http://www.youtube.com/iframe_api', array() );
    wp_enqueue_script( 'youtube-revealer', plugin_dir_url( __FILE__ ) . 'js/youtube-revealer.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'register_scripts' );


class YoutubeRevealerWP
{
    function __construct()
    {
        $this->loadSettings();
    }

    function loadSettings()
    {
        $this->registerYoutubeRevealerWidget();
    }

    function registerYoutubeRevealerWidget() {
        add_action( 'widgets_init', function() {
            register_widget( 'YoutubeRevealer_Widget' );
        });
    }

}

new YoutubeRevealerWP();
