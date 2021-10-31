<?php
/**
 * Sanitization Functions
 *
 * @package WalkerMag
 * 
 */
// Sanitize hex color 
if ( ! function_exists( 'walkermag_sanitize_hex_color' ) ) :
  function walkermag_sanitize_hex_color( $color ) {
    if ( '' === $color ) {
      return '';
    }
    if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
      return $color;
    }
    return NULL;
  }
endif;

//// Sanitize checkbox 
if ( ! function_exists( 'walkermag_sanitize_checkbox' ) ) :
  function walkermag_sanitize_checkbox( $input ) {
    return ( ( isset( $input ) && true == $input ) ? true : false );
  }
endif;

// Sanitize select
if ( ! function_exists( 'walkermag_sanitize_select' ) ) :
  function walkermag_sanitize_select( $input, $setting ) {
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
endif;


//Sanitize choice
if ( ! function_exists( 'walkermag_sanitize_choices' ) ) :
  function walkermag_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
  }
endif;


// Sanitize Number Range
if ( ! function_exists( 'walkermag_sanitize_float' ) ) :
  function walkermag_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  }
endif;

// Sanitize files
if ( ! function_exists( 'walkermag_sanitize_file' ) ) :
  function walkermag_sanitize_file( $file, $setting ) {
            
    //allowed file types
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png'
    );
      
    //check file type from file name
    $file_ext = wp_check_filetype( $file, $mimes );
      
    //if file has a valid mime type return it, otherwise return default
    return ( $file_ext['ext'] ? $file : $setting->default );
  }
endif;

// Sanitize url
if ( ! function_exists( 'walkermag_sanitize_url' ) ) :
  function walkermag_sanitize_url( $text) {
    $text = esc_url_raw( $text);
    return $text;
  }
  endif;

// Sanitize textarea
if ( ! function_exists( 'walkermag_sanitize_textarea' ) ) :
    function walkermag_sanitize_textarea( $html ) {
        return wp_filter_post_kses( $html );
    }
endif;

// Sanitize text
if ( ! function_exists( 'walkermag_sanitize_text' ) ) :
    function walkermag_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
}
endif;

if ( ! function_exists( 'walkermag_sanitize_number_absint' ) ) :
  function walkermag_sanitize_number_absint( $number, $setting ) {
    // Ensure $number is an absolute integer (whole number, zero or greater).
    $number = absint( $number );

    // If the input is an absolute integer, return it; otherwise, return the default
    return ( $number ? $number : $setting->default );
  }
endif;


if ( ! function_exists( 'walkermag_sanitize_fonts' ) ) :
  function walkermag_sanitize_fonts( $input ) {
    $valid = array(
      'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
      'Open Sans:400italic,700italic,400,700' => 'Open Sans',
      'Oswald:400,700' => 'Oswald',
      'Playfair Display:400,700,400italic' => 'Playfair Display',
      'Montserrat:400,700' => 'Montserrat',
      'Raleway:400,700' => 'Raleway',
      'Droid Sans:400,700' => 'Droid Sans',
      'Lato:400,700,400italic,700italic' => 'Lato',
      'Arvo:400,700,400italic,700italic' => 'Arvo',
      'Lora:400,700,400italic,700italic' => 'Lora',
      'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
      'Oxygen:400,300,700' => 'Oxygen',
      'PT Serif:400,700' => 'PT Serif',
      'PT Sans:400,700,400italic,700italic' => 'PT Sans',
      'PT Sans Narrow:400,700' => 'PT Sans Narrow',
      'Cabin:400,700,400italic' => 'Cabin',
      'Fjalla One:400' => 'Fjalla One',
      'Francois One:400' => 'Francois One',
      'Josefin Sans:400,300,600,700' => 'Josefin Sans',
      'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
      'Arimo:400,700,400italic,700italic' => 'Arimo',
      'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
      'Bitter:400,700,400italic' => 'Bitter',
      'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
      'Roboto:400,400italic,700,700italic' => 'Roboto',
      'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
      'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
      'Roboto Slab:400,700' => 'Roboto Slab',
      'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
      'Rokkitt:400' => 'Rokkitt',
    );

    if ( array_key_exists( $input, $valid ) ) {
      return $input;
    } else {
      return '';
    }
  }
endif;
if ( ! function_exists( 'walkermag_sanitize_number_range' ) ) :
  function walkermag_sanitize_number_range( $number, $setting ) {
      $atts = $setting->manager->get_control( $setting->id )->input_attrs;
      $min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
      $max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
      $step = ( isset( $atts['step'] ) ? $atts['step'] : 0.001 );
      $number = floor($number / $atts['step']) * $atts['step'];
      return ( $min <= $number && $number <= $max ) ? $number : $setting->default;
  }
endif;