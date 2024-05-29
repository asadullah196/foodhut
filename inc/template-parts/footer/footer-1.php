<?php
    // footer info
    $footer_email_heading = get_theme_mod('foodhut_footer_email_heading', 'Email Us');
    $footer_email_address = get_theme_mod('foodhut_footer_email_address', 'info@website.com');
    $footer_phone_heading = get_theme_mod('foodhut_footer_phone_heading', 'Call Us');
    $footer_phone_number = get_theme_mod('foodhut_footer_phone_number', '(123) 456-7890');
    $footer_address_heading = get_theme_mod('foodhut_footer_address_heading', 'Find Us');
    $footer_address_text = get_theme_mod('foodhut_footer_address_text', '12345 Fake ST NoWhere AB Country');
?>

<!-- page footer  -->
<div class="container-fluid bg-dark text-light has-height-md middle-items border-top text-center wow fadeIn">
    <div class="row">
    <?php if (!empty($footer_email_address)) : ?>
        <div class="col-sm-4">
            <h3><?php echo esc_html__($footer_email_heading,'constra'); ?></h3>
            <P class="text-muted"><?php echo esc_html__($footer_email_address,'constra'); ?></P>
        </div>
    <?php endif; ?>
    <?php if (!empty($footer_phone_number)) : ?>
        <div class="col-sm-4">
            <h3><?php echo esc_html__($footer_phone_heading,'constra'); ?></h3>
            <P class="text-muted"><?php echo esc_html__($footer_phone_number,'constra'); ?></P>
        </div>
    <?php endif; ?>
    <?php if (!empty($footer_address_text)) : ?>
        <div class="col-sm-4">
            <h3><?php echo esc_html__($footer_address_heading,'constra'); ?></h3>
            <P class="text-muted"><?php echo esc_html__($footer_address_text,'constra'); ?></P>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php foodhut_copyright(); ?>
<!-- end of page footer -->