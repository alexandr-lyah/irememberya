<div class="content center">

	<div class="leftcolum"> <!-- Start left column -->

		<div class="rounded center marginTop40px" style="width:90%;">
			<h2>Statistics</h2>

			<div class="center" >
				<a class="nav {if $statstype == 1}navhover{/if}" href="statistics.php?t=1"><span class="mystatslink">My Statistics</span></a>
				<a class="nav {if $statstype == 2}navhover{/if}" href="statistics.php?t=2"><span class="connstatslink">Connections Stats</span></a>
				<a class="nav {if $statstype == 3}navhover{/if}" href="statistics.php?t=3"><span class="stats3slink">Top3Skills.com Stats</span></a>	
			</div>			
			<div class="clear"></div>
		</div>
		
		{if $statstype == 1}
			{include file="statsmy.tpl"}
		{elseif $statstype == 2}
			{include file="statsconn.tpl"}
		{elseif $statstype == 3}
			{include file="statssite.tpl"}
		{/if}		

	</div> <!-- End left column -->
	

	<div class="rightcolumn"> 	<!-- Start advertisement column -->
		{include file="adsrightcol.tpl"}
	</div>
	
	
			<div class="clear"></div>

</div>
