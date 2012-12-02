<?php /* Smarty version Smarty-3.0.7, created on 2011-05-29 18:03:12
         compiled from "tpl/chart2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17261238694de2c2a04557c3-36883975%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbef9367dceab433e5915fea4bc522cd4194c16c' => 
    array (
      0 => 'tpl/chart2.tpl',
      1 => 1305773444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17261238694de2c2a04557c3-36883975',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
            <div id="topSkillsChart2" style="width:630px; height:250px;" class="marginTop20px"></div>

            <script type="text/javascript">
                
                $(document).ready(function() {
                    $.jqplot.config.enablePlugins = true;
                    var line1 = <?php echo $_smarty_tpl->getVariable('myTopSkills2')->value;?>
;
                    var plot3 = $.jqplot('topSkillsChart2', [line1], {
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
                            yaxis:{min: 0, ticks: <?php echo $_smarty_tpl->getVariable('chartticker2')->value;?>
, tickOptions: {formatString: '%.0f'}}
                        },
                        seriesColors: [ "#2074c0"],
                        series:[
                            {renderer:$.jqplot.BarRenderer, label:'Number of references'}
                            
                        ]
                    });
                });
                
            </script>