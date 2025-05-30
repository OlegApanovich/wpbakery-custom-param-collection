<?php
/**
 * Custom element param template for a switch param.
 *
 * @see https://kb.wpbakery.com/docs/developers-how-tos/create-new-param-type
 * @since 1.1
 *
 * @var mixed $value
 * @var array $settings
 * @var int $randomizer
 * @var string $type
 */

defined( 'ABSPATH' ) || exit;
$reduced_height = $settings['use_height'] - 60;
?>
<div
	id="wcp-wysiwyg-container-<?php echo esc_attr( $randomizer ); ?>"
	class="wcp-wysiwyg-container"
	data-use-tabs="<?php echo esc_attr( $settings['use_tabs'] ); ?>"
	data-use-height="<?php echo esc_attr( $reduced_height ); ?>"
	data-use-menubar="<?php echo esc_attr( $settings['use_menubar'] ); ?>"
	data-use-media="<?php echo esc_attr( $settings['use_media'] ); ?>"
	data-use-link="<?php echo esc_attr( $settings['use_link'] ); ?>"
	data-use-blockquote="<?php echo esc_attr( $settings['use_blockquote'] ); ?>"
	data-use-lists="<?php echo esc_attr( $settings['use_lists'] ); ?>"
	data-use-textcolor="<?php echo esc_attr( $settings['use_textcolor'] ); ?>"
	data-use-background="<?php echo esc_attr( $settings['use_background'] ); ?>"
	data-use-rootblock="<?php echo esc_attr( $settings['use_rootblock'] ); ?>"
	data-url-home="<?php echo esc_url( get_home_url() ); ?>"
	data-url-site="<?php echo esc_url( get_site_url() ); ?>"
>
	<?php
	if ( 'true' === $settings['use_tabs'] ) {
		?>
	<div id="wcp-wysiwyg-tabs-<?php echo esc_attr( $randomizer ); ?>" class="wcp-wysiwyg-tabs">
		<a id="wcp-wysiwyg-html-<?php echo esc_attr( $randomizer ); ?>" class="wcp-wysiwyg-html active">HTML</a>
		<a id="wcp-wysiwyg-visual-<?php echo esc_attr( $randomizer ); ?>" class="wcp-wysiwyg-visual">Visual</a>
		<div style="clear: both;"></div>
	</div>
		<?php
	}
	?>
	<textarea id="wcp-wysiwyg-editor-<?php echo esc_attr( $randomizer ); ?>"
				name="tooltip_content"
				class="wcp-wysiwyg-editor wpb_vc_param_value ' . 'tooltip_content wysiwyg_base64 <?php echo esc_attr( $type ); ?>"
				style="height: <?php echo esc_attr( $settings['use_height'] ); ?>px;"><?php echo wp_kses_post( htmlentities( rawurldecode( base64_decode( $value ) ), ENT_COMPAT, 'UTF-8' ) ); // phpcs:ignore: WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_decode ?></textarea>
</div>

