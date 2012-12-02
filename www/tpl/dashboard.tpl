<div class="content center">
    <div class="leftcolum">

    {include file="sharebox.tpl"}

        <div class="rounded center marginTop40px" style="width:90%;">
            <h3>My Top 3 Skills</h3>

        {if $myOwnSkills != ''}

            <div style="border-top:1px solid #E8E8E8; border-bottom:1px solid #E8E8E8;" class="marginTop20px">
                <div class="lightbluebackground boxSmallProfileSkills">
                    <div class="photo">
                        <a href="profile.php?lid={$user.linkedin_id}"><img src="{$user.pictureUrl}" height="60"
                                                                           width="60"></a>
                    </div>
                    <div class="content">
                        <p>
                        <a href="{$user.publicProfileUrl}"><img alt="" src="web/icons/l_icon.png"
                                                                title="LinkedIn Profile"
                                                                style="vertical-align:text-bottom;"></a> <a
                            href="profile.php?lid={$user.linkedin_id}"
                            class="namelink">{$user.firstname} {$user.lastname}</a>
                        </p>
                        <p>
                            <a class="referencesSkills"
                               href="leaderboard/all/{$myOwnSkills.skill1}">{$myOwnSkills.skill1}</a>
                            <a class="referencesSkills"
                               href="leaderboard/all/{$myOwnSkills.skill2}">{$myOwnSkills.skill2}</a>
                            <a class="referencesSkills"
                               href="leaderboard/all/{$myOwnSkills.skill3}">{$myOwnSkills.skill3}</a>
                        </p>
                    </div>
                    <div class="floatright"><a href="addskills.php?lid={$user.linkedin_id}" class="smallButton">Edit</a></div>
                </div>
                <div class="clear"></div>
            </div>

            {else}
            <p class="marginTop20px">
                <a href="addskills.php?lid={$user.linkedin_id}" class="inputButton">Add the Top 3 Skills that best
                    describe you!</a>
            </p>
        {/if}

        </div>

        <div class="rounded center marginTop40px" style="width:90%;">
            <h3>My Top Skills, according to my connections</h3>

        {if $myTopSkills != ''}
        {include file="chart.tpl"}
        {include file="skillsreceived.tpl"}
            {else}
            <img src="tpl/img/noskills4.png"/>
        {/if}

        </div>

    {if $randomconnections != ''}
    {include file="skillsgiven.tpl"}
    {/if}



        <div class="rounded center marginTop40px" style="width:90%;">
            <h3>Statistics</h3>

            <p class="marginTop10px">Take a look at the statistics we have for you. Just enter the <a class="stats"
                                                                                                      href="statistics.php">Statistics
                section</a></p>
        </div>


        <div class="rounded center marginTop40px" style="width:90%;">
            <h3>Leaderboard</h3>

            <p class="marginTop10px">If you want to know who's the best at a certain Skill, jump straight to the <a
                    class="lboards" href="leaderboard.php">Leaderboard section</a></p>
        </div>
    </div>

    <div class="rightcolumn">

        <div class="boxNormal">
            <h4 class="center">My progress</h4>

            <div class="center marginTop10px">
                <div id="progressbar" style="border:1px solid #82b337"><span
                        style="position:absolute; text-align:center; margin-top:6px; margin-left:86px; color:green;">{$completeness}
                    % </span></div>
            </div>


        {if $itasks != ''}
            <div class="marginTop10px">
                <p style="font-weight: bold; text-align: left;">Next Tasks</p>
                {foreach $itasks as $it}
                    <p class="incomptask left">{$it.description}</p>
                {/foreach}
            </div>
        {/if}

            <div class="marginTop10px">
                <p style="font-weight: bold; text-align: left;">Completed Tasks</p>
            {if $ctasks != ''}
                {foreach $ctasks as $ct}
                    <p class="comptask left">{$ct.description}</p>
                {/foreach}
            {/if}
            </div>

            <script type="text/javascript">
                var progress_key = '4dadc79ed3c16';

                $(document).ready(function() {
                $("#progressbar").progressbar({ value: {$completeness}, barImage: 'web/js/progressbar/images/progressbg_green.gif' });
                });


            </script>
        </div>

        <div class="rounded center" style="margin-top: 40px; !important">
            <h4>My connections</h4>
        {if $randomconnections != ''}
            <a href="connections.php">View All</a>
            {foreach $randomconnections as $conn}
                <div class="marginTop20px boxLiquidProfile">
                    <div class="photo"><a
                            href="profile.php?lid={$conn.linkedin_id}"><img src="{$conn.pictureUrl}" width="35" height="35"></a>
                    </div>
                    <div class="content">
                        <p><a href="profile.php?lid={$conn.linkedin_id}"
                              class="normalfont">{$conn.firstname} {$conn.lastname}</a></p>
                        <a href="addskills.php?lid={$conn.linkedin_id}">{if $conn.skill1 != ''}Update{else}Add{/if}
                            skills</a>
                    </div>
                </div>

                {if $conn@iteration == 20}
                    <div style="margin-top: 20px; width: 125px; margin-left: 50px;">
                        {literal}
                            <script type="text/javascript"><!--
                            google_ad_client = "ca-pub-6868966921230764";
                            /* topskills 125x125 */
                            google_ad_slot = "0679703482";
                            google_ad_width = 125;
                            google_ad_height = 125;
                            //-->
                            </script>
                            <script type="text/javascript"
                                    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
                            </script>
                        {/literal}
                    </div>
                {/if}
            {/foreach}
            {else}
            You don't have any connections.
        {/if}
        </div>

        <div style="margin-top: 40px;">
            <script type="text/javascript"><!--
            google_ad_client = "ca-pub-6868966921230764";
            /* topskills 234x60 color3 */
            google_ad_slot = "5355941966";
            google_ad_width = 234;
            google_ad_height = 60;
            //-->
            </script>
            <script type="text/javascript"
                    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script>

        </div>

    </div>

    <div class="clear"></div>

</div>