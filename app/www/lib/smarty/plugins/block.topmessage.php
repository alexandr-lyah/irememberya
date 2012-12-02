<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     block.topmessage.php
 * Type:     block
 * Name:     topmessage
 * Purpose:  shows message in toaster type of message (JS)
 * -------------------------------------------------------------
 */
function smarty_block_topmessage($params, $content, $template, &$repeat) {
    // only output on the closing tag
    if (!$repeat) {

        $type = $params['type'];
        if (empty($type)) {
            $type = 'error';
        }
        if ($type == "ok"){
            $type = "sucess";
        }

        return '
        <div id="topmessage" style="display:none;">
            ' . $content . '
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#topmessage").showTopbarMessage({type: \'' . $type . '\'});
            });
        </script>
        ';
    }
}

?>
