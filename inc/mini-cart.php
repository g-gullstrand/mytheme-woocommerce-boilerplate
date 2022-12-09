<?php

function add_custom_mini_cart() {
    echo '<a href="#" class="dropdown-back" data-toggle="dropdown"> ';
    echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
    echo '<div class="basket-item-count" style="display: inline;">';
    echo '<span class="cart-items-count count">';
    echo WC()->cart->get_cart_contents_count();
    echo '</span>';
    echo '</div>';
    echo '</a>';
    echo '<ul class="dropdown-menu dropdown-menu-mini-cart">';
    echo '<li> <div class="widget_shopping_cart_content">';
    woocommerce_mini_cart();
    echo '</div></li></ul>';
}
add_shortcode( 'mytheme-mini-cart', 'add_custom_mini_cart' );



/**
 * Cart Fragments.
 *
 * Ensure cart contents update when products are added to the cart via AJAX.
 *
 * @param array $fragments Fragments to refresh via AJAX.
 * @return array Fragments to refresh via AJAX.
 */
if ( ! function_exists( 'mytheme_woocommerce_cart_link_fragment' ) ) {
	function mytheme_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		mytheme_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'mytheme_woocommerce_cart_link_fragment' );

/**
 * Cart Link.
 *
 * Displayed a link to the cart including the number of items present and the cart total.
 *
 * @return void
 */
if ( ! function_exists( 'mytheme_woocommerce_cart_link' ) ) {
	function mytheme_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'mytheme' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '(%d)', '(%d)', WC()->cart->get_cart_contents_count(), 'mytheme' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

/**
 * Outputs Mini Cart.
 *
 * @return void
 */
if ( ! function_exists( 'mytheme_mini_cart' ) ) {
	function mytheme_mini_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="mytheme-mini-cart" class="mytheme-mini-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php mytheme_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}