<div class="lightbluebackground boxProfile">
    <div class="photo">

    {if !$guestview}
        <a href="profile.php?lid={$user.linkedin_id}"><img src="{$user.pictureUrl}" height="80" width="80"></a>
        {else}
        <img src="{$user.pictureUrl}" height="80" width="80">
    {/if}

    </div>
    <div class="content">
    {if !$guestview}
        <p class="title"><a
                href="profile.php?lid={$user.linkedin_id}">{$user.firstname} {$user.lastname}</a></p>
        {else}
        <p class="title">{$user.firstname} {$user.lastname}</p>
    {/if}
        <p class="subtitle">
            <a href="{$user.publicProfileUrl}"><img alt="" src="web/icons/l_icon.png" title="LinkedIn Profile"
                                                    style="vertical-align:text-bottom;"></a>
            {$user.headline}
        </p>

        <p class="subsubtitle">
            {$user.location}
        </p>
    </div>
</div>