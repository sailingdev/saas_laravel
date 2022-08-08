<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Title-->
    <!--<title><?php _e( get_option('website_title', 'Stackposts - Social Marketing Tool') )?></title>-->
    <title>Laterly</title>
    <meta name="description" content="<?php _e( get_option('website_desc', '#1 Marketing Platform for Social Network') )?>">
    <meta name="keywords" content="<?php _e( get_option('website_keywords', 'social network, marketing, brands, businesses, agencies, individuals') )?>">
    <!-- Favicon-->
    <link rel="icon" type="image/png" href="<?php _e( get_option('website_favicon', get_url("inc/themes/backend/default/assets/img/favicon.png")) )?>" />
    <!-- Stylesheet-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php _e( get_theme_frontend_url('assets/fonts/flags/flag-icon.css')) ?>">
    <link rel="stylesheet" href="<?php _e( get_theme_frontend_url('assets/css/style.css'))?>">
    <link rel="stylesheet" href="<?php _e( get_theme_frontend_url('assets/css/header.css'))?>">
    <script type="text/javascript">
        var token = '<?php _e( $this->security->get_csrf_hash() )?>',
            PATH  = '<?php _e(PATH)?>',
            BASE  = '<?php _e(BASE)?>';
    </script>
    <?php _e( htmlspecialchars_decode(get_option('embed_code', ''), ENT_QUOTES) , false)?>
    <meta name="google-site-verification" content="CemsoY87oWl-tvUPug3f58m5po8QzQiDyMxfwEBe6Rs" />
  </head>
  <body>
    <!-- Preloader-->
    <div id="preloader">
      <div class="wimax-load"></div>
    </div>