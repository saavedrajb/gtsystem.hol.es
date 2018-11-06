<div class="navbar navbar-inverse set-radius-zero" style="background: url(<?php echo base_url();?>images/56.jpg) no-repeat center;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('admin');?>">

                    <h1 style="color:white;">Admin <?php echo $firstname;?></h1>
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                   
                                    <div class="media-body">
                                        <h4 class="media-heading">Action:</h4>
                                    </div>
                                </div>
                                <hr />
                               <a href="<?php echo base_url('admin/logout');?>" class="btn btn-danger btn-sm">Logout</a>

                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
	  <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url('admin');?>">Dashboard</a></li>
                            <li><a href="<?php echo base_url('admin/register');?>">Registration</a></li>
                            <li><a href="<?php echo base_url('admin/search'); ?>">Search</a></li>
                            <li><a href="<?php echo base_url('admin/announcement'); ?>">Announcement</a></li>
							<li><a href="<?php echo base_url('admin/report'); ?>">Reports</a></li>
							<li><a href="<?php echo base_url('admin/violations'); ?>">Violations</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>