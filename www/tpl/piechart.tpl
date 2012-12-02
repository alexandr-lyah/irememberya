            <div id="topSkillsPieChart" style="width:630px; height:400px;" class="marginTop20px"></div>

            <script type="text/javascript">
                {literal}
                $(document).ready(function() {
                    $.jqplot.config.enablePlugins = true;
                    var line1 = {/literal}{$pieTopSkills}{literal};
                    var plot2 = $.jqplot('topSkillsPieChart', [line1], {
                    		    title: '',
                    		    seriesDefaults:{renderer:$.jqplot.PieRenderer, rendererOptions:{sliceMargin:2, showDataLabels: true}},
                    		    legend:{show:true}
              		});
                });
                {/literal}
            </script>



