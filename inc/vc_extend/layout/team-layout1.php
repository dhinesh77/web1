<div class="st-team-wraper st-team-<?php echo esc_attr($consultancy_team_template).' '.esc_attr($consultancy_team_extra_class);?>">

    <div class="st-team-inner clearfix">
        <div class="st-team-name-image clearfix">
            <?php
            $consultancy_team_image_url = '';
            if (!empty($consultancy_team_image)) {
                $attachment_image = wp_get_attachment_image_src($consultancy_team_image, 'thumbnail');
                $consultancy_team_image_url = $attachment_image[0];
            }
            ?>
            <?php if($consultancy_team_image_url):?>
                <div class="st-team-image pull-left">
                    <img alt="" src="<?php echo esc_attr($consultancy_team_image_url);?>" />
                </div>
            <?php endif;?>
        </div>

        <?php if($consultancy_team_title):?>
            <div class="st-team-meta">
                    <h3 class="st-team-name">
                        <?php echo apply_filters('the_title',$consultancy_team_title);?>
                    </h3>
                <small class="st-team-position primary-color">
                    <?php echo esc_attr($consultancy_team_position); ?>
                </small>
            </div>
        <?php endif;?>

        <div class="st-team-social">
            <a class="team-social" title="Facebook" href="<?php echo esc_attr($consultancy_team_facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            <a class="team-social" title="Facebook" href="<?php echo esc_attr($consultancy_team_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            <a class="team-social" title="Facebook" href="<?php echo esc_attr($consultancy_team_pinterest); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a>
        </div>

    </div>
</div>