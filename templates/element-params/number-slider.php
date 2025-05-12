<?php
/**
 * Custom element param template for a number param.
 *
 * @see https://kb.wpbakery.com/docs/developers-how-tos/create-new-param-type
 * @since 1.1
 *
 * @var mixed $value
 * @var array $settings
 * @var WpbCustomParamCollection\ElementParams\ElementParamsAbstract $_this
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="wcp-number-slider-wrapper">
	<input
			type="range"
			min="<?php echo esc_attr( $settings['min'] ); ?>"
			max="<?php echo esc_attr( $settings['max'] ); ?>"
			step="<?php echo esc_attr( $settings['step'] ); ?>"
			class="wcp-number-slider"
			value="<?php echo esc_attr( $_this->get_value( $settings, $value ) ); ?>"
	>
	<input
			type="number"
			min="<?php echo esc_attr( $settings['min'] ); ?>"
			max="<?php echo esc_attr( $settings['max'] ); ?>"
			step="<?php echo esc_attr( $settings['step'] ); ?>"
			class="wcp-number <?php echo esc_attr( $_this->get_param_classes( $settings ) ); ?>"
			name="<?php echo esc_attr( $settings['param_name'] ); ?>"
			value="<?php echo esc_attr( $_this->get_value( $settings, $value ) ); ?>"
	>
</div>
