        <div class="rounded center marginTop40px" style="width:90%;" id="giveurl">

            <h1 style="padding:0;">Give this link to your connections</h1>

            <form action="">
                <input type="text" value="http://top3skills.com/{$user.username}" style="width:90%" readonly="readonly" onclick="$(this).select()">
            </form>
            <p>
                Your connections will be able to write the Top 3 Skills that best describe you
            </p>

            <p class="marginTop20px">
                <a
                   href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Ftop3skills.com%2f{$user.username}&amp;summary={$shareMsg}&amp;source=Top3Skills.com."
                   class="lshare logShare" id="LinkedIn" target="_blank">Share on LinkedIn</a>
                <a
                   href="http://twitter.com/share?text={$shareMsg}&related=top3skills&via=top3skills&url=http%3a%2f%2ftop3skills.com%2f{$user.username}"
                   class="tshare logShare" id="Twitter" target="_blank">Share on Twitter</a>
                <a
                   href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Ftop3skills.com%2F{$user.username}&t=Top3Skills.com%20-%20What%20are%20my%20Top%203%20Skills%20and%20professional%20strengths%3F" class="fshare logShare"
                   id="Facebook" target="_blank">Share on Facebook</a>
            </p>
            
            {if $sharescreen}
            <div class="marginTop40px">
            	<a href="dashboard.php" class="inputButton">Continue</a>
            </div>
            {/if}
            
        </div>

{literal}
<script type="text/javascript">
    $(document).ready(function(){
        $('#LinkedIn').click(function(){
            $.get('logshare.php', 'type=LinkedIn');

            var href = $(this).attr("href");
            openPopupWindow(href, 'Share on LinkedIn', 600, 450);
            return false;
        });

        $('#Twitter').click(function(){
            $.get('logshare.php', 'type=Twitter');

            var href = $(this).attr("href");
            openPopupWindow(href, 'Share on Twitter', 550, 370);
            return false;
        });

        $('#Facebook').click(function(){
            $.get('logshare.php', 'type=Facebook');

            var href = $(this).attr("href");
            openPopupWindow(href, 'Share on Facebook', 550, 370);
            return false;
        });
    });
</script>
{/literal}