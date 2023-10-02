<?php
/*-------------------------------------------------------+
 * 					** sa-captcha ** 					 |
 *	By Reza ramezanpour <reza.irdev@gmail.com>  		 |
 *	Script url: http://www.softafzar.net/thread1721.html |
 *	Website: http://softafzar.net        		         |
 *-------------------------------------------------------*/
$sa_captcha=$sa_captchaDIR.'/sa-captcha.inc.php';
?>
<script type="text/javascript">
function recaptcha(){
var rnd=Math.floor((Math.random()*1000)+1); 
document.getElementById("imgcaptcha").src='<?php echo $sa_captcha ?>?' + rnd;
}
</script>
<style type="text/css">
.captcha {
padding: 5px;
display: inline-block;
background: #FCFAFA;
box-shadow: 0 0 5px #E6E4E4;
border-radius: 2px;
border: 1px solid #DDD;
}
.captcha img {
vertical-align: middle;
}
#refresh{cursor: pointer}
</style>
<!-- Start SA-CAPTCHA code block -->
<span class="captcha">
<img id="imgcaptcha" alt="حروف امنیتی" src="<?php echo $sa_captcha ?>"/>
<a onclick="recaptcha();" id="refresh" ><img src="<?php echo $sa_captchaDIR ?>/img/re.png"  /></a>
</span>
<!-- End SA-CAPTCHA code block -->