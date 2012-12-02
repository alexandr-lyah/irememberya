<?php /* Smarty version Smarty-3.0.7, created on 2012-12-02 09:46:25
         compiled from "tpl/sharebox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5708666150bb1561f38e86-44567672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '570c71a9bb210e1cae34c4875f035e60b3e79b7c' => 
    array (
      0 => 'tpl/sharebox.tpl',
      1 => 1305773447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5708666150bb1561f38e86-44567672',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
        <div class="rounded center marginTop40px" style="width:90%;" id="giveurl">

            <h1 style="padding:0;">Give this link to your connections</h1>

            <form action="">
                <input type="text" value="http://top3skills.com/<?php echo $_smarty_tpl->getVariable('user')->value['username'];?>
" style="width:90%" readonly="readonly" onclick="$(this).select()">
            </form>
            <p>
                Your connections will be able to write the Top 3 Skills that best describe you
            </p>

            <p class="marginTop20px">
                <a
                   href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Ftop3skills.com%2f<?php echo $_smarty_tpl->getVariable('user')->value['username'];?>
&amp;summary=<?php echo $_smarty_tpl->getVariable('shareMsg')->value;?>
&amp;source=Top3Skills.com."
                   class="lshare logShare" id="LinkedIn" target="_blank">Share on LinkedIn</a>
                <a
                   href="http://twitter.com/share?text=<?php echo $_smarty_tpl->getVariable('shareMsg')->value;?>
&related=top3skills&via=top3skills&url=http%3a%2f%2ftop3skills.com%2f<?php echo $_smarty_tpl->getVariable('user')->value['username'];?>
"
                   class="tshare logShare" id="Twitter" target="_blank">Share on Twitter</a>
                <a
                   href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Ftop3skills.com%2F<?php echo $_smarty_tpl->getVariable('user')->value['username'];?>
&t=Top3Skills.com%20-%20What%20are%20my%20Top%203%20Skills%20and%20professional%20strengths%3F" class="fshare logShare"
                   id="Facebook" target="_blank">Share on Facebook</a>
            </p>
            
            <?php if ($_smarty_tpl->getVariable('sharescreen')->value){?>
            <div class="marginTop40px">
            	<a href="dashboard.php" class="inputButton">Continue</a>
            </div>
            <?php }?>
            
        </div>


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
