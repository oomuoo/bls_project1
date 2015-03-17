<script type="text/javascript">
  var flashvars = {};
  flashvars.cssSource = "<?php echo Yii::app()->theme->baseUrl;?>/css/piecemaker.css";
  flashvars.xmlSource = "<?php echo Yii::app()->theme->baseUrl;?>/piecemaker.php?path=<?php echo Yii::app()->theme->baseUrl;?>";
	
  var params = {};
  params.play = "true";
  params.menu = "false";
  params.scale = "showall";
  params.wmode = "transparent";
  params.allowfullscreen = "true";
  params.allowscriptaccess = "always";
  params.allownetworking = "all";
  
  swfobject.embedSWF('<?php echo Yii::app()->theme->baseUrl;?>/piecemaker.swf', 'piecemaker', '960', '430', '10', null, flashvars,    
  params, null);

</script>
<div class="slider-bootstrap"><!-- start slider -->
    <div id="piecemaker">
      <!--Put your alternative Non Flash content here.-->
      There is no flash support on your browser.
    </div>
</div> <!-- /slider -->
    

    <div class="shout-box">
        <div class="shout-text">
          <h1>ยินดีต้อนรับเข้าสู่ Book Lover</h1>
          <p><h2>คลังแห่งปัญญาที่พกพาได้สะดวก..</h2><br>
        </div>
    </div><!-- /shout-box -->
       
	</div><!--/row-fluid-->