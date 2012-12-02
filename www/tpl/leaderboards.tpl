<div class="content center">

	<div class="leftcolum"> <!-- Start left column -->

		<div class="rounded center marginTop40px" style="width:90%;">

			<h2>Leaderboard</h2>
			{if !$noresults}
			<p class="right" style="text-align:right; margin-bottom:0px; padding-bottom:0px;" id="showform"><a href="#" onclick="$('#lbform').show(); $('#showform').hide(); return false;">
			Change Leaderboard filter<img src="web/icons/arrow_state_blue_expanded.png" alt="" width="16" height="16"  style="vertical-align: bottom;"/></a></p>
			{/if}
			<form id="lbform" name="lbform" class="registerform left" method="GET" action="leaderboard.php" {if $hideform}style="display:none;"{/if}>
			<input type="hidden" name="act" value="generate"/>
			<table style="line-height:50px; margin-bottom:20px;">		
				<tr><td align="right"><span class="dark font28">Skill</span></td><td><input type="text" id="skill" maxlength="25" name="skill" style="height: 33px; width:500px; margin-left:10px;" {if $skill != ''}value="{$skill}"{/if} /></td></tr>
				<tr><td align="right"><span class="dark font28">Location</span></td><td><input type="text" id="loc" maxlength="100" name="loc" style="width:500px;" {if $loc != ''}value="{$loc}"{/if} /></td></tr>
				<tr><td></td><td><label><input type = 'radio' Name ='people' value= 'all' {if $people == 'all'}checked{/if}>All Users</label> <label><input type = 'radio' Name ='people' value= 'conn' {if $people == 'conn'}checked{/if} >My Connections only</label></td></tr>
				<tr><td colspan="2" align="center"><div  style="margin-right:10px;">
                	                <input type="submit" value="Update Leaderboard" class="inputButton" onclick="$('.inputHint').val(''); "/>
				
				</div></td></tr>
			</table>
			</form>

			{if $leaderboard != ''}
				<div class="marginTop5px" id="leaderboardlist">
				<div style="padding:0px; width:100%; padding:5px 0; font-size:18px; line-height:20px;" class="references">
				{if !$noresults}
					<span class="italic">"{$msg}"</span> 
				{else}
					<strong>No results for </strong><span class="italic">"{$msg}"</span>				
				{/if}
				</div> 
					{counter start=0 skip=1 print=false}			
					{foreach $leaderboard as $user}
				            <div class="{cycle values="left lightbluebackground, left"}" style="padding:15px;">
				                <div style="display:inline-block; vertical-align:middle; zoom: 1; *display: inline;">
				                <span style="color: #72a8db; font-size:20px; font-weight: normal;"> {counter}. </span>
				                		<a href="profile.php?lid={$user.linkedin_id}" ><img src="{$user.pictureUrl}" height="60" width="60"/></a> 		
				                </div>
				                <div style="display:inline-block; vertical-align:middle; margin-left:5px; line-height:25px; width:400px; zoom: 1; *display: inline;" >
										<a href="profile.php?lid={$user.linkedin_id}" style="color: #333; font-weight:bold; font-size:14px;"><span>{$user.firstname} {$user.lastname}</span></a>
										<br /> 
										<a href="{$user.publicProfileUrl}"><img alt="" src="web/icons/l_icon.png" title="LinkedIn Profile" style="vertical-align:text-bottom;"/></a>
										<span style="color: #5c5c5c; font-size:12px; font-weight:normal;">{$user.headline}</span>
										<br />
										<span style="color: #c5c5c5; font-size:12px;">{$user.location}</span>										
				                </div>
				                <div class="references referencesCount">
				                <a href="profile.php?lid={$user.linkedin_id}" title="{$user.firstname} {$user.lastname} Profile">
				                    <span class="referencesCountTitle">{$user.ref}</span>
				                    <br />
				                    <span class="referencesCountText">Skill{if $user.ref > 1}s{/if}<br />received</span>
				                </a>
				                </div>
				            </div>
		            {/foreach}
				</div>
			{/if}
		</div>
		
	</div> <!-- End left column -->
	

	<div class="rightcolumn"> 	<!-- Start advertisement column -->	
		{include file="adsrightcol.tpl"}
	</div>	
	<div class="clear"></div>

</div>



{literal}
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
{/literal}