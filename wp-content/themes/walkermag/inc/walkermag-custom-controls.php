<?php 
/**
 * Custom Control
 * 
 * @package walkermag
*/
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;


if( ! function_exists( 'walkermag_custom_controls' ) ) :
/**
 * Register Custom Controls
*/
function walkermag_custom_controls( $wp_customize ){
    if( ! class_exists( 'WalkerMag_Radio_Image_Control_Horizontal' ) ){

        /**
         * Create a Radio-Image control
         * 
         * @link http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
         */
        class WalkerMag_Radio_Image_Control_Horizontal extends WP_Customize_Control {
            
            /**
             * Declare the control type.
             *
             * @access public
             * @var string
             */
            public $type = 'walkermag-radio-image';
            
            /**
             * Render the control to be displayed in the Customizer.
             */
            public function render_content() {
                if ( empty( $this->choices ) ) {
                    return;
                }           
                
                $name = 'walkermag-radio-' . $this->id;
                ?>
                <span class="customize-control-title">
                    <?php echo esc_html( $this->label ); ?>
                    <?php if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                    <?php endif; ?>
                </span>
                <div id="input_<?php echo esc_attr( $this->id ); ?>" class="image horizontal-layout">
                    <?php foreach ( $this->choices as $value => $label ) : ?>
                            <label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
                                <input class="radio-image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                                
                                <img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
                                </input>
                            </label>
                    <?php endforeach; ?>
                </div>
                <?php
            }
        }
    }
    if( ! class_exists( 'WalkerMag_Radio_Image_Control_Vertical' ) ){

        /**
         * Create a Radio-Image control
         * 
         * @link http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
         */
        class WalkerMag_Radio_Image_Control_Vertical extends WP_Customize_Control {
            
            /**
             * Declare the control type.
             *
             * @access public
             * @var string
             */
            public $type = 'walkermag-radio-image-veritical';
            
            /**
             * Render the control to be displayed in the Customizer.
             */
            public function render_content() {
                if ( empty( $this->choices ) ) {
                    return;
                }           
                
                $name = 'walkermag-radio-' . $this->id;
                ?>
                <span class="customize-control-title">
                    <?php echo esc_html( $this->label ); ?>
                    <?php if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                    <?php endif; ?>
                </span>
                <div id="input_<?php echo esc_attr( $this->id ); ?>" class="image vertical-layout">
                    <?php foreach ( $this->choices as $value => $label ) : ?>
                            <label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
                                <input class="radio-image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                                <img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
                                </input>
                            </label><br />
                    <?php endforeach; ?>
                </div>
                <?php
            }
        }
    }


  if( ! class_exists( 'WalkerMag_Dropdown_Taxonomies_Control' ) ):
    class WalkerMag_Dropdown_Taxonomies_Control extends WP_Customize_Control{
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <label for="<?php echo esc_html( $this->label ); ?>" class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
                      <span id="<?php echo esc_html( $this->description ); ?>" class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                      <select <?php $this->link(); ?>>
                        <?php
              printf('<option value="%s" %s>%s</option>', '', selected($this->value(), '', false),__('Select Category', 'walkermag') );
             ?>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', $cat->name, selected($this->value(), $cat->name, false), $cat->name);
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }
endif;



}
endif;
add_action( 'customize_register', 'WalkerMag_custom_controls' );

