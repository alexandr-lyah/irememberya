<?php /* Smarty version Smarty-3.0.7, created on 2011-05-18 22:54:08
         compiled from "tpl/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9777532904dd48650bdf8c2-11013302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '292502608d754e829d72c941e61069d9154610f1' => 
    array (
      0 => 'tpl/profile.tpl',
      1 => 1305773446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9777532904dd48650bdf8c2-11013302',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content center">


	<div class="leftcolum"> <!-- Start left column -->

    <!--
	<div class="rounded center marginTop40px" style="width:90%;">
	<p class="bigerror">You need to login before proceeding.</p>
	<a href="register.php"><img alt="banner" src="tpl/img/loginbutton.png" class="center marginTop40px" /></a>
	</div>
	-->

	<div class="rounded center marginTop40px" style="width:90%; ">

		<?php $_template = new Smarty_Internal_Template("profilebox.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

		<?php if ($_smarty_tpl->getVariable('isfriend')->value){?>
			<?php if (!$_smarty_tpl->getVariable('sentskills')->value){?>
				<div class="errorbox">You didn't write any skills on <?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
's profile. <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
"><strong>Do it now!</strong></a></div>
			<?php }elseif($_smarty_tpl->getVariable('confirminvitation')->value){?>
				<div class="sucessmessage">Invitation sent.</div>	
			<?php }elseif($_smarty_tpl->getVariable('myTopSkills')->value!=''&&$_smarty_tpl->getVariable('showinvite')->value){?>
				<div class="errorbox"><?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
 is not using Top3Skills.com yet. <a href="profile.php?lid=<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
&inv=t"><strong>Send invite now!</strong></a></div>
			<?php }?>		     
		<?php }?>	           

	</div>
	
	    <div class="rounded center marginTop20px" style="width:90%;">
            <h3> <?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
's Top Skills </h3>
            
			<?php if ($_smarty_tpl->getVariable('myTopSkills')->value!=''){?>
				<?php $_template = new Smarty_Internal_Template("chart.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
				<?php $_template = new Smarty_Internal_Template("skillsreceived.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
			<?php }else{ ?>
				<?php if ($_smarty_tpl->getVariable('isfriend')->value){?>
				<a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
"><img src="tpl/img/noskills_profile.png"/></a>
				<p class="center">
				    <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
" class="inputButton">Add <?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
's Top 3 Skills</a>
				</p>
				<?php }else{ ?>
					<img src="tpl/img/noskills5.png">
				<?php }?>
			<?php }?>
           	
       </div>

	</div> <!-- End left column -->
	

	<div class="rightcolumn"> 	<!-- Start advertisement column -->
		<?php $_template = new Smarty_Internal_Template("adsrightcol.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
	
	
			<div class="clear"></div>

</div>
