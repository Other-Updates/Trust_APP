<?php
$theme_path = $this->config->item('theme_locations') . 'esms';
$is_logo_allowed = $this->config->item('is_logo_allowed');
$is_favicon_allowed = $this->config->item('is_favicon_allowed');
?>
<!DOCTYPE html>

<html lang="en" >
    <!-- begin::Head -->




    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta charset="utf-8"/>

        <title>F2F Trust</title>
        <meta name="description" content="Login page example">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->


        <!--begin::Page Custom Styles(used by this page) -->
        <link href="<?php echo $theme_path; ?>/assets/css/pages/login/login-3.css" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles -->

        <!--begin::Global Theme Styles(used by all pages) -->
        <link href="<?php echo $theme_path; ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $theme_path; ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles -->

        <link href="<?php echo $theme_path; ?>/assets/css/custom_style.css" rel="stylesheet" type="text/css" />

        <!--begin::Layout Skins(used by all pages) -->
        <!--end::Layout Skins -->

        <link rel="shortcut icon" href="<?php echo $theme_path; ?>/assets/media/logos/favicon.png" />
        <script type="text/javascript" src="<?php echo $theme_path; ?>/assets/js/jquery-1.8.2.js"></script>
        <script type="text/javascript" src="<?php echo $theme_path; ?>/assets/js/jquery-ui-1.10.3.min.js"></script>

        <script>
            var BASE_URL = "<?php echo base_url(); ?>";
        </script>
		<style>
		.kt-login.kt-login--v3 .kt-login__wrapper .kt-login__container{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);}
		.kt-grid--hor {background-size: cover;}
		</style>
    </head>
    <!-- end::Head -->

    <!-- begin::Body -->
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading"  >


        <!-- begin:: Page -->
        <?php echo $content; ?>

        <!-- end:: Page -->


        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors": {"state": {"brand": "#22b9ff", "light": "#ffffff", "dark": "#282a3c", "primary": "#5867dd", "success": "#34bfa3", "info": "#36a3f7", "warning": "#ffb822", "danger": "#fd3995"}, "base": {"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"], "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]}}};
        </script>
        <!-- end::Global Config -->

        <!--begin::Global Theme Bundle(used by all pages) -->
        <script src="<?php echo $theme_path; ?>/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
        <script src="<?php echo $theme_path; ?>/assets/js/scripts.bundle.js" type="text/javascript"></script>
        <!--end::Global Theme Bundle -->


        <!--begin::Page Scripts(used by this page) -->
        <script src="<?php echo $theme_path; ?>/assets/js/pages/custom/login/login-general.js" type="text/javascript"></script>
        <!--end::Page Scripts -->
    </body>
    <!-- end::Body -->


</html>
