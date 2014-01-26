<?php 
global $title;
if ( isset($title) ){
?>
<h3 class="pull-left" style="margin-right:25px;"><i class="zicon-flash-1 pulse"></i> <?php echo $title; ?></h3>
<?php
    }

     ?>
<ul class="nav zs-appbar">
  <li class="highlight-success"><a href="?p=overview" title=""><i class="zicon-eye-1"></i> Overview</a></li>
  <li class="zs-appbar-divider"></li>
  <li><a href="?p=em" data-placement="bottom" data-toggle="tooltip" title="Manage new and registred users with a quick access dashboard"><i class="zicon-address-book"></i> Easy Management</a></li>
  <li><a href="?p=refresh" data-placement="bottom" data-toggle="tooltip" title="Syncronise visitor's list with a third party database"><i class="zicon-arrows-cw-1"></i> Refresh visitor's list</a></li>
</ul>