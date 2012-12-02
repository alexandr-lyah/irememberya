<?php /* Smarty version Smarty-3.0.7, created on 2011-05-29 18:03:12
         compiled from "tpl/statsconn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6211391904de2c2a01bc593-10784768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd609214a2dfa0fcdbe6fe6875beb160a7e4d7ae4' => 
    array (
      0 => 'tpl/statsconn.tpl',
      1 => 1305773453,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6211391904de2c2a01bc593-10784768',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_counter')) include '/home/tascaco/top3skills.com/www/lib/smarty/plugins/function.counter.php';
if (!is_callable('smarty_function_cycle')) include '/home/tascaco/top3skills.com/www/lib/smarty/plugins/function.cycle.php';
?><div class="rounded center marginTop40px" style="width:90%; padding:20px; text-align:left;">

    <h3 class="marginTop10px italic">Did you know that...</h3>

    <p style="line-height:35px;" class="marginTop10px">

        Your connections were described with a total of <strong class="blue"><?php echo $_smarty_tpl->getVariable('numskillsreceived')->value;?>
</strong> Skills by
        <strong class="blue"><?php echo $_smarty_tpl->getVariable('numskillsreceivedfrom')->value;?>
</strong> of their connections. On the other way around, they used
        <strong class="blue"><?php echo $_smarty_tpl->getVariable('numskillssent')->value;?>
</strong> Skills to describe <strong
            class="blue"><?php echo $_smarty_tpl->getVariable('numskillssentto')->value;?>
</strong> of their connections.
        <br/>
        <strong class="blue"><?php echo $_smarty_tpl->getVariable('numactiveconns')->value;?>
</strong> of your <strong class="blue"><?php echo $_smarty_tpl->getVariable('numconns')->value;?>
</strong>
        connections <?php if ($_smarty_tpl->getVariable('numactiveconns')->value==1){?>is<?php }else{ ?>are<?php }?> actively using Top3Skills.com and this means that you
        should invite the other <strong class="blue"><?php echo $_smarty_tpl->getVariable('numnonactiveconns')->value;?>
</strong> connections to start using
        Top3Skills.com.


    </p>

</div>

<div class="rounded center marginTop40px" style="width:90%;">
    <h3> Connections Top Skills </h3>

<?php if ($_smarty_tpl->getVariable('pieTopSkills')->value!=''){?>
<?php $_template = new Smarty_Internal_Template("piechart.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <?php }else{ ?>
    <?php if ($_smarty_tpl->getVariable('randomFriend')->value==''){?>
        <img src="tpl/img/connsnoskillspie.png"/>
        <?php }else{ ?>
        <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('randomFriend')->value;?>
"><img src="tpl/img/connsnoskillspie.png"/></a>
        <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('randomFriend')->value;?>
" class="inputButton"><?php echo $_smarty_tpl->getVariable('LANG')->value['noConnectionSkillsDefined'];?>
</a>
    <?php }?>
<?php }?>

    <div class="chartdescription">
        <a href="#" class="charthelp" onclick="$(this).next().toggle(); return false;">Chart Description</a>

        <p id="desc1">
            This chart represents the percentages of your connections Top Skills.
            <br/>
            The chart is limited to 10 Skills.
        </p>
    </div>
</div>

<div class="rounded center marginTop40px" style="width:90%;">
    <h3> Connections Top Skills</h3>

<?php if ($_smarty_tpl->getVariable('myTopSkills')->value!=''){?>
<?php $_template = new Smarty_Internal_Template("chart.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <?php }else{ ?>
    <?php if ($_smarty_tpl->getVariable('randomFriend')->value==''){?>
        <img src="tpl/img/connsnoskillsbar.png">
        <?php }else{ ?>
        <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('randomFriend')->value;?>
"><img src="tpl/img/connsnoskillsbar.png"/></a>
        <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('randomFriend')->value;?>
" class="inputButton"><?php echo $_smarty_tpl->getVariable('LANG')->value['noConnectionSkillsDefined'];?>
</a>
    <?php }?>
<?php }?>
    <div class="chartdescription">
        <a href="#" class="charthelp" onclick="$(this).next().toggle(); return false;">Chart Description</a>

        <p id="desc2">
            This chart represents the Top 10 Skills of all of your connections.
            Each bar represents the number of times a certain skill was given to your connections.
            <br/>
            For example, if the Skill "Entrepreneur" was given 3 times to 5 of your connections,
            the "Entrepreneur" Skill bar will appear with the value 3x5 = 15.
            <br/>
            The chart is limited to 10 Skills.
        </p>
    </div>
</div>


<div class="rounded center marginTop40px" style="width:90%;">
    <h3>Most Referenced Connections </h3>
<?php if ($_smarty_tpl->getVariable('myTopSkills2')->value!=''){?>
<?php $_template = new Smarty_Internal_Template("chart2.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <?php }else{ ?>
    <?php if ($_smarty_tpl->getVariable('randomFriend')->value==''){?>
        <img src="tpl/img/connsnoreferences.png">
        <?php }else{ ?>
        <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('randomFriend')->value;?>
"><img src="tpl/img/connsnoreferences.png"></a>
        <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('randomFriend')->value;?>
" class="inputButton"><?php echo $_smarty_tpl->getVariable('LANG')->value['noConnectionSkillsDefined'];?>
</a>
    <?php }?>

<?php }?>

    <div class="marginTop20px">
    <?php echo smarty_function_counter(array('start'=>0,'skip'=>1,'print'=>false),$_smarty_tpl);?>

    <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('connreferences')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
?>
        <div class="boxSmallProfileRanking <?php echo smarty_function_cycle(array('values'=>"lightbluebackground,"),$_smarty_tpl);?>
">
            <div class="photo">
                <?php echo smarty_function_counter(array(),$_smarty_tpl);?>
.
                <a href="profile.php?lid=<?php echo $_smarty_tpl->tpl_vars['user']->value['linkedin_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['pictureUrl'];?>
" height="60" width="60"> </a>
            </div>
            <div class="content">
                <a href="profile.php?lid=<?php echo $_smarty_tpl->tpl_vars['user']->value['linkedin_id'];?>
"
                   style="color: #333; font-weight:bold; font-size:14px;"><span><?php echo $_smarty_tpl->tpl_vars['user']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['lastname'];?>
</span></a>
                <br/>
                <a href="<?php echo $_smarty_tpl->tpl_vars['user']->value['publicProfileUrl'];?>
"><img alt="" src="web/icons/l_icon.png" title="LinkedIn Profile"
                                                        style="vertical-align:text-bottom;"></a>
                <span style="color: #5c5c5c; font-size:12px; font-weight:normal;"><?php echo $_smarty_tpl->tpl_vars['user']->value['headline'];?>
</span>
                <br/>
                <span style="color: #c5c5c5; font-size:12px;"><?php echo $_smarty_tpl->tpl_vars['user']->value['location'];?>
</span>
            </div>
        </div>
    <?php }} ?>
    </div>

    <div class="chartdescription">
        <a href="#" class="charthelp" onclick="$(this).next().toggle(); return false;">Chart Description</a>

        <p id="desc3">
            This chart represents the Connections with more Skills/References.
            Each bar represents the total number of
            References received by each connection.
            <br/>
            For example, if the user "John Smith" received the Skills
            "Java, PHP, J2EE" and "Java, J2EE, Hardworker" their bar will have a value of 6.
            <br/>
            The chart is limited to 10 Connections.
        </p>
    </div>
</div>

<div class="rounded center marginTop40px" style="width:90%;">
    <h3>Connections Top Skills Graph</h3>

    <p style="font-size:10px;"> Clicking on a node moves the tree and centers that node.</p>
<?php if ($_smarty_tpl->getVariable('treeSkills')->value!=''){?>
    <div id="infovis"></div>
<?php $_template = new Smarty_Internal_Template("treechart.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <script type="text/javascript">
        init();
    </script>
    <?php }else{ ?>
    <?php if ($_smarty_tpl->getVariable('randomFriend')->value==''){?>
        <img src="tpl/img/connsgraph1.png">
        <?php }else{ ?>
        <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('randomFriend')->value;?>
"><img src="tpl/img/connsgraph1.png"></a>

        <p>&nbsp;</p>
        <a href="addskills.php?lid=<?php echo $_smarty_tpl->getVariable('randomFriend')->value;?>
" class="inputButton"><?php echo $_smarty_tpl->getVariable('LANG')->value['noConnectionSkillsDefined'];?>
</a>
    <?php }?>
<?php }?>

    <div class="chartdescription">
        <a href="#" class="charthelp" onclick="$(this).next().toggle(); return false;">Graph Description</a>

        <p id="desc4">
            This graph represents your connections Top Skills as well as the connections who
            were described with those skills.
            <br/>
            For example, if the Skill "Team Work" is in the Top 10 Skills of your connections it
            will appear in the graph. All of your connections who have that skill will be
            connected to it.
            <br/>
            The graph is limited to 10 Skills.
        </p>
    </div>


</div>