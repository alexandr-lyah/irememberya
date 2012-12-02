<?php /* Smarty version Smarty-3.0.7, created on 2011-05-18 22:54:38
         compiled from "tpl/connectionsBox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5517248034dd4866e5563c2-79542308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '797e7976848feedc2f520feb88ca15ebbf10732a' => 
    array (
      0 => 'tpl/connectionsBox.tpl',
      1 => 1305773449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5517248034dd4866e5563c2-79542308',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('guestview')->value){?>
<table style="border-collapse: collapse;" cellpadding="0" cellspacing="0" width="100%" class="marginTop10px">
    <tr>
        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['name'] = 'conn';
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('connections')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['max'] = (int)9;
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['total']);
?>
            <td style="width: 70px;" class="center">
                <p><img src="<?php echo $_smarty_tpl->getVariable('connections')->value[$_smarty_tpl->getVariable('smarty')->value['section']['conn']['index']]['pictureUrl'];?>
" height="60" width="60"/></p>
                <p>
                    <?php echo $_smarty_tpl->getVariable('connections')->value[$_smarty_tpl->getVariable('smarty')->value['section']['conn']['index']]['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('connections')->value[$_smarty_tpl->getVariable('smarty')->value['section']['conn']['index']]['lastname'];?>

                </p>
            </td>
        <?php endfor; endif; ?>
    </tr>
</table>

<?php }else{ ?>

<table style="border-collapse: collapse;" cellpadding="0" cellspacing="0" width="100%" class="marginTop10px">
    <tr>
        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['name'] = 'conn';
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('connections')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['max'] = (int)9;
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['conn']['total']);
?>
            <td style="width: 70px;" class="center">
                <p><a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('connections')->value[$_smarty_tpl->getVariable('smarty')->value['section']['conn']['index']]['linkedin_id'];?>
"><img
                        src="<?php echo $_smarty_tpl->getVariable('connections')->value[$_smarty_tpl->getVariable('smarty')->value['section']['conn']['index']]['pictureUrl'];?>
" height="60" width="60"/></a></p>
                <p>
                    <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('connections')->value[$_smarty_tpl->getVariable('smarty')->value['section']['conn']['index']]['linkedin_id'];?>
"><?php echo $_smarty_tpl->getVariable('connections')->value[$_smarty_tpl->getVariable('smarty')->value['section']['conn']['index']]['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('connections')->value[$_smarty_tpl->getVariable('smarty')->value['section']['conn']['index']]['lastname'];?>
</a>
                </p>
            </td>
        <?php endfor; endif; ?>
    </tr>
</table>
<?php }?>
