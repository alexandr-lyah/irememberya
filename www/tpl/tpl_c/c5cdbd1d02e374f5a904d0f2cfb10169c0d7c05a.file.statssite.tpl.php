<?php /* Smarty version Smarty-3.0.7, created on 2011-05-29 18:03:29
         compiled from "tpl/statssite.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1499473674de2c2b12f4a43-38975714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5cdbd1d02e374f5a904d0f2cfb10169c0d7c05a' => 
    array (
      0 => 'tpl/statssite.tpl',
      1 => 1305773443,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1499473674de2c2b12f4a43-38975714',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	
	<div class="rounded center marginTop40px" style="width:90%;">
			<h3> Most referenced Skills @ Top3Skills.com</h3>			
			
			<?php $_template = new Smarty_Internal_Template("piechart.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
			
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
			<?php $_template = new Smarty_Internal_Template("chart.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>		
			
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