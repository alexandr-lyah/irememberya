<?php /* Smarty version Smarty-3.0.7, created on 2011-05-18 22:54:35
         compiled from "tpl/skillsgiven.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11949755474dd4866ba95de4-44428673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd83ab1c4fda22b5a1df788c9d539a1af5c3a2fa5' => 
    array (
      0 => 'tpl/skillsgiven.tpl',
      1 => 1305773451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11949755474dd4866ba95de4-44428673',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include '/home/tascaco/top3skills.com/www/lib/smarty/plugins/function.cycle.php';
?><div class="rounded center marginTop40px" style="width:90%;">
    <h3><?php echo $_smarty_tpl->getVariable('LANG')->value['connections3SkillsByMe'];?>
</h3>

<?php if ($_smarty_tpl->getVariable('sentSkills')->value!=''){?>

    <div style="border-top:1px solid #E8E8E8; border-bottom:1px solid #E8E8E8;" class="marginTop20px">
        <?php  $_smarty_tpl->tpl_vars['conn'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sentSkills')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['conn']->key => $_smarty_tpl->tpl_vars['conn']->value){
?>
            <?php $_smarty_tpl->tpl_vars["extraClass"] = new Smarty_variable('', null, null);?>
            <?php if (((mb_detect_encoding($_smarty_tpl->tpl_vars['conn']->value['skill1'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? preg_match_all('#[^\s\pZ]#u', $_smarty_tpl->tpl_vars['conn']->value['skill1'], $tmp) : preg_match_all('/[^\s]/',$_smarty_tpl->tpl_vars['conn']->value['skill1'], $tmp))+((mb_detect_encoding($_smarty_tpl->tpl_vars['conn']->value['skill2'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? preg_match_all('#[^\s\pZ]#u', $_smarty_tpl->tpl_vars['conn']->value['skill2'], $tmp) : preg_match_all('/[^\s]/',$_smarty_tpl->tpl_vars['conn']->value['skill2'], $tmp))+((mb_detect_encoding($_smarty_tpl->tpl_vars['conn']->value['skill3'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? preg_match_all('#[^\s\pZ]#u', $_smarty_tpl->tpl_vars['conn']->value['skill3'], $tmp) : preg_match_all('/[^\s]/',$_smarty_tpl->tpl_vars['conn']->value['skill3'], $tmp))>50){?>
            <?php $_smarty_tpl->tpl_vars["extraClass"] = new Smarty_variable("referencesSkillsSmall", null, null);?>
            <?php }?>
            <div class="<?php echo smarty_function_cycle(array('values'=>"boxSmallProfileSkills,lightbluebackground boxSmallProfileSkills"),$_smarty_tpl);?>
">
                <div class="photo">
                    <a href="profile.php?lid=<?php echo $_smarty_tpl->tpl_vars['conn']->value['linkedin_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['conn']->value['pictureUrl'];?>
" height="60" width="60"/></a>
                </div>
                <div class="content">
                    <p>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conn']->value['publicProfileUrl'];?>
"><img alt="" src="web/icons/l_icon.png"
                                                                title="LinkedIn Profile"
                                                                style="vertical-align:text-bottom;"></a>
                        <a href="profile.php?lid=<?php echo $_smarty_tpl->tpl_vars['conn']->value['linkedin_id'];?>
"
                           class="namelink"><?php echo $_smarty_tpl->tpl_vars['conn']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['conn']->value['lastname'];?>
</a>
                    </p>
                    <p >
                        <a class="referencesSkills <?php echo $_smarty_tpl->getVariable('extraClass')->value;?>
" href="leaderboard/all/<?php echo $_smarty_tpl->tpl_vars['conn']->value['skill1'];?>
"><?php echo $_smarty_tpl->tpl_vars['conn']->value['skill1'];?>
</a>
                        <a class="referencesSkills <?php echo $_smarty_tpl->getVariable('extraClass')->value;?>
" href="leaderboard/all/<?php echo $_smarty_tpl->tpl_vars['conn']->value['skill2'];?>
"><?php echo $_smarty_tpl->tpl_vars['conn']->value['skill2'];?>
</a>
                        <a class="referencesSkills <?php echo $_smarty_tpl->getVariable('extraClass')->value;?>
" href="leaderboard/all/<?php echo $_smarty_tpl->tpl_vars['conn']->value['skill3'];?>
"><?php echo $_smarty_tpl->tpl_vars['conn']->value['skill3'];?>
</a>
                    </p>
                </div>
                <div class="floatright"><a href="addskills.php?lid=<?php echo $_smarty_tpl->tpl_vars['conn']->value['linkedin_id'];?>
" class="smallButton">Edit</a></div>
            </div>
            <div class="clear"></div>
        <?php }} ?>
    </div>
    <?php }else{ ?>
    <?php if ($_smarty_tpl->getVariable('firstfriend')->value!=''&&$_smarty_tpl->getVariable('firstfriend')->value['linkedin_id']!=''){?>
        <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('firstfriend')->value['linkedin_id'];?>
"><img src="tpl/img/noskills_profile.png"></a>
        <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('firstfriend')->value['linkedin_id'];?>
" class="inputButton"><?php echo $_smarty_tpl->getVariable('LANG')->value['noConnectionSkillsDefined'];?>
</a>
        <?php }else{ ?>
        <img src="tpl/img/noskills_profile.png"/>
    <?php }?>
<?php }?>
</div>