<?php 


$path = dirname(__FILE__);

while ( !file_exists($path . '/wp-load.php') && $path !== dirname($path) ) {
    $path = dirname($path);
}

if (file_exists($path . '/wp-load.php')) {
    require_once($path . '/wp-load.php');
} else {
    exit("wp-load.php file not found.");
}

   if(isset($_POST['get_dev_access']))
   {
        $access_password = sanitize_text_field($_POST['access_password']);

        if($access_password == SKAP_DEV_PASSWORD)
        {
            $_SESSION['SKAP_DEVELOPMENT_PASSWORD'] = $access_password;
        }
        else
        {
            $_SESSION['SKAP_DEVELOPMENT_PASSWORD_ERROR'] = 1;
        }
   }

   wp_redirect(site_url());
   die();

?>