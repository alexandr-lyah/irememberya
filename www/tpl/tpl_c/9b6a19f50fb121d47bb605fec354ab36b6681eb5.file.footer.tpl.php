<?php /* Smarty version Smarty-3.0.7, created on 2012-12-02 04:04:47
         compiled from "tpl/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12175579550bac54fe3c758-25140039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b6a19f50fb121d47bb605fec354ab36b6681eb5' => 
    array (
      0 => 'tpl/footer.tpl',
      1 => 1305773448,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12175579550bac54fe3c758-25140039',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>


<div id="footer" class="center">
	<a href="about.php" class="footerlink">About</a> |
    <a href="about.php" class="footerlink">Contact</a>
    &nbsp;
    <a target="_blank" href="http://twitter.com/top3skills">
        <img src="web/icons/t_icon.png"  width="18" height="18" /></a>
    &nbsp;
    <a target="_blank" href="http://facebook.com/top3skills">
        <img src="web/icons/f_icon.png"  width="18" height="18" /></a>
</div>



<script type="text/javascript">
    $(document).ready(function(){
        attachBoxHoverEffect();
    });

    $('#contact').contactable({
 		subject: 'A Feeback Message'
 	});
 	
</script>

</body>
</html>