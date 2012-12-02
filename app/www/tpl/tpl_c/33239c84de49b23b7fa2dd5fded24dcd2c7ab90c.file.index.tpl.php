<?php /* Smarty version Smarty-3.0.7, created on 2012-12-02 02:28:42
         compiled from "tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137645248750baaeca6cee17-83279937%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33239c84de49b23b7fa2dd5fded24dcd2c7ab90c' => 
    array (
      0 => 'tpl/index.tpl',
      1 => 1305773447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137645248750baaeca6cee17-83279937',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="banner">
			<div class="contentindex center bannersun paddingTop15px" style="background-position:center top;">
			
			        <h1>
			            What are your Top 3 Skills?
			        </h1>
				
			        <p class="indexp">
			            Kindly ask your connections to write the Top 3 Skills and professional strengths that best describe you
			        </p>
			
			        <p class="center loginbuttondiv" id="lconn">
			            <a id="lconnlink" href="<?php if (isset($_SESSION['userId'])){?>dashboard.php<?php }else{ ?>register.php<?php }?>" onclick="$(this).parent().hide(); $('#loadinglin').show();"><img alt="" style="vertical-align: middle;"
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
 