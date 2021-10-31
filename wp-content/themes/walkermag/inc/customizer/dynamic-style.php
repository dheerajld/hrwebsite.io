<?php
    $primary_color = sanitize_hex_color( get_theme_mod( 'walkermag_primary_color', '#c70315' ) );
    $secondary_color = sanitize_hex_color( get_theme_mod( 'walkermag_secondary_color', '#3f208e' ) );
    $text_color = sanitize_hex_color( get_theme_mod( 'walkermag_text_color', '#404040' ) );
    $dark_color = sanitize_hex_color( get_theme_mod( 'walkermag_dark_color', '#000000' ) );
    $light_color = sanitize_hex_color( get_theme_mod( 'walkermag_light_color', '#ffffff' ) );
    if(get_theme_mod( 'walkermag_link_color')){
        $link_color = sanitize_hex_color( get_theme_mod( 'walkermag_link_color', '#c70315' ) );
    } else{
        $link_color = $primary_color;
    }
    if(get_theme_mod( 'walkermag_link_hover_color')){
        $link_hover_color = sanitize_hex_color( get_theme_mod( 'walkermag_link_hover_color', '#c70315' ) );
    } else{
        $link_hover_color = $secondary_color;
    }

    if(walkermag_set_to_premium()){
        if(get_theme_mod('focus_news_position')=='focusnews-position-above-featured'){
            $featured_box_padding_top = 0;
        }else{
            $featured_box_padding_top = 50;
        }
    }
    $header_background_color = sanitize_hex_color(get_theme_mod('walkermag_heaer_bg_color','#ffffff'));
    $header_text_color = sanitize_hex_color(get_theme_mod('walkermag_header_text_color','#000000'));
    $header_site_name_color = sanitize_hex_color(get_theme_mod('walkermag_header_site_name_color','c70315'));
    $site_font = esc_attr(get_theme_mod('walkermag_body_fonts','Montserrat'));
    if(walkermag_set_to_premium()){
        $footer_background_color = sanitize_hex_color( get_theme_mod('walkermag_footer_bg_color','#000000'));
        $footer_text_color = sanitize_hex_color(get_theme_mod('walkermag_footer_text_color','#ffffff'));
        $footer_text_link_color = sanitize_hex_color(get_theme_mod('walkermag_footer_link_color','#ffffff'));
        $footer_text_link_hover_color = sanitize_hex_color(get_theme_mod('walkermag_footer_link_hover_color','#c70315'));

        $copyright_background_color = sanitize_hex_color(get_theme_mod('walkermag_footer_bottom_color','#000000'));
        $copyright_text_color = sanitize_hex_color(get_theme_mod('walkermag_copyright_text_color','#ffffff'));
        $copyright_link_hover_color = sanitize_hex_color(get_theme_mod('walkermag_copyright_text_link_hover_color','#c70315'));
    }else{
        $footer_background_color = $dark_color;
        $footer_text_color = $light_color;
        $footer_text_link_color = $light_color;
        $footer_text_link_hover_color = $primary_color;

        $copyright_background_color = $dark_color;
        $copyright_text_color = $light_color;
        $copyright_link_hover_color = $primary_color;
    }
    if(get_theme_mod('enable_stikcy_header')){
            $sticky_class_attr='fixed';
        }else{
            $sticky_class_attr='relative';
        }
   
    if( $site_font ){
        switch ( $site_font) {
            case "Source Sans Pro:400,700,400italic,700italic":
                $site_font = 'Source Sans Pro';
            break;

            case "Open Sans:400italic,700italic,400,700":
                $site_font = 'Open Sans';
            break;

            case "Oswald:400,700":
                $site_font = 'Oswald';
            break;

            case "Montserrat:400,700":
                $site_font = 'Montserrat';
            break;

            case "Playfair Display:400,700,400italic":
                $site_font = 'Playfair Display';
            break;

            case "Raleway:400,700":
                $site_font = 'Raleway';
            break;

            case "Raleway:400,700":
                $site_font = 'Raleway';
            break;

            case "Droid Sans:400,700":
                $site_font = 'Droid Sans';
            break;

            case "Lato:400,700,400italic,700italic":
                $site_font = 'Lato';
            break;

            case "Arvo:400,700,400italic,700italic":
                $site_font = 'Arvo';
            break;

            case "Lora:400,700,400italic,700italic":
                $site_font = 'Lora';
            break;

            case "Merriweather:400,300italic,300,400italic,700,700italic":
                $site_font = 'Merriweather';
            break;

            case "Oxygen:400,300,700":
                $site_font = 'Oxygen';
            break;

            case "PT Serif:400,700' => 'PT Serif":
                $site_font = 'PT Serif';
            break;

            case "PT Sans:400,700,400italic,700italic":
                $site_font = 'PT Sans';
            break;

            case "PT Sans Narrow:400,700":
                $site_font = 'PT Sans Narrow';
            break;

            case "Cabin:400,700,400italic":
                $site_font = 'Cabin';
            break;

            case "Fjalla One:400":
                $site_font = 'Fjalla One';
            break;

            case "Francois One:400":
                $site_font = 'Francois One';
            break;

            case "Josefin Sans:400,300,600,700":
                $site_font = 'Josefin Sans';
            break;

            case "Libre Baskerville:400,400italic,700":
                $site_font = 'Libre Baskerville';
            break;

            case "Arimo:400,700,400italic,700italic":
                $site_font = 'Arimo';
            break;

            case "Ubuntu:400,700,400italic,700italic":
                $site_font = 'Ubuntu';
            break;

            case "Bitter:400,700,400italic":
                $site_font = 'Bitter';
            break;

            case "Droid Serif:400,700,400italic,700italic":
                $site_font = 'Droid Serif';
            break;

            case "Roboto:400,400italic,700,700italic":
                $site_font = 'Roboto';
            break;

            case "Open Sans Condensed:700,300italic,300":
                $site_font = 'Open Sans Condensed';
            break;

            case "Roboto Condensed:400italic,700italic,400,700":
                $site_font = 'Roboto Condensed';
            break;

            case "Roboto Slab:400,700":
                $site_font = 'Roboto Slab';
            break;

            case "Yanone Kaffeesatz:400,700":
                $site_font = 'Yanone Kaffeesatz';
            break;

            case "Rokkitt:400":
                $site_font = 'Rokkitt';
            break;

            default:
                $site_font = 'Montserrat';
        }
    }else{
        $site_font = 'Montserrat';
    }

    $heading_font = esc_attr(get_theme_mod('walkermag_heading_fonts','Montserrat'));
    if( $heading_font ){
        switch ( $heading_font) {
            case "Source Sans Pro:400,700,400italic,700italic":
                $heading_font = 'Source Sans Pro';
            break;

            case "Open Sans:400italic,700italic,400,700":
                $heading_font = 'Open Sans';
            break;

            case "Oswald:400,700":
                $heading_font = 'Oswald';
            break;

            case "Montserrat:400,700":
                $heading_font = 'Montserrat';
            break;

            case "Playfair Display:400,700,400italic":
                $heading_font = 'Playfair Display';
            break;

            case "Raleway:400,700":
                $heading_font = 'Raleway';
            break;

            case "Raleway:400,700":
                $heading_font = 'Raleway';
            break;

            case "Droid Sans:400,700":
                $heading_font = 'Droid Sans';
            break;

            case "Lato:400,700,400italic,700italic":
                $heading_font = 'Lato';
            break;

            case "Arvo:400,700,400italic,700italic":
                $heading_font = 'Arvo';
            break;

            case "Lora:400,700,400italic,700italic":
                $heading_font = 'Lora';
            break;

            case "Merriweather:400,300italic,300,400italic,700,700italic":
                $heading_font = 'Merriweather';
            break;

            case "Oxygen:400,300,700":
                $heading_font = 'Oxygen';
            break;

            case "PT Serif:400,700' => 'PT Serif":
                $heading_font = 'PT Serif';
            break;

            case "PT Sans:400,700,400italic,700italic":
                $heading_font = 'PT Sans';
            break;

            case "PT Sans Narrow:400,700":
                $heading_font = 'PT Sans Narrow';
            break;

            case "Cabin:400,700,400italic":
                $heading_font = 'Cabin';
            break;

            case "Fjalla One:400":
                $heading_font = 'Fjalla One';
            break;

            case "Francois One:400":
                $heading_font = 'Francois One';
            break;

            case "Josefin Sans:400,300,600,700":
                $heading_font = 'Josefin Sans';
            break;

            case "Libre Baskerville:400,400italic,700":
                $heading_font = 'Libre Baskerville';
            break;

            case "Arimo:400,700,400italic,700italic":
                $heading_font = 'Arimo';
            break;

            case "Ubuntu:400,700,400italic,700italic":
                $heading_font = 'Ubuntu';
            break;

            case "Bitter:400,700,400italic":
                $heading_font = 'Bitter';
            break;

            case "Droid Serif:400,700,400italic,700italic":
                $heading_font = 'Droid Serif';
            break;

            case "Roboto:400,400italic,700,700italic":
                $heading_font = 'Roboto';
            break;

            case "Open Sans Condensed:700,300italic,300":
                $heading_font = 'Open Sans Condensed';
            break;

            case "Roboto Condensed:400italic,700italic,400,700":
                $heading_font = 'Roboto Condensed';
            break;

            case "Roboto Slab:400,700":
                $heading_font = 'Roboto Slab';
            break;

            case "Yanone Kaffeesatz:400,700":
                $heading_font = 'Yanone Kaffeesatz';
            break;

            case "Rokkitt:400":
                $heading_font = 'Rokkitt';
            break;

            default:
                $heading_font = 'Montserrat';
        }
    }else{
        $heading_font = 'Montserrat';
    }
    

    $site_font_size = absint(get_theme_mod('walkermag_font_size','16'));


    $heading_font_one = absint(get_theme_mod('walkermag_heading_one_size','48'));
    $heading_font_two = absint(get_theme_mod('walkermag_heading_two_size','36'));
    $heading_font_three = absint(get_theme_mod('walkermag_heading_three_size','24'));
    $heading_font_four = absint(get_theme_mod('walkermag_heading_four_size','20'));
    $heading_font_five = absint(get_theme_mod('walkermag_heading_five_size','16'));
    $heading_font_six = absint(get_theme_mod('walkermag_heading_six_size','14'));

    
