<?php /* Smarty version Smarty-3.0.7, created on 2011-05-29 16:54:14
         compiled from "tpl/donutschart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:818258144de2b276067df7-79170157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76073fbd8ccaadc85f96d9550e7a2fe8fa376862' => 
    array (
      0 => 'tpl/donutschart.tpl',
      1 => 1305773446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '818258144de2b276067df7-79170157',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
            <div id="chart5" style="width:630px; height:550px;" class="marginTop20px"></div> <p class="center"><strong>Inside Donut</strong> - Connections Top Skills | <strong>Outside Donut</strong> - My Top Skills</p>

            <script type="text/javascript">
                
                $(document).ready(function() {
                    $.jqplot.config.enablePlugins = true;
                    
                    var s1 = <?php echo $_smarty_tpl->getVariable('donutsinside')->value;?>
;
					var s2 = <?php echo $_smarty_tpl->getVariable('donutsoutside')->value;?>
;
                            
                    var plot2 = $.jqplot('chart5', [s1, s2], {
                        seriesDefaults: {
                        renderer:$.jqplot.DonutRenderer, rendererOptions:
                        { 
                        	sliceMargin: 2, innerDiameter: 50, startAngle: -90 
                        } 

                    }, legend: {show:true}  

                    }); 
                });
                
            </script>