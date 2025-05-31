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
	 * Get param default attr list.
	 *
	 * @since 1.1
	 * @return array
	 */
	public function get_param_default_attr_list(): array {
		return [
			'minimal',
			'type',
			'scope',
		];
	}

	/**
	 * Param output.
	 *
	 * @param array $settings
	 * @param mixed $value
	 * @return string
	 * @since 1.1
	 */
	public function param_output( array $settings, $value ): string {
		$settings = $this->merge_default_settings( $settings );
		$output   = wpbcustomparamcollection_get_template(
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
	 * Get params values.
	 *
	 * @param array $settings
	 * @return array
	 * @since 1.1
	 */
	public function merge_default_settings( array $settings ): array {
		$values = [];

		foreach ( $this->get_param_default_attr_list() as $name ) {
			$values['minimal'] = isset( $settings['minimal'] ) ? $settings['minimal'] : 'false';
			$type              = isset( $settings['type'] ) ? $settings['type'] : '';
			$values['scope']   = isset( $settings['scope'] ) ? $settings['scope'] : [];
			// Editor Settings.
			$values['use_tabs']       = isset( $values['scope']['tabs'] ) ? $values['scope']['tabs'] : 'true';
			$values['use_menubar']    = isset( $values['scope']['menubar'] ) ? $values['scope']['menubar'] : 'true';
			$values['use_media']      = isset( $values['scope']['media'] ) ? $values['scope']['media'] : 'true';
			$values['use_link']       = isset( $values['scope']['link'] ) ? $values['scope']['link'] : 'true';
			$values['use_lists']      = isset( $values['scope']['lists'] ) ? $values['scope']['lists'] : 'true';
			$values['use_blockquote'] = isset( $values['scope']['blockquote'] ) ? $values['scope']['blockquote'] : 'true';
			$values['use_textcolor']  = isset( $values['scope']['textcolor'] ) ? $values['scope']['textcolor'] : 'true';
			$values['use_background'] = isset( $values['scope']['background'] ) ? $values['scope']['background'] : 'true';
			$values['use_height']     = isset( $values['scope']['height'] ) ? $values['scope']['height'] : 250;
			$values['use_rootblock']  = isset( $values['scope']['rootblock'] ) ? $values['scope']['rootblock'] : 'p';
			// Minimal Usage Override.
			if ( 'true' === $values['minimal'] ) {
				$values['use_menubar']    = 'false';
				$values['use_media']      = 'false';
				$values['use_link']       = 'false';
				$values['use_blockquote'] = 'false';
				$values['use_lists']      = 'false';
				$values['use_background'] = 'false';
				$values['use_height']     = 150;
			}
		}

		return $values;
	}
}
