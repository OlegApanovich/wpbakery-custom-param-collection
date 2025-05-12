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
<style>
	.wcp-number-slider-wrapper {
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		gap: 1rem;
		margin-bottom: 1.5rem;
		font-size: 16px;
		font-family: sans-serif;
	}

	.wcp-number-slider-wrapper .wcp-number-slider {
		-webkit-appearance: none;
		appearance: none;
		width: 100%;
		min-width: 150px;
		max-width: 300px;
		height: 10px;
		background: #ccc;
		border-radius: 5px;
		outline: none;
		flex: 1;
		padding: 0;
	}

	.wcp-number-slider-wrapper .wcp-number-slider::-webkit-slider-thumb {
		-webkit-appearance: none;
		appearance: none;
		width: 24px;
		height: 24px;
		background: #aaa;
		border-radius: 50%;
		cursor: pointer;
		border: 2px solid #888;
	}

	.wcp-number-slider-wrapper .wcp-number-slider::-moz-range-thumb {
		width: 24px;
		height: 24px;
		background: #aaa;
		border-radius: 50%;
		cursor: pointer;
		border: 2px solid #888;
	}

	.wcp-number-slider-wrapper .wcp-number-slider::-ms-thumb {
		width: 24px;
		height: 24px;
		background: #aaa;
		border-radius: 50%;
		cursor: pointer;
		border: 2px solid #888;
	}

	.wcp-number-slider-wrapper .wcp-number {
		width: 10ch;
		background: #fff;
		color: #000;
		border: 1px solid #ccc;
		padding: 6px 8px;
		border-radius: 4px;
		font-size: 1rem;
	}

	@media (max-width: 500px) {
		.wcp-number-slider-wrapper {
			flex-direction: column;
			align-items: stretch;
		}
	}
</style>
