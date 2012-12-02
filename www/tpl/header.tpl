<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>iRememberYa!</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="{$baseUrl}web/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="{$baseUrl}web/css/style.css"/>
<link rel="stylesheet" type="text/css" href="{$baseUrl}web/css/style_dirk.css"/>
    <link rel="stylesheet" type="text/css" href="{$baseUrl}web/js/jtopbar/jtopbar.css"/>
    <!--[if lte ie 7]>
    <link rel="stylesheet" type="text/css" href="{$baseUrl}web/css/ie7fix.css"/>
    <![endif]-->
    <link rel="Shortcut Icon" href="{$baseUrl}web/icons/favicon.ico">

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
    <link rel="stylesheet" href="{$baseUrl}web/js/contactable/contactable.css" type="text/css" />
   	<script type="text/javascript" src="{$baseUrl}web/js/contactable/jquery.validate.pack.js"></script>
	<script type="text/javascript" src="{$baseUrl}web/js/contactable/jquery.contactable.min.js"></script>
    <!-- END Feedback -->
    
    <link rel="stylesheet" href="{$baseUrl}web/js/autocomplete/jquery.autocomplete.css" type="text/css"/>
    <script type="text/javascript" src="{$baseUrl}web/js/autocomplete/lib/jquery.bgiframe.min.js"></script>
    <script type="text/javascript" src="{$baseUrl}web/js/autocomplete/jquery.autocomplete.js"></script>
    <script type="text/javascript" src="{$baseUrl}web/js/functions.js"></script>
    
    <!--[if lt IE 9]>
    <script language="javascript" type="text/javascript" src="{$baseUrl}web/js/jqplot/excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="{$baseUrl}web/js/jqplot/jquery.jqplot.min.js"></script>
    <script language="javascript" type="text/javascript"
            src="{$baseUrl}web/js/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="{$baseUrl}web/js/jqplot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript"
            src="{$baseUrl}web/js/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
    <script language="javascript" type="text/javascript"
            src="{$baseUrl}web/js/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="{$baseUrl}web/js/jqplot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="{$baseUrl}web/js/jqplot/plugins/jqplot.donutRenderer.js"></script>

    <script type="text/javascript" src="{$baseUrl}web/js/thejit/jit-yc.js"></script>
    <script type="text/javascript" src="{$baseUrl}web/js/jquery.textbox-hinter.js"></script>
    <script type="text/javascript" src="{$baseUrl}web/js/jquery.topbar.js"></script>

    <link rel="stylesheet" type="text/css" href="web/js/jqplot/jquery.jqplot.min.css"/>

    <!-- Social Libs -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
		<script type="text/javascript" src="{$baseUrl}web/js/choosepic.js"></script>

	{include file="headercommon.tpl"}

    <base href="{$baseUrl}" />
</head>
<body>
{errorsucess}

<div id="header">
    <div class="content">
        <div class="floatright paddingTop15px" style="margin:0 200px 0 200px; margin-left:100px;">
        {if $displayshare}
            <div class="right marginpadding0">
                <div class="floatleft shares" style="padding-top: 1px;">
                    <script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
                    <script type="IN/Share" data-url="http://irememberya.com/" data-counter="right"></script>
                </div>
                <div class="floatleft shares">
                    <a class="twitter-share-button" data-url="http://www.irememberya.com"
                       data-text="{$LANG.tweetIndex}" data-count="none"
                       data-via="irememberya">Tweet</a>
                </div>
                <div class="floatleft shares">
                <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FiRememberYa%2F213080142035951&amp;layout=button_count&amp;show_faces=false&amp;width=200&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21&amp;ref=headerindex"
                scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
                </div>
            </div>
        {/if}
        {auth}
            {if isset($smarty.session.userId) && isset($smarty.session.user.email)}
            <a class="headerMenuLinks dash" href="dashboard.php">Dashboard</a>
            <a class="headerMenuLinks myconns" href="connections.php">My Connections</a>
            <a class="headerMenuLinks stats" href="statistics.php">Statistics</a>
            <a class="headerMenuLinks lboards" href="leaderboard.php">Leaderboard</a>
            {/if}
            &nbsp; &nbsp;
            <a href="logout.php" class="logout">Logout</a>
        {/auth}
        </div>
        <div style="margin-left:150px;"><a href="{auth default="index.php"}dashboard.php{/auth}"><img class="logo" src="tpl/img/logo.png"/></a>
        </div>
    </div>
</div>

<!--  Feedback -->
<div id="contact">
</div>
