<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

if ( !class_exists('BD_contact_form_Widget')) {
    /**
     * Adds BD_contact_form_Widget widget.
     */
    class BD_contact_form_Widget extends WP_Widget {
        /**
         * Register widget with WordPress.
         */
        function __construct()
        {
            $widget_options = array(
                'classname' => 'listings',
                'description' => esc_html__('You can show "contact the listing owner" by this widget', ATBDP_TEXTDOMAIN),
            );
            parent::__construct(
                'bdco_widget', // Base ID
                esc_html__('Directorist - Listing Contact', ATBDP_TEXTDOMAIN), // Name
                $widget_options // Args
            );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget($args, $instance) {
            if( is_singular(ATBDP_POST_TYPE)) {
                global $post;
                $title      = !empty($instance['title']) ? esc_html($instance['title']) : esc_html__('Contact Form', ATBDP_TEXTDOMAIN);
                echo $args['before_widget'];

                echo $args['before_title'] . esc_html(apply_filters('widget_title', $title)) . $args['after_title'];
                ?>
                <div class="atbdp directorist atbdp-widget-listing-contact">
                    <form id="atbdp-contact-form" class="form-vertical" role="form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="atbdp-contact-name" placeholder="<?php _e( 'Name', ATBDP_TEXTDOMAIN ); ?>" required />
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" id="atbdp-contact-email" placeholder="<?php _e( 'Email', ATBDP_TEXTDOMAIN ); ?>" required />
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" id="atbdp-contact-message" rows="3" placeholder="<?php _e( 'Message', ATBDP_TEXTDOMAIN ); ?>..." required ></textarea>
                        </div>

                        <p id="atbdp-contact-message-display"></p>
                        <button type="submit" class="btn btn-primary"><?php _e( 'Submit', ATBDP_TEXTDOMAIN ); ?></button>
                    </form>
                </div>
                <input type="hidden" id="atbdp-post-id" value="<?php echo $post->ID; ?>" />
                <?php
                echo $args['after_widget'];

            }
        }
        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         * @return void
         */
        public function form($instance)
        {
            $title = !empty($instance['title']) ? esc_html($instance['title']) : esc_html__('Contact Form', ATBDP_TEXTDOMAIN);
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', ATBDP_TEXTDOMAIN); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo esc_attr($title); ?>">
            </p>

            <?php
        }

    } //end class
} // end if condition