<div class="banner">
			<div class="contentindex center bannersun paddingTop15px" style="background-position:center top; padding-top:50px;">
			
			        <h1>
			            iRememberYa! 
			        </h1>
				
			        <p class="indexp">
			            Learn and Refresh your Social Network
			        </p>
			
			        <p class="center loginbuttondiv marginTop40px" id="lconn">
			            <a id="lconnlink" href="{if isset($smarty.session.userId)}dashboard.php{else}register.php{/if}" onclick="$(this).parent().hide(); $('#loadinglin').show();"><img alt="" style="vertical-align: middle;"
			                                                                                                  src="tpl/img/loginbutton.png"
			                                                                                                  class="loginButton _boxHover"/></a>				        				        
			        </p>
			        <p class="center loginbuttondiv marginTop20px" id=loadinglin style="display:none;">
				        <img alt="" src="tpl/img/ajax-loader.gif" >
				        <br />
				        <span style="color:white;">Connecting to LinkedIn...</span>
				    </p>    
					
			        
			</div>
</div>
<!-- 
<div class="contentindex center marginTop20px">
    <p style="margin-bottom:15px;">
    	<i><strong>Top3Skills.com - the Quick Recommendations Service</strong></i>
    </p>
    <table cellpadding="0" cellspacing="0" style="border-collapse: collapse; border: none; width: 880px; margin-left: auto; margin-right: auto;">
        <tr>
            <td width="220"><img alt="" src="tpl/img/featuresbox1.png" width="200" height="172" class="center" /></td>
            <td width="220"><img alt="" src="tpl/img/featuresbox2.png" width="200" height="172" class="center" /></td>
            <td width="220"><img alt="" src="tpl/img/featuresbox3.png" width="200" height="172" class="center" /></td>
            <td width="220"><img alt="" src="tpl/img/featuresbox4.png" width="200" height="172" class="center" /></td>
        </tr>
        <tr class="indexCaptions">
            <td>
                Write down the Top 3 Skills that best describe your Connections.
                <br>
                Way easier than writing those long recommendations, right?
            </td>
            <td>
                Follow what people are saying about your Top 3 Skills. Don't
                    forget to read about your connections Top Skills also.
            </td>
            <td>
                Get to the Leaderboards and increase your chances of receiving
                job offers or a raise from your boss.
            </td>
            <td>
                Statistics will give you lots of information about the skills
                on your network and Top3Skills.com in general.
            </td>
        </tr>
    </table>
</div>
-->