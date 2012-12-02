<?php /* Smarty version Smarty-3.0.7, created on 2011-05-18 22:54:38
         compiled from "tpl/addskills.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21158902774dd4866e2f6355-79547335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef7c6fae6b73e76c8fc3d559d91e7881c1d4ae3f' => 
    array (
      0 => 'tpl/addskills.tpl',
      1 => 1305773451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21158902774dd4866e2f6355-79547335',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content center">


    <div class="leftcolum"> <!-- Start left column -->

    <?php if ($_smarty_tpl->getVariable('guestview')->value){?>
        <div class="rounded center marginTop40px" style="width:90%;">
            <h1 class="bigerror">Please login before proceeding</h1>
            <a id="lconn" href="<?php if (isset($_SESSION['userId'])){?>dashboard.php<?php }else{ ?>register.php<?php }?>"
               onclick="$('#lconn').hide(); $('#loading').show();"><img alt="banner" style="vertical-align: middle;"
                                                                        src="tpl/img/loginbutton.png"
                                                                        class="loginButton _boxHover"/></a>

            <p class="center loginbuttondiv marginpadding0" id="loading" style="display:none;">
                <img alt="" src="tpl/img/ajax-loader_whitebg.gif">
                <br/>
                <span style="color:#4aa9df;">Connecting to LinkedIn...</span>
            </p>

            <p class="left font12 marginTop20px italic">
                <strong>Top3Skills.com</strong> is a service that allows you to kindly ask your connections to write the
                Top 3 Skills and professional strengths that best describe you.
                Way easier than writing long recommendations, right?
            </p>
        </div>
    <?php }?>

        <div class="rounded center marginTop40px" style="width:90%;">

        <?php $_template = new Smarty_Internal_Template("profilebox.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

            <div class=" center marginTop20px">
                <h3> What are the Top 3 Skills and professional strengths that best describe <?php if ($_smarty_tpl->getVariable('myskills')->value){?>
                    you<?php }else{ ?><?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
<?php }?>? </h3>
            </div>

            <div class="clear"></div>

            <!-- <?php if ($_smarty_tpl->getVariable('error')->value!=''){?><p class="errorbox margin20px"><?php echo $_smarty_tpl->getVariable('error')->value;?>
</p><?php }?> -->

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>
?act=add" id="addSkills" class="marginTop20px">

                <input type="text" maxlength="32" class="mediumInput skillInput" name="skill1" id="skill1"
                       <?php if ($_smarty_tpl->getVariable('skill1')->value!=''){?>value="<?php echo $_smarty_tpl->getVariable('skill1')->value;?>
"<?php }?> <?php if ($_smarty_tpl->getVariable('guestview')->value){?> readonly<?php }?> />
                <br/>
                <input type="text" maxlength="32" class="mediumInput skillInput" name="skill2" id="skill2"
                       <?php if ($_smarty_tpl->getVariable('skill2')->value!=''){?>value="<?php echo $_smarty_tpl->getVariable('skill2')->value;?>
"<?php }?> <?php if ($_smarty_tpl->getVariable('guestview')->value){?> readonly<?php }?> />
                <br/>
                <input type="text" maxlength="32" class="mediumInput skillInput" name="skill3" id="skill3"
                       <?php if ($_smarty_tpl->getVariable('skill3')->value!=''){?>value="<?php echo $_smarty_tpl->getVariable('skill3')->value;?>
"<?php }?> <?php if ($_smarty_tpl->getVariable('guestview')->value){?> readonly<?php }?> />
                <br/>

            <p class="marginTop20px">
            <?php if ($_smarty_tpl->getVariable('guestview')->value){?>
                <a href="#" onclick=" showDialog(); return false;"><img alt="" src="tpl/img/saveskills.png"/></a>

                <div id="dialog" title="Login" style="display:none;">
                    <p>You need to login before proceeding. <br><br>Go to the top of this page and click the <span
                            class="italic">"Log in with LinkedIn"</span> button.</p>
                </div>

                <?php }else{ ?>
                <input type="submit" value="Save skills and continue" class="inputButton"
                       onclick="$('.skillInput.inputHint').val('');"/>
            <?php }?>
                </p>
                <input type="hidden" name="uid" value="<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
"/>
            <?php if ($_smarty_tpl->getVariable('prevconnection')->value!=''){?><input type="hidden" name="prevuid" value="<?php echo $_smarty_tpl->getVariable('prevconnection')->value;?>
"/> <?php }?>


            <?php if (!$_smarty_tpl->getVariable('myskills')->value&&!$_smarty_tpl->getVariable('guestview')->value){?>
                <div class="center font12" style="margin-top: 10px; ">
                    <input type="checkbox" name="msg" id="msg" checked="checked" class="reset"/> Send LinkedIn message
                    with skills to <?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>

                </div>
            <?php }?>


            <?php if ($_smarty_tpl->getVariable('prevconnection')->value!=''){?>
                <div style="float:left; text-align:left; width:33%;"><a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('prevconnection')->value;?>
">Previous</a>
                </div>
            <?php }?>

            <?php if ($_smarty_tpl->getVariable('nextconnection')->value!=''){?>
                <div style="float:right; text-align:right;"><a
                        href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('nextconnection')->value['linkedin_id'];?>
&plid=<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
&skipped=1">Skip</a>
                </div>
            <?php }?>

            </form>
        </div>

    <?php if ($_smarty_tpl->getVariable('guestview')->value){?>
        <div class="rounded center marginTop40px" style="width:90%; padding-bottom: 15px">
            <h3><?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
's connections you may want to praise...</h3>

            <div id="connectionsResultDiv" class="connectionsLoadingHide" style="margin: 0; padding: 0;">
            <?php $_template = new Smarty_Internal_Template("connectionsBox.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
            </div>
        </div>
        <?php }else{ ?>
        <div class="rounded center marginTop40px" style="width:90%; padding-bottom: 15px">
            <h3>My Connections</h3>

            <p style="border-top:1px solid #E8E8E8; border-bottom:1px solid #E8E8E8; padding: 5px 0; "
               class="lightbluebackground  marginTop10px connectionsLoadingHide">
                <label>Company:
                    <select id="companySelect">
                        <option value="-1">All</option>
                        <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('popularCompanies')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</option>
                        <?php }} ?>
                    </select>
                </label>
                <a id="companyFilter" href="#" class="inputButtonSmall">Filter</a>
            </p>
            <p class="center loginbuttondiv" id="connectionsLoading" style="display:none;">
                <img alt="" src="tpl/img/ajax-loader_whitebg.gif">
                <br/>
                <span style="color:#4aa9df;">Loading connections...</span>
            </p>

            <div id="connectionsResultDiv" class="connectionsLoadingHide" style="margin: 0; padding: 0;">
            <?php $_template = new Smarty_Internal_Template("connectionsBox.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
            </div>
            <p style="border-top:1px solid #E8E8E8; border-bottom:1px solid #E8E8E8; padding: 5px 0; "
               class="lightbluebackground  marginTop10px connectionsLoadingHide">
                <a href="connections.php" id="viewAllConnsLink">View all connections</a>
            </p>
        </div>
    <?php }?>

    <?php if ($_smarty_tpl->getVariable('sentSkills')->value!=''){?>
    <?php $_template = new Smarty_Internal_Template("skillsgiven.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <?php }?>

    </div>
    <!-- End left column -->


    <div class="rightcolumn">     <!-- Start advertisement column -->
    <?php $_template = new Smarty_Internal_Template("adsrightcol.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    </div>


    <div class="clear"></div>

</div>



<script type="text/javascript">
        $(document).ready(function () {
    $("#skill1").autocomplete("skills.php", {
                width: 410,
                max:15,
                autoFill: false,
                selectFirst: false
            });
    $("#skill2").autocomplete("skills.php", {
                width: 410,
                max:15,
                autoFill: false,
                selectFirst: false
            });
    $("#skill3").autocomplete("skills.php", {
                width: 410,
                max:15,
                autoFill: true,
                selectFirst: false
            });

        $('#skill1').tbHinter({text: 'e.g. <?php echo $_smarty_tpl->getVariable('hintSkill1')->value;?>
', classHint: 'inputHint'});
        $('#skill2').tbHinter({text: 'e.g. <?php echo $_smarty_tpl->getVariable('hintSkill2')->value;?>
', classHint: 'inputHint'});
        $('#skill3').tbHinter({text: 'e.g. <?php echo $_smarty_tpl->getVariable('hintSkill3')->value;?>
', classHint: 'inputHint'});

    $('#companyFilter').click(function() {
        $('#connectionsLoading').show();
        $('.connectionsLoadingHide').hide();

        var companyId = $('#companySelect').val();
        var params = "";

        if (companyId != -1) {
            params = "type=company&id=" + companyId;
        }

        $.get('connectionsAjax.php', params, function(data) {
            $('#connectionsLoading').hide();
            $('.connectionsLoadingHide').show();
            if (companyId != -1) {
                $('#viewAllConnsLink').attr('href', 'connections.php?' + params);
            }
            else {
                $('#viewAllConnsLink').attr('href', 'connections.php');
            }

            $('#connectionsResultDiv').html(data);
        }, 'html');

        return false;
    });



<?php if ($_smarty_tpl->getVariable('guestview')->value){?>
    
        $('#skill1').focus(function() {
            $('#skill1').blur();
            showDialog();
            return false;
        });

        $('#skill2').focus(function() {
            $('#skill2').blur();
            showDialog();
            return false;
        });

        $('#skill3').focus(function() {
            $('#skill3').blur();
            showDialog();
            return false;
        });
    
    <?php }else{ ?>
    
        $('#skill1').focus();
    
<?php }?>

});

function showDialog() {
    $('#dialog').dialog({
                height: 140,
                modal: true
            });
}


</script>