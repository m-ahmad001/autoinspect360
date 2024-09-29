<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * @package WooCommerce\Templates
 * @version 8.1.0
 * @var WC_Order $order
 */

defined('ABSPATH') || exit;
?>

<div class="woocommerce-order bg-white p-8 rounded-lg shadow-md max-w-4xl mx-auto mt-10">

	<?php
	if ($order):

		do_action('woocommerce_before_thankyou', $order->get_id());
		?>

		<?php if ($order->has_status('failed')): ?>

			<p
				class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed text-red-600 font-semibold text-lg">
				<?php esc_html_e('Unfortunately, your order cannot be processed as the originating bank/merchant has declined your transaction. Please try again.', 'woocommerce'); ?>
			</p>

			<div class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions mt-6 space-x-4">
				<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>"
					class="button pay bg-red-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-red-700 transition-all">
					<?php esc_html_e('Pay', 'woocommerce'); ?>
				</a>
				<?php if (is_user_logged_in()): ?>
					<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>"
						class="button pay bg-gray-700 text-white px-6 py-3 rounded-lg font-bold hover:bg-gray-800 transition-all">
						<?php esc_html_e('My Account', 'woocommerce'); ?>
					</a>
				<?php endif; ?>
			</div>

		<?php else: ?>

			<h2 class="text-3xl font-semibold text-center text-green-600 mb-8">
				<?php esc_html_e('Thank you. Your order has been received!', 'woocommerce'); ?>
			</h2>

			<ul
				class="woocommerce-order-overview woocommerce-thankyou-order-details order_details grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-700 font-medium text-lg">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e('Order Number:', 'woocommerce'); ?>
					<strong
						class="block text-gray-900"><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e('Date:', 'woocommerce'); ?>
					<strong
						class="block text-gray-900"><?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()): ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e('Email:', 'woocommerce'); ?>
						<strong
							class="block text-gray-900"><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e('Total:', 'woocommerce'); ?>
					<strong
						class="block text-gray-900"><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ($order->get_payment_method_title()): ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e('Payment Method:', 'woocommerce'); ?>
						<strong class="block text-gray-900"><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>
		<?php do_action('woocommerce_thankyou', $order->get_id()); ?>

	<?php else: ?>

		<p class="woocommerce-notice woocommerce-notice--error text-red-600 text-center">
			<?php esc_html_e('Your order could not be found. Please contact support if you believe this is an error.', 'woocommerce'); ?>
		</p>

	<?php endif; ?>

</div>