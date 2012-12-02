<?php /* Smarty version Smarty-3.0.7, created on 2011-05-18 22:54:08
         compiled from "tpl/profilebox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9179428764dd48650c858c1-58282408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02ac63c4812d10cbd8d0f89800b01d8362e49422' => 
    array (
      0 => 'tpl/profilebox.tpl',
      1 => 1305773452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9179428764dd48650c858c1-58282408',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="lightbluebackground boxProfile">
    <div class="photo">

    <?php if (!$_smarty_tpl->getVariable('guestview')->value){?>
        <a href="profile.php?lid=<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('user')->value['pictureUrl'];?>
" height="80" width="80"></a>
        <?php }else{ ?>
        <img src="<?php echo $_smarty_tpl->getVariable('user')->value['pictureUrl'];?>
" height="80" width="80">
    <?php }?>

    </div>
    <div class="content">
    <?php if (!$_smarty_tpl->getVariable('guestview')->value){?>
        <p class="title"><a
                href="profile.php?lid=<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
"><?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('user')->value['lastname'];?>
</a></p>
        <?php }else{ ?>
        <p class="title"><?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('user')->value['lastname'];?>
</p>
    <?php }?>
        <p class="subtitle">
            <a href="<?php echo $_smarty_tpl->getVariable('user')->value['publicProfileUrl'];?>
"><img alt="" src="web/icons/l_icon.png" title="LinkedIn Profile"
                                                    style="vertical-align:text-bottom;"></a>
            <?php echo $_smarty_tpl->getVariable('user')->value['headline'];?>

        </p>

        <p class="subsubtitle">
            <?php echo $_smarty_tpl->getVariable('user')->value['location'];?>

        </p>
    </div>
</div>