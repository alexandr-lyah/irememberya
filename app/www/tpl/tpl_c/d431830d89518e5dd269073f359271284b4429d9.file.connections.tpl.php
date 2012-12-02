<?php /* Smarty version Smarty-3.0.7, created on 2011-07-27 11:54:28
         compiled from "tpl/connections.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12272701934e3034b4531c26-01295929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd431830d89518e5dd269073f359271284b4429d9' => 
    array (
      0 => 'tpl/connections.tpl',
      1 => 1311781973,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12272701934e3034b4531c26-01295929',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_options')) include '/home/tascaco/top3skills.com/www/lib/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_function_cycle')) include '/home/tascaco/top3skills.com/www/lib/smarty/plugins/function.cycle.php';
?>
<script type="text/javascript">
function Connection(name, id){
    this.name = removeDiacritics(name.toLowerCase());
    this.id = id;
    return this;
}

Connection.prototype = {
    constructor: Connection,
    show : function(){
        $('#conn'+this.id).show();
    },
    hide : function(){
        $('#conn'+this.id).hide();
    }
};

var connections = [];

function connectionMatchesName(connection, name){
    name = removeDiacritics(name.toLowerCase());
    if (connection.name.indexOf(name) == -1){
        return false;
    }

    return true;
}

function hideNonMatchingConnections(name){
    var conn;

    for (var i = 0; i < connections.length; i++){
        conn = connections[i];
        if (!connectionMatchesName(conn, name)){
            conn.hide();
        }
        else{
            conn.show();
        }
    }
}
</script>

<div class="content center">

    <div class="leftcolum"> <!-- Start left column -->

        <div class="rounded center marginTop40px" style="width: 90%;" id="rconns">
            <h3>My connections</h3>

            <form class="noMarginPadding" method="GET" action="connections.php">
                <p style="border-top:1px solid #E8E8E8; border-bottom:1px solid #E8E8E8; padding: 5px 0; "
                   class="lightbluebackground  marginTop10px connectionsLoadingHide">
                    <!--
                    <label>Name <img src="web/icons/help.png" width="16" height="16" class="helpIcon" title="Filters by current and past companies of your connections"/>:
                        <input type="text" onkeyup="hideNonMatchingConnections(this.value);" />
                    </label>
                    <br />
                    -->
                    <label>Company <img src="web/icons/help.png" width="16" height="16" class="helpIcon" title="Filters by current and past companies of your connections"/>:
                        <select id="companySelect" name="id">
                            <option value="-1">All</option>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->getVariable('popularCompanies')->value,'selected'=>$_smarty_tpl->getVariable('companyId')->value),$_smarty_tpl);?>

                        </select>
                    </label>
                    <input type="submit" class="inputButtonSmall" value="Filter"/>
                </p>
                <input type="hidden" name="type" value="company">
            </form>

            <br>  
        <?php if ($_smarty_tpl->getVariable('connections')->value!=''){?>
            <?php  $_smarty_tpl->tpl_vars['conn'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('connections')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['conn']->key => $_smarty_tpl->tpl_vars['conn']->value){
?>
            <script type="text/javascript">connections.push(new Connection('<?php echo $_smarty_tpl->tpl_vars['conn']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['conn']->value['lastname'];?>
', '<?php echo $_smarty_tpl->tpl_vars['conn']->value['id'];?>
'));</script>
                <div id="conn<?php echo $_smarty_tpl->tpl_vars['conn']->value['id'];?>
" class="connectionsBox <?php echo smarty_function_cycle(array('values'=>" , ,lightbluebackground, lightbluebackground"),$_smarty_tpl);?>
"
                     style="display: table; height: 70px; float: left; width: 302px; border: 1px solid #ddd; margin: 5px; vertical-align: middle;">
                    <span class="connectionsInlineBox" style="width: 66px;"><a
                            href="profile.php?lid=<?php echo $_smarty_tpl->tpl_vars['conn']->value['linkedin_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['conn']->value['pictureUrl'];?>
" width="35"
                                                                            height="35"/></a>
                    </span>
                    <span class="connectionsInlineBox" style="margin-left:5px; text-align:left; width: 230px;">
                        <a href="profile.php?lid=<?php echo $_smarty_tpl->tpl_vars['conn']->value['linkedin_id'];?>
"
                           class="normalfont"><?php echo $_smarty_tpl->tpl_vars['conn']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['conn']->value['lastname'];?>
</a>
                        <br>
                        <a href="addskills.php?lid=<?php echo $_smarty_tpl->tpl_vars['conn']->value['linkedin_id'];?>
"><?php if ($_smarty_tpl->tpl_vars['conn']->value['skill1']!=''){?>Update<?php }else{ ?>Add<?php }?>
                            skills</a>
                    </span>
                    <!--[if lte ie 7]><span class="connectionsInlineBoxHack" style="width:1px;">&nbsp;</span>
                    <![endif]-->
                </div>
            <?php }} ?>
            <br style="clear: both;">
            <?php }else{ ?>
            You don't have any connections.
        <?php }?>
        </div>
    </div>
    <!-- End left column -->


    <div class="rightcolumn">     <!-- Start advertisement column -->

    <?php $_template = new Smarty_Internal_Template("adsrightcol.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

    </div>


    <div class="clear"></div>

</div>