<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

include_once('Narando_LifeCycle.php');

class Narando_Plugin extends Narando_LifeCycle {

  // General settings
  public function getOptionMetaDataGeneral() {
    return array(
      'NRCheckIfPlayerOrButtonIsSet' => array(__('Please select how users can access the audio content:', 'narando-plugin'), 'player', 'button'),
      'NRShowDemoArticle' => array(__('WARNING: Only for testing! Show demo audio-content on every post?', 'narando-plugin'), 'false', 'true'),
      'NRPosition' => array(__('Player position in your post:', 'narando-plugin'), 'Before Post', 'After Post'),
      'NRPreText' => array(__('Text before player / button <span style="font-weight: normal;">(HTML possible; not displayed, when no audio)</span>', 'narando-plugin')),
      'NRPostText' => array(__('Text after player / button <span style="font-weight: normal;">(HTML possible; not displayed, when no audio)</span>', 'narando-plugin'))
    );
  }

  /**
  * See: http://plugin.michael-simpson.com/?page_id=31
  * @return array of option meta data.
  */
  // player settings
  public function getOptionMetaData() {
    return array(
      //'_version' => array('Installed Version'), // Leave this one commented-out. Uncomment to test upgrades.
      'NRAutoplay' => array(__('Autoplay (playback starts immediately, when post is loaded). <i style="font-weight: normal">Note: If „Button“ is selected above, this option is on by default</i>', 'narando-plugin'), 'true', 'false'),
      'NRPlayerMobile' => array(__('For mobile devices: Always display player at bottom of screen. <i style="font-weight: normal">Note: Please don’t use this if you have thumb bars for sharing or ads (position:absolute) at the bottom of the mobile screen</i>', 'narando-plugin'), 'true', 'false'),
      'NRColorControls' => array(__('Controls Color <span style="font-weight: normal;">(#e74c3c)</span>', 'narando-plugin')),
      'NRColorBackground' => array(__('Background Color <span style="font-weight: normal;">(#ffffff)</span>', 'narando-plugin')),
      'NRColorText' => array(__('Text Color <span style="font-weight: normal;">(#666666)</span>', 'narando-plugin')),
      'NRColorFrame' => array(__('Border Color <span style="font-weight: normal;">(#ffffff)</span>', 'narando-plugin')),
      'NRHideSpeaker' => array(__('Show Narrator Picture?', 'narando-plugin'), 'true', 'false'),
      'NRCSSStyle' => array(__('CSS-Style <span style="font-weight: normal;">(e.g. margin-top: 20px; margin-bottom:20px;)</span>', 'narando-plugin')),
      
      // player v3 attributes
      'NRPlayButtonRadiusLeft' => array(__('Play button left corner left radius in px <span style="font-weight: normal;">(5)</span> <br><i style="font-weight: normal">For player v3</i>', 'narando-plugin')),
      'NRPlayButtonRadiusRight' => array(__('Play button right corner radius in px <span style="font-weight: normal;">(5)</span> <br><i style="font-weight: normal">For player v3</i>', 'narando-plugin')), 
      'NRPlayerRadius' => array(__('Player corners radius in px <span style="font-weight: normal;">(5)</span> <br><i style="font-weight: normal">For player v3</i>', 'narando-plugin')), 
      'NRCTAButtonRadius' => array(__('"Play now" and "Get podcast" buttons radius in px <span style="font-weight: normal;">(5)</span> <br><i style="font-weight: normal">For player v3</i>', 'narando-plugin')), 
      'NRInitialView' => array(__('Select the initial view <span style="font-weight: normal;">(selection)</span> <br><i style="font-weight: normal">For player v3, <a target="_blank" href="https://about.narando.com/en-US/player-widget">documentation</a></i>', 'narando-plugin'), 'selection', 'player', 'button'), 
      'NRPlayerMode' => array(__('Select the player mode <span style="font-weight: normal;">(horizontal)</span> <br><i style="font-weight: normal">For player v3, <a target="_blank" href="https://about.narando.com/en-US/player-widget">documentation</a></i>', 'narando-plugin'), 'horizontal', 'vertical'), 
    );
  }

