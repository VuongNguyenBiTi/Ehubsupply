<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	/* translators: %s: Quantity. */
	$labelledby = ! empty( $args['product_name'] ) ? sprintf( __( '%s quantity', 'woocommerce' ), strip_tags( $args['product_name'] ) ) : '';
	?>
	<div class="quantity">
		<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></label>
		<input type="button" value="-" class="qty_button minus" />
		<input
		type="number"
		id="<?php echo esc_attr( $input_id ); ?>"
		class="input-text qty text"
		step="<?php echo esc_attr( $step ); ?>"
		min="<?php echo esc_attr( $min_value ); ?>"
		max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
		name="<?php echo esc_attr( $input_name ); ?>"
		value="<?php echo esc_attr( $input_value ); ?>"
		title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ); ?>"
		size="4"
		pattern="<?php echo esc_attr( $pattern ); ?>"
		inputmode="<?php echo esc_attr( $inputmode ); ?>"
		aria-labelledby="<?php echo esc_attr( $labelledby ); ?>" />
		<input type="button" value="+" class="qty_button plus" />
	</div>
	<?php
}
?>
<style>
	.quantity input::-webkit-outer-spin-button,
	.quantity input::-webkit-inner-spin-button {
		display: none;
		margin: 0;
	}

	.quantity input.qty {
		appearance: textfield;
		-webkit-appearance: none;
		-moz-appearance: textfield;
	}

	.quantity input.qty_button {
		-webkit-appearance: button;
		width: 40px;
		height: 33px;
		background: #f4f2f5;
		content: "\f068";
		font-family: fontawesome;
		font-size: 14px;
		color: #a6a9b2;
		text-align: center;
		line-height: 33px;
		cursor: pointer;
		border: none;
	}

	.quantity .input-text {
		height: 30px;
		border: none;
		outline: none;
		font-size: 16px;
		font-weight: bold;
		width: 50px !important;
	}

	.quantity {
		display: inline-flex;
		border: 1px solid #ddd;
	}

	.quantity {
		margin: 0 20px 0 0 !important;
		border-radius: 8px;
		display: inline-flex;
		border: 1px solid #ddd;
	}

	.quantity input.qty_button {
		width: 35px;
		height: 38px;
		background: #f4f2f5;
		content: "";
		font-size: 30px;
		color: #F92296;
		text-align: center;
		line-height: 33px;
		cursor: pointer;
		border: none;
	}

	.woocommerce .quantity .qty {
		width: 3.631em;
		text-align: center;
		height: 35px;
		border: none;
		outline: none;
		font-size: 20px;
		color: #F92296;
		font-weight: bold;
		width: 50px !important;
	}

	input.qty_button.minus {
		border-radius: 8px 0 0 8px;
	}

	input.qty_button.plus {
		border-radius: 0 8px 8px 0px;
	}

	.product_meta {
		display: none;
	}

	.product_description {
		font-size: 18px;
		line-height: 26px;
		margin-bottom: 25px;
		margin-top: 25px;
	}

	
	
</style>
<script>
	jQuery(function ($) {
  if (!String.prototype.getDecimals) {
    String.prototype.getDecimals = function () {
      var num = this,
        match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
      if (!match) {
        return 0;
      }
      return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
    };
  }
  // Quantity "plus" and "minus" buttons
  $(document.body).off('click', '.plus, .minus').on('click', '.plus, .minus', function () {
    var $qty = $(this).closest('.quantity').find('.qty'),
      currentVal = parseFloat($qty.val()),
      max = parseFloat($qty.attr('max')),
      min = parseFloat($qty.attr('min')),
      step = $qty.attr('step');

    // Format values
    if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
    if (max === '' || max === 'NaN') max = '';
    if (min === '' || min === 'NaN') min = 0;
    if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

    // Change the value
    if ($(this).is('.plus')) {
      if (max && (currentVal >= max)) {
        $qty.val(max);
      } else {
        $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
      }
    } else {
      if (min && (currentVal <= min)) {
        $qty.val(min);
      } else if (currentVal > 0) {
        $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
      }
    }

    // Trigger change event
    $qty.trigger('change');
  });
});

</script>
