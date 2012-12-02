<?php /* Smarty version Smarty-3.0.7, created on 2012-12-02 09:46:25
         compiled from "tpl/dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58584653050bb1561b3d0c4-01031553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f58ac376f382b82fb48b63b1be344cba8b1e517' => 
    array (
      0 => 'tpl/dashboard.tpl',
      1 => 1311781230,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58584653050bb1561b3d0c4-01031553',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="content center">
    <div class="leftcolum">

    <?php $_template = new Smarty_Internal_Template("sharebox.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

        <div class="rounded center marginTop40px" style="width:90%;">
            <h3>My Top 3 Skills</h3>

        <?php if ($_smarty_tpl->getVariable('myOwnSkills')->value!=''){?>

            <div style="border-top:1px solid #E8E8E8; border-bottom:1px solid #E8E8E8;" class="marginTop20px">
                <div class="lightbluebackground boxSmallProfileSkills">
                    <div class="photo">
                        <a href="profile.php?lid=<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('user')->value['pictureUrl'];?>
" height="60"
                                                                           width="60"></a>
                    </div>
                    <div class="content">
                        <p>
                        <a href="<?php echo $_smarty_tpl->getVariable('user')->value['publicProfileUrl'];?>
"><img alt="" src="web/icons/l_icon.png"
                                                                title="LinkedIn Profile"
                                                                style="vertical-align:text-bottom;"></a> <a
                            href="profile.php?lid=<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
"
                            class="namelink"><?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('user')->value['lastname'];?>
</a>
                        </p>
                        <p>
                            <a class="referencesSkills"
                               href="leaderboard/all/<?php echo $_smarty_tpl->getVariable('myOwnSkills')->value['skill1'];?>
"><?php echo $_smarty_tpl->getVariable('myOwnSkills')->value['skill1'];?>
</a>
                            <a class="referencesSkills"
                               href="leaderboard/all/<?php echo $_smarty_tpl->getVariable('myOwnSkills')->value['skill2'];?>
"><?php echo $_smarty_tpl->getVariable('myOwnSkills')->value['skill2'];?>
</a>
                            <a class="referencesSkills"
                               href="leaderboard/all/<?php echo $_smarty_tpl->getVariable('myOwnSkills')->value['skill3'];?>
"><?php echo $_smarty_tpl->getVariable('myOwnSkills')->value['skill3'];?>
</a>
                        </p>
                    </div>
                    <div class="floatright"><a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
" class="smallButton">Edit</a></div>
                </div>
                <div class="clear"></div>
            </div>

            <?php }else{ ?>
            <p class="marginTop20px">
                <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('user')->value['linkedin_id'];?>
" class="inputButton">Add the Top 3 Skills that best
                    describe you!</a>
            </p>
        <?php }?>

        </div>

        <div class="rounded center marginTop40px" style="width:90%;">
            <h3>My Top Skills, according to my connections</h3>

        <?php if ($_smarty_tpl->getVariable('myTopSkills')->value!=''){?>
        <?php $_template = new Smarty_Internal_Template("chart.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
        <?php $_template = new Smarty_Internal_Template("skillsreceived.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
            <?php }else{ ?>
            <img src="tpl/img/noskills4.png"/>
        <?php }?>

        </div>

    <?php if ($_smarty_tpl->getVariable('randomconnections')->value!=''){?>
    <?php $_template = new Smarty_Internal_Template("skillsgiven.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <?php }?>



        <div class="rounded center marginTop40px" style="width:90%;">
            <h3>Statistics</h3>

            <p class="marginTop10px">Take a look at the statistics we have for you. Just enter the <a class="stats"
                                                                                                      href="statistics.php">Statistics
                section</a></p>
        </div>


        <div class="rounded center marginTop40px" style="width:90%;">
            <h3>Leaderboard</h3>

            <p class="marginTop10px">If you want to know who's the best at a certain Skill, jump straight to the <a
                    class="lboards" href="leaderboard.php">Leaderboard section</a></p>
        </div>
    </div>

    <div class="rightcolumn">

        <div class="boxNormal">
            <h4 class="center">My progress</h4>

            <div class="center marginTop10px">
                <div id="progressbar" style="border:1px solid #82b337"><span
                        style="position:absolute; text-align:center; margin-top:6px; margin-left:86px; color:green;"><?php echo $_smarty_tpl->getVariable('completeness')->value;?>

                    % </span></div>
            </div>


        <?php if ($_smarty_tpl->getVariable('itasks')->value!=''){?>
            <div class="marginTop10px">
                <p style="font-weight: bold; text-align: left;">Next Tasks</p>
                <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('itasks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value){
?>
                    <p class="incomptask left"><?php echo $_smarty_tpl->tpl_vars['it']->value['description'];?>
</p>
                <?php }} ?>
            </div>
        <?php }?>

            <div class="marginTop10px">
                <p style="font-weight: bold; text-align: left;">Completed Tasks</p>
            <?php if ($_smarty_tpl->getVariable('ctasks')->value!=''){?>
                <?php  $_smarty_tpl->tpl_vars['ct'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ctasks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['ct']->key => $_smarty_tpl->tpl_vars['ct']->value){
?>
                    <p class="comptask left"><?php echo $_smarty_tpl->tpl_vars['ct']->value['description'];?>
</p>
                <?php }} ?>
            <?php }?>
            </div>

            <script type="text/javascript">
                var progress_key = '4dadc79ed3c16';

                $(document).ready(function() {
                $("#progressbar").progressbar({ value: <?php echo $_smarty_tpl->getVariable('completeness')->value;?>
, barImage: 'web/js/progressbar/images/progressbg_green.gif' });
                });


            </script>
        </div>

        <div class="rounded center" style="margin-top: 40px; !important">
            <h4>My connections</h4>
        <?php if ($_smarty_tpl->getVariable('randomconnections')->value!=''){?>
            <a href="connections.php">View All</a>
            <?php  $_smarty_tpl->tpl_vars['conn'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('randomconnections')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['conn']->iteration=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['conn']->key => $_smarty_tpl->tpl_vars['conn']->value){
 $_smarty_tpl->tpl_vars['conn']->iteration++;
?>
                <div class="marginTop20px boxLiquidProfile">
                    <div class="photo"><a
                            href="profile.php?lid=<?php echo $_smarty_tpl->tpl_vars['conn']->value['linkedin_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['conn']->value['pictureUrl'];?>
" width="35" height="35"></a>
                    </div>
                    <div class="content">
                        <p><a href="profile.php?lid=<?php echo $_smarty_tpl->tpl_vars['conn']->value['linkedin_id'];?>
"
                              class="normalfont"><?php echo $_smarty_tpl->tpl_vars['conn']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['conn']->value['lastname'];?>
</a></p>
                        <a href="addskills.php?lid=<?php echo $_smarty_tpl->tpl_vars['conn']->value['linkedin_id'];?>
"><?php if ($_smarty_tpl->tpl_vars['conn']->value['skill1']!=''){?>Update<?php }else{ ?>Add<?php }?>
                            skills</a>
                    </div>
                </div>

                <?php if ($_smarty_tpl->tpl_vars['conn']->iteration==20){?>
                    <div style="margin-top: 20px; width: 125px; margin-left: 50px;">
                        
                            <script type="text/javascript"><!--
                            google_ad_client = "ca-pub-6868966921230764";
                            /* topskills 125x125 */
                            google_ad_slot = "0679703482";
                            google_ad_width = 125;
                            google_ad_height = 125;
                            //-->
                            </script>
                            <script type="text/javascript"
                                    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                            </script>
                        
                    </div>
                <?php }?>
            <?php }} ?>
            <?php }else{ ?>
            You don't have any connections.
        <?php }?>
        </div>

        <div style="margin-top: 40px;">
            <script type="text/javascript"><!--
            google_ad_client = "ca-pub-6868966921230764";
            /* topskills 234x60 color3 */
            google_ad_slot = "5355941966";
            google_ad_width = 234;
            google_ad_height = 60;
            //-->
            </script>
            <script type="text/javascript"
                    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script>

        </div>

    </div>

    <div class="clear"></div>

</div>