<? include('include/adminheader.php');
include('include/connect.php');

?>

<h2>&nbsp;&nbsp;Lawyer PMB</h2>

<div class="cont_det cont_table no_top">

                        <!--working area starts -->
						<?php
                        $str_case = "SELECT CaseId, CaseTitle, CaseClientId FROM ".$table['case']." WHERE CaseId IN (SELECT CaseAwardedCaseId FROM ".$table['caseawarded']." WHERE CaseAwardedLawyerId=".$_REQUEST['lawyerid'].") ORDER BY CaseTitle";
						$sel_case = mysql_query($str_case);
						if(mysql_num_rows($sel_case) > 0){
							while($arr_case = mysql_fetch_array($sel_case)){
						?>
                        <TABLE CELLPADDING="0" CELLSPACING="0" BORDER="0" WIDTH="100%" valign="top">
                            <TR class="table_head" valign="top">
                            	<td width="30%">&nbsp;<b>Case - <?php echo $arr_case['CaseTitle'];?> :</b></td>
                                <td width="70%">
                                    <?php
									$str_client = "SELECT ClientUsername FROM ".$table['clientdetail']." WHERE ClientId=".$arr_case['CaseClientId'];
									$sel_client = mysql_query($str_client);
									if(mysql_num_rows($sel_client) > 0){
										$arr_client = mysql_fetch_array($sel_client);
									}else{
										$arr_client['ClientUsername'] = '';
									}
									
									$str_pmb = "SELECT PM.*, PMD.* FROM ".$table['pmmaster']." AS PM, ".$table['pmdetail']." AS PMD WHERE PM.PMMasterId=PMD.PMMasterId AND PM.CaseId=".$arr_case['CaseId']." AND ((PMD.PMFrom=".$_REQUEST['lawyerid']." AND PMD.PMFromType='LAWYER') OR (PMD.PMTo=".$_REQUEST['lawyerid']." AND PMD.PMToType='LAWYER'))";
									$sel_pmb = mysql_query($str_pmb);
									if(mysql_num_rows($sel_pmb) > 0){
										while($arr_pmb = mysql_fetch_array($sel_pmb)){
											if($arr_pmb['PMFromType']=='LAWYER'){
												$where_clause = " WHERE LawyerId=".$arr_pmb['PMFrom'];
											}else if($arr_pmb['PMToType']=='LAWYER'){
												$where_clause = " WHERE LawyerId=".$arr_pmb['PMTo'];
											}
											$str_lawyer = "SELECT LawyerUsername FROM ".$table['professional_detail']."".$where_clause;
											$sel_lawyer = mysql_query($str_lawyer);
											if(mysql_num_rows($sel_lawyer) > 0){
											$arr_lawyer = mysql_fetch_array($sel_lawyer);
											}else{
											$arr_lawyer['LawyerUsername'] = '';
											}
									?>
                                    <TABLE CELLPADDING="0" CELLSPACING="0" BORDER="0" WIDTH="100%" valign="top">
                                    	<tr valign="top">
                                        <?php
                                        if($arr_pmb['PMFromType']=='LAWYER'){
											$from = "From Lawyer: ".$arr_lawyer['LawyerUsername'];
											$to = "To Client: ".$arr_client['ClientUsername'];
										}else if($arr_pmb['PMToType']=='LAWYER'){
											$from = "From Client: ".$arr_client['ClientUsername'];
											$to = "To Lawyer: ".$arr_lawyer['LawyerUsername'];
										}
										?>
                                        	<td width="20%"><?php echo $from;?></td>
                                            <td width="20%"><?php echo $to;?></td>
                                            <td width="60%"><?php echo $arr_pmb['PMText'];?></td>
                                        </tr>
                                     </TABLE>
                                     <hr style="color:#FFF"/>
                                    <?php
										}
									}else{
										echo "No private message sent.";
									}
									?>
                                </td>
                            </TR>
                        </TABLE>
                            <hr style="color:#FFF"/>
                         <?php
							}
						}
						 ?>
                        <!--working area ends -->
</div>

<?mysql_close($connect);?>
<? include('include/adminfooter.php');?>
