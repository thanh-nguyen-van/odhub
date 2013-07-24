<?php if (!defined('IN_PHPBB')) exit; ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" xml:lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>">
<head>

<meta http-equiv="content-type" content="text/html; charset=<?php echo (isset($this->_rootref['S_CONTENT_ENCODING'])) ? $this->_rootref['S_CONTENT_ENCODING'] : ''; ?>" />
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="content-language" content="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="resource-type" content="document" />
<meta name="distribution" content="global" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<?php echo (isset($this->_rootref['META'])) ? $this->_rootref['META'] : ''; ?>
<title><?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?> &bull; <?php if ($this->_rootref['S_IN_MCP']) {  echo ((isset($this->_rootref['L_MCP'])) ? $this->_rootref['L_MCP'] : ((isset($user->lang['MCP'])) ? $user->lang['MCP'] : '{ MCP }')); ?> &bull; <?php } else if ($this->_rootref['S_IN_UCP']) {  echo ((isset($this->_rootref['L_UCP'])) ? $this->_rootref['L_UCP'] : ((isset($user->lang['UCP'])) ? $user->lang['UCP'] : '{ UCP }')); ?> &bull; <?php } echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>

<?php if ($this->_rootref['S_ENABLE_FEEDS']) {  if ($this->_rootref['S_ENABLE_FEEDS_OVERALL']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_NEWS']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_FEED_NEWS'])) ? $this->_rootref['L_FEED_NEWS'] : ((isset($user->lang['FEED_NEWS'])) ? $user->lang['FEED_NEWS'] : '{ FEED_NEWS }')); ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?mode=news" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_FORUMS']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_ALL_FORUMS'])) ? $this->_rootref['L_ALL_FORUMS'] : ((isset($user->lang['ALL_FORUMS'])) ? $user->lang['ALL_FORUMS'] : '{ ALL_FORUMS }')); ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?mode=forums" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_TOPICS']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_FEED_TOPICS_NEW'])) ? $this->_rootref['L_FEED_TOPICS_NEW'] : ((isset($user->lang['FEED_TOPICS_NEW'])) ? $user->lang['FEED_TOPICS_NEW'] : '{ FEED_TOPICS_NEW }')); ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?mode=topics" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_TOPICS_ACTIVE']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_FEED_TOPICS_ACTIVE'])) ? $this->_rootref['L_FEED_TOPICS_ACTIVE'] : ((isset($user->lang['FEED_TOPICS_ACTIVE'])) ? $user->lang['FEED_TOPICS_ACTIVE'] : '{ FEED_TOPICS_ACTIVE }')); ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?mode=topics_active" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_FORUM'] && $this->_rootref['S_FORUM_ID']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?> - <?php echo (isset($this->_rootref['FORUM_NAME'])) ? $this->_rootref['FORUM_NAME'] : ''; ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?f=<?php echo (isset($this->_rootref['S_FORUM_ID'])) ? $this->_rootref['S_FORUM_ID'] : ''; ?>" /><?php } if ($this->_rootref['S_ENABLE_FEEDS_TOPIC'] && $this->_rootref['S_TOPIC_ID']) {  ?><link rel="alternate" type="application/atom+xml" title="<?php echo ((isset($this->_rootref['L_FEED'])) ? $this->_rootref['L_FEED'] : ((isset($user->lang['FEED'])) ? $user->lang['FEED'] : '{ FEED }')); ?> - <?php echo ((isset($this->_rootref['L_TOPIC'])) ? $this->_rootref['L_TOPIC'] : ((isset($user->lang['TOPIC'])) ? $user->lang['TOPIC'] : '{ TOPIC }')); ?> - <?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?>" href="<?php echo (isset($this->_rootref['U_FEED'])) ? $this->_rootref['U_FEED'] : ''; ?>?f=<?php echo (isset($this->_rootref['S_FORUM_ID'])) ? $this->_rootref['S_FORUM_ID'] : ''; ?>&amp;t=<?php echo (isset($this->_rootref['S_TOPIC_ID'])) ? $this->_rootref['S_TOPIC_ID'] : ''; ?>" /><?php } } ?>

