<?php 
/*
Plugin Name: SiteLock Access Protection
Plugin URI: https://your-plugin-uri.com
Description: Enhance site security with access protection features provided by SiteLock.
Version: 1.0.0
Author: Farid Mia
Author URI: https://your-author-uri.com
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: sitelock-access-protection
*/

/**
 * Add settings menu for Skap plugin.
 */
function skap_add_settings_menu() {
    add_menu_page(
        'Skap Settings',
        'Skap Settings',
        'manage_options',
        'skap-settings',
        'skap_settings_page'
    );
}
add_action('admin_menu', 'skap_add_settings_menu');

// Settings page content
function skap_settings_page() {
    ?>
    <div class="wrap">
        <h1>Skap Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('skap-settings-group');
            do_settings_sections('skap-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register and add settings
function skap_register_settings() {
    register_setting('skap-settings-group', 'skap_dev_password');

    add_settings_section(
        'skap-settings-section',
        'Development Settings',
        'skap_settings_section_callback',
        'skap-settings'
    );

    add_settings_field(
        'skap-dev-password',
        'Development Password',
        'skap_dev_password_callback',
        'skap-settings',
        'skap-settings-section'
    );
}
add_action('admin_init', 'skap_register_settings');

// Settings section callback
function skap_settings_section_callback() {
    
}

// Settings field callback
function skap_dev_password_callback() {
    $value = get_option('skap_dev_password', '');
    ?>
    <input type="password" name="skap_dev_password" value="<?php echo esc_attr($value); ?>" />
    <?php
}

// Define constant
define('SKAP_DEV_PASSWORD', get_option('skap_dev_password', ''));

function skap_development_session()
{


    if(!isset($_SESSION)){ session_start(); }
}
add_action('init','skap_development_session',0);

function skap_development_staging_form()
{
    if(isset($_SESSION['SKAP_DEVELOPMENT_PASSWORD']) && $_SESSION['SKAP_DEVELOPMENT_PASSWORD'] == SKAP_DEV_PASSWORD)
    {

    }
    else
    {
        include(plugin_dir_path(__FILE__).'inc/form.php');
        die();
    }
}
add_action('wp_head','skap_development_staging_form',0);

?>