?>
<style type="text/css">
    :root{
        --primary-color: <?php echo $primary_color;?>;
        --secondary-color: <?php echo $secondary_color;?>;
        --text-color:<?php echo $text_color;?>;
        --dark-color:<?php echo $dark_color;?>;
        --light-color:<?php echo $light_color;?>;
        --link-color:<?php echo $link_color;?>;
        --link-hover-color:<?php echo $link_hover_color;?>;
    }

    body{
        font-family: '<?php echo $site_font;?>',sans-serif;
        font-size: <?php echo $site_font_size;?>px;
        color: var(--text-color);
    }
    
    h1, h2, h3, h4, h5,h6{
        font-family: '<?php echo $heading_font;?>',sans-serif;
    }
    h1{
        font-size: <?php echo $heading_font_one;?>px;
    }
    h2{
        font-size: <?php echo $heading_font_two;?>px;
    }
    h3{
        font-size: <?php echo $heading_font_three;?>px;
    }
    h4{
        font-size: <?php echo $heading_font_four;?>px;
    }
    h5{
        font-size: <?php echo $heading_font_five;?>px;
    }
    h6{
        font-size: <?php echo $heading_font_six;?>px;
    }
    .walkermag-footer-widgets{
        background: <?php echo $footer_background_color;?>;
        color: <?php echo $footer_text_color;?>;

    }
    .walkermag-footer-widgets a,
    .walkermag-footer-widgets section.widget_recent_entries ul li a,
    .walkermag-footer-widget ul.walkermag-social li a{
        color: <?php echo $footer_text_link_color;?>;
    }
    .walkermag-footer-widgets a:hover,
    .walkermag-footer-widgets section.widget_recent_entries ul li a:hover,
    .walkermag-footer-widget ul.walkermag-social li a:hover{
        color: <?php echo $footer_text_link_hover_color;?>;
    }
    .copyright-wraper{
        background: <?php echo $copyright_background_color;?>;
        color:<?php echo $copyright_text_color;?>;
    }
    .copyright-wraper a{
        color:<?php echo $copyright_text_color;?>;
    }
    .walkermag-footer-widget .widget-title:before{
        background: <?php echo $copyright_text_color;?>
    }
    .copyright-wraper a:hover{
        color:<?php echo $copyright_link_hover_color; ?>;
    }
    .walkermag-footer-widget .widget-title:after {
        background: <?php echo $footer_text_link_hover_color;?>;
    }
    .active-sticky{
        position: <?php echo $sticky_class_attr;?>;
    }
    <?php if(walkermag_set_to_premium()){?>
        .walkermag-container.box-layout{
            padding-top:<?php echo $featured_box_padding_top;?>px;
        }
    <?php } ?>
    .site-header .branding-wraper{
        background: <?php echo $header_background_color;?>;
        color: <?php echo $header_text_color;?>;
    }
    .header-layout-2 ul.walkermag-social li a{
        color: <?php echo $header_text_color;?>;
    }
    .site-branding .site-title a{
        color: <?php echo $header_site_name_color?>;
    }
    .site-branding .site-title a:hover{
        color: <?php echo $secondary_color?>;
    }
</style>