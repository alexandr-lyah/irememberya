{if $guestview}
<table style="border-collapse: collapse;" cellpadding="0" cellspacing="0" width="100%" class="marginTop10px">
    <tr>
        {section name=conn loop=$connections max=9}
            <td style="width: 70px;" class="center">
                <p><img src="{$connections[conn].pictureUrl}" height="60" width="60"/></p>
                <p>
                    {$connections[conn].firstname} {$connections[conn].lastname}
                </p>
            </td>
        {/section}
    </tr>
</table>

{else}

<table style="border-collapse: collapse;" cellpadding="0" cellspacing="0" width="100%" class="marginTop10px">
    <tr>
        {section name=conn loop=$connections max=9}
            <td style="width: 70px;" class="center">
                <p><a href="addskills.php?lid={$connections[conn].linkedin_id}"><img
                        src="{$connections[conn].pictureUrl}" height="60" width="60"/></a></p>
                <p>
                    <a href="addskills.php?lid={$connections[conn].linkedin_id}">{$connections[conn].firstname} {$connections[conn].lastname}</a>
                </p>
            </td>
        {/section}
    </tr>
</table>
{/if}
