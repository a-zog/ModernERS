<?php 
      if(file_exists("lib.php")){

require_once("lib.php");
      }else{
require_once("../lib.php");

      }
$lib= new ERS;


 ?>
<div id="footer">
  <div class="container">


    <div class="zsocial small focuson bubble pull-right " style="position absolute">
      <ul>
        <li><a class="bg-viadeo" data-toggle="tooltip" target="_blank" data-original-title="AboutMe" href="http://about.me/zoghlami.ahmed"><span aria-hidden="true" class="zicon-star-8"></span></a></li>
        <li><a class="bg-github" data-toggle="tooltip" target="_blank" data-original-title="Github" href="https://github.com/a-zog"><span aria-hidden="true" class="zicon-github-6"></span></a></li>
        <li><a class="bg-linkedin" data-toggle="tooltip" target="_blank" data-original-title="LinkedIn" href="http://tn.linkedin.com/in/zoghlamiahmed"><span aria-hidden="true" class="zicon-linkedin"></span></a></li>
        <li><a class="bg-twitter" data-toggle="tooltip" target="_blank" data-original-title="Twitter" href="https://twitter.com/a_zog"><span aria-hidden="true" class="zicon-twitter"></span></a></li>
        <li><a class="bg-wordpress" data-toggle="tooltip" target="_blank" data-original-title="Wordpress" href="http://ahzog.wordpress.com/"><span aria-hidden="true" class="zicon-wordpress"></span></a></li>
      </ul>
    </div>
    <p class="muted credit"><u><?php if ($lib->getEventName() != false) {echo $lib->getEventName()."'s";}else{ echo "Modern";}  ?> Event Registration System</u> made with <span class="zicon-heart  pulse color-lastfm"></span> by <a href="http://about.me/zoghlami.ahmed" target="_blank" data-original-title="" title="">Zoghlami Ahmed</a>.
    <?php if ($lib->getEventName() != false) {echo "<br/>".$lib->getEventName()."&copy; 2013-2014</p>";} ?>
  </div>
</div>