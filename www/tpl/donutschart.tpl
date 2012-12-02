            <div id="chart5" style="width:630px; height:550px;" class="marginTop20px"></div> <p class="center"><strong>Inside Donut</strong> - Connections Top Skills | <strong>Outside Donut</strong> - My Top Skills</p>

            <script type="text/javascript">
                {literal}
                $(document).ready(function() {
                    $.jqplot.config.enablePlugins = true;
                    
                    var s1 = {/literal}{$donutsinside}{literal};
					var s2 = {/literal}{$donutsoutside}{literal};
                            
                    var plot2 = $.jqplot('chart5', [s1, s2], {
                        seriesDefaults: {
                        renderer:$.jqplot.DonutRenderer, rendererOptions:
                        { 
                        	sliceMargin: 2, innerDiameter: 50, startAngle: -90 
                        } 

                    }, legend: {show:true}  

                    }); 
                });
                {/literal}
            </script>