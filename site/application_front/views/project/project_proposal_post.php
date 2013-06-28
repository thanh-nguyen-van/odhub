<script language="javascript">
function trigger_fileupload(){
	document.getElementById('proposal_attach').click();
	return false;
}
function show_file(obj){
document.getElementById('uploded_file').innerHTML = obj.value;
}
function submit_form(){
document.form1.project_id.value = document.form2.project_id.value;    
document.form1.submit();
}

</script>

 <aside class="rightCol-pro">
      <h2>Describe Your Proposal</h2>
      <ul>
        <li>Enter your proposal details</li>
        <li>Don't know pricing details yet? Ask for more info below and submit. [?]</li>
      </ul>
      <form action="<?php echo $this->config->base_url();?>proposal/saveproposal/" method="post" name="form1" id="form1" enctype="multipart/form-data">
      <input type="hidden" name="project_id" id="project_id">
        <div class="white-field">
          <textarea name="proposal_description" id="proposal_description" cols="" rows=""></textarea>
          <div class="grey-Div2">
          <input type="file" name="proposal_attach" id="proposal_attach" style="display:none" onchange="show_file(this)"/>
          <span id="uploded_file"></span>
            <p>Add Attachment <span><a href="#" onclick="return trigger_fileupload();"><img src="<?php echo css_images_js_base_url();?>images/small-plus.jpg" width="9" height="9" alt="" border="0"></a></span></p>
          </div>
        </div>
        <p>400 characters left</p>
      <div class="cost-timing">
        <h3>Cost & Timing</h3>
        <div class="clear"></div>
        <div class="priceDiv">
            <div class="total-price">
              <div class="ic"><img src="<?php echo css_images_js_base_url();?>images/pro-icon4.png" width="20" height="13" alt="" border="0"></div>
              <div class="ic-p">Proposed Pricing</div>
              <div class="dollar">$ <span>
                <input name="price" id="price" type="text">
                </span></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="total-price">
              <div class="ic"><img src="<?php echo css_images_js_base_url();?>images/pro-icon3.png" width="20" height="19" alt="" border="0"></div>
              <div class="ic-p2">Estimated Delivery Date</div>
              <div class="dollar">
                <input type="text" id="mydate" name="dalivery_date" />
                <p>(Optional)</p>
              </div>
              <div class="clear"></div>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
      <div class="continue-btn"><a href="#" onclick="return submit_form();">continue</a></div>
      <div class="clear"></div>
    </aside>