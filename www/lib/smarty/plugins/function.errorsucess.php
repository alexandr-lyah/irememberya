<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.errorsucess.php
 * Type:     function
 * Name:     errorsucess
 * Purpose:
 * -------------------------------------------------------------
 */
function smarty_function_errorsucess($params, $template) {
    $error = $template->getTemplateVars('error');

    if (!empty($error)) {
        return '
        <div id="topmessage" style="display:none;">
            ' . $error . '
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#topmessage").showTopbarMessage({type: \'error\'});
            });
        </script>
        ';
    }

    $sucess = $template->getTemplateVars('sucess');
	$longsucess = $template->getTemplateVars('longsucess');
	
	$timer = 1000;
	 
	if($longsucess){
		$timer = 3000;
	}		
	
    if (!empty($sucess)) {
        return '
        <div id="topmessage" style="display:none;">
            ' . $sucess . '
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#topmessage").showTopbarMessage({type: \'sucess\', close: ' . $timer . '});
            });
        </script>
        ';
    }

    return '';
}

?>
