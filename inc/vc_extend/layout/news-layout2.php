<div class="st-news-wraper st-news-<?php echo esc_attr($consultancy_news_template).' '.esc_attr($consultancy_news_extra_class) ;?>">
    <div class="st-news">

        <?php if($consultancy_news_title_item):?>
            <h3><a href="<?php echo esc_url($consultancy_news_link);?>"><?php echo apply_filters('the_title',$consultancy_news_title_item);?></a></h3>
        <?php endif;?>

        <div class="news-date secondary-color">
            <?php echo esc_attr($consultancy_news_day).'-'.esc_attr($consultancy_news_month).'-'.esc_attr($consultancy_news_year);?>
        </div>

        <?php
        $consultancy_news_image_url = '';
        if (!empty($consultancy_news_image)) {
            $attachment_image = wp_get_attachment_image_src($consultancy_news_image, 'full');
            $consultancy_news_image_url = $attachment_image[0];
        }
        ?>
        <?php if($consultancy_news_image_url):?>
            <div class="news-box-image">
                <img src="<?php echo esc_attr($consultancy_news_image_url);?>" />
            </div>
        <?php endif;?>

        <div class="news-content">
            <?php echo esc_attr($consultancy_news_description_item);?>
        </div>
    </div>
</div>