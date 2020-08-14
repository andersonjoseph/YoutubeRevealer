<?php
require_once plugin_dir_path( __FILE__ ) . 'vendor/wph-widget.php';

class YoutubeRevealer_Widget extends WPH_Widget {
	function __construct() {
		$args = array(
			'label' => 'Youtube Revealer',
			'description' => 'Muestra un elemento luego de ver un video',
			'slug' => 'youtube_revealer',
		);

		$args['fields'] = array(
			array(
				'name' => 'Youtube ID',
				'id' => 'youtube_id',
				'type'=>'text',
				'class' => 'widefat',
				'validate' => 'alpha_dash',
				'filter' => 'strip_tags|esc_attr'
			),
			array(
				'name' => 'Selector del elemento a mostrar',
				'id' => 'selector',
				'type'=>'text',
				'class' => 'widefat',
				'validate' => 'alpha_dash',
				'filter' => 'strip_tags|esc_attr'
			)
		);

		$this->create_widget( $args );

	}

	function widget( $args, $instance ) {
		$youtube_id = $instance['youtube_id'];
		$selector = $instance['selector'];

		$VLM_Data = array(
			'selector'	=> $selector
		);

		echo "<script>const VLM_DATA={selector: '$selector'}</script>";

		echo "<iframe width='560' height='315' id='player' class='player skip-lazy' src='https://www.youtube.com/embed/$youtube_id?enablejsapi=1&autoplay=1&frameborder='0'></iframe>";
	}
}
