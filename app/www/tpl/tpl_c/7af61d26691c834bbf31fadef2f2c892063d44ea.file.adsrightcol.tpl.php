<?php /* Smarty version Smarty-3.0.7, created on 2011-05-18 22:54:08
         compiled from "tpl/adsrightcol.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17343891464dd48650dbcef3-03388733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7af61d26691c834bbf31fadef2f2c892063d44ea' => 
    array (
      0 => 'tpl/adsrightcol.tpl',
      1 => 1305773445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17343891464dd48650dbcef3-03388733',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_adsense')) include '/home/tascaco/top3skills.com/www/lib/smarty/plugins/function.adsense.php';
?><div class="boxNormal">

    <h4>Advertisement</h4>
    <br><?php echo smarty_function_adsense(array('id'=>8572081511,'w'=>160,'h'=>600),$_smarty_tpl);?>


    <?php if ($_smarty_tpl->getVariable('currentPage')->value!=$_smarty_tpl->getVariable('PAGES')->value['ADD_SKILLS']&&$_smarty_tpl->getVariable('currentPage')->value!=$_smarty_tpl->getVariable('PAGES')->value['PUBLIC_PROFILE']){?>
    <br><br>
    <?php echo smarty_function_adsense(array('id'=>8572081511,'w'=>160,'h'=>600),$_smarty_tpl);?>

    <?php }?>

</div>