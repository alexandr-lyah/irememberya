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