<?php

class widget_consultancy_recent_post extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */

    public function __construct() {
        // widget actual processes
        parent::__construct(
            'ab_recent_post', esc_html__('AB Recent Posts','consultancy-wp'), array( 'description' => esc_html__( 'Display Posts widget', 'consultancy-wp' ),)
        );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters('widget_title', $instance['title'] );
        $categories = $instance['categories'];
        $number = $instance['number'];


        $query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'cat' => $categories);

        $loop = new WP_Query($query);
        if ($loop->have_posts()) :

            /* Before widget */
            echo $before_widget;
            
            if ( $title )
                echo $before_title . $title . $after_title;

            ?>
            <ul class="ab-recent-post">

            <?php  while ($loop->have_posts()) : $loop->the_post(); ?>

            <li>

                <div class="ab-recent-post-item clearfix">

                    <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                        <div class="ab-recent-post-image pull-left">
                            <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('square-thumb', array('class' => 'ab-recent-post-item-thumb')); ?></a>
                        </div>
                    <?php } else { ?>
                        <div class="ab-recent-post-image pull-left">
                            <a class="ab-recent-post-no-image" href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"></a>
                        </div>
                    <?php } ?>
                    <div class="ab-recent-post-item-text">
                        <a class="tertiary_color" href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a>
                        <span class="ab-recent-post-item-meta"><?php echo substr(get_the_excerpt(),0,46); ?></span>
                    </div>
                </div>

            </li>

        <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        <?php endif; ?>

        </ul>

        <?php

        /* After widget */
        echo $after_widget;
    }


    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['categories'] = $new_instance['categories'];
        $instance['number'] = strip_tags( $new_instance['number'] );

        return $instance;
    }


    function form( $instance ) {

        $defaults = array( 'title' => esc_html__('Latest Posts', 'consultancy-wp'), 'number' => 3, 'categories' => '');
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <!-- Title -->
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:', 'consultancy-wp'); ?></label>
            <input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
        </p>

        <!-- Category -->
        <p>
            <label for="<?php echo $this->get_field_id('categories'); ?>">Filter by Category:</label>
            <select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
                <option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>All categories</option>
                <?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
                <?php foreach($categories as $category) { ?>
                    <option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
                <?php } ?>
            </select>
        </p>

        <!-- Number of posts -->
        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e('Number of posts to show:', 'consultancy-wp'); ?></label>
            <input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
        </p>


        <?php
    }


}

// Add widget
function widget_recent_post_init() {
    register_widget('widget_consultancy_recent_post');
}
add_action('widgets_init', 'widget_recent_post_init');

?>