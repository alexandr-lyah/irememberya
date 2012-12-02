<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     block.auth.php
 * Type:     block
 * Name:     auth
 * Purpose:  only show content if authorized
 * -------------------------------------------------------------
 */
function smarty_block_auth($params, $content, $template, &$repeat)
{
    // only output on the closing tag
    if(!$repeat){
        if (isLoggedIn()) {
            return $content;
        }
        else if (!empty($params['default'])){
            return $params['default'];
        }
    }
}
?>
