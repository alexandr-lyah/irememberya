<?php /* Smarty version Smarty-3.0.7, created on 2011-05-29 18:03:12
         compiled from "tpl/piechart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20619524854de2c2a0432cc9-39165325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa4c601486244ef1a19916e773acb95b0b6b8f7e' => 
    array (
      0 => 'tpl/piechart.tpl',
      1 => 1305773444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20619524854de2c2a0432cc9-39165325',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
            <div id="topSkillsPieChart" style="width:630px; height:400px;" class="marginTop20px"></div>

            <script type="text/javascript">
                
                $(document).ready(function() {
                    $.jqplot.config.enablePlugins = true;
                    var line1 = <?php echo $_smarty_tpl->getVariable('pieTopSkills')->value;?>
;
                    var plot2 = $.jqplot('topSkillsPieChart', [line1], {
                    		    title: '',
                    		    seriesDefaults:{renderer:$.jqplot.PieRenderer, rendererOptions:{sliceMargin:2, showDataLabels: true}},
                    		    legend:{show:true}
              		});
                });
                
            </script>



