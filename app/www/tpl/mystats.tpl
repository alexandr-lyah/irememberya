	<div class="rounded center marginTop40px" style="width:90%; padding:20px; text-align:left;">
		
		<h3 class="marginTop10px italic">Did you know that...</h3>
				
	    <p style="line-height:35px;" class="marginTop10px">
			You registered <strong class="blue">{$registertime}</strong>.
			You described <strong class="blue">{$numconnectionsskillsgiven}</strong> of your <strong class="blue">{$numconns}</strong> connections with
			<strong class="blue">{$numskillsgiven}</strong> Skills and
			<strong class="blue">{$numconnectionsskillsreceived}</strong> of your connections described you with <strong class="blue">{$numskillsreceived}</strong> Skills.
			<br>
			{if $user.skill1 == ''}
			You didn't defined <a href="addskills.php?lid={$user.linkedin_id}">the Top 3 Skills that best describe you</a>.
			{else}
			In your opinion, the Top 3 Skills that best describe you are <strong class="blue">{$user.skill1}</strong>, <strong class="blue">{$user.skill2}</strong> and <strong class="blue">{$user.skill3}</strong>.
			{/if}
		</p>
		
	</div>
	
		<div class="rounded center marginTop40px" style="width:90%;">
			<h3>{$LANG.myTopSkillsByConnections}</h3>
			
			{if $myTopSkills != ''}
				{include file="chart.tpl"}				
			{else}
				<img src="tpl/img/noskills4.png"/>
				<a href="share.php" class="inputButton" style="font-size: 14px;">Share your link and ask your connections to write your Top 3 Skills</a>
			{/if}					
			
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
			<h3> {$LANG.connectionsSkillsByMe}</h3>

			{if $myTopSkills2 != ''}
				{include file="chart2.tpl"}				
			{else}
				{if $randomFriend == ''}
					<img src="tpl/img/noskills_profile.png"/>
				{else}
					<a href="addskills.php?lid={$randomFriend}"><img src="tpl/img/noskills_profile.png"></a>
					<a href="addskills.php?lid={$randomFriend}" class="inputButton">{$LANG.noConnectionSkillsDefined}</a>
				{/if}
			{/if}					
			

			
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

			{if $treeSkills != ''}
				<div id="infovis"></div>
				{include file="treechart.tpl"}
				<script type="text/javascript">
					init();
				</script>			
			{else}
				<img src="tpl/img/unlockgraph1.png"/>
			{/if}

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
		
			{if $donutsinside != '' && $donutsoutside != ''}
				{include file="donutschart.tpl"}				
			{else}
				<img src="tpl/img/chartvsnoskills.png"/>
			{/if}
									
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
		
		 