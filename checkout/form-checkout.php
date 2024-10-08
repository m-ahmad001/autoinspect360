<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
}
?>

<form name="checkout" method="post"
	class="checkout woocommerce-checkout bg-white p-6 rounded-lg shadow-lg max-w-7xl mx-auto mt-10 grid grid-cols-1 lg:grid-cols-2 gap-12"
	action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

	<!-- Left Side: Billing & Shipping Details -->
	<div id="customer_details" class="space-y-6">
		<?php if ($checkout->get_checkout_fields()): ?>
			<?php do_action('woocommerce_checkout_before_customer_details'); ?>

			<div class="billing-details">
				<h3 class="text-2xl font-semibold mb-6"><?php esc_html_e('Billing Details', 'woocommerce'); ?></h3>
				<div class="space-y-4">
					<?php do_action('woocommerce_checkout_billing'); ?>
				</div>
			</div>

			<div class="shipping-details mt-8">
				<h3 class="text-2xl font-semibold mb-6"><?php esc_html_e('Shipping Details', 'woocommerce'); ?></h3>
				<div class="space-y-4">
					<?php do_action('woocommerce_checkout_shipping'); ?>
				</div>
			</div>

			<?php do_action('woocommerce_checkout_after_customer_details'); ?>
		<?php endif; ?>
	</div>

	<!-- Right Side: Order Review & Place Order -->
	<div class="order-review">
		<h3 id="order_review_heading" class="text-2xl font-semibold mb-6">
			<?php esc_html_e('Your Order', 'woocommerce'); ?>
		</h3>

		<?php do_action('woocommerce_checkout_before_order_review'); ?>

		<div id="order_review" class="woocommerce-checkout-review-order bg-gray-100 p-6 rounded-lg shadow-md mb-6">
			<?php do_action('woocommerce_checkout_order_review'); ?>
		</div>

		<?php do_action('woocommerce_checkout_after_order_review'); ?>

		<div class="mt-6">
			<button type="submit"
				class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-all">
				<?php esc_html_e('Place Order', 'woocommerce'); ?>
			</button>
		</div>
	</div>

</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>

<style>
	.woocommerce form .form-row input.input-text,
	.woocommerce form .form-row textarea {
		border: 1px solid #ddd;
		padding: 8px;
		border-radius: 4px;
	}
	.woocommerce form .form-row {
		margin-bottom: 15px;
	}
	.select2-container--default .select2-selection--single {
		border: 1px solid #ddd;
		border-radius: 4px;
		height: 40px;
	}
	.select2-container--default .select2-selection--single .select2-selection__rendered {
		line-height: 40px;
	}
	.select2-container--default .select2-selection--single .select2-selection__arrow {
		height: 38px;
	}
</style>