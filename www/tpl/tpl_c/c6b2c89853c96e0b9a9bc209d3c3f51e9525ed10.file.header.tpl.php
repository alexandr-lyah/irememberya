<?php /* Smarty version Smarty-3.0.7, created on 2012-12-02 04:04:47
         compiled from "tpl/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176417922350bac54fb04e08-28016899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6b2c89853c96e0b9a9bc209d3c3f51e9525ed10' => 
    array (
      0 => 'tpl/header.tpl',
      1 => 1311781233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176417922350bac54fb04e08-28016899',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_errorsucess')) include '/Applications/MAMP/htdocs/irememberya/www/lib/smarty/plugins/function.errorsucess.php';
if (!is_callable('smarty_block_auth')) include '/Applications/MAMP/htdocs/irememberya/www/lib/smarty/plugins/block.auth.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/jtopbar/jtopbar.css"/>
    <!--[if lte ie 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/css/ie7fix.css"/>
    <![endif]-->
    <link rel="Shortcut Icon" href="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/icons/favicon.ico">

    <script src="http://www.google.com/jsapi?key=ABQIAAAANhppuFwZh9JJhguVNjMtpRQu91xS4vSoUh6TnnpW_fhXRWQCyBSPx4C6NQSuYY0lB6-er-wo-hLxLw"
            type="text/javascript"></script>
    <script language="Javascript" type="text/javascript">
        google.load("jquery", "1.4.4");
    </script>

    <!-- JQuery UI -->
    <script language="Javascript" type="text/javascript">
        google.load("jqueryui", "1.8.2");
    </script>    
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7/themes/redmond/jquery-ui.css"/>
        
    <!--  Feedback -->   
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/contactable/contactable.css" type="text/css" />
   	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/contactable/jquery.validate.pack.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/contactable/jquery.contactable.min.js"></script>
    <!-- END Feedback -->
    
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/autocomplete/jquery.autocomplete.css" type="text/css"/>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/autocomplete/lib/jquery.bgiframe.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/autocomplete/jquery.autocomplete.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/functions.js"></script>
    
    <!--[if lt IE 9]>
    <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/jqplot/excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/jqplot/jquery.jqplot.min.js"></script>
    <script language="javascript" type="text/javascript"
            src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/jqplot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript"
            src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
    <script language="javascript" type="text/javascript"
            src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/jqplot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/jqplot/plugins/jqplot.donutRenderer.js"></script>

    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/thejit/jit-yc.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/jquery.textbox-hinter.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
web/js/jquery.topbar.js"></script>

    <link rel="stylesheet" type="text/css" href="web/js/jqplot/jquery.jqplot.min.css"/>

    <!-- Social Libs -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

	<?php $_template = new Smarty_Internal_Template("analytics.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

	<?php $_template = new Smarty_Internal_Template("headercommon.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

    <base href="<?php echo $_smarty_tpl->getVariable('baseUrl')->value;?>
" />
</head>
<body>
<?php echo smarty_function_errorsucess(array(),$_smarty_tpl);?>


<div id="header">
    <div class="content">
        <div class="floatright paddingTop15px marginright30px">
        <?php if ($_smarty_tpl->getVariable('displayshare')->value){?>
            <div class="right marginpadding0">
                <div class="floatleft shares" style="padding-top: 1px;">
                    <script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
                    <script type="IN/Share" data-url="http://top3skills.com/" data-counter="right"></script>
                </div>
                <div class="floatleft shares">
                    <a class="twitter-share-button" data-url="http://www.top3skills.com"
                       data-text="<?php echo $_smarty_tpl->getVariable('LANG')->value['tweetIndex'];?>
" data-count="none"
                       data-via="top3skills">Tweet</a>
                </div>
                <div class="floatleft shares">
                <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FTop3Skills%2F213080142035951&amp;layout=button_count&amp;show_faces=false&amp;width=200&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21&amp;ref=headerindex"
                scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
                </div>
            </div>
        <?php }?>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('auth', array()); $_block_repeat=true; smarty_block_auth(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <?php if (isset($_SESSION['userId'])&&isset($_SESSION['user']['email'])){?>
            <a class="headerMenuLinks dash" href="dashboard.php">Dashboard</a>
            <a class="headerMenuLinks myconns" href="connections.php">My Connections</a>
            <a class="headerMenuLinks stats" href="statistics.php">Statistics</a>
            <a class="headerMenuLinks lboards" href="leaderboard.php">Leaderboard</a>
            <?php }?>
            &nbsp; &nbsp;
            <a href="logout.php" class="logout">Logout</a>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_auth(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </div>
        <div class="marginleft20px"><a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('auth', array('default'=>"index.php")); $_block_repeat=true; smarty_block_auth(array('default'=>"index.php"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
dashboard.php<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_auth(array('default'=>"index.php"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><img class="logo" src="tpl/img/logo.png"/></a>
        </div>
    </div>
</div>

<!--  Feedback -->
<div id="contact">
</div>
