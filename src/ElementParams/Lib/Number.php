<?php
/**
 * Custom param 'Number' for wpbakery element.
 *
 * @see https://github.com/OlegApanovich/wpbakery-custom-param-collection?tab=readme-ov-file#1-number
 * @since 1.0
 */

namespace WpbCustomParamCollection\ElementParams\Lib;

use WpbCustomParamCollection\ElementParams\ElementParamsAbstract;

/**
 * Number class.
 *
 * @since 1.0
 */
class Number extends ElementParamsAbstract {
	/**
	 * Get param default attr list.
	 *
	 * @since 1.0
	 * @return array
	 */
	public function get_param_default_attr_list(): array {
		return [
			'param_name',
			'type',
			'min',
			'max',
			'step',
			'title',
			'class',
		];
	}

	/**
	 * Get params values.
	 *
	 * @param array $settings
	 * @return array
	 * @since 1.0
	 */
	public function merge_default_settings( array $settings ): array {
		$values = [];

		foreach ( $this->get_param_default_attr_list() as $name ) {
			$values[ $name ] = $settings[ $name ] ?? '';
		}

		return $values;
	}
}
