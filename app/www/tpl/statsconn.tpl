<div class="rounded center marginTop40px" style="width:90%; padding:20px; text-align:left;">

    <h3 class="marginTop10px italic">Did you know that...</h3>

    <p style="line-height:35px;" class="marginTop10px">

        Your connections were described with a total of <strong class="blue">{$numskillsreceived}</strong> Skills by
        <strong class="blue">{$numskillsreceivedfrom}</strong> of their connections. On the other way around, they used
        <strong class="blue">{$numskillssent}</strong> Skills to describe <strong
            class="blue">{$numskillssentto}</strong> of their connections.
        <br/>
        <strong class="blue">{$numactiveconns}</strong> of your <strong class="blue">{$numconns}</strong>
        connections {if $numactiveconns == 1}is{else}are{/if} actively using Top3Skills.com and this means that you
        should invite the other <strong class="blue">{$numnonactiveconns}</strong> connections to start using
        Top3Skills.com.


    </p>

</div>

<div class="rounded center marginTop40px" style="width:90%;">
    <h3> Connections Top Skills </h3>

{if $pieTopSkills != ''}
{include file="piechart.tpl"}
    {else}
    {if $randomFriend == ''}
        <img src="tpl/img/connsnoskillspie.png"/>
        {else}
        <a href="addskills.php?lid={$randomFriend}"><img src="tpl/img/connsnoskillspie.png"/></a>
        <a href="addskills.php?lid={$randomFriend}" class="inputButton">{$LANG.noConnectionSkillsDefined}</a>
    {/if}
{/if}

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

{if $myTopSkills != ''}
{include file="chart.tpl"}
    {else}
    {if $randomFriend == ''}
        <img src="tpl/img/connsnoskillsbar.png">
        {else}
        <a href="addskills.php?lid={$randomFriend}"><img src="tpl/img/connsnoskillsbar.png"/></a>
        <a href="addskills.php?lid={$randomFriend}" class="inputButton">{$LANG.noConnectionSkillsDefined}</a>
    {/if}
{/if}
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
{if $myTopSkills2 != ''}
{include file="chart2.tpl"}
    {else}
    {if $randomFriend == ''}
        <img src="tpl/img/connsnoreferences.png">
        {else}
        <a href="addskills.php?lid={$randomFriend}"><img src="tpl/img/connsnoreferences.png"></a>
        <a href="addskills.php?lid={$randomFriend}" class="inputButton">{$LANG.noConnectionSkillsDefined}</a>
    {/if}

{/if}

    <div class="marginTop20px">
    {counter start=0 skip=1 print=false}
    {foreach $connreferences as $user}
        <div class="boxSmallProfileRanking {cycle values="lightbluebackground,"}">
            <div class="photo">
                {counter}.
                <a href="profile.php?lid={$user.linkedin_id}"><img src="{$user.pictureUrl}" height="60" width="60"> </a>
            </div>
            <div class="content">
                <a href="profile.php?lid={$user.linkedin_id}"
                   style="color: #333; font-weight:bold; font-size:14px;"><span>{$user.firstname} {$user.lastname}</span></a>
                <br/>
                <a href="{$user.publicProfileUrl}"><img alt="" src="web/icons/l_icon.png" title="LinkedIn Profile"
                                                        style="vertical-align:text-bottom;"></a>
                <span style="color: #5c5c5c; font-size:12px; font-weight:normal;">{$user.headline}</span>
                <br/>
                <span style="color: #c5c5c5; font-size:12px;">{$user.location}</span>
            </div>
        </div>
    {/foreach}
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
{if $treeSkills != ''}
    <div id="infovis"></div>
{include file="treechart.tpl"}
    <script type="text/javascript">
        init();
    </script>
    {else}
    {if $randomFriend == ''}
        <img src="tpl/img/connsgraph1.png">
        {else}
        <a href="addskills.php?lid={$randomFriend}"><img src="tpl/img/connsgraph1.png"></a>

        <p>&nbsp;</p>
        <a href="addskills.php?lid={$randomFriend}" class="inputButton">{$LANG.noConnectionSkillsDefined}</a>
    {/if}
{/if}

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