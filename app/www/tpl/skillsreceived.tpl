<div style="border-top:1px solid #E8E8E8; border-bottom:1px solid #E8E8E8;" class="marginTop20px">
{foreach $receivedSkills as $conn}
    <div class="{cycle values="boxSmallProfileSkills,lightbluebackground boxSmallProfileSkills"}">
        <div class="photo">
            <a href="profile.php?lid={$conn.linkedin_id}"><img src="{$conn.pictureUrl}" height="60" width="60"/> </a>
        </div>
        <div class="content">
            <p>
                <a href="{$conn.publicProfileUrl}"><img alt="" src="web/icons/l_icon.png" title="LinkedIn Profile"
                                                        style="vertical-align:text-bottom;"></a>
                <a href="profile.php?lid={$conn.linkedin_id}" class="namelink">{$conn.firstname} {$conn.lastname}</a>
                wrote:
            </p>

            <p>
                <a class="referencesSkills" href="leaderboard/all/{$conn.skill1}">{$conn.skill1}</a>
                <a class="referencesSkills" href="leaderboard/all/{$conn.skill2}">{$conn.skill2}</a>
                <a class="referencesSkills" href="leaderboard/all/{$conn.skill3}">{$conn.skill3}</a>
            </p>
        </div>
        {if $writeback}
            <div class="clear"></div>
            <div class="floatright"><a href="addskills.php?lid={$conn.linkedin_id}" class="smallButton">Write Back</a>
            </div>
        {/if}
        {if $myId == $conn.linkedin_id}
            <div class="clear"></div>
            <div class="floatright"><a href="addskills.php?lid={$user.linkedin_id}" class="smallButton">Edit</a>
            </div>
        {/if}
    </div>
{/foreach}
</div>