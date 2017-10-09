<div class="st-news-wraper st-news-<?php echo esc_attr($consultancy_news_template).' '.esc_attr($consultancy_news_extra_class) ;?>">
    <div class="st-news">
        <div class="st-news-icon">
            <i class="icon-calendar icons tertiary_color"></i>
            <div class="news-date">
                <span class="day secondary-color"><?php echo esc_attr($consultancy_news_day);?></span>
                <span class="month"><?php echo '.'.esc_attr($consultancy_news_month);?></span>
                <span class="year"><?php echo esc_attr($consultancy_news_year);?></span>
            </div>
        </div>

        <div class="news-content">
            <?php if($consultancy_news_title_item):?>
                <h3><a href="<?php echo esc_url($consultancy_news_link);?>"><?php echo apply_filters('the_title',$consultancy_news_title_item);?></a></h3>
            <?php endif;?>
            <?php echo esc_attr($consultancy_news_description_item);?>
        </div>
    </div>
</div>