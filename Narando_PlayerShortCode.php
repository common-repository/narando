<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

include_once('Narando_ShortCodeLoader.php');

class Narando_PlayerShortCode extends Narando_ShortCodeLoader {
    /**
     * @param  $atts shortcode inputs
     * @return string shortcode content
     */
    public function handleShortcode($atts) {


		$permalink = get_permalink($wp_query->post->ID); //get post link
		$options = $this->getOption("NRAutoplay");
		/*$autoplay = "";
		if ("true" == $this->getOption("NRAutoplay")) {
			$autoplay = "autoplay";
		}

		if ("true" == $this->getOption("NRShowDemoArticle")) {
			$permalink = "http://t3n.de/news/t3n-vorlesen-lassen-narando-570972/";
		}

		$data_fg_color = $this->getOption("NRColorControls");
		$data_bg_color = $this->getOption("NRColorBackground");
		$data_txt_color = $this->getOption("NRColorText");
		$data_fr_color = $this->getOption("NRColorFrame");

		$data_fg_color = str_replace("#",'',$data_fg_color);
		$data_bg_color = str_replace("#",'',$data_bg_color);
		$data_txt_color = str_replace("#",'',$data_txt_color);
		$data_fr_color = str_replace("#",'',$data_fr_color);

		$data_pre_text = $this->getOption("NRPreText");
		$data_post_text = $this->getOption("NRPostText");

		$data_css_style = $this->getOption("NRCSSStyle");

		if ("false" == $this->getOption("NRHideSpeaker")) {
			$data_hide_speaker = 'data-hide-speaker="true"';
		}

		if (!empty($data_pre_text)) {
			$data_pre_text = sprintf('<div class="narando-text-container" style="display:none;">%s</div>', stripcslashes($data_pre_text));
		}

		if (!empty($data_post_text)) {
			$data_post_text = sprintf('<div class="narando-text-container" style="display:none;">%s</div>', stripcslashes($data_post_text));
		}

		$data_hide_element = ".narando-text-container";

		if ("Before Post" == $this->getOption("NRPosition")) {
			$content = sprintf('%s<div class="narando-player" data-canonical="%s" data-floating="mobile" data-fg-color="%s" data-bg-color="%s" data-txt-color="%s" data-fr-color="%s" %s data-hide-element="%s" style="%s" %s></div>%s%s', $data_pre_text, $permalink, $data_fg_color, $data_bg_color, $data_txt_color, $data_fr_color, $data_hide_speaker, $data_hide_element, $data_css_style, $autoplay, $data_post_text, $content);
		} else {
			$content = sprintf('%s%s<div class="narando-player" data-canonical="%s" data-floating="mobile" data-fg-color="%s" data-bg-color="%s" data-txt-color="%s" data-fr-color="%s" %s data-hide-element="%s" style="%s" %s></div>%s', $content, $data_pre_text, $permalink, $data_fg_color, $data_bg_color, $data_txt_color, $data_fr_color, $data_hide_speaker, $data_hide_element, $data_css_style, $autoplay, $data_post_text);
		}

        return $content;*/
		return $options;
    }
}

?>