<!--
	phpBB style name: prosilver
	Based on style:   prosilver (this is the default phpBB3 style)
	Original author:  Tom Beddard ( http://www.subBlue.com/ )
	Modified by:
-->

<script type="text/javascript">
// <![CDATA[
	var jump_page = '<?php echo ((isset($this->_rootref['LA_JUMP_PAGE'])) ? $this->_rootref['LA_JUMP_PAGE'] : ((isset($this->_rootref['L_JUMP_PAGE'])) ? addslashes($this->_rootref['L_JUMP_PAGE']) : ((isset($user->lang['JUMP_PAGE'])) ? addslashes($user->lang['JUMP_PAGE']) : '{ JUMP_PAGE }'))); ?>:';
	var on_page = '<?php echo (isset($this->_rootref['ON_PAGE'])) ? $this->_rootref['ON_PAGE'] : ''; ?>';
	var per_page = '<?php echo (isset($this->_rootref['PER_PAGE'])) ? $this->_rootref['PER_PAGE'] : ''; ?>';
	var base_url = '<?php echo (isset($this->_rootref['A_BASE_URL'])) ? $this->_rootref['A_BASE_URL'] : ''; ?>';
	var style_cookie = 'phpBBstyle';
	var style_cookie_settings = '<?php echo (isset($this->_rootref['A_COOKIE_SETTINGS'])) ? $this->_rootref['A_COOKIE_SETTINGS'] : ''; ?>';
	var onload_functions = new Array();
	var onunload_functions = new Array();

	<?php if ($this->_rootref['S_USER_PM_POPUP'] && $this->_rootref['S_NEW_PM']) {  ?>
		var url = '<?php echo (isset($this->_rootref['UA_POPUP_PM'])) ? $this->_rootref['UA_POPUP_PM'] : ''; ?>';
		window.open(url.replace(/&amp;/g, '&'), '_phpbbprivmsg', 'height=225,resizable=yes,scrollbars=yes, width=400');
	<?php } ?>

	/**
	* Find a member
	*/
	function find_username(url)
	{
		popup(url, 760, 570, '_usersearch');
		return false;
	}

	/**
	* New function for handling multiple calls to window.onload and window.unload by pentapenguin
	*/
	window.onload = function()
	{
		for (var i = 0; i < onload_functions.length; i++)
		{
			eval(onload_functions[i]);
		}
	};

	window.onunload = function()
	{
		for (var i = 0; i < onunload_functions.length; i++)
		{
			eval(onunload_functions[i]);
		}
	};

// ]]>
</script>
<script type="text/javascript" src="<?php echo (isset($this->_rootref['T_SUPER_TEMPLATE_PATH'])) ? $this->_rootref['T_SUPER_TEMPLATE_PATH'] : ''; ?>/styleswitcher.js"></script>
<script type="text/javascript" src="<?php echo (isset($this->_rootref['T_SUPER_TEMPLATE_PATH'])) ? $this->_rootref['T_SUPER_TEMPLATE_PATH'] : ''; ?>/forum_fn.js"></script>

<link href="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/print.css" rel="stylesheet" type="text/css" media="print" title="printonly" />
<link href="<?php echo (isset($this->_rootref['T_STYLESHEET_LINK'])) ? $this->_rootref['T_STYLESHEET_LINK'] : ''; ?>" rel="stylesheet" type="text/css" media="screen, projection" />
<link href="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/new-css.css" type="text/css" media="screen">

<style type="text/css">
	.logo {
    float: left;
    padding-top: 15px;
    width: auto;	
}

.realize {
    float: right!important;
    padding-top: 18px!important;
    width: 460px!important;
}
.realize h2 {
    color: #592002;
    font-family: 'open_sansregular';
    font-size: 30px;
    text-transform: uppercase;
}

.rlze-right img {
    border: 0 none;
    padding: 0 3px;
}

*::-moz-selection {
    background: none repeat scroll 0 0 #2E2823;
    color: #FFFFFF;
}

.container {
    margin: 0 auto;
    width: 1004px;
}
.footer {
    background-color: #EDEDED;
}
.f-left {
    float: left;
    padding-right: 56px;
    width: 200px;
}
.f-mid {
    border-left: 1px solid #A1A1A1;
    float: left;
    font-size: 11px;
    margin: 10px 0 0;
    padding-left: 16px;
    width: 570px;
}
.f-mid a {
    color: #646464;
    font-size: 11px;
    line-height: 20px;
    padding: 0 16px 0 0;
}
.f-mid a:hover {
    color: #646464;
    line-height: 20px;
    text-decoration: underline;
}

.f-right img {
    padding: 0 3px;
}

@font-face {
	font-family: 'open_sansregular';
	src: url('../font1/opensans-regular-webfont.eot');
	src: url('../font1/opensans-regular-webfont.eot?#iefix') format('embedded-opentype'),  url('../font1/opensans-regular-webfont.woff') format('woff'),  url('../font1/opensans-regular-webfont.ttf') format('truetype'),  url('../font1/opensans-regular-webfont.svg#open_sansregular') format('svg');
	font-weight: normal;
	font-style: normal;
}

.top-header_bg {
    background-color: #2B2B2B;
    height: 42px;
    width: 100%;
}

.top-left-sign {
    color: #E0C304;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 13px;
    margin: 0;
    padding: 11px 0 0;
    position: absolute;
    text-transform: uppercase;
}
.top-left-sign span a {
    color: #81CFEE;
}
.top-left-sign span a:hover {
    color: #FFFFFF;
    text-decoration: underline;
}
.nd-hlp {
    bottom: 0;
    margin-top: 200px;
    position: fixed;
    right: 0;
    z-index: 99;
}
.main-menu {
    float: right;
    margin: 12px 0 0;
}
.main-menu ul {
    margin: 0;
}
.main-menu li ul {
    left: -2px;
    padding-top: 2px;
}
.main-menu li ul li {
    box-shadow: 2px 2px 2px 0 rgba(0, 0, 0, 0.1);
}
.main-menu li {
    display: block;
    margin: 0;
    padding: 0;
    position: relative;
    text-transform: uppercase;
    white-space: nowrap;
    z-index: 100;
}
.main-menu a {
    color: #C0EDFF;
    display: block;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 12px;
    font-weight: bold;
    position: relative;
}
.main-menu a:hover {
    color: #D8C0A8;
    text-decoration: none;
}
.main-menu li.submenu > a {
    background: url("../images/menu_down_arrow.png") no-repeat scroll right center transparent;
    cursor: default;
    padding-right: 20px;
}
.main-menu > ul > li {
    float: left;
    margin-right: 28px;
}
.main-menu > ul > li:last-child {
    margin-right: 0;
}
.main-menu li ul {
    display: none;
    position: absolute;
    top: 100%;
    z-index: 100;
}
.main-menu li:hover > ul {
    display: block;
}
.main-menu li ul li.submenu > a {
    background: url("../images/submenu_left_arrow.png") no-repeat scroll right center #403830;
    padding-right: 10px;
}
.main-menu li ul li.submenu > a:hover {
    background: url("../images/submenu_left_arrow.png") no-repeat scroll right center #F5F5F5;
    padding-right: 10px;
}
.main-menu li ul li {
    background: none repeat scroll 0 0 #FFFFFF;
    border-bottom: 1px solid #534A42;
}
.main-menu li ul li a:hover {
    background: none repeat scroll 0 0 #FFFFFF;
    color: #D43A32;
}
.main-menu li ul li:last-child {
    border-bottom: 1px solid #2E2823;
}
.main-menu li ul li a {
    background: none repeat scroll 0 0 #403830;
    line-height: 33px;
    padding: 0 25px 0 12px;
}
.main-menu li ul li ul {
    left: 100% !important;
    padding: 0 !important;
    top: -1px !important;
}
.sign-in a {
    background: url("../images/sign.jpg") no-repeat scroll left top transparent;
    height: 24px;
    width: 66px;
}
.sign-in a:hover {
    background: url("../images/sign-h.jpg") no-repeat scroll left top transparent;
    height: 24px;
    width: 66px;
}

.rlze-right {
    float: right;
    padding-top: 10px;
    width: 96px !important;
}
.f-right {
    float: right;
    padding-right: 50px;
    padding-top: 10px;
    width: 100px !important;
}

.container {
    margin: 0 auto;
    width: 100%;
}
.headerspace h3 { font-size:14px!important; 
}




</style>
<link href="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/normal.css" rel="stylesheet" type="text/css" title="A" />
<link href="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/medium.css" rel="alternate stylesheet" type="text/css" title="A+" />
<link href="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/large.css" rel="alternate stylesheet" type="text/css" title="A++" />

<?php if ($this->_rootref['S_CONTENT_DIRECTION'] == ('rtl')) {  ?>
	<link href="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/bidi.css" rel="stylesheet" type="text/css" media="screen, projection" />
<?php } ?>

</head>

<body id="phpbb" class="section-<?php echo (isset($this->_rootref['SCRIPT_NAME'])) ? $this->_rootref['SCRIPT_NAME'] : ''; ?> <?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>">

<div id="wrap">
	<a id="top" name="top" accesskey="t"></a>
	<div id="page-header">
    
    <div class="top-header_bg" style="    background-color: #2B2B2B;
    height: 42px;
    width: 100%;
">


<div class="fdbk"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image17','','images/fdbk-h.png',1)"><img src="images/fdbk.png" name="Image17" width="56" height="196" border="0"></a></div>
<div class="nd-hlp"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image18','','images/nd-hlp-h.png',1)"><img src="images/nd-hlp.png" name="Image18" width="69" height="227" border="0"></a></div>
	<div class="container">
        <div class="top-left-sign" style="    color: #E0C304;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 13px;
    margin: 0;
    padding: 11px 0 0;
    position: absolute;
    text-transform: uppercase;
"><span><a href="#">Sign  up</a></span>  for  a  free  account  today</div>
        <nav class="main-menu">
                <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">How it Works</a></li>
                <li><a href="#">For Clients</a></li>
                <li><a href="#">For OD Professionals</a></li>
                <li class="sign-in"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image15','','http://192.168.1.50/odhub/site/public/images/sign-h.jpg',1)"><img src="http://192.168.1.50/odhub/site/public/images/sign.jpg" name="Image15" width="66" height="24" border="0"></a></li>
                </ul>
      </nav>
    </div>
    <div class="clear"></div>
</div>
    
 
<div class="container" style="border-bottom:1px solid #000;">

    <div class="logo" style="    float: left;
    padding-top: 15px;
    width:300px; float:left;"><a href="#"><img src="http://192.168.1.50/odhub/site/public/images/logo.png" alt="" border="0"></a></div>
    
    <div class="realize" style="width:460px; float:right;	font-family: 'open_sansregular'; " >
    	<h4 style="    color: #592002;
	font-family: 'open_sansregular';    font-size: 26px;
    text-transform: uppercase;
    width:404px;
    float:right;
    font-weight:normal;
    padding:15px 0 0px 0;
    margin-bottom:10px;

">Realize your full potential</h4>
        <div class="b-line" align="right"><img src="http://192.168.1.50/odhub/site/public/images/b-line.jpg" alt=""></div>
        <div class="rlze-right" style="width:72px; float:right;"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image22','','http://192.168.1.50/odhub/site/public/images/s-icon1-h.png',1)"><img src="http://192.168.1.50/odhub/site/public/images/s-icon1.png" alt="" name="Image22" width="24" height="30" border="0"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image23','','http://192.168.1.50/odhub/site/public/images/s-icon2-h.png',1)"><img src="http://192.168.1.50/odhub/site/public/images/s-icon2.png" alt="" name="Image23" width="24" height="30" border="0"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image24','','http://192.168.1.50/odhub/site/public/images/s-icon3-h.png',1)"><img src="http://192.168.1.50/odhub/site/public/images/s-icon3.png" alt="" name="Image24" width="24" height="30" border="0"></a></div>    
    </div>
    <div class="clear"></div>
    
</div>

	<a name="start_here"></a>
	<div id="page-body">
		<?php if ($this->_rootref['S_BOARD_DISABLED'] && $this->_rootref['S_USER_LOGGED_IN'] && ( $this->_rootref['U_MCP'] || $this->_rootref['U_ACP'] )) {  ?>
		<div id="information" class="rules">
			<div class="inner"><span class="corners-top"><span></span></span>
				<strong><?php echo ((isset($this->_rootref['L_INFORMATION'])) ? $this->_rootref['L_INFORMATION'] : ((isset($user->lang['INFORMATION'])) ? $user->lang['INFORMATION'] : '{ INFORMATION }')); ?>:</strong> <?php echo ((isset($this->_rootref['L_BOARD_DISABLED'])) ? $this->_rootref['L_BOARD_DISABLED'] : ((isset($user->lang['BOARD_DISABLED'])) ? $user->lang['BOARD_DISABLED'] : '{ BOARD_DISABLED }')); ?>
			<span class="corners-bottom"><span></span></span></div>
		</div>
		<?php } ?>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>