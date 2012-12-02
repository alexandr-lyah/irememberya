<?php /* Smarty version Smarty-3.0.7, created on 2011-05-29 16:54:13
         compiled from "tpl/statistics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9163040904de2b275d28530-03735149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23b07cee6396e20ac87f9a4ca70e4d7833429932' => 
    array (
      0 => 'tpl/statistics.tpl',
      1 => 1305773453,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9163040904de2b275d28530-03735149',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content center">

	<div class="leftcolum"> <!-- Start left column -->

		<div class="rounded center marginTop40px" style="width:90%;">
			<h2>Statistics</h2>

			<div class="center" >
				<a class="nav <?php if ($_smarty_tpl->getVariable('statstype')->value==1){?>navhover<?php }?>" href="statistics.php?t=1"><span class="mystatslink">My Statistics</span></a>
				<a class="nav <?php if ($_smarty_tpl->getVariable('statstype')->value==2){?>navhover<?php }?>" href="statistics.php?t=2"><span class="connstatslink">Connections Stats</span></a>
				<a class="nav <?php if ($_smarty_tpl->getVariable('statstype')->value==3){?>navhover<?php }?>" href="statistics.php?t=3"><span class="stats3slink">Top3Skills.com Stats</span></a>	
			</div>			
			<div class="clear"></div>
		</div>
		
		<?php if ($_smarty_tpl->getVariable('statstype')->value==1){?>
			<?php $_template = new Smarty_Internal_Template("statsmy.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		<?php }elseif($_smarty_tpl->getVariable('statstype')->value==2){?>
			<?php $_template = new Smarty_Internal_Template("statsconn.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		<?php }elseif($_smarty_tpl->getVariable('statstype')->value==3){?>
			<?php $_template = new Smarty_Internal_Template("statssite.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		<?php }?>		

	</div> <!-- End left column -->
	

	<div class="rightcolumn"> 	<!-- Start advertisement column -->
		<?php $_template = new Smarty_Internal_Template("adsrightcol.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
	
	
			<div class="clear"></div>

</div>
