{if $currentPage == $PAGES.PUBLIC_PROFILE}
    <meta property="og:title" content="Top3Skills.com - {$user.firstname} {$user.lastname}"/>
    <meta property="og:url" content="http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}"/>
    <meta property="og:image" content="{$user.pictureUrl}"/>
    <meta property="og:description" content="What are my Top 3 Skills and professional strengths? Tell me at http://Top3Skills.com/{$user.username}"/>

    <link rel="image_src" type="image/png" href="{$user.pictureUrl}" />    
    <meta name="description" content="What are my Top 3 Skills and professional strengths? Tell me at http://Top3Skills.com/{$user.username}" />
{else}
    <meta property="og:title" content="Top 3 Skills"/>
    <meta property="og:url" content="http://top3skills.com"/>
    <meta property="og:image" content="http://top3skills.com/tpl/img/t3s100_100.png"/>
    <meta property="og:description" content="Top3Skills.com - the Quick Recommendations Service.
    Ask your connections to write the Top 3 Skills and professional strengths that best describe you."/>

    <meta name="description" content="Top3Skills.com - the Quick Recommendations Service.
    Ask your connections to write the Top 3 Skills and professional strengths that best describe you." />
    <link rel="image_src" type="image/png" href="http://top3skills.com/tpl/img/t3s100_100.png" />
{/if}

<meta property="og:type" content="website"/>
<meta property="og:site_name" content="Top 3 Skills"/>
<meta property="fb:admins" content="693665996,524092012"/>
<meta name="keywords" content="top 3 skills, top, skills, strengths, recommendations, jobs, job finder, professional, linkedin, quick, hr, raises, wages, boss, career" />