<?php

class widget_portfolio extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        // widget actual processes
        parent::__construct(
            'portfolio', esc_html__('ST Portfolio','consultancy-wp'), array( 'description' => esc_html__( 'Display your latest Portfolio', 'consultancy-wp' ),)
        );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        // outputs the content of the widget
        extract($args);
        $title = apply_filters('widget_title', esc_html($instance['title']));
        $number = intval($instance['number']);

        ?>
        <div class="widget-portfolio-wrap clearfix">
            <?php
            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => $number
            );
            $portfolio = new WP_Query($args);
            if($portfolio->have_posts()):
                ?>
                <?php while($portfolio->have_posts()): $portfolio->the_post(); ?>
                <div class="widget-portfolio-item">
                    <?php if (has_post_thumbnail()) { ?>
                        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="portfolio-thumbnail"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
                    <?php } ?>
                </div>
            <?php endwhile; endif; ?>
        </div>

        <?php
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin

        /* Set up default widget settings. */
        $defaults = array(
            'title'      => '',
            'number'     => 6
        );
        $instance         = wp_parse_args( (array) $instance, $defaults );

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = '';
        }

        $number = intval($instance[ 'number' ]);
        if($number<=0){
            $number = 6;
        }

        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label><br />
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>">Number of items to show:</label><br />
            <input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" value="<?php echo esc_attr($instance['number']); ?>" />
        </p>

        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = intval($new_instance['number']);

        return $instance;
    }
}
// Add Widget
function widget_portfolio_init() {
    register_widget('widget_portfolio');
}
add_action('widgets_init', 'widget_portfolio_init');
?>