  // button settings
  public function getOptionMetaDataButton() {
    return array(
      'NRButtonText' => array(__('Button Text', 'narando-plugin')),
      'NRButtonBackgroundColor' => array(__('Background Color <span style="font-weight: normal;">(#ec7669)</span>', 'narando-plugin')),
      'NRButtonBackgroundColorHover' => array(__('Background Color Hover <span style="font-weight: normal;">(#E74C3C)</span>', 'narando-plugin')),
      'NRButtonTextColor' => array(__('Text Color <span style="font-weight: normal;">(#ffffff)</span>', 'narando-plugin')),
      'NRButtonTextColorHover' => array(__('Text Color Hover <span style="font-weight: normal;">(#ffffff)</span>', 'narando-plugin')),
      //'NRButtonBorder' => array(__('Border Thickness', 'narando-plugin')),
      'NRButtonBorderRadius' => array(__('Border Radius <span style="font-weight: normal;">(5px)</span>', 'narando-plugin')),
      'NRButtonWidth' => array(__('Button Width <span style="font-weight: normal;">(auto)</span>', 'narando-plugin')),
      'NRButtonHeight' => array(__('Button Height <span style="font-weight: normal;">(40px)</span>', 'narando-plugin')),
      'NRButtonTextSize' => array(__('Font Size <span style="font-weight: normal;">(14px)</span>', 'narando-plugin'))
    );
  }

  // settings for player after button is clicked
  public function getOptionMetaDataButtonPlayer() {
    return array(
      'NRButtonPlayerVersion' => array(__('Player Version (1 oder 2)', 'narando-plugin')),
      'NRButtonPlayeriFrameContainerColor' => array(__('iFrame Container Color', 'narando-plugin')),
      'NRButtonPlayerBackgroundColor' => array(__('Background Color', 'narando-plugin')),
      'NRButtonPlayerBackgroundColor2' => array(__('Background Color 2 (nur für Player 2 relevant)', 'narando-plugin')),
      'NRButtonPlayerControlsColor' => array(__('Controls Farbe', 'narando-plugin')),
      'NRButtonPlayerTextColor' => array(__('Textfarbe', 'narando-plugin')),
      'NRButtonPlayerFrameColor' => array(__('Frame Color', 'narando-plugin')),

      'NRButtonPlayerAutoplay' => array(__('Autoplay', 'narando-plugin'), 'false', 'true'),
      'NRButtonPlayerHideListens' => array(__('Listens verdecken', 'narando-plugin'), 'false', 'true'),
      'NRButtonPlayerHideSpeaker' => array(__('Sprecher verdecken', 'narando-plugin'), 'false', 'true'),
      'NRButtonPlayerFloating' => array(__('Player permanent am unteren Rand anzeigen', 'narando-plugin'), 'false', 'true'),
      'NRButtonPlayerAnimated' => array(__('Animiertes einblenden', 'narando-plugin'), 'false', 'true')

    );
  }

  //    protected function getOptionValueI18nString($optionValue) {
  //        $i18nValue = parent::getOptionValueI18nString($optionValue);
  //        return $i18nValue;
  //    }

  protected function initOptions() {
    // shows the player contents if it's not empty
    $options = $this->getOptionMetaData();
    if (!empty($options)) {
      foreach ($options as $key => $arr) {
        if (is_array($arr) && count($arr > 1)) {
          $this->addOption($key, $arr[1]);
        }
      }
    }
    // show the button contents if it's not empty
    $optionsButton = $this->getOptionMetaDataButton();
    if (!empty($optionsButton)) {
      foreach ($optionsButton as $key => $arr) {
        if (is_array($arr) && count($arr > 1)) {
          $this->addOption($key, $arr[1]);
        }
      }
    }

    // show the button player contents if it's not empty
    $optionsButtonPlayer = $this->getOptionMetaDataButtonPlayer();
    if (!empty($optionsButtonPlayer)) {
      foreach ($optionsButtonPlayer as $key => $arr) {
        if (is_array($arr) && count($arr > 1)) {
          $this->addOption($key, $arr[1]);
        }
      }
    }
  }

  public function getPluginDisplayName() {
    return 'narando';
  }

  protected function getMainPluginFileName() {
    return 'narando.php';
  }

  /**
  * See: http://plugin.michael-simpson.com/?page_id=101
  * Called by install() to create any database tables if needed.
  * Best Practice:
  * (1) Prefix all table names with $wpdb->prefix
  * (2) make table names lower case only
  * @return void
  */
  protected function installDatabaseTables() {
    //        global $wpdb;
    //        $tableName = $this->prefixTableName('mytable');
    //        $wpdb->query("CREATE TABLE IF NOT EXISTS `$tableName` (
    //            `id` INTEGER NOT NULL");
  }

  /**
  * See: http://plugin.michael-simpson.com/?page_id=101
  * Drop plugin-created tables on uninstall.
  * @return void
  */
  protected function unInstallDatabaseTables() {
    //        global $wpdb;
    //        $tableName = $this->prefixTableName('mytable');
    //        $wpdb->query("DROP TABLE IF EXISTS `$tableName`");
  }


