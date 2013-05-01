<div class="clear"></div>
<div class="brk-line"></div>
</header>

<?php print_r($project_details); ?>

<section class="container">
  <nav class="clearfix">
    <ul class="clearfix">
      <li><a href="#">Profile</a></li>
      <li><a href="#">Account</a></li>
      <li><a href="#">Projects</a></li>
      <li class="last"><a href="#">Realistic Previews</a></li>
    </ul>
    <a href="#" id="pull">Menu</a> </nav>
  <div class="Total-Div-Box-pro">
    <h1>Project Name : Test Project</h1>
    <div class="share"><a href="mailto:emailaddress">Share</a></div>
    <aside class="leftCol-pro">
      <div class="first-sec">
        <section class="icon-sec1-Total">
          <div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon1.png" width="18" height="20" alt="" border="0"></div>
          <div class="l-iconR">Posted: <?=date("F j, Y h:ia", strtotime($project_details['post_date']))?> </div>
          <div class="clear"></div>
          <div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon2.png" width="19" height="20" alt="" border="0"></div>
          <div class="l-iconR">Location: Anywhere</div>
          <div class="clear"></div>
          <div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon3.png" width="20" height="19" alt="" border="0"></div>
          <div class="l-iconR">Start: Immediately </div>
          <div class="clear"></div>
        </section>
        <section class="icon-sec2-Total">
          <div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon4.png" width="20" height="13" alt="" border="0"></div>
          <div class="l-iconR">Budget: $<?=$project_details['start_price']?> - $<?=$project_details['end_price']?></div>
          <div class="clear"></div>
          <div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon5.png" width="16" height="20" alt="" border="0"></div>
          <div class="l-iconR"><?=$project_details['job_type']?></div>
          <div class="clear"></div>
          <div class="l-icon"><img src="<?php echo css_images_js_base_url();?>images/pro-icon6.png" width="18" height="20" alt="" border="0"></div>
          <div class="l-iconR">W9 <?php if($project_details['w9_required']=='0'){ echo "Not"; } ?> Required</div>
          <div class="clear"></div>
        </section>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
      <section class="second-sec">
        <div class="second-sec-bord">
          <div class="sm-pic"><img src="<?php echo css_images_js_base_url();?>images/sm-pro-pic.jpg"  alt="" border="0"></div>
          <div class="sm-picR">
            <h1>Client Info </h1>
            <div class="clear"></div>
            <p><span><img src="<?php echo css_images_js_base_url();?>images/flag.jpg" width="16" height="11" alt="" border="0"></span> Thiland </p>
          </div>
          <div class="clear"></div>
        </div>
        <div class="second-sec-cont">
          <p>I need many sets of data that need to be scraped from several sites.(Private message for more details)</p>
          <p>Examples are...</p>
          <ul>
            <li>Name</li>
            <li>Address</li>
            <li>GPS</li>
            <li>Phone Number</li>
            <li>Address</li>
            <li>Website</li>
          </ul>
          <p>None of this data is private or copy-written and would be best stored in CSV files .... Please contact me for details</p>
          <div class="desire-skill">Desires Skills</div>
          <p class="micro">Microsoft Access Administration, MySQL Administration, PHP</p>
          <div class="clear"></div>
        </div>
        <section class="grey-Div">Job ID:123456</section>
        <div class="clear"></div>
      </section>
      <section class="second-sec-cont2">
        <div class="top-blue-sec">
          <div class="drop-dwn">
            <div id="dd" class="wrapper-dropdown-5" tabindex="1">My Proposals (6)
              <ul class="dropdown">
                <li><a href="#"><i class="icon-user"></i>Under Review </a></li>
                <li><a href="#"><i class="icon-cog"></i>Declined</a></li>
                <li><a href="#"><i class="icon-remove"></i> Accepted </a></li>
                <li><a href="#"><i class="icon-remove"></i> In Progress </a></li>
              </ul>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <section class="proposalDiv-Total">
          <div class="left-logo"><img src="<?php echo css_images_js_base_url();?>images/left-logo.jpg" width="41" height="29" alt="" border="0"></div>
          <div class="cont-right">
            <h1>Test company name</h1>
            <div class="clear"></div>
            <div class="flagDiv">
              <ul>
                <li><img src="<?php echo css_images_js_base_url();?>images/flag1.jpg" width="16" height="11" alt="" border="0"> India</li>
                <li class="last-li"><img src="images/building-icon.jpg" width="14" height="16" alt="" border="0"></li>
              </ul>
            </div>
            <div class="clear"></div>
            <p>Lorem Ipsum demo Text Lorem Ipsum demo Text Lorem Ipsum demo Text Lorem Ipsum demo Text Lorem Ipsum demo Text Lorem Ipsum demo Text .</p>
            <p>Skills: <span>PHP MySQL Administration, Ecommerce, osCommerce<br>
              OD Hub Previews=#32</span></p>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <div class="light-bord"></div>
        </section>
        <section class="proposalDiv-Total">
          <div class="left-logo"><img src="<?php echo css_images_js_base_url();?>images/left-logo.jpg" width="41" height="29" alt="" border="0"></div>
          <div class="cont-right">
            <h1>Test company name</h1>
            <div class="clear"></div>
            <div class="flagDiv">
              <ul>
                <li><img src="<?php echo css_images_js_base_url();?>images/flag1.jpg" width="16" height="11" alt="" border="0"> India</li>
                <li class="last-li"><img src="images/building-icon.jpg" width="14" height="16" alt="" border="0"></li>
              </ul>
            </div>
            <div class="clear"></div>
            <p>Lorem Ipsum demo Text Lorem Ipsum demo Text Lorem Ipsum demo Text Lorem Ipsum demo Text Lorem Ipsum demo Text Lorem Ipsum demo Text .</p>
            <p>Skills: <span>PHP MySQL Administration, Ecommerce, osCommerce<br>
              OD Hub Previews=#32</span></p>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <div class="light-bord"></div>
        </section>
        <section class="proposalDiv-Total">
          <div class="left-logo"><img src="<?php echo css_images_js_base_url();?>images/left-logo.jpg" width="41" height="29" alt="" border="0"></div>
          <div class="cont-right">
            <h1>Test company name</h1>
            <div class="clear"></div>
            <div class="flagDiv">
              <ul>
                <li><img src="<?php echo css_images_js_base_url();?>images/flag1.jpg" width="16" height="11" alt="" border="0"> India</li>
                <li class="last-li"><img src="<?php echo css_images_js_base_url();?>images/building-icon.jpg" width="14" height="16" alt="" border="0"></li>
              </ul>
            </div>
            <div class="clear"></div>
            <p>Lorem Ipsum demo Text Lorem Ipsum demo Text Lorem Ipsum demo Text Lorem Ipsum demo Text Lorem Ipsum demo Text Lorem Ipsum demo Text .</p>
            <p>Skills: <span>PHP MySQL Administration, Ecommerce, osCommerce<br>
              OD Hub Previews=#32</span></p>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <div class="light-bord"></div>
        </section>
        <div class="clear"></div>
      </section>
      <div class="clear"></div>
    </aside>
    <aside class="rightCol-pro">
      <h2>Describe Your Proposal</h2>
      <ul>
        <li>Enter your proposal details</li>
        <li>Don't know pricing details yet? Ask for more info below and submit. [?]</li>
      </ul>
      <form action="" method="get">
        <div class="white-field">
          <textarea name="" cols="" rows=""  ></textarea>
          <div class="grey-Div2">
            <p>Add Attachment <span><a href="#"><img src="<?php echo css_images_js_base_url();?>images/small-plus.jpg" width="9" height="9" alt="" border="0"></a></span></p>
          </div>
        </div>
        <p>400 characters left</p>
      </form>
      <div class="cost-timing">
        <h3>Cost & Timing</h3>
        <div class="clear"></div>
        <div class="priceDiv">
          <form action="" method="get">
            <div class="total-price">
              <div class="ic"><img src="<?php echo css_images_js_base_url();?>images/pro-icon4.png" width="20" height="13" alt="" border="0"></div>
              <div class="ic-p">Proposed Pricing</div>
              <div class="dollar">$ <span>
                <input name="" type="text">
                </span></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="total-price">
              <div class="ic"><img src="<?php echo css_images_js_base_url();?>images/pro-icon3.png" width="20" height="19" alt="" border="0"></div>
              <div class="ic-p2">Estimated Delivery Date</div>
              <div class="dollar">
                <select name="select" id="select">
                  <option>-Select One-</option>
                  <option>aaa</option>
                  <option>aaa</option>
                </select>
                <p>(Optional)</p>
              </div>
              <div class="clear"></div>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
      <div class="continue-btn"><a href="#">continue</a></div>
      <div class="clear"></div>
    </aside>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div class="drop-shadow-1"><img src="images/drop-shadow.png" alt="" width="839" height="11" border="0"></div>
</section>
<div class="clear"></div>
