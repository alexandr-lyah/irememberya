<?php /* Smarty version Smarty-3.0.7, created on 2011-05-18 22:54:08
         compiled from "tpl/chart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5874008154dd48650cf1440-16663577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8627e48d39b8896246dbab8d31ef20b702a2ba4' => 
    array (
      0 => 'tpl/chart.tpl',
      1 => 1305773445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5874008154dd48650cf1440-16663577',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
            <div id="topSkillsChart" style="width:630px; height:250px;" class="marginTop20px"></div>

            <script type="text/javascript">
                
                $(document).ready(function() {
                    $.jqplot.config.enablePlugins = true;
                    var line1 = <?php echo $_smarty_tpl->getVariable('myTopSkills')->value;?>
;
                    var plot3 = $.jqplot('topSkillsChart', [line1], {
                        title:{show: false},
                        legend:{show:true, location:'ne'},
                        axesDefaults: {
                          tickRenderer: $.jqplot.CanvasAxisTickRenderer
                        },
                        axes:{
                            xaxis:{
                                renderer:$.jqplot.CategoryAxisRenderer,
                                tickOptions: {
                                    angle: -30,
                                    fontSize: '10pt'
                                }
                            },
                            yaxis:{min: 0, ticks: <?php echo $_smarty_tpl->getVariable('chartticker')->value;?>
, tickOptions: {formatString: '%.0f'}}
                        },
                        seriesColors: [ "#2074c0"],
                        series:[
                            {renderer:$.jqplot.BarRenderer, label:'Number of references'}
                            
                        ]
                    });
                });
                
            </script>