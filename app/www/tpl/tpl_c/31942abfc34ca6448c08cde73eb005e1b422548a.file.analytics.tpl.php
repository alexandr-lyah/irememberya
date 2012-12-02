<?php /* Smarty version Smarty-3.0.7, created on 2012-12-02 02:32:03
         compiled from "tpl/analytics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119308967450baaf93be9d59-72005342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31942abfc34ca6448c08cde73eb005e1b422548a' => 
    array (
      0 => 'tpl/analytics.tpl',
      1 => 1305773443,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119308967450baaf93be9d59-72005342',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('production')->value){?>
    

        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-118494-8']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                        '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>
    
<?php }?>
