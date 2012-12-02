<div class="content center">

<h1>Registration Form</h1>

<div class="rounded  center" style="width:90%;">

	<div style="float:left; width:150px;" class="marginTop20px floatleft">
	<img src="{$smarty.session.user.pictureUrl}" />
	<br />
	<a href="{$user.publicProfileUrl}"><img src="tpl/img/linkedin-large.png"/></a>
	</div>
	
	<div style="float:left; width:650px;">
		
		<form id="registerform" name="registerform" class="registerform left" method="POST" action="register.php?act=add">
		
		<table style="line-height:50px;">
		
		<tr><td align="right"><span class="dark font28">Name </span></td><td> <span class="undark font28" style="margin-left:10px;"> {$smarty.session.user.firstname} {$smarty.session.user.lastname}</span></td></tr>
		<tr><td align="right"><span class="dark font28">Location </span></td><td> <span class="undark font28" style="margin-left:10px;"> {$smarty.session.user.location}</span></td></tr>
		<tr>
		<td align="right">
		<span class="dark font28">Email</span></td>
		<td style="line-height:28px;">
		    <input type="text" id="email" name="email" maxlength="128" style="width:500px; margin-bottom: 0px;" {if $email != ''}value="{$email}"{/if} />
		    <p style="margin-left: 10px; font-size: 12px; padding: 0;">Your email will not be publicly displayed</p>
		</td>
		</tr>
		<tr><td align="right">
			<span class="dark font28">Username</span></td>
		<td style="line-height:28px;">
		    <input type="text" id="username" maxlength="64" name="username" style="width:500px; margin-bottom:0px;" {if $username != ''}value="{$username}"{/if} />
	        <p style="margin-left:10px; font-size: 12px;">Your public page: <span style="color:#2074c0;" id="userurl">http://top3skills.com/{if $username != ''}{$username}{else}username{/if}</span></p>
		</td></tr>
		<tr><td colspan="2" align="right"><div class="marginTop20px" style="margin-right:10px;">
		<input type="submit" value="Continue" class="inputButton"/></div></td></tr>
		</table>
		<!-- 
			Send to CSS
 		-->
	</div>
 	<div class="clear"></div>
 	
 	<div style="text-align:left; width:93%"><label><input type="checkbox" name="share" id="share" checked="checked" /><span class="font12"> Post "{$smarty.session.user.firstname}  started using Top3Skills.com" on LinkedIn Wall </span></label></div>


		</form>
	
	<script type="text/javascript">
        {literal}
		$('#username').keyup(function() {
			$('#userurl').html('http://top3skills.com/' + $('#username').val());
		});

		 $(document).ready(function () {
			 $("#email").focus();
		  });
        {/literal}
	</script>
	
</div>

</div>