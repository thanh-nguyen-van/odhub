<? include('include/adminheader.php');
include('include/connect.php');

?>

<h2>Client Transactions</h2>

<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">	
                            <TR class="table_head">
                                <TD width="5%" align="center" valign="middle" class="td-hd">#</TD>
                                <TD width="42%" align="left" valign="middle" class="td-hd">Date</TD>
                                <TD width="29%" align="left" valign="middle" class="td-hd">Amount</TD>
                                <TD width="24%" align="left" valign="middle"class="td-hd">Remarks</TD>
                                <!--<TD width="15%">&nbsp;</TD>-->
                            </TR>
                            <?

                            $select_tran_query = "SELECT * from ".$table['alltransaction']." WHERE PayerId=".$_REQUEST['clientid']." AND PayerType='CLIENT' order by TransactionDate desc";
							$select_tran_result=mysql_query($select_tran_query);
                            if($select_tran_result && mysql_num_rows($select_tran_result)>0) {
                                $i=1;
                                while($rl=mysql_fetch_array($select_tran_result)) {
                            ?>
                            <tr class="<?php echo ($i%2!=0 ? 'bg_grey' : ''); ?>">
                                <TD align="center" valign="middle"><?php echo $i++;?>.</TD>
                                <TD align="left" valign="middle"><?php echo date("M d,Y",strtotime($rl['TransactionDate'])); ?></TD>
                                <TD align="left" valign="middle">US$ <?php echo abs($rl['TransactionAmount']); ?></TD>
                                <TD align="left" valign="middle"><?php echo $rl['TransactionDescription']; ?></TD>
                                <!--<TD>
                                    &nbsp;&nbsp;<a target="_blank" href="TransactionReceipt.php?tid=<?php //echo $rl['ClientInvoiceId']; ?>">Generate Receipt</a></a>
                                </TD>-->
                            </TR>
                            <?
                                }
                            }else {
                            ?>
                            <TR>
                                <TD colspan="4"><b>No transaction report is available.</b></TD>
                            </TR>
                            <?
                            }
                            ?>
                        </TABLE>
                        <!--working area ends -->
</div>

<?mysql_close($connect);?>
<? include('include/adminfooter.php');?>
