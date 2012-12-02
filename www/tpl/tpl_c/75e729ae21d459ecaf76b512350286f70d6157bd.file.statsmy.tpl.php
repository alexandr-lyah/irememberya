<?php /* Smarty version Smarty-3.0.7, created on 2011-05-29 16:54:13
         compiled from "tpl/statsmy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19720017084de2b275e5ff97-06603892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75e729ae21d459ecaf76b512350286f70d6157bd' => 
    array (
      0 => 'tpl/statsmy.tpl',
      1 => 1305773446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19720017084de2b275e5ff97-06603892',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	<div class="rounded center marginTop40px" style="width:90%; padding:20px; text-align:left;">
		
		<h3 class="marginTop10px italic">Did you know that...</h3>
				
	    <p style="line-height:35px;" class="marginTop10px">
			You registered <strong class="blue"><?php echo $_smarty_tpl->getVariable('registertime')->value;?>
</strong>.
			You described <strong class="blue"><?php echo $_smarty_tpl->getVariable('numconnectionsskillsgiven')->value;?>
</strong> of your <strong class="blue"><?php echo $_smarty_tpl->getVariable('numconns')->value;?>
</strong> connections with
			<strong class="blue"><?php echo $_smarty_tpl->getVariable('numskillsgiven')->value;?>
</strong> Skills and
			<strong class="blue"><?php echo $_smarty_tpl->getVariable('numconnectionsskillsreceived')->value;?>
</strong> of your connections described you with <strong class="blue"><?php echo $_smarty_tpl->getVariable('numskillsreceived')->value;?>
</strong> Skills.
			<br>
			<?php if ($_smarty_tpl->getVariable('user')->value['skill1']==''){?>
			You didn't defined <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
">the Top 3 Skills that best describe you</a>.
			<?php }else{ ?>
			In your opinion, the Top 3 Skills that best describe you are <strong class="blue"><?php echo $_smarty_tpl->getVariable('user')->value['skill1'];?>
</strong>, <strong class="blue"><?php echo $_smarty_tpl->getVariable('user')->value['skill2'];?>
</strong> and <strong class="blue"><?php echo $_smarty_tpl->getVariable('user')->value['skill3'];?>
</strong>.
			<?php }?>
		</p>
		
	</div>
	
		<div class="rounded center marginTop40px" style="width:90%;">
			<h3><?php echo $_smarty_tpl->getVariable('LANG')->value['myTopSkillsByConnections'];?>
</h3>
			
			<?php if ($_smarty_tpl->getVariable('myTopSkills')->value!=''){?>
				<?php $_template = new Smarty_Internal_Template("chart.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>				
			<?php }else{ ?>
				<img src="tpl/img/noskills4.png"/>
				<a href="share.php" class="inputButton" style="font-size: 14px;">Share your link and ask your connections to write your Top 3 Skills</a>
			<?php }?>					
			
			<div class="chartdescription">				
				<a href="#" class="charthelp" onclick="$(this).next().toggle(); return false;">Chart Description</a>
				<p>
					Each bar on this chart represents the number of times (references) you received a certain Skill from your connections. <br /> 
					For example, if you received the Skill "Entrepreneur" 7 times, you will see a bar with the value 7.
					<br /> 
					The chart is limited to 10 Skills. 
				</p>
			</div>				
		</div>
				
		<div class="rounded center marginTop40px" style="width:90%;">
			<h3> <?php echo $_smarty_tpl->getVariable('LANG')->value['connectionsSkillsByMe'];?>
</h3>

			<?php if ($_smarty_tpl->getVariable('myTopSkills2')->value!=''){?>
				<?php $_template = new Smarty_Internal_Template("chart2.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>				
			<?php }else{ ?>
				<?php if ($_smarty_tpl->getVariable('randomFriend')->value==''){?>
					<img src="tpl/img/noskills_profile.png"/>
				<?php }else{ ?>
					<a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('randomFriend')->value;?>
"><img src="tpl/img/noskills_profile.png"></a>
					<a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('randomFriend')->value;?>
" class="inputButton"><?php echo $_smarty_tpl->getVariable('LANG')->value['noConnectionSkillsDefined'];?>
</a>
				<?php }?>
			<?php }?>					
			

			
			<div class="chartdescription">
				<a href="#" class="charthelp" onclick="$(this).next().toggle(); return false;">Chart Description</a>
				<p>
					Each bar on this chart represents the number of times (references) you gave a certain Skill to your connections. <br /> 
					For example, if you described your connections with the Skill "Entrepreneur" 7 times, you will see a bar with the value 7.
					<br /> 
					The chart is limited to 10 Skills. 
				</p> 
			</div>		
		</div>
		
		<div class="rounded center marginTop40px" style="width:90%;">
			<h3>Skills shared with my connections</h3>
			<p style="font-size:10px;">Clicking on a node moves the tree and centers that node.</p>

			<?php if ($_smarty_tpl->getVariable('treeSkills')->value!=''){?>
				<div id="infovis"></div>
				<?php $_template = new Smarty_Internal_Template("treechart.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
				<script type="text/javascript">
					init();
				</script>			
			<?php }else{ ?>
				<img src="tpl/img/unlockgraph1.png"/>
			<?php }?>

			<div class="chartdescription">
				<a href="#" class="charthelp" onclick="$(this).next().toggle(); return false;">Graph Description</a>
				<p>
					This graph represents your Top Skills as well as the connections that share the same Skills with you.  
					<br />
					For example, if you and one of your connections
					share the skill "Team Work" you will see
					that both of you are connected through that skill.					    					
					<br /> 
					The graph is limited to 10 Skills. 
				</p> 
			</div>		
		
		
		</div>


	<div class="rounded center marginTop40px" style="width:90%; padding:20px; text-align:left;">
		<h3 class="center">My Top Skills vs Connections Top Skills</h3>
		
			<?php if ($_smarty_tpl->getVariable('donutsinside')->value!=''&&$_smarty_tpl->getVariable('donutsoutside')->value!=''){?>
				<?php $_template = new Smarty_Internal_Template("donutschart.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>				
			<?php }else{ ?>
				<img src="tpl/img/chartvsnoskills.png"/>
			<?php }?>
									
			<div class="chartdescription">
				<a href="#" class="charthelp" onclick="$(this).next().toggle(); return false;">Chart Description</a>
				<p>
					This chart allows you to compare your Top Skills with your connections Top Skills.
					The inside donut represents your connections Top Skills and the outside donut represents your Top Skills. 
					<br /> 
					The chart is limited to 10 Skills. 
				</p> 
			</div>		
		
	</div>
		
		 