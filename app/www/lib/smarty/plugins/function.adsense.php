<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.adsense.php
 * Type:     function
 * Name:     shows adsense publicity
 * Purpose:
 * -------------------------------------------------------------
 */
function smarty_function_adsense($params, $template) {
    global $production;

    if (1) {
        $adId = $params['id'];
        $width = $params['w'];
        $height = $params['h'];

        $html = '<script type="text/javascript"><!--
            google_ad_client = "pub-6868966921230764";
            google_ad_slot = "' . $adId . '";
            google_ad_width = ' . $width . ';
            google_ad_height = ' . $height . ';
            //-->
            </script>
            <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script>';
        return $html;
    }
    return;
}

?>

<?php

?>