  /**
  * Perform actions when upgrading from version X to version Y
  * See: http://plugin.michael-simpson.com/?page_id=35
  * @return void
  */
  public function upgrade() {
    $upgradeOk = true;
    $savedVersion = $this->getVersionSaved();
    if ($this->isVersionLessThan($savedVersion, '2.0')) {
      // perform version 2.0 upgrade action
    }

    // Post-upgrade, set the current version in the options
    $codeVersion = $this->getVersion();
    if ($upgradeOk && $savedVersion != $codeVersion) {
      $this->saveInstalledVersion();
    }
  }

  public function addActionsAndFilters() {
    //include_once('Narando_PlayerShortCode.php');
    //$sc = new Narando_PlayerShortCode();
    //$sc->register('narando-player');

    add_shortcode('narando-player', array($this, 'doPlayersShortcode'));

    // Add options administration page
    // http://plugin.michael-simpson.com/?page_id=47
    add_action('admin_menu', array(&$this, 'addSettingsSubMenuPage'));

    //add Narando Script
    add_action('wp_footer', array(&$this, 'registerNarandoScript'));
    // Add Player to Frontend
    //add_filter('the_content', array(&$this, 'narandoPlayerContainer'));
    // Add Button to Frontend
    //add_filter('the_content', array(&$this, 'narandoButtonContainer'));
    add_filter('the_content', array(&$this, 'narandoContainer'));

    // Create Tab Navigation
    add_action('admin_enqueue_scripts', array(&$this, 'enqueueAdminPageStylesAndScripts'));

  }

  // JQuery CSS
  public function enqueueAdminPageStylesAndScripts() {
    // Needed for the Settings Page
    if (strpos($_SERVER['REQUEST_URI'], $this->getSettingsSlug()) !== false) {
      wp_enqueue_style('jquery-ui', plugins_url('/css/jquery-ui.css', __FILE__));
      wp_enqueue_script('jquery-ui-core');
      wp_enqueue_script('jquery-ui-tabs');
      // enqueue any othere scripts/styles you need to use
    }
  }

  // JQuery Tab1 - General Settings
  public function outputTabContentsGeneralSettings() {
    echo "<strong>Please don't forget to save your configuration!</strong>";
    echo "<hr>";
    $optionMetaDataGeneral = $this->getOptionMetaDataGeneral(); // General
    $optionMetaDataButton = $this->getOptionMetaDataButton(); // Button
    $optionMetaData = $this->getOptionMetaData(); // Player

    // Save Posted Options
    if ($optionMetaDataGeneral != null) {
      foreach ($optionMetaDataGeneral as $aOptionKeyGeneral => $aOptionMetaGeneral) {
        if (isset($_POST[$aOptionKeyGeneral])) {
          $this->updateOption($aOptionKeyGeneral, $_POST[$aOptionKeyGeneral]);
        }
      }
    }
    // Save Posted Options Button
    if ($optionMetaDataButton != null) {
      foreach ($optionMetaDataButton as $aOptionKeyButton => $aOptionMetaButton) {
        if (isset($_POST[$aOptionKeyButton])) {
          $this->updateOption($aOptionKeyButton, $_POST[$aOptionKeyButton]);
        }
      }
    }
    // Save Posted Options
    if ($optionMetaData != null) {
      foreach ($optionMetaData as $aOptionKey => $aOptionMeta) {
        if (isset($_POST[$aOptionKey])) {
          $this->updateOption($aOptionKey, $_POST[$aOptionKey]);
        }
      }
    }
    $settingsGroup = get_class($this) . '-settings-group';
    ?>


    <form method="post" action="">
      <?php settings_fields($settingsGroup); ?>
      <table class="form-table"><tbody>
        <?php
        echo "
        <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
        <script type='text/javascript'>
        $(document).ready(function(){
          if ('" . $this->getOption('NRCheckIfPlayerOrButtonIsSet') . "' == 'player') {
            $('#buttonAppearance').hide();
            $('tr#buttonTable').hide();
          }

          $('#NRCheckIfPlayerOrButtonIsSet').on('change', function() {
            if ( this.value == 'button')
            {
              $('#buttonAppearance').show();
              $('tr#buttonTable').show();
            }
            else
            {
              $('#buttonAppearance').hide();
              $('tr#buttonTable').hide();
            }
          });
        });
        </script>
        ";

        echo "<em><small>Please note that the button / player is only being displayed, if one of our narrators has produced an audio file which matches the URL of your post. If there is no audio file, or the URL has changed, there will be no button / player.</small></em>";
        echo "<tr><th><h1><u>Embedding in your posts</u></h1></th></tr>";
        // show general configs
        if ($optionMetaDataGeneral != null) {
          foreach ($optionMetaDataGeneral as $aOptionKeyGeneral => $aOptionMetaGeneral) {
            $displayText = is_array($aOptionMetaGeneral) ? $aOptionMetaGeneral[0] : $aOptionMetaGeneral;
            ?>
            <tr valign="top">
              <th scope="row" style="width: 400px;">
                <p>
                  <label for="<?php echo $aOptionKeyGeneral ?>">
                    <?php echo $displayText ?>
                  </label>
                </p>
              </th>
              <td>
                <?php $this->createFormControl($aOptionKeyGeneral, $aOptionMetaGeneral, $this->getOption($aOptionKeyGeneral)); ?>
              </td>
            </tr>
            <?php
          }
        }

        // show button configs
        echo "<tr><th><h1 id='buttonAppearance'><u>Button appearance</u></h1></th></tr>";
        if ($optionMetaDataButton != null) {
          foreach ($optionMetaDataButton as $aOptionKeyButton => $aOptionMetaButton) {
            $displayText = is_array($aOptionMetaButton) ? $aOptionMetaButton[0] : $aOptionMetaButton;
            ?>
            <tr id="buttonTable" valign="top">
              <th scope="row" style="width: 400px;"><p><label for="<?php echo $aOptionKeyButton ?>"><?php echo $displayText ?></label></p></th>
              <td>
                <?php $this->createFormControl($aOptionKeyButton, $aOptionMetaButton, $this->getOption($aOptionKeyButton)); ?>
              </td>
            </tr>
            <?php
          }
        }

        // show player configs
        echo "<tr><th><h1><u>Player appearance</u></h1></th></tr>";
        if ($optionMetaData != null) {
          foreach ($optionMetaData as $aOptionKey => $aOptionMeta) {
            $displayText = is_array($aOptionMeta) ? $aOptionMeta[0] : $aOptionMeta;
            ?>

            <tr valign="top">
              <th scope="row" style="width: 400px;"><p><label for="<?php echo $aOptionKey ?>"><?php echo $displayText ?></label></p></th>
              <td>
                <?php $this->createFormControl($aOptionKey, $aOptionMeta, $this->getOption($aOptionKey)); ?>
              </td>
            </tr>
            <?php
          }
        }
        ?>
      </tbody></table>
      <p class="submit">
        <input type="submit" class="button-primary"
        value="<?php _e('Save Changes', 'narando') ?>"/>
      </p>
    </form>
    <?php
  }

