<?php /* Smarty version Smarty-3.0.7, created on 2011-05-18 22:54:08
         compiled from "tpl/skillsreceived.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3785752204dd48650d228d5-93565772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bf43733e801b0f30db5adc7ac9ca797bbd94c6e' => 
    array (
      0 => 'tpl/skillsreceived.tpl',
      1 => 1305773452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3785752204dd48650d228d5-93565772',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include '/home/tascaco/top3skills.com/www/lib/smarty/plugins/function.cycle.php';
?><div style="border-top:1px solid #E8E8E8; border-bottom:1px solid #E8E8E8;" class="marginTop20px">
<?php  $_smarty_tpl->tpl_vars['conn'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('receivedSkills')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['conn']->key => $_smarty_tpl->tpl_vars['conn']->value){
?>
    <div class="<?php echo smarty_function_cycle(array('values'=>"boxSmallProfileSkills,lightbluebackground boxSmallProfileSkills"),$_smarty_tpl);?>
">
        <div class="photo">
            <a href="profile.php?lid=<?php echo $_smarty_tpl->tpl_vars['conn']->value['linkedin_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['conn']->value['pictureUrl'];?>
" height="60" width="60"/> </a>
        </div>
        <div class="content">
            <p>
                <a href="<?php echo $_smarty_tpl->tpl_vars['conn']->value['publicProfileUrl'];?>
"><img alt="" src="web/icons/l_icon.png" title="LinkedIn Profile"
                                                        style="vertical-align:text-bottom;"></a>
                <a href="profile.php?lid=<?php echo $_smarty_tpl->tpl_vars['conn']->value['linkedin_id'];?>
" class="namelink"><?php echo $_smarty_tpl->tpl_vars['conn']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['conn']->value['lastname'];?>
</a>
                wrote:
            </p>

            <p>
                <a class="referencesSkills" href="leaderboard/all/<?php echo $_smarty_tpl->tpl_vars['conn']->value['skill1'];?>
"><?php echo $_smarty_tpl->tpl_vars['conn']->value['skill1'];?>
</a>
                <a class="referencesSkills" href="leaderboard/all/<?php echo $_smarty_tpl->tpl_vars['conn']->value['skill2'];?>
"><?php echo $_smarty_tpl->tpl_vars['conn']->value['skill2'];?>
</a>
                <a class="referencesSkills" href="leaderboard/all/<?php echo $_smarty_tpl->tpl_vars['conn']->value['skill3'];?>
"><?php echo $_smarty_tpl->tpl_vars['conn']->value['skill3'];?>
</a>
            </p>
        </div>
        <?php if ($_smarty_tpl->getVariable('writeback')->value){?>
            <div class="clear"></div>
            <div class="floatright"><a href="addskills.php?lid=<?php echo $_smarty_tpl->tpl_vars['conn']->value['linkedin_id'];?>
" class="smallButton">Write Back</a>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->getVariable('myId')->value==$_smarty_tpl->tpl_vars['conn']->value['linkedin_id']){?>
            <div class="clear"></div>
            <div class="floatright"><a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
" class="smallButton">Edit</a>
            </div>
        <?php }?>
    </div>
<?php }} ?>
</div>