<div class="content center">


	<div class="leftcolum"> <!-- Start left column -->

    <!--
	<div class="rounded center marginTop40px" style="width:90%;">
	<p class="bigerror">You need to login before proceeding.</p>
	<a href="register.php"><img alt="banner" src="tpl/img/loginbutton.png" class="center marginTop40px" /></a>
	</div>
	-->

	<div class="rounded center marginTop40px" style="width:90%; ">

		{include file="profilebox.tpl"}

		{if $isfriend}
			{if !$sentskills}
				<div class="errorbox">You didn't write any skills on {$user.firstname}'s profile. <a href="addskills.php?lid={$user.linkedin_id}"><strong>Do it now!</strong></a></div>
			{elseif $confirminvitation}
				<div class="sucessmessage">Invitation sent.</div>	
			{elseif $myTopSkills != '' && $showinvite}
				<div class="errorbox">{$user.firstname} is not using Top3Skills.com yet. <a href="profile.php?lid={$user.linkedin_id}&inv=t"><strong>Send invite now!</strong></a></div>
			{/if}		     
		{/if}	           

	</div>
	
	    <div class="rounded center marginTop20px" style="width:90%;">
            <h3> {$user.firstname}'s Top Skills </h3>
            
			{if $myTopSkills != ''}
				{include file="chart.tpl"}
				{include file="skillsreceived.tpl"}
			{else}
				{if $isfriend}
				<a href="addskills.php?lid={$user.linkedin_id}"><img src="tpl/img/noskills_profile.png"/></a>
				<p class="center">
				    <a href="addskills.php?lid={$user.linkedin_id}" class="inputButton">Add {$user.firstname}'s Top 3 Skills</a>
				</p>
				{else}
					<img src="tpl/img/noskills5.png">
				{/if}
			{/if}
           	
       </div>

	</div> <!-- End left column -->
	

	<div class="rightcolumn"> 	<!-- Start advertisement column -->
		{include file="adsrightcol.tpl"}
	</div>
	
	
			<div class="clear"></div>

</div>