  // JQuery Tab2 - Button Settings
  public function outputTabContentsButtonSettings() {
  }
  // JQuery Tab1 - Player Settings
  public function outputTabContentsPlayerSettings() {
  }

  public function registerNarandoScript() {
    wp_enqueue_script( 'narando-player', esc_url_raw( 'https://embed.narando.com/scripts/player.js' ));
    wp_enqueue_script( 'narando-player', esc_url_raw( 'https://embed.narando.com/scripts/button.js' ));
  }

  function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
  }
  function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
  }



  public function narandoContainer($content = '') {
    global $wp_query;
    if(is_single()) {
      $permalink = get_permalink($wp_query->post->ID); // get post link
      if ($this->getOption("NRCheckIfPlayerOrButtonIsSet") == "player" || $this->getOption("NRCheckIfPlayerOrButtonIsSet") == "") {

        $autoplay = "";
        if ("true" == $this->getOption("NRAutoplay")) {
          $autoplay = "autoplay";
        }

        if ("true" == $this->getOption("NRShowDemoArticle")) {
          $permalink = "https://www.narando.com/demo-medley";
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

        $data_hide_speaker = "";

        // player v3 attributes
        $data_play_button_radius_left = $this->getOption("NRPlayButtonRadiusLeft");
        $data_play_button_radius_right = $this->getOption("NRPlayButtonRadiusRight");
        $data_player_radius = $this->getOption("NRPlayerRadius");
        $data_cta_button_radius = $this->getOption("NRCTAButtonRadius");
        $data_initial_view = $this->getOption("NRInitialView");
        $data_player_mode = $this->getOption("NRPlayerMode");

        if ("false" == $this->getOption("NRHideSpeaker")) {
          $data_hide_speaker = 'data-hide-speaker="true"';
        }

        $data_floating = 'data-floating="true"';
        if ("false" == $this->getOption("NRPlayerMobile")) {
          $data_floating = "";
        }

        if (!empty($data_pre_text)) {
          $data_pre_text = sprintf('<div class="narando-text-container" style="display:none;">%s</div>', stripcslashes($data_pre_text));
        }

        if (!empty($data_post_text)) {
          $data_post_text = sprintf('<div class="narando-text-container" style="display:none;">%s</div>', stripcslashes($data_post_text));
        }

        $data_hide_element = ".narando-text-container";


        if ("Before Post" == $this->getOption("NRPosition")) {
          $content = sprintf('%s<div class="narando-player" data-canonical="%s"
          data-fg-color="%s" data-bg-color="%s" data-txt-color="%s" data-fr-color="%s"
          %s data-hide-element="%s" style="%s" %s
          data-narando-play-button-radius-left="%s"
          data-narando-play-button-radius-right="%s"
          data-narando-player-radius="%s"
          data-narando-cta-button-radius="%s"
          data-narando-initial-view="%s"
          data-narando-player-mode="%s"
          ></div>%s%s',
          $data_pre_text, $permalink, $data_fg_color, $data_bg_color,
          $data_txt_color, $data_fr_color, $data_hide_speaker, $data_hide_element,
          $data_css_style, $autoplay, $data_play_button_radius_left,
          $data_play_button_radius_right, $data_player_radius,
          $data_cta_button_radius, $data_initial_view, $data_player_mode,
          $data_post_text, $content);

        } else if("After Post" == $this->getOption("NRPosition")) {
          $content = sprintf('%s%s<div class="narando-player" data-canonical="%s"
          data-fg-color="%s" data-bg-color="%s" data-txt-color="%s" data-fr-color="%s"
          %s data-hide-element="%s" style="%s" %s
          data-narando-play-button-radius-left="%s"
          data-narando-play-button-radius-right="%s"
          data-narando-player-radius="%s"
          data-narando-cta-button-radius="%s"
          data-narando-initial-view="%s"
          data-narando-player-mode="%s"></div>%s',
          $content, $data_pre_text, $permalink, $data_fg_color,
          $data_bg_color, $data_txt_color, $data_fr_color, $data_hide_speaker,
          $data_hide_element, $data_css_style, $autoplay,
          $data_play_button_radius_left, $data_play_button_radius_right,
          $data_player_radius, $data_cta_button_radius, $data_initial_view,
          $data_player_mode,
          $data_post_text);
        }
        return $content;

      } else if ($this->getOption("NRCheckIfPlayerOrButtonIsSet") == "button") {
        // configure Button
        $data_button_text = $this->getOption("NRButtonText");
        $data_button_background_color = $this->getOption("NRButtonBackgroundColor");
        $data_button_background_color_hover = $this->getOption("NRButtonBackgroundColorHover");
        $data_button_text_color = $this->getOption("NRButtonTextColor");
        $data_button_text_color_hover = $this->getOption("NRButtonTextColorHover");
        $data_button_border = $this->getOption("NRButtonBorder");
        $data_button_border_radius = $this->getOption("NRButtonBorderRadius");
        $data_button_width = $this->getOption("NRButtonWidth");
        $data_button_height = $this->getOption("NRButtonHeight");
        $data_button_text_size = $this->getOption("NRButtonTextSize");

        // configure player after clicked button
        $data_button_player_version = $this->getOption("NRPlayerVersion");
        $data_button_player_type = $this->getOption("NRButtonPlayerType"); // ??????
        $data_button_player_iframe_container_color = $this->getOption("NRFrameContainerColor");
        $data_button_player_background_color = $this->getOption("NRColorBackground");
        $data_button_player_background_color2 = $this->getOption("NRPlayerBackgroundColor2");
        $data_button_player_controls_color = $this->getOption("NRColorControls");
        $data_button_player_text_color = $this->getOption("NRColorText");
        $data_button_player_frame_color = $this->getOption("NRColorFrame");

        $data_button_player_autoplay = $this->getOption("NRAutoplay");
        $data_button_player_hide_listens = $this->getOption("NRHideListens");
        $data_button_player_hide_speaker = $this->getOption("NRHideSpeaker");
        $data_button_player_floating = $this->getOption("NRFloating");
        $data_button_player_animated = $this->getOption("NRAnimated");

        // player v3 attributes
        $data_play_button_radius_left = $this->getOption("NRPlayButtonRadiusLeft");
        $data_play_button_radius_right = $this->getOption("NRPlayButtonRadiusRight");
        $data_player_radius = $this->getOption("NRPlayerRadius");
        $data_cta_button_radius = $this->getOption("NRCTAButtonRadius");
        $data_initial_view = $this->getOption("NRInitialView");
        $data_player_mode = $this->getOption("NRPlayerMode");



        if ("true" == $this->getOption("NRShowDemoArticle")) {
          $permalink = "https://www.narando.com/demo-medley";
        }
        // Button text
        if (empty($data_button_text)) {
          $data_button_text = "Jetzt anhören";
        }
        // Button Background Color
        if (empty($data_button_background_color)) {
          $data_button_background_color = "#ec7669";
        }
        // Button Background Color Hover
        if (empty($data_button_background_color_hover)) {
          $data_button_background_color_hover = "#e74c3c";
        }
        // Button Text Color
        if (empty($data_button_text_color)) {
          $data_button_text_color = "#ffffff";
        }
        // Button Text Color Hover
        if (empty($data_button_text_color_hover)) {
          $data_button_text_color_hover = "#ffffff";
        }
        // Button Border
        if (empty($data_button_border)) {
          $data_button_border = "1px solid #ec7669";
        }
        // Button radius
        if (empty($data_button_border_radius)) {
          $data_button_border_radius = "5px";
        }
        // Button width
        if (empty($data_button_width)) {
          $data_button_width = "auto";
        }
        // Button height
        if (empty($data_button_height)) {
          $data_button_height = "40px";
        }
        // Button Text size
        if (empty($data_text_size)) {
          $data_button_text_size = "14px";
        }
        // Player Hide Speaker
        if ("true" == $this->getOption("NRHideSpeaker")) {
          $data_button_player_hide_speaker = 'false';
        } else {
          $data_button_player_hide_speaker = 'true';
        }
        // Button Autoplay on by default
        $data_button_player_autoplay = 'true';


        $data_pre_text = $this->getOption("NRPreText");
        $data_post_text = $this->getOption("NRPostText");
        // Pre Button Text
        if (!empty($data_pre_text)) {
          $data_pre_text = sprintf('<div class="narando-text-container">%s</div>', stripcslashes($data_pre_text));
        }
        // Post Button Text
        if (!empty($data_post_text)) {
          $data_post_text = sprintf('<div class="narando-text-container">%s</div>', stripcslashes($data_post_text));
        }
        $data_hide_element = ".narando-text-container";

        if ("Before Post" == $this->getOption("NRPosition")) {
          $content = sprintf('
          %s<a href="%s"
          data-narando-do="button" data-narando-icon="fa fa-volume-up"
          data-narando-title="%s"
          data-narando-bg-color="%s" data-narando-bg-color-hover="%s"
          data-narando-text-color="%s" data-narando-text-color-hover="%s"
          data-narando-border-radius="%s" data-narando-border=""
          data-narando-height="%s" data-narando-width="%s" data-narando-text-size="%s"
          data-narando-player-version="%s" data-narando-player-style="inline"
          data-narando-bg-color="%s" data-narando-player-color-background="%s"
          data-narando-player-color-background-2="%s" data-narando-player-color-controls="%s"
          data-narando-player-color-text="%s" data-narando-player-color-frame="%s"
          data-narando-player-autoplay="%s" data-narando-player-hide-listens="%s"
          data-narando-player-hide-speaker="%s" data-floating="false"
          data-floating-mobile="true" data-animated="%s"
          data-narando-play-button-radius-left="%s"
          data-narando-play-button-radius-right="%s"
          data-narando-player-radius="%s"
          data-narando-cta-button-radius="%s"
          data-narando-initial-view="%s"
          data-narando-player-mode="%s">
          </a>%s%s', $data_pre_text, $permalink, $data_button_text,
          $data_button_background_color, $data_button_background_color_hover, $data_button_text_color, $data_button_text_color_hover,
          $data_button_border_radius, $data_button_height,
          $data_button_width, $data_button_text_size, $data_button_player_version,
          $data_button_player_iframe_container_color, $data_button_player_background_color,
          $data_button_player_background_color2, $data_button_player_controls_color,
          $data_button_player_text_color, $data_button_player_frame_color,
          $data_button_player_autoplay, $data_button_player_hide_listens, $data_button_player_hide_speaker,
          $data_button_player_animated,
          $data_play_button_radius_left, $data_play_button_radius_right,
          $data_player_radius, $data_cta_button_radius, $data_initial_view,
          $data_player_mode,
          $data_post_text, $content);
          echo '<script src="//narando.com/assets/narando.button.js" type="text/javascript"></script>';
        } else if("After Post" == $this->getOption("NRPosition")) {
          $content = sprintf('
          %s%s<a href="%s"
          data-narando-do="button" data-narando-icon="fa fa-volume-up"
          data-narando-title="%s"
          data-narando-bg-color="%s" data-narando-bg-color-hover="%s"
          data-narando-text-color="%s" data-narando-text-color-hover="%s"
          data-narando-border-radius="%s" data-narando-border=""
          data-narando-height="%s" data-narando-width="%s" data-narando-text-size="%s"
          data-narando-player-version="%s" data-narando-player-style="inline"
          data-narando-bg-color="%s" data-narando-player-color-background="%s"
          data-narando-player-color-background-2="%s" data-narando-player-color-controls="%s"
          data-narando-player-color-text="%s" data-narando-player-color-frame="%s"
          data-narando-player-autoplay="%s" data-narando-player-hide-listens="%s"
          data-narando-player-hide-speaker="%s" data-floating="%s"
          data-floating-mobile="true" data-animated="%s"
          data-narando-play-button-radius-left="%s"
          data-narando-play-button-radius-right="%s"
          data-narando-player-radius="%s"
          data-narando-cta-button-radius="%s"
          data-narando-initial-view="%s"
          data-narando-player-mode="%s">
          </a>%s', $content, $data_pre_text, $permalink, $data_button_text,
          $data_button_background_color, $data_button_background_color_hover, $data_button_text_color,
          $data_button_text_color_hover, $data_button_border_radius, $data_button_height,
          $data_button_width, $data_button_text_size, $data_button_player_version,
          $data_button_player_iframe_container_color, $data_button_player_background_color,
          $data_button_player_background_color2, $data_button_player_controls_color,
          $data_button_player_text_color, $data_button_player_frame_color,
          $data_button_player_autoplay, $data_button_player_hide_listens, $data_button_player_hide_speaker,
          $data_button_player_floating, $data_button_player_animated,
          $data_play_button_radius_left, $data_play_button_radius_right,
          $data_player_radius, $data_cta_button_radius, $data_initial_view,
          $data_player_mode,
          $data_post_text);
          echo '<script src="//narando.com/assets/narando.button.js" type="text/javascript"></script>';
        }

        /*
        // generate Button and Player Code
        $content = sprintf('
        <a href="%s"
        data-narando-do="button" data-narando-icon="fa fa-volume-up"
        data-narando-title="%s" data-narando-border-radius="%s"
        data-narando-height="%s" data-narando-width="%s" data-narando-text-size="%s"
        data-narando-player-version="%s" data-narando-player-style="inline"
        data-narando-player-container-bg="%s" data-narando-player-color-background="%s"
        data-narando-player-color-background-2="%s" data-narando-player-color-controls="%s"
        data-narando-player-color-text="%s" data-narando-player-color-frame="%s"
        data-narando-player-autoplay="%s" data-narando-player-hide-listens="%s"
        data-narando-player-hide-speaker="%s" data-floating="%s"
        data-floating-mobile="true" data-animated="%s">
        </a>
        ', $permalink, $data_button_text, $data_button_border_radius, $data_button_height,
        $data_button_width, $data_button_text_size, $data_button_player_version,
        $data_button_player_iframe_container_color, $data_button_player_background_color,
        $data_button_player_background_color2, $data_button_player_controls_color,
        $data_button_player_text_color, $data_button_player_frame_color,
        $data_button_player_autoplay, $data_button_player_hide_listens, $data_button_player_hide_speaker,
        $data_button_player_floating, $data_button_player_animated);
        echo '<script src="//narando.com/assets/narando.button.js" type="text/javascript"></script>';*/
      } else {
        echo "Das narando Plugin wird ausgeblendet";
      }
    }
    return $content;
  }

  // WIRD ANGEZEIGT IM FRONTEND
  /*
  public function narandoPlayerContainer($content='') {
  global $wp_query;

  if ( is_single() ) {
  $permalink = get_permalink($wp_query->post->ID); //get post link

  $autoplay = "";
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

$data_hide_speaker = "";

if ("false" == $this->getOption("NRHideSpeaker")) {
$data_hide_speaker = 'data-hide-speaker="true"';
}

$data_floating = 'data-floating="mobile"';
if ("false" == $this->getOption("NRPlayerMobile")) {
$data_floating = "";
}

if (!empty($data_pre_text)) {
$data_pre_text = sprintf('<div class="narando-text-container" style="display:none;">%s</div>', stripcslashes($data_pre_text));
}

if (!empty($data_post_text)) {
$data_post_text = sprintf('<div class="narando-text-container" style="display:none;">%s</div>', stripcslashes($data_post_text));
}

$data_hide_element = ".narando-text-container";

if ("Before Post" == $this->getOption("NRPosition")) {
$content = sprintf('%s<div class="narando-player" data-canonical="%s" %s data-fg-color="%s" data-bg-color="%s" data-txt-color="%s" data-fr-color="%s" %s data-hide-element="%s" style="%s" %s></div>%s%s', $data_pre_text, $permalink, $data_floating, $data_fg_color, $data_bg_color, $data_txt_color, $data_fr_color, $data_hide_speaker, $data_hide_element, $data_css_style, $autoplay, $data_post_text, $content);
} else if("After Post" == $this->getOption("NRPosition")) {
$content = sprintf('%s%s<div class="narando-player" data-canonical="%s" %s data-fg-color="%s" data-bg-color="%s" data-txt-color="%s" data-fr-color="%s" %s data-hide-element="%s" style="%s" %s></div>%s', $content, $data_pre_text, $permalink, $data_floating, $data_fg_color, $data_bg_color, $data_txt_color, $data_fr_color, $data_hide_speaker, $data_hide_element, $data_css_style, $autoplay, $data_post_text);
}
}

return $content;
}
*/
public function doPlayersShortcode($attr) {

  $permalink = get_permalink($wp_query->post->ID); //get post link

  $autoplay = "";
  if ("true" == $this->getOption("NRAutoplay")) {
    $autoplay = "autoplay";
  }

  if ("true" == $this->getOption("NRShowDemoArticle")) {
    $permalink = "https://www.narando.com/demo-medley";
  }

  $data_fg_color = $this->getOption("NRColorControls");
  $data_bg_color = $this->getOption("NRColorBackground");
  $data_txt_color = $this->getOption("NRColorText");
  $data_fr_color = $this->getOption("NRColorFrame");

  foreach ($attr as $key => $value) {
    if ($this->startsWith($value, 'text-color')) $data_txt_color = str_replace('"', '', str_replace("text-color=", "", $value));
    if ($this->startsWith($value, 'background-color')) $data_bg_color = str_replace('"', '', str_replace("background-color=", "", $value));
    if ($this->startsWith($value, 'controls-color')) $data_fg_color = str_replace('"', '', str_replace("controls-color=", "", $value));
    if ($this->startsWith($value, 'frame-color')) $data_fr_color = str_replace('"', '', str_replace("frame-color=", "", $value));
  }


  $data_fg_color = str_replace("#",'',$data_fg_color);
  $data_bg_color = str_replace("#",'',$data_bg_color);
  $data_txt_color = str_replace("#",'',$data_txt_color);
  $data_fr_color = str_replace("#",'',$data_fr_color);

  $data_pre_text = $this->getOption("NRPreText");
  $data_post_text = $this->getOption("NRPostText");

  $data_css_style = $this->getOption("NRCSSStyle");

  $data_hide_speaker = "";

  if ("false" == $this->getOption("NRHideSpeaker")) {
    $data_hide_speaker = 'data-hide-speaker="true"';
  }

  $data_floating = 'data-floating="mobile"';
  if ("false" == $this->getOption("NRPlayerMobile")) {
    $data_floating = "";
  }

  // player v3 attributes
  $data_play_button_radius_left = $this->getOption("NRPlayButtonRadiusLeft");
  $data_play_button_radius_right = $this->getOption("NRPlayButtonRadiusRight");
  $data_player_radius = $this->getOption("NRPlayerRadius");
  $data_cta_button_radius = $this->getOption("NRCTAButtonRadius");
  $data_initial_view = $this->getOption("NRInitialView");
  $data_player_mode = $this->getOption("NRPlayerMode");

  if (!empty($data_pre_text)) {
    $data_pre_text = sprintf('<div class="narando-text-container" style="display:none;">%s</div>', stripcslashes($data_pre_text));
  }

  if (!empty($data_post_text)) {
    $data_post_text = sprintf('<div class="narando-text-container" style="display:none;">%s</div>', stripcslashes($data_post_text));
  }

  $data_hide_element = ".narando-text-container";

  $content = sprintf('%s
    <div
      class="narando-player"
      data-canonical="%s"
      %s
      data-fg-color="%s"
      data-bg-color="%s"
      data-txt-color="%s"
      data-fr-color="%s"
      %s
      data-hide-element="%s"
      style="%s"
      %s
      data-narando-play-button-radius-left="%s"
      data-narando-play-button-radius-right="%s"
      data-narando-player-radius="%s"
      data-narando-cta-button-radius="%s"
      data-narando-initial-view="%s"
      data-narando-player-mode="%s"
    ></div>%s%s', $data_pre_text, $permalink, $data_floating, $data_fg_color,
    $data_bg_color, $data_txt_color, $data_fr_color, $data_hide_speaker,
    $data_hide_element, $data_css_style, $autoplay,
    $data_play_button_radius_left, $data_play_button_radius_right,
    $data_player_radius, $data_cta_button_radius, $data_initial_view,
    $data_player_mode,
    $data_post_text, $content);

  return $content;
}

// Button Container
public function narandoButtonContainer($content='') {
  global $wp_query;

  if ( is_single() ) {
    $permalink = get_permalink($wp_query->post->ID); //get post link
    //$content = sprintf('%s<div class="narando-player" data-canonical="%s" %s data-fg-color="%s" data-bg-color="%s" data-txt-color="%s" data-fr-color="%s" %s data-hide-element="%s" style="%s" %s></div>%s%s', $data_pre_text, $permalink, $data_floating, $data_fg_color, $data_bg_color, $data_txt_color, $data_fr_color, $data_hide_speaker, $data_hide_element, $data_css_style, $autoplay, $data_post_text, $content);
    $content = "";
  }

  return $content;
}

}
