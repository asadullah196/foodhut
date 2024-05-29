<?php
    // header section
    $header_section_button_status = get_theme_mod('foodhut_menu_cta_switch', true);
    $header_section_button_text = get_theme_mod('foodhut_menu_cta_text', 'Components');
    $header_section_button_url = get_theme_mod('foodhut_menu_cta_url', '#');
?>

<!-- Navbar -->
<nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php foodhut_primary_left_menus(); ?>
        <?php foodhut_header_logo(); ?>
        <?php foodhut_primary_right_menus(); ?>
    </div>

    <?php if($header_section_button_status == true) : ?>
    <div class="header-cta">
        <li class="nav-item">
            <a href="<?php echo esc_url($header_section_button_url); ?>" class="btn btn-primary ml-xl-4"><?php echo esc_html__($header_section_button_text,'constra'); ?></a>
        </li> 
    </div>
    <?php endif; ?>
</nav>
<!-- header -->