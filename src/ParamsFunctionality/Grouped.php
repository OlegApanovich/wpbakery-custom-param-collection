<?php
/**
 * Grouped element params functionality for WPBakery Page Builder.
 */

namespace WpbCustomParamCollection\ParamsFunctionality;

defined( 'ABSPATH' ) || exit;

/**
 * ElementParamsLoader class.
 */
class Grouped {
	/**
	 * Initialize grouped element params functionality.
	 */
	public function init() {
		add_filter( 'vc_single_param_edit_holder_output', [ $this, 'add_wrapper_for_grouped_params' ], 10, 2 );
	}

	/**
	 * Add div wrapper for grouped params.
	 *
	 * @param string $output The output HTML.
	 * @return string Modified output HTML with grouped params.
	 */
	public function add_wrapper_for_grouped_params( $output, $param ) {
		$output = $this->apply_color( $param, $output );
		$output = $this->apply_margin( $param, $output );

		return $output;
	}

	/**
	 * Apply margin for grouped param.
	 *
	 * @param array  $param
	 * @param string $output
	 * @return string
	 */
	public function apply_margin( $param, $output ) {
		$margin = '';
		if ( ! empty( $param['wcp_group_margin_top'] ) ) {
			$margin .= ' margin-top: ' . esc_attr( $param['wcp_group_margin_top'] ) . 'px;';
		}
		if ( ! empty( $param['wcp_group_margin_bottom'] ) ) {
			$margin .= ' margin-bottom: ' . esc_attr( $param['wcp_group_margin_bottom'] ) . 'px;';
		}

		$style = '';
		if ( $margin ) {
			$style = 'style="' . $margin . '"';
		}

		return str_replace(
			'data-vc-ui-element="panel-shortcode-param"',
			'data-vc-ui-element="panel-shortcode-param" ' . $style,
			$output
		);
	}

	/**
	 * Apply color for grouped param.
	 *
	 * @param array  $param
	 * @param string $output
	 * @return string
	 */
	public function apply_color( $param, $output ) {
		$color = '';
		if ( ! empty( $param['wcp_group_color'] ) ) {
			$color = ' data-wcp-group-color="' . esc_attr( $param['wcp_group_color'] ) . '"';
		}

		return str_replace(
			'data-vc-ui-element="panel-shortcode-param"',
			'data-vc-ui-element="panel-shortcode-param" ' . $color,
			$output
		);
	}
}
