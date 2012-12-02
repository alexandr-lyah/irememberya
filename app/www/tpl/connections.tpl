{literal}
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
{/literal}
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
                            {html_options options=$popularCompanies selected=$companyId}
                        </select>
                    </label>
                    <input type="submit" class="inputButtonSmall" value="Filter"/>
                </p>
                <input type="hidden" name="type" value="company">
            </form>

            <br>  
        {if $connections != ''}
            {foreach $connections as $conn}
            <script type="text/javascript">connections.push(new Connection('{$conn.firstname} {$conn.lastname}', '{$conn.id}'));</script>
                <div id="conn{$conn.id}" class="connectionsBox {cycle values=" , ,lightbluebackground, lightbluebackground"}"
                     style="display: table; height: 70px; float: left; width: 302px; border: 1px solid #ddd; margin: 5px; vertical-align: middle;">
                    <span class="connectionsInlineBox" style="width: 66px;"><a
                            href="profile.php?lid={$conn.linkedin_id}"><img src="{$conn.pictureUrl}" width="35"
                                                                            height="35"/></a>
                    </span>
                    <span class="connectionsInlineBox" style="margin-left:5px; text-align:left; width: 230px;">
                        <a href="profile.php?lid={$conn.linkedin_id}"
                           class="normalfont">{$conn.firstname} {$conn.lastname}</a>
                        <br>
                        <a href="addskills.php?lid={$conn.linkedin_id}">{if $conn.skill1 != ''}Update{else}Add{/if}
                            skills</a>
                    </span>
                    <!--[if lte ie 7]><span class="connectionsInlineBoxHack" style="width:1px;">&nbsp;</span>
                    <![endif]-->
                </div>
            {/foreach}
            <br style="clear: both;">
            {else}
            You don't have any connections.
        {/if}
        </div>
    </div>
    <!-- End left column -->


    <div class="rightcolumn">     <!-- Start advertisement column -->

    {include file="adsrightcol.tpl"}

    </div>


    <div class="clear"></div>

</div>