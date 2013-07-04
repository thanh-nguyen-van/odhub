<script language="javascript">
    function contact_professional(ProfessionalId) {
        window.open("<?php echo $this->config->base_url(); ?>search/sendmessage/?ProfessionalId=" + ProfessionalId, 'sendmessage', 'height=250,width=500,top=200,left=400,toolbar=0,titlebar=0,resizable=0');
        return false;
    }

    function view_invoice(value) {
        window.open("<?php echo $this->config->base_url(); ?>client/showinvoice/?invsid=" + value, 'sendmessage', 'height=220,width=600,top=200,left=400,toolbar=0,titlebar=0,resizable=0');
        return false;
    }
	function show_client_info(ProfessionalId) {
        window.open("<?php echo $this->config->base_url(); ?>professional/view_profile/?professional_id=" + ProfessionalId, 'sendmessage', 'height=500,width=500,top=200,left=400,toolbar=0,titlebar=0,resizable=0');
        return false;
    }
	function show_realistic_preview(ProfessionalId) {
        window.open("<?php echo $this->config->base_url(); ?>professional/review/?professional_id=" + ProfessionalId, 'sendmessage', 'height=600,width=900,top=200,left=400,toolbar=0,titlebar=0,resizable=0');
        return false;
    }
</script>


<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
    <nav class="clearfix">
        <ul class="clearfix">
<li><a href="<?php echo $this->config->base_url(); ?>client/edit_profile">My Account</a></li>
            <li><a href="<?php echo $this->config->base_url(); ?>client/show_home">My Home</a></li>
			 <li><a href="<?php echo $this->config->base_url(); ?>search">Search Professionals</a></li>
      <li class="last"><a href="<?php echo $this->config->base_url();?>client/project_list">My Projects</a></li>
        </ul>
        <a href="#" id="pull">Menu</a> </nav>
    <div class="Total-Div-Box">
        <div class="listingDiv1">
            <div class="pro-pic1">

                <img src="<?php if ($client_data['ClientImage']) {
    echo file_upload_base_url() . 'userimages/' . $client_data['ClientImage'];
} else {
    echo css_images_js_base_url() . 'images/pro-pic.png';
} ?>"   alt="" border="0">





            </div>
            <div class="editSection1">
                <div class="editSec2">
                    <h3> Welcome <?php echo strtoupper($_SESSION[USER_SESSION_FULLNAME]); ?> </h3>
                    
                    From your home page, you can Search OD Hub Professionals to find the right person for your career development needs by clicking SEARCH PROFESSIONALS. If you'd rather the professionals find you, POST A PROJECT. Once you've started looking, you can track who you like, who you've worked with before, and your invoices.  Remember, we're always here to help. Just shoot us an email.
                    
                    <p>Country :	<span> <?php if ($country_data != NULL) {
    echo $country_data['Country'];
} ?> </span> </p>
                    <p>Email :	<span> <?php echo $_SESSION[USER_SESSION_EMAIL] ?> </span> </p>
                    <p>Location : <span> <?php if ($state_data != NULL) {
    echo $state_data['StateName'];
} ?>, Postalcode / Zipcode - <?php echo $client_data['ClientZipcode'] ?> </span> </p>
                </div>
                <div class="editSec3">
                    <ul>
                        <li class="aa"><a href="<?php echo $this->config->base_url(); ?>client/show_profile/">Your Public Profile </a></li>
                         <li class="bb"><a href="<?php echo $this->config->base_url(); ?>client/edit_profile">Edit Your Profile </a></li>
                         <li class="bb"><a href="<?php echo $this->config->base_url(); ?>client/message" <?if($number_of_unread_message>0){?> style="color:red;"<?}?>>Inbox(<? echo $number_of_unread_message ?>) </a></li>
                    </ul>
                </div>
                <div class="clear"> </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div>
             <span class="org-btn squreshape"  style="float: left; padding-right: 20px; width: 150px !important; vertical-align: top;">
             <a href="<?php echo site_url('search');?>"> Search Professionals </a> 
        </span>
        <span class="org-btn squreshape"  style="float: left; padding-right: 20px; width: 120px !important; vertical-align: top;">
             <a href="<?php echo site_url('project/post_project');?>"> Post a Project </a> 
        </span>
            <div class="clear"></div>
        </div>
    <div class="Total-Div-Box">
        <div class="box-head2">
            <h1>My Favorites </h1>
            <div class="clear"></div>
        </div>
        
        <div class="tableDiv1">
            <table>
                <thead>
                    <tr>
                        <th width="9%">First , Last</th>
                        <th width="8%"> Realistic Preview </th>
                        <th width="9%"> Contact </th>
                        <th width="9%" style="border-right:0;">Remove</th>
                    </tr>
                </thead>
                <tbody>
<?php
foreach ($fab_prof as $key => $val) {

    ?>
                        <tr>
                            <td class="pdngTop"><a href="<?php echo site_url('professional/view_profile');?>/?professional_id=<?php echo $val->ProfessionalId;?>" onclick="return show_client_info(<?php echo $val->ProfessionalId;?>);"><?php echo $val->ProfessionalFirstname . ' ' . $val->ProfessionalLastname ?></a></td>
                            <td class="pdngTop"><a href="<?php echo site_url('professional/review/');?>/?professional_id=<?php echo $val->ProfessionalId;?>" onclick="return show_realistic_preview(<?php echo $val->ProfessionalId;?>);">See Preview</a></td>
                            <td class="pdngTop"><span class="org-btn"><a href="#" onclick="return contact_professional('<?php echo $val->ProfessionalId; ?>')">Contact</a></span></td>
                            <td class="pdngTop" style="border-right:0;"><span class="org-btn"><a href="<?php echo $this->config->base_url(); ?>client/remove_fav/?professional_id=<?php echo $val->ProfessionalId; ?>">Remove</a></span></td>
                        </tr>

    <?php
}
?>
                </tbody>
            </table>
            <div class="clear"></div>
            <div class="showmore1">
                <ul>
                    <li><a href="#">Show more</a></li>
                </ul>
            </div>
        </div>
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png"  height="11" alt="" border="0"></div>
    </div>
    <div class="Total-Div-Box">
        <div class="box-head2">
            <h1>My Invoices </h1>
            <div class="clear"></div>
        </div>
        <div class="tableDiv3">



            <table>
