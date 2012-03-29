<?php


/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'tpm_load_widgets' );

/**
 * Register our widget.
 * 'Topperss_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function tpm_load_widgets() {
	register_widget( 'Tinypay_Top_Widget' );
}

/**
 * Topperss Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Tinypay_Top_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Tinypay_Top_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'default', 'description' => __('Tinypay top items widget', 'default') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tpm-top-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'tpm-top-widget', __('Tinypay top items widget', 'default'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$tpm_sidebar_title = apply_filters('widget_title', $instance['tpm_sidebar_title'] );
		$tpm_sidebar_number = $instance['tpm_sidebar_number'];


		/* Before widget (defined by themes). */
		echo $before_widget;

		include ('tpm_widget_sidebar.tpl.php');

		/* After widget (defined by themes). */	
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and number to remove HTML (important for text inputs). */
		$instance['tpm_sidebar_title'] = strip_tags( $new_instance['tpm_sidebar_title'] );
		$instance['tpm_sidebar_number'] = strip_tags( $new_instance['tpm_sidebar_number'] );


		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'tpm_sidebar_title' => __('Marketplace top items', 'default'), 'tpm_sidebar_number' => __('4', 'default'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tpm_sidebar_title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'tpm_sidebar_title' ); ?>" name="<?php echo $this->get_field_name( 'tpm_sidebar_title' ); ?>" value="<?php echo $instance['tpm_sidebar_title']; ?>" style="width:100%;" />
		</p>

		<!-- Number of items: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tpm_sidebar_number' ); ?>"><?php _e('Number of items to display:', '4'); ?></label>
			<input id="<?php echo $this->get_field_id( 'tpm_sidebar_number' ); ?>" name="<?php echo $this->get_field_name( 'tpm_sidebar_number' ); ?>" value="<?php echo $instance['tpm_sidebar_number']; ?>" style="width:30%;" />
		</p>



	<?php
	}
}

?>