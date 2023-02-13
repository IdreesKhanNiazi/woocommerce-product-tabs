<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
 
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>
<div class="elementor-element elementor-element-f5c6243 elementor-widget elementor-widget-jet-accordion" data-id="f5c6243" data-element_type="widget" data-widget_type="jet-accordion.default">
    <div class="elementor-widget-container">
        <div class="jet-accordion" data-settings="{&quot;collapsible&quot;:false,&quot;ajaxTemplate&quot;:false,&quot;switchScrolling&quot;:false,&quot;switchScrollingOffset&quot;:0}" role="tablist">
            <div class="jet-accordion__inner">
                <?php foreach ( $product_tabs as $key => $product_tab ) : ?>
                <div class="jet-accordion__item jet-toggle jet-toggle-fade-effect ">
                    <div id="jet-toggle-control-2572 tab-title-<?php echo esc_attr( $key ); ?>" class="jet-toggle__control elementor-menu-anchor <?php echo esc_attr( $key ); ?>_tab" data-toggle="2" role="tab" tabindex="0" aria-controls="tab-<?php echo esc_attr( $key ); ?>" aria-expanded="false" data-template-id="false">
                    <div class="jet-toggle__label-icon jet-toggle-icon-position-right"><span class="jet-toggle__icon icon-normal jet-tabs-icon"><i class="fas fa-plus"></i></span><span class="jet-toggle__icon icon-active jet-tabs-icon"><i class="fas fa-minus"></i></span></div><h5 class="jet-toggle__label-text"><?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?></h5> </div>
                    <div id="jet-toggle-content-2572" class="jet-toggle__content" data-toggle="2" role="tabpanel" data-template-id="false">
                        <div class="jet-toggle__content-inner"><?php
    				if ( isset( $product_tab['callback'] ) ) {
    					call_user_func( $product_tab['callback'], $key, $product_tab );
    				}
    				?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php do_action( 'woocommerce_product_after_tabs' ); ?>
        </div>
    </div>
</div>
<?php endif; ?>