<?php if ($nr_client_invoice > 0) { ?>
                    <thead>
                        <tr>
                            <th width="20%"> Due Date </th>
                            <th width="19%"> Invoice# </th>
                            <th width="18%"> Amount $ </th>
                <!--            <th width="17%">Balance $ </th>-->
                            <th width="17%"> Consultant </th>
                            <th width="9%" style="border-right:0;">Pay</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php foreach ($client_invoice->result() as $eachInvoice) { ?>
                            <tr>
                                <td class="pdngTop"><?php echo date('d/m/y', strtotime($eachInvoice->cr_date)); ?></td>
                                <td class="pdngTop"><a href="#" onclick="return view_invoice('<?php echo $eachInvoice->invoice_number; ?>')"><?php echo $eachInvoice->invoice_number; ?></a></td>
                                <td class="pdngTop"> <?php echo $eachInvoice->amount; ?> USD</td>
                    <!--            <td class="pdngTop">$100</td>-->
                                <td class="pdngTop"><?php echo $eachInvoice->ProfessionalFirstname . " " . $eachInvoice->ProfessionalLastname; ?> </td>
                                <td class="pdngTop" style="border-right:0;">
                                                <?php 
                                              //$checkPayRelease = checkPayRelease($eachInvoice->project_id,$eachInvoice->client_id,$eachInvoice->professional_id);
                                              //print_r($checkPayRelease->row_array());
                                                $check_but = Client::check_showhome($eachInvoice->invoice_number);
                                                
                                                if($check_but){
                                                ?>
                                    <span class="org-btn-1">
                                        <a href="<?php echo base_url(); ?>payment/release?projectid=<?php echo $eachInvoice->project_id; ?>&invoice_code=<?php echo $eachInvoice->invoice_number; ?>">Pay</a>
                                            </span>    
                                            <?php }?>
                                    </td>
                            </tr>
    <?php } ?>
              
                    </tbody>
<?php } else {
    ?>
                    <tr class=""><td class="">No Invoice found.</td></tr>
    <?php }
?>
            </table>
            <div class="clear"></div>
            <div class="showmore1">
                <ul>
                    <li><a href="#">Show more</a></li>
                </ul>
            </div>
        </div>
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png"  height="11" alt="" border="0"></div>
    </div>
  <!--  <div class="Total-Div-Box">
        <div class="box-head2">
            <h1>My OD Consultants </h1>
            <div class="clear"></div>
        </div>
        <div class="tableDiv2">
            <table>
                <thead>
                    <tr>
                        <th width="16%">First , Last </th>
                        <th width="21%"> Date Connected </th>
                        <th width="16%">Agreement Completed </th>
                        <th width="16%" style="border-right:0;"> Realistic Preview </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pdngTop"><a href="#">Kate More</a></td>
                        <td class="pdngTop">12/1/12</td>
                        <td class="pdngTop-Link"><a href="#">Link to Agreement </a></td>
                        <td class="pdngTop" style="border-right:0;"><span class="org-btn"><a href="#">Edit</a></span></td>
                    </tr>
                    <tr>
                        <td class="pdng"><a href="#">John Collins</a></td>
                        <td class="pdng">11/15/12</td>
                        <td class="pdng"> NA</td>
                        <td class="pdng" style="border-right:0;"><span class="org-btn"><a href="#">Create</a></span></td>
                    </tr>
                </tbody>
            </table>
            <div class="clear"></div>
            <div class="showmore1">
                <ul>
                    <li><a href="#">Show more</a></li>
                </ul>
            </div>
        </div>
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png" width="839" height="11" alt="" border="0"></div>
    </div>
    <div class="Total-Div-Box">
        <div class="box-head2">
            <h1>My 1099'S</h1>
            <div class="clear"></div>
        </div>
        <div class="tableDiv6">
            <table>
                <thead>
                </thead>
                <tbody>
                    <tr>
                        <td style="border-right:0;">&nbsp;</td>
                        <td style="border-right:0;">&nbsp;</td>
                        <td style="border-right:0;">&nbsp;</td>
                        <td style="border-right:0;">&nbsp;</td>
                        <td style="border-right:0;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border-right:0;">&nbsp;</td>
                        <td style="border-right:0;">&nbsp;</td>
                        <td style="border-right:0;">&nbsp;</td>
                        <td style="border-right:0;">&nbsp;</td>
                        <td style="border-right:0;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border-right:0;">&nbsp;</td>
                        <td style="border-right:0;">&nbsp;</td>
                        <td style="border-right:0;">&nbsp;</td>
                        <td style="border-right:0;">&nbsp;</td>
                        <td style="border-right:0;">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            <div class="clear"></div>

            <!--    <div class="showmore1">
          <ul>
              <li><a href="#">Show more</a></li>
           
               </ul>
          
          </div>--> 

        <!--</div>
        <div class="drop-shadow"><img src="<?php echo css_images_js_base_url(); ?>images/drop-shadow.png"  height="11" alt="" border="0" /></div>
    </div>-->
</section>
<div class="clear"></div>
