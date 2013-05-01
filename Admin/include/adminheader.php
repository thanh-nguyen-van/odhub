<?php
include('setting.php');
include('admin_session.php');
require_once('class.image-resize.php');
?>
<HTML>
<HEAD>
<TITLE> OD HUB </TITLE>
<META NAME="Generator" CONTENT="">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">

<link rel="stylesheet" type="text/css" href="<?php echo $publicURL;?>css/menu.css" />
<script type="text/javascript" src="<?php echo $publicURL;?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $publicURL;?>js/menu.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $publicURL;?>css/Adminstyle.css" />
</HEAD>

<BODY>

<?php
//include("$siteURL/include/connect.php");
include("connect.php");?>
<div id="header">
<div class="header">
<div class="logo"><a href="<?php echo $siteURL;?>"><img border="0" alt="" src="<?php echo $publicURL;?>images/logo.png" width="260" height="73"></a></div>
<div id="menu">
    <ul class="menu">
        <li class="current"><a href="<?php echo $siteURL;?>index.php" class="parent"><span>Home</span></a>
            <div><ul>
                <li><a class="parent"><span>Settings</span></a>
                    <div><ul>
                        <li><a href="<?php echo $siteURL;?>ChangePassword.php"><span>Change Password</span></a></li>
                        <li><a href="<?php echo $siteURL;?>AddVideo.php"><span>Add Video</span></a></li>
                    </ul></div>
                </li>
                <li><a href="<?php echo $siteURL;?>ViewCommissionDetail.php"><span>Commissions</span></a></li>
                <li><a href="<?php echo $siteURL;?>ViewBidFeeDetail.php"><span>Bid Fees</span></a></li>
                
                <li><a href="<?php echo $siteURL;?>ViewTopic.php"><span>Topic</span></a></li>
                	<div>
                        <ul>
                            <li><a href="<?php echo $siteURL;?>ViewBlog.php"><span>List</span></a></li>
                            <li><a href="<?php echo $siteURL;?>AddBlogCategory.php"><span>Category</span></a></li>
                        </ul>
                    </div>
                <li><a class="parent"><span>News</span></a>
                    <div>
                        <ul>
                            <li><a href="<?php echo $siteURL;?>ViewNews.php"><span>Lists</span></a></li>
                            <li><a href="<?php echo $siteURL;?>AddNews.php"><span>Add</span></a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="<?php echo $siteURL;?>AboutUs.php"><span>About Us</span></a></li>
            </ul></div>
        </li>
        <li><a href="<?php echo $siteURL;?>ViewClientList.php" class="parent"><span>Clients</span></a>
            <div><ul>
                <li><a href="<?php echo $siteURL;?>ViewClientList.php"><span>Lists</span></a>
                </li>
                <li><a href="<?php echo $siteURL;?>ViewClientFeedbacks.php" ><span>Feedback</span></a>
                </li>
                <li><a href="<?php echo $siteURL;?>ClientHome.php" ><span>Home Page</span></a>
                </li>
                <li><a href="<?php echo $siteURL;?>CloseCaseRequest.php" ><span>Close Case Request</span></a>
                </li>

            </ul></div>
        </li>
        <li><a href="#" class="parent"><span>Professionals</span></a>
        	<div>
            	<ul>
                	<li><a href="<?php echo $siteURL;?>ViewLawyerList.php"><span>Lists</span></a></li>
                    <li><a href="<?php echo $siteURL;?>ViewLawyerFeedbacks.php"><span>Feedback</span></a></li>
                    <li><a href="<?php echo $siteURL;?>LawyerHome.php"><span>Home Page</span></a></li>
                    <li><a href="<?php echo $siteURL;?>LawyerCategoryList.php"><span>Category</span></a></li>
                </ul>
            </div>
        </li>
        <li><a href="#"><span>Projects</span></a>
        	<div>
            	<ul>
                	<!--<li><a href="<?php echo $siteURL;?>ProjectList.php"><span>ActiveProjects</span></a></li>-->
                	<li><a href="<?php echo $siteURL;?>PostedProjects.php"><span>PostedProjects</span></a></li>
                    <li><a href="<?php echo $siteURL;?>ActiveProjects.php"><span>ActiveProjects</span></a></li>
                    <li><a href="<?php echo $siteURL;?>ClosedProjects.php"><span>ClosedProjects</span></a></li>
                </ul>
            </div>
        </li>
        <li><a href="#"><span>Sub-Admin</span></a>
        	<div>
            	<ul>
                    <li><a href="<?php echo $siteURL;?>SubAdminList.php"><span>List</span></a></li>
                    <li><a href="<?php echo $siteURL;?>SubAdminAdd.php"><span>Add</span></a></li>
                </ul>
            </div>
        </li>
        
        <li class="last"><a href="<?php echo $siteURL;?>AdminLogout.php"><span>Logout</span></a></li>
    </ul>
<span style="display:none;"><a href="http://apycom.com/">t</a></span>
</div>
</div>
</div>
<div class="content">

