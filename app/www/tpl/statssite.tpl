{*
	<div class="rounded center marginTop40px" style="width:90%; padding:20px; text-align:left;">

		<h2 class="center blueh1">Top3Skills.com Statistics</h2>
		<h3 class="marginTop20px italic">Did you know that...</h3>

		<p style="line-height:35px;" class="marginTop10px">
			Top3Skills.com has <strong class="blue">{$activeusers}</strong> active users connected to a total of <strong class="blue">{$totalconns}</strong> connections from <strong class="blue">{$diffcities}</strong> different locations.
			<br />
			At this moment, Top3Skills.com users used <strong class="blue">{$diffskills}</strong> different types of skills to write down a total of <strong class="blue">{$totalskills}</strong> references.

	</div>
*}	
	<div class="rounded center marginTop40px" style="width:90%;">
			<h3> Most referenced Skills @ Top3Skills.com</h3>			
			
			{include file="piechart.tpl"}
			
			<script>$("[title]").tooltip();</script>
			
			
			<div class="chartdescription">				
				<a href="#" class="charthelp" onclick="$(this).next().toggle(); return false;">Chart Description</a>
				<p>
					This chart represents
					the 10 most referenced Skills at  Top3Skills.com .
				</p>
			</div>				
	</div>
	
	<div class="rounded center marginTop40px" style="width:90%;">
			<h3> Most referenced Skills @ Top3Skills.com</h3>
			{include file="chart.tpl"}		
			
			<div class="chartdescription">				
				<a href="#" class="charthelp" onclick="$(this).next().toggle(); return false;">Chart Description</a>
				<p>
				This chart represents
					the 10 most referenced Skills at Top3Skills.com .
					<br />
					For example, if the Skill "Entrepreneur" was given 3 times to 5 people,
					the "Entrepreneur" Skill bar will appear with the value 3x5=15.    
				</p> 
			</div>
	</div>	
	
		<div class="rounded center marginTop40px" style="width:90%;">
			<h3> Skills Density</h3>
			
			<img style="border:1px solid #DDD;"src="tpl/img/mapskills.png" class="marginTop10px"/>
			
			<div class="chartdescription">				
				<a href="#" class="charthelp" onclick="$(this).next().toggle(); return false;">Chart Description</a>
				<p>
					This map represents the locations where a certain Skill is more predominant.
				</p> 
			</div>
	</div>	