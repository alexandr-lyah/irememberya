<div class="content center">


    <div class="leftcolum"> <!-- Start left column -->

        <div class="rounded center marginTop40px" style="width:90%;">
            <h1 class="bigerror">{$user.firstname} is not a connection</h1>

            <p class="font12 center">
                Add <a href="{$user.publicProfileUrl}">{$user.firstname}</a> to your <a href="{$user.publicProfileUrl}">LinkedIn network</a>
                and come back to add their Top3Skills.
            </p>
        </div>

        <div class="rounded center marginTop40px" style="width:90%;">

        {include file="profilebox.tpl"}

            <div class=" center marginTop20px">
                <h3> What are the Top 3 Skills and professional strengths that best describe {if $myskills}
                    you{else}{$user.firstname}{/if}? </h3>
            </div>

            <div class="clear"></div>
            <form method="POST" action="{$smarty.server.PHP_SELF}?act=add" id="addSkills" class="marginTop20px">


                <input type="text" maxlength="22" class="mediumInput skillInput" name="skill1" id="skill1"
                       readonly="readonly"/>
                <br/>
                <input type="text" maxlength="22" class="mediumInput skillInput" name="skill2" id="skill2"
                       readonly="readonly"/>
                <br/>
                <input type="text" maxlength="22" class="mediumInput skillInput" name="skill3" id="skill3"
                       readonly="readonly"/>
                <br/>

            </form>
            <p class="marginTop20px">
                <a href="#" onclick="showDialog(); return false;"><img alt="" src="tpl/img/saveskills.png"/></a>

            <div id="dialog" title="Login" style="display:none;">
                <p>You need to add {$user.firstname} to your network at LinkedIn first.</p>
            </div>

        </div>


        <div class="rounded center marginTop40px" style="width:90%; padding-bottom: 15px">
            <h3>My Connections</h3>

            <p style="border-top:1px solid #E8E8E8; border-bottom:1px solid #E8E8E8; padding: 5px 0; "
               class="lightbluebackground  marginTop10px connectionsLoadingHide">
                <label>Company:
                    <select id="companySelect">
                        <option value="-1">All</option>
                    {foreach from=$popularCompanies item=c}
                        <option value="{$c.id}">{$c.name}</option>
                    {/foreach}
                    </select>
                </label>
                <a id="companyFilter" href="#" class="inputButtonSmall">Filter</a>
            </p>
            <p class="center loginbuttondiv" id="connectionsLoading" style="display:none;">
                <img alt="" src="tpl/img/ajax-loader_whitebg.gif">
                <br/>
                <span style="color:#4aa9df;">Loading connections...</span>
            </p>

            <div id="connectionsResultDiv" class="connectionsLoadingHide" style="margin: 0; padding: 0;">
            {include file="connectionsBox.tpl"}
            </div>
            <p style="border-top:1px solid #E8E8E8; border-bottom:1px solid #E8E8E8; padding: 5px 0; "
               class="lightbluebackground  marginTop10px connectionsLoadingHide">
                <a href="connections.php" id="viewAllConnsLink">View all connections</a>
            </p>
        </div>

    {if $sentSkills != ''}
    {include file="skillsgiven.tpl"}
    {/if}

    </div>
    <!-- End left column -->


    <div class="rightcolumn">     <!-- Start advertisement column -->
    {include file="adsrightcol.tpl"}
    </div>


    <div class="clear"></div>

</div>


{literal}
<script type="text/javascript">
        $(document).ready(function () {
    $("#skill1").autocomplete("skills.php", {
                width: 410,
                max:15,
                autoFill: false,
                selectFirst: false
            });
    $("#skill2").autocomplete("skills.php", {
                width: 410,
                max:15,
                autoFill: false,
                selectFirst: false
            });
    $("#skill3").autocomplete("skills.php", {
                width: 410,
                max:15,
                autoFill: true,
                selectFirst: false
            });

        $('#skill1').tbHinter({text: 'e.g. {/literal}{$hintSkill1}{literal}', classHint: 'inputHint'});
        $('#skill2').tbHinter({text: 'e.g. {/literal}{$hintSkill2}{literal}', classHint: 'inputHint'});
        $('#skill3').tbHinter({text: 'e.g. {/literal}{$hintSkill3}{literal}', classHint: 'inputHint'});

    $('#companyFilter').click(function() {
        $('#connectionsLoading').show();
        $('.connectionsLoadingHide').hide();

        var companyId = $('#companySelect').val();
        var params = "";

        if (companyId != -1) {
            params = "type=company&id=" + companyId;
        }

        $.get('connectionsAjax.php', params, function(data) {
            $('#connectionsLoading').hide();
            $('.connectionsLoadingHide').show();
            if (companyId != -1) {
                $('#viewAllConnsLink').attr('href', 'connections.php?' + params);
            }
            else {
                $('#viewAllConnsLink').attr('href', 'connections.php');
            }

            $('#connectionsResultDiv').html(data);
        }, 'html');

        return false;
    });


    $('#skill1').focus(function() {
        $('#skill1').blur();
        showDialog();
        return false;
    });

    $('#skill2').focus(function() {
        $('#skill2').blur();
        showDialog();
        return false;
    });

    $('#skill3').focus(function() {
        $('#skill3').blur();
        showDialog();
        return false;
    });
});

function showDialog() {
    $('#dialog').dialog({
                height: 140,
                modal: true
            });
}

{/literal}
</script>