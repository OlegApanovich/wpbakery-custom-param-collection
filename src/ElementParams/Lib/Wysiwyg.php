<?php
/**
 * Custom param 'Wysiwyg' for wpbakery element.
 *
 * @see https://github.com/OlegApanovich/wpbakery-custom-param-collection?tab=readme-ov-file#5-wysiwyg
 * @since 1.1
 */

namespace WpbCustomParamCollection\ElementParams\Lib;

use WpbCustomParamCollection\ElementParams\ElementParamsAbstract;

/**
 * Switch class.
 *
 * @since 1.1
 */
class Wysiwyg extends ElementParamsAbstract {
	/**
	 * Param output.
	 *
	 * @param array $settings_initial
	 * @param mixed $value
	 * @return string
	 */
	public function param_output( array $settings_initial, $value ): string {
		$settings = $this->get_default_settings( $settings_initial );
		$settings = $this->get_specific_param_settings( $settings );

		$output = wpbcustomparamcollection_get_template(
			$this->get_param_template_name(),
			[
				'value'      => $value,
				'settings'   => $settings,
				'randomizer' => wp_rand( 100000, 99999999 ),
				'_this'      => $this,
			]
		);

		return $this->attach_styles_to_param_output( $output );
	}

	/**
	 * Get specific param settings.
	 *
	 * @param array $settings
	 * @return array
	 */
	public function get_specific_param_settings( array $settings ): array {
		// Editor Settings.
		$settings['scope']['use_tabs']       = isset( $settings['scope']['tabs'] ) ? $settings['scope']['tabs'] : 'true';
		$settings['scope']['use_menubar']    = isset( $settings['scope']['menubar'] ) ? $settings['scope']['menubar'] : 'true';
		$settings['scope']['use_media']      = isset( $settings['scope']['media'] ) ? $settings['scope']['media'] : 'true';
		$settings['scope']['use_link']       = isset( $settings['scope']['link'] ) ? $settings['scope']['link'] : 'true';
		$settings['scope']['use_lists']      = isset( $settings['scope']['lists'] ) ? $settings['scope']['lists'] : 'true';
		$settings['scope']['use_blockquote'] = isset( $settings['scope']['blockquote'] ) ? $settings['scope']['blockquote'] : 'true';
		$settings['scope']['use_textcolor']  = isset( $settings['scope']['textcolor'] ) ? $settings['scope']['textcolor'] : 'true';
		$settings['scope']['use_background'] = isset( $settings['scope']['background'] ) ? $settings['scope']['background'] : 'true';
		$settings['scope']['use_height']     = isset( $settings['scope']['height'] ) ? $settings['scope']['height'] : 250;
		$settings['scope']['use_rootblock']  = isset( $settings['scope']['rootblock'] ) ? $settings['scope']['rootblock'] : 'p';
		// Minimal Usage Override.
		if ( 'true' === $settings['minimal'] ) {
			$settings['scope']['use_menubar']    = 'false';
			$settings['scope']['use_media']      = 'false';
			$settings['scope']['use_link']       = 'false';
			$settings['scope']['use_blockquote'] = 'false';
			$settings['scope']['use_lists']      = 'false';
			$settings['scope']['use_background'] = 'false';
			$settings['scope']['use_height']     = 150;
		}

		return $settings;
	}
}
