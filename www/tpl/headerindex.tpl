<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>iRememberYa!</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <link rel="stylesheet" type="text/css" href="web/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="web/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="web/js/jtopbar/jtopbar.css"/>
    <link rel="Shortcut Icon" href="web/icons/favicon.ico">

    <script src="http://www.google.com/jsapi?key=ABQIAAAANhppuFwZh9JJhguVNjMtpRQu91xS4vSoUh6TnnpW_fhXRWQCyBSPx4C6NQSuYY0lB6-er-wo-hLxLw"
            type="text/javascript"></script>
    <script language="Javascript" type="text/javascript">
        google.load("jquery", "1.4.4");
    </script>
    
    <!--  Feedback -->   
    <link rel="stylesheet" href="{$baseUrl}web/js/contactable/contactable.css" type="text/css" />
   	<script type="text/javascript" src="{$baseUrl}web/js/contactable/jquery.validate.pack.js"></script>
	<script type="text/javascript" src="{$baseUrl}web/js/contactable/jquery.contactable.min.js"></script>
    <!-- END Feedback -->
        
    <script type="text/javascript" src="web/js/functions.js"></script>

    <!-- Social Libs -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

	{include file="analytics.tpl"}

	{include file="headercommon.tpl"}

</head>
<body style=" background: #4aa9df;">
{errorsucess}

<div id="header" class="headerIndex" >
    <div class="contentindex">
        <div class="floatright paddingTop15px">
        {if $displayshare}
            <div class="right marginpadding0">
                <div class="floatleft shares" style="padding-top: 1px;">
                    <script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
                    <script type="IN/Share" data-url="http://irememberya.com/" data-counter="right"></script>
                </div>
				<div class="floatleft shares">
                    <g:plusone size="medium" count="false" href="http://irememberya.com"></g:plusone>
                </div>
                <div class="floatleft shares">
                    <a class="twitter-share-button" data-url="http://www.irememberya.com"
                       data-text="iRememberYa! - Learn and Refresh your Social Network" data-count="none"
                       data-via="irememberya">Tweet</a>
                </div>
                <div class="floatleft shares">
                <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2Firememberya%2F213080142035951&amp;layout=button_count&amp;show_faces=false&amp;width=200&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21&amp;ref=headerindex"
                scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
                </div>
            </div>
        {/if}
        {auth}
            {if isset($smarty.session.userId) && isset($smarty.session.user.email)}
            <a class="dash" href="dashboard.php">Dashboard</a>
            <a class="headerMenuLinks myconns" href="connections.php">My Connections</a>
            <a class="stats" href="statistics.php">Statistics</a>
            <a class="lboards" href="leaderboard.php">Leaderboard</a>
            {/if}
            &nbsp; &nbsp;
            <a href="logout.php" class="logout">Logout</a>
        {/auth}
        </div>
         <div class="marginleft15px"><a href="{auth default="index.php"}dashboard.php{/auth}"><img class="logo" src="tpl/img/logo.png"/></a>
        </div>
    </div>
</div>

<!--  Feedback -->
<div id="contact">
</div>
