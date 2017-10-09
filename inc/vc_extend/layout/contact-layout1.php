<div class="contact-info tertiary-background contact-info-<?php echo esc_attr($consultancy_contact_template); ?> <?php echo esc_attr($consultancy_contact_extra_class); ?>">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 contact-phone">
            <i class="icon-screen-smartphone icons pull-left"></i>
            <div class="contact-title pull-left">
                <?php echo wp_kses(__( 'Call now <br />for free consultation', 'consultancy-wp' ), array( 'br' => array( 'br' => array() ) )); ?>
            </div>
            <div class="contact-detail pull-left">
                <?php echo ': '.esc_attr($consultancy_contact_phone); ?>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 contact-email">
            <i class="icon-envelope-open icons pull-left"></i>
            <div class="contact-title pull-left">
                <?php echo wp_kses(__( 'Mail now <br />free consultation', 'consultancy-wp' ), array( 'br' => array( 'br' => array() ) )); ?>
            </div>
            <div class="contact-detail pull-left">
                <?php echo ': '.esc_attr($consultancy_contact_email); ?>
            </div>
        </div>
    </div>
</div>