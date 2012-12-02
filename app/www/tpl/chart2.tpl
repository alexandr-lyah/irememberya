            <div id="topSkillsChart2" style="width:630px; height:250px;" class="marginTop20px"></div>

            <script type="text/javascript">
                {literal}
                $(document).ready(function() {
                    $.jqplot.config.enablePlugins = true;
                    var line1 = {/literal}{$myTopSkills2}{literal};
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
                            yaxis:{min: 0, ticks: {/literal}{$chartticker2}{literal}, tickOptions: {formatString: '%.0f'}}
                        },
                        seriesColors: [ "#2074c0"],
                        series:[
                            {renderer:$.jqplot.BarRenderer, label:'Number of references'}
                            
                        ]
                    });
                });
                {/literal}
            </script>