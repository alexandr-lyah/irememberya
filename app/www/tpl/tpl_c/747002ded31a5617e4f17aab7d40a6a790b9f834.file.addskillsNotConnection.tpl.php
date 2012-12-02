<?php /* Smarty version Smarty-3.0.7, created on 2011-05-18 22:54:41
         compiled from "tpl/addskillsNotConnection.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18367572484dd486712b7210-17660403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '747002ded31a5617e4f17aab7d40a6a790b9f834' => 
    array (
      0 => 'tpl/addskillsNotConnection.tpl',
      1 => 1305773450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18367572484dd486712b7210-17660403',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content center">


    <div class="leftcolum"> <!-- Start left column -->

        <div class="rounded center marginTop40px" style="width:90%;">
            <h1 class="bigerror"><?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
 is not a connection</h1>

            <p class="font12 center">
                Add <a href="<?php echo $_smarty_tpl->getVariable('user')->value['publicProfileUrl'];?>
"><?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
</a> to your <a href="<?php echo $_smarty_tpl->getVariable('user')->value['publicProfileUrl'];?>
">LinkedIn network</a>
                and come back to add their Top3Skills.
            </p>
        </div>

        <div class="rounded center marginTop40px" style="width:90%;">

        <?php $_template = new Smarty_Internal_Template("profilebox.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

            <div class=" center marginTop20px">
                <h3> What are the Top 3 Skills and professional strengths that best describe <?php if ($_smarty_tpl->getVariable('myskills')->value){?>
                    you<?php }else{ ?><?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
<?php }?>? </h3>
            </div>

            <div class="clear"></div>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>
?act=add" id="addSkills" class="marginTop20px">


                <input type="text" maxlength="22" class="mediumInput skillInput" name="skill1" id="skill1"
                       readonly="readonly"/>
                <br/>
                <input type="text" maxlength="22" class="mediumInput skillInput" name="skill2" id="skill2"
                       readonly="readonly"/>
                <br/>
                <input type="text" maxlength="22" class="mediumInput skillInput" name="skill3" id="skill3"
                       readonly="readonly"/>
                <br/>

            </form>
            <p class="marginTop20px">
                <a href="#" onclick="showDialog(); return false;"><img alt="" src="tpl/img/saveskills.png"/></a>

            <div id="dialog" title="Login" style="display:none;">
                <p>You need to add <?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
 to your network at LinkedIn first.</p>
            </div>

        </div>


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
});

function showDialog() {
    $('#dialog').dialog({
                height: 140,
                modal: true
            });
}


</script>