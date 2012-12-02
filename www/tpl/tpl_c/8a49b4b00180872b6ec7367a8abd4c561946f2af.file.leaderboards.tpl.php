<?php /* Smarty version Smarty-3.0.7, created on 2011-06-03 13:30:37
         compiled from "tpl/leaderboards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17578692964de91a3ddef560-46175821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a49b4b00180872b6ec7367a8abd4c561946f2af' => 
    array (
      0 => 'tpl/leaderboards.tpl',
      1 => 1305773454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17578692964de91a3ddef560-46175821',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_counter')) include '/home/tascaco/top3skills.com/www/lib/smarty/plugins/function.counter.php';
if (!is_callable('smarty_function_cycle')) include '/home/tascaco/top3skills.com/www/lib/smarty/plugins/function.cycle.php';
?><div class="content center">

	<div class="leftcolum"> <!-- Start left column -->

		<div class="rounded center marginTop40px" style="width:90%;">

			<h2>Leaderboard</h2>
			<?php if (!$_smarty_tpl->getVariable('noresults')->value){?>
			<p class="right" style="text-align:right; margin-bottom:0px; padding-bottom:0px;" id="showform"><a href="#" onclick="$('#lbform').show(); $('#showform').hide(); return false;">
			Change Leaderboard filter<img src="web/icons/arrow_state_blue_expanded.png" alt="" width="16" height="16"  style="vertical-align: bottom;"/></a></p>
			<?php }?>
			<form id="lbform" name="lbform" class="registerform left" method="GET" action="leaderboard.php" <?php if ($_smarty_tpl->getVariable('hideform')->value){?>style="display:none;"<?php }?>>
			<input type="hidden" name="act" value="generate"/>
			<table style="line-height:50px; margin-bottom:20px;">		
				<tr><td align="right"><span class="dark font28">Skill</span></td><td><input type="text" id="skill" maxlength="25" name="skill" style="height: 33px; width:500px; margin-left:10px;" <?php if ($_smarty_tpl->getVariable('skill')->value!=''){?>value="<?php echo $_smarty_tpl->getVariable('skill')->value;?>
"<?php }?> /></td></tr>
				<tr><td align="right"><span class="dark font28">Location</span></td><td><input type="text" id="loc" maxlength="100" name="loc" style="width:500px;" <?php if ($_smarty_tpl->getVariable('loc')->value!=''){?>value="<?php echo $_smarty_tpl->getVariable('loc')->value;?>
"<?php }?> /></td></tr>
				<tr><td></td><td><label><input type = 'radio' Name ='people' value= 'all' <?php if ($_smarty_tpl->getVariable('people')->value=='all'){?>checked<?php }?>>All Users</label> <label><input type = 'radio' Name ='people' value= 'conn' <?php if ($_smarty_tpl->getVariable('people')->value=='conn'){?>checked<?php }?> >My Connections only</label></td></tr>
				<tr><td colspan="2" align="center"><div  style="margin-right:10px;">
                	                <input type="submit" value="Update Leaderboard" class="inputButton" onclick="$('.inputHint').val(''); "/>
				
				</div></td></tr>
			</table>
			</form>

			<?php if ($_smarty_tpl->getVariable('leaderboard')->value!=''){?>
				<div class="marginTop5px" id="leaderboardlist">
				<div style="padding:0px; width:100%; padding:5px 0; font-size:18px; line-height:20px;" class="references">
				<?php if (!$_smarty_tpl->getVariable('noresults')->value){?>
					<span class="italic">"<?php echo $_smarty_tpl->getVariable('msg')->value;?>
"</span> 
				<?php }else{ ?>
					<strong>No results for </strong><span class="italic">"<?php echo $_smarty_tpl->getVariable('msg')->value;?>
"</span>				
				<?php }?>
				</div> 
					<?php echo smarty_function_counter(array('start'=>0,'skip'=>1,'print'=>false),$_smarty_tpl);?>
			
					<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('leaderboard')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
?>
				            <div class="<?php echo smarty_function_cycle(array('values'=>"left lightbluebackground, left"),$_smarty_tpl);?>
" style="padding:15px;">
				                <div style="display:inline-block; vertical-align:middle; zoom: 1; *display: inline;">
				                <span style="color: #72a8db; font-size:20px; font-weight: normal;"> <?php echo smarty_function_counter(array(),$_smarty_tpl);?>
. </span>
				                		<a href="profile.php?lid=<?php echo $_smarty_tpl->tpl_vars['user']->value['linkedin_id'];?>
" ><img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['pictureUrl'];?>
" height="60" width="60"/></a> 		
				                </div>
				                <div style="display:inline-block; vertical-align:middle; margin-left:5px; line-height:25px; width:400px; zoom: 1; *display: inline;" >
										<a href="profile.php?lid=<?php echo $_smarty_tpl->tpl_vars['user']->value['linkedin_id'];?>
" style="color: #333; font-weight:bold; font-size:14px;"><span><?php echo $_smarty_tpl->tpl_vars['user']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['lastname'];?>
</span></a>
										<br /> 
										<a href="<?php echo $_smarty_tpl->tpl_vars['user']->value['publicProfileUrl'];?>
"><img alt="" src="web/icons/l_icon.png" title="LinkedIn Profile" style="vertical-align:text-bottom;"/></a>
										<span style="color: #5c5c5c; font-size:12px; font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['user']->value['headline'];?>
</span>
										<br />
										<span style="color: #c5c5c5; font-size:12px;"><?php echo $_smarty_tpl->tpl_vars['user']->value['location'];?>
</span>										
				                </div>
				                <div class="references referencesCount">
				                <a href="profile.php?lid=<?php echo $_smarty_tpl->tpl_vars['user']->value['linkedin_id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['user']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['lastname'];?>
 Profile">
				                    <span class="referencesCountTitle"><?php echo $_smarty_tpl->tpl_vars['user']->value['ref'];?>
</span>
				                    <br />
				                    <span class="referencesCountText">Skill<?php if ($_smarty_tpl->tpl_vars['user']->value['ref']>1){?>s<?php }?><br />received</span>
				                </a>
				                </div>
				            </div>
		            <?php }} ?>
				</div>
			<?php }?>
		</div>
		
	</div> <!-- End left column -->
	

	<div class="rightcolumn"> 	<!-- Start advertisement column -->	
		<?php $_template = new Smarty_Internal_Template("adsrightcol.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>	
	<div class="clear"></div>

</div>




<script type="text/javascript">
$(document).ready(function () {
    $("#skill").autocomplete("skills.php", {
        width: 510,
        max:15,
        autoFill: false,
        selectFirst: false
    });

    $('#skill').tbHinter({text: 'e.g. Java, Marketing', classHint: 'inputHint'});

    $("#loc").autocomplete("cities.php", {
        width: 510,
        max:15,
        autoFill: false,
        selectFirst: false
    });
    
});
</script>
