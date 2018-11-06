<header class="navbar navbar-bright navbar-fixed-top" role="banner">
<div style="width:98%; margin:auto">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('user') ?>"><span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp; <b>Dashboard</b></a>
      
    </div>
  <nav class="collapse navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
      <form class="navbar-form navbar-left" method="GET" action="<?php echo base_url().'user/search' ?>">

      <!--SEARCH box-->
      <div class="form-group has-feedback">
        <input type="text" name="search" class="form-control" placeholder="Search ID # or Name" required>
        <span class="glyphicon glyphicon-search form-control-feedback" style="color:#000000;"></span>
      </div>
      </form>
    </ul>
    <nav class="collapse navbar-collapse" role="navigation">
    <ul class="nav navbar-right navbar-nav">
    
    <!--NEWSFEED button-->
    <li><a href="<?php echo base_url().'user/newsfeed'; ?>"><span class="glyphicon glyphicon-list" style="font-size:18px;"></span>&nbsp; Newsfeed</a></li>

    <!--PROFILE button-->
    <li><a href="<?php echo base_url().'user/profile'; ?>"><img src="<?php echo base_url().'images/'.$picture; ?>" width="20" height="20" style="border-radius:10px;"><?php echo ' '.$firstname;?></a></li>
        
        <!--DROPDOWN-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-triangle-bottom" style="font-size:12px; padding:5px;"></span></a>
          <ul class="dropdown-menu">
            <li id="navPwd_List" style="text-align:left;"><a id="navPwd_Link" href="<?php echo base_url().'user/pwd'; ?>" style="font-size:14px;">Update Password</a></li>
            <li id="navSeq_List" style="text-align:left;"><a id="navSeq_Link" href="<?php echo base_url().'user/seq'; ?>" style="font-size:14px;">Update Security</a></li>
            <li class="divider"></li>
            <li id="navLgOut_List" style="text-align:left;"><a id="navLgOut_Link" href="<?php echo base_url().'user/logout'; ?>" style="font-size:14px;" >Log Out<span class="glyphicon glyphicon-log-out" style="margin-left:10px;float:right;"></span></a></li
          </ul>
        </li>
      </ul>
    </nav>
  </nav>
</div>
</header>