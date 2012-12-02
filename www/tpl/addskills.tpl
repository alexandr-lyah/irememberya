<div class="content center">


    <div class="leftcolum"> <!-- Start left column -->

    {if $guestview}
        <div class="rounded center marginTop40px" style="width:90%;">
            <h1 class="bigerror">Please login before proceeding</h1>
            <a id="lconn" href="{if isset($smarty.session.userId)}dashboard.php{else}register.php{/if}"
               onclick="$('#lconn').hide(); $('#loading').show();"><img alt="banner" style="vertical-align: middle;"
                                                                        src="tpl/img/loginbutton.png"
                                                                        class="loginButton _boxHover"/></a>

            <p class="center loginbuttondiv marginpadding0" id="loading" style="display:none;">
                <img alt="" src="tpl/img/ajax-loader_whitebg.gif">
                <br/>
                <span style="color:#4aa9df;">Connecting to LinkedIn...</span>
            </p>

            <p class="left font12 marginTop20px italic">
                <strong>Top3Skills.com</strong> is a service that allows you to kindly ask your connections to write the
                Top 3 Skills and professional strengths that best describe you.
                Way easier than writing long recommendations, right?
            </p>
        </div>
    {/if}

        <div class="rounded center marginTop40px" style="width:90%;">

        {include file="profilebox.tpl"}

            <div class=" center marginTop20px">
                <h3> What are the Top 3 Skills and professional strengths that best describe {if $myskills}
                    you{else}{$user.firstname}{/if}? </h3>
            </div>

            <div class="clear"></div>

            <!-- {if $error != ''}<p class="errorbox margin20px">{$error}</p>{/if} -->

            <form method="POST" action="{$smarty.server.PHP_SELF}?act=add" id="addSkills" class="marginTop20px">

                <input type="text" maxlength="32" class="mediumInput skillInput" name="skill1" id="skill1"
                       {if $skill1 != ''}value="{$skill1}"{/if} {if $guestview} readonly{/if} />
                <br/>
                <input type="text" maxlength="32" class="mediumInput skillInput" name="skill2" id="skill2"
                       {if $skill2 != ''}value="{$skill2}"{/if} {if $guestview} readonly{/if} />
                <br/>
                <input type="text" maxlength="32" class="mediumInput skillInput" name="skill3" id="skill3"
                       {if $skill3 != ''}value="{$skill3}"{/if} {if $guestview} readonly{/if} />
                <br/>

            <p class="marginTop20px">
            {if $guestview}
                <a href="#" onclick=" showDialog(); return false;"><img alt="" src="tpl/img/saveskills.png"/></a>

                <div id="dialog" title="Login" style="display:none;">
                    <p>You need to login before proceeding. <br><br>Go to the top of this page and click the <span
                            class="italic">"Log in with LinkedIn"</span> button.</p>
                </div>

                {else}
                <input type="submit" value="Save skills and continue" class="inputButton"
                       onclick="$('.skillInput.inputHint').val('');"/>
            {/if}
                </p>
                <input type="hidden" name="uid" value="{$user.linkedin_id}"/>
            {if $prevconnection != ''}<input type="hidden" name="prevuid" value="{$prevconnection}"/> {/if}


            {if !$myskills && !$guestview}
                <div class="center font12" style="margin-top: 10px; ">
                    <input type="checkbox" name="msg" id="msg" checked="checked" class="reset"/> Send LinkedIn message
                    with skills to {$user.firstname}
                </div>
            {/if}


            {if $prevconnection != ''}
                <div style="float:left; text-align:left; width:33%;"><a href="addskills.php?lid={$prevconnection}">Previous</a>
                </div>
            {/if}

            {if $nextconnection != ''}
                <div style="float:right; text-align:right;"><a
                        href="addskills.php?lid={$nextconnection.linkedin_id}&plid={$user.linkedin_id}&skipped=1">Skip</a>
                </div>
            {/if}

            </form>
        </div>

    {if $guestview}
        <div class="rounded center marginTop40px" style="width:90%; padding-bottom: 15px">
            <h3>{$user.firstname}'s connections you may want to praise...</h3>

            <div id="connectionsResultDiv" class="connectionsLoadingHide" style="margin: 0; padding: 0;">
            {include file="connectionsBox.tpl"}
            </div>
        </div>
        {else}
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
    {/if}

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

{/literal}

{if $guestview}
    {literal}
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
    {/literal}
    {else}
    {literal}
        $('#skill1').focus();
    {/literal}
{/if}
{literal}
});

function showDialog() {
    $('#dialog').dialog({
                height: 140,
                modal: true
            });
}

{/literal}
</script>