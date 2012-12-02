<?php /* Smarty version Smarty-3.0.7, created on 2012-12-02 02:32:03
         compiled from "tpl/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91271490850baaf93c8bd80-29343585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24f39ca70877ecbcdc81c85002070c18d5f0ad13' => 
    array (
      0 => 'tpl/register.tpl',
      1 => 1305773444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91271490850baaf93c8bd80-29343585',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content center">

<h1>Registration Form</h1>

<div class="rounded  center" style="width:90%;">

	<div style="float:left; width:150px;" class="marginTop20px floatleft">
	<img src="<?php echo $_SESSION['user']['pictureUrl'];?>
" />
	<br />
	<a href="<?php echo $_smarty_tpl->getVariable('user')->value['publicProfileUrl'];?>
"><img src="tpl/img/linkedin-large.png"/></a>
	</div>
	
	<div style="float:left; width:650px;">
		
		<form id="registerform" name="registerform" class="registerform left" method="POST" action="register.php?act=add">
		
		<table style="line-height:50px;">
		
		<tr><td align="right"><span class="dark font28">Name </span></td><td> <span class="undark font28" style="margin-left:10px;"> <?php echo $_SESSION['user']['firstname'];?>
 <?php echo $_SESSION['user']['lastname'];?>
</span></td></tr>
		<tr><td align="right"><span class="dark font28">Location </span></td><td> <span class="undark font28" style="margin-left:10px;"> <?php echo $_SESSION['user']['location'];?>
</span></td></tr>
		<tr>
		<td align="right">
		<span class="dark font28">Email</span></td>
		<td style="line-height:28px;">
		    <input type="text" id="email" name="email" maxlength="128" style="width:500px; margin-bottom: 0px;" <?php if ($_smarty_tpl->getVariable('email')->value!=''){?>value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
"<?php }?> />
		    <p style="margin-left: 10px; font-size: 12px; padding: 0;">Your email will not be publicly displayed</p>
		</td>
		</tr>
		<tr><td align="right">
			<span class="dark font28">Username</span></td>
		<td style="line-height:28px;">
		    <input type="text" id="username" maxlength="64" name="username" style="width:500px; margin-bottom:0px;" <?php if ($_smarty_tpl->getVariable('username')->value!=''){?>value="<?php echo $_smarty_tpl->getVariable('username')->value;?>
"<?php }?> />
	        <p style="margin-left:10px; font-size: 12px;">Your public page: <span style="color:#2074c0;" id="userurl">http://top3skills.com/<?php if ($_smarty_tpl->getVariable('username')->value!=''){?><?php echo $_smarty_tpl->getVariable('username')->value;?>
<?php }else{ ?>username<?php }?></span></p>
		</td></tr>
		<tr><td colspan="2" align="right"><div class="marginTop20px" style="margin-right:10px;">
		<input type="submit" value="Continue" class="inputButton"/></div></td></tr>
		</table>
		<!-- 
			Send to CSS
 		-->
	</div>
 	<div class="clear"></div>
 	
 	<div style="text-align:left; width:93%"><label><input type="checkbox" name="share" id="share" checked="checked" /><span class="font12"> Post "<?php echo $_SESSION['user']['firstname'];?>
  started using Top3Skills.com" on LinkedIn Wall </span></label></div>


		</form>
	
	<script type="text/javascript">
        
		$('#username').keyup(function() {
			$('#userurl').html('http://top3skills.com/' + $('#username').val());
		});

		 $(document).ready(function () {
			 $("#email").focus();
		  });
        
	</script>
	
</div>

</div>