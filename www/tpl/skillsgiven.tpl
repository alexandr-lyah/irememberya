<div class="rounded center marginTop40px" style="width:90%;">
    <h3>{$LANG.connections3SkillsByMe}</h3>

{if $sentSkills != ''}

    <div style="border-top:1px solid #E8E8E8; border-bottom:1px solid #E8E8E8;" class="marginTop20px">
        {foreach $sentSkills as $conn}
            {assign var="extraClass" value=""}
            {if $conn.skill1|count_characters+$conn.skill2|count_characters+$conn.skill3|count_characters > 50}
            {assign var="extraClass" value="referencesSkillsSmall"}
            {/if}
            <div class="{cycle values="boxSmallProfileSkills,lightbluebackground boxSmallProfileSkills"}">
                <div class="photo">
                    <a href="profile.php?lid={$conn.linkedin_id}"><img src="{$conn.pictureUrl}" height="60" width="60"/></a>
                </div>
                <div class="content">
                    <p>
                        <a href="{$conn.publicProfileUrl}"><img alt="" src="web/icons/l_icon.png"
                                                                title="LinkedIn Profile"
                                                                style="vertical-align:text-bottom;"></a>
                        <a href="profile.php?lid={$conn.linkedin_id}"
                           class="namelink">{$conn.firstname} {$conn.lastname}</a>
                    </p>
                    <p >
                        <a class="referencesSkills {$extraClass}" href="leaderboard/all/{$conn.skill1}">{$conn.skill1}</a>
                        <a class="referencesSkills {$extraClass}" href="leaderboard/all/{$conn.skill2}">{$conn.skill2}</a>
                        <a class="referencesSkills {$extraClass}" href="leaderboard/all/{$conn.skill3}">{$conn.skill3}</a>
                    </p>
                </div>
                <div class="floatright"><a href="addskills.php?lid={$conn.linkedin_id}" class="smallButton">Edit</a></div>
            </div>
            <div class="clear"></div>
        {/foreach}
    </div>
    {else}
    {if $firstfriend != '' && $firstfriend.linkedin_id != ''}
        <a href="addskills.php?lid={$firstfriend.linkedin_id}"><img src="tpl/img/noskills_profile.png"></a>
        <a href="addskills.php?lid={$firstfriend.linkedin_id}" class="inputButton">{$LANG.noConnectionSkillsDefined}</a>
        {else}
        <img src="tpl/img/noskills_profile.png"/>
    {/if}
{/if}
</div>