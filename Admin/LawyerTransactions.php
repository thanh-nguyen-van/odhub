<? include('include/adminheader.php');
include('include/connect.php');

?>

<h2>Lawyer Transactions</h2>


<div class="wht-bg">

                        <!--working area starts -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
                            <TR class="table_head">
                                <TD width="5%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>#</b></TD>
                                <TD width="30%"><b>Date</b></TD>
                                <TD width="30%"><b>Amount</b></TD>
                                <TD><b>Remarks</b></TD>
                                <!--<TD width="15%">&nbsp;</TD>-->
                            </TR>
                            <?

                            $select_tran_query = "SELECT * from ".$table['alltransaction']." WHERE PayerId=".$_REQUEST['lawyerid']." AND PayerType='LAWYER' order by TransactionDate desc";
							$select_tran_result=mysql_query($select_tran_query);
                            if($select_tran_result && mysql_num_rows($select_tran_result)>0) {
                                $i=1;
                                while($rl=mysql_fetch_array($select_tran_result)) {
                            ?>
                            <tr class="<?php echo ($i%2!=0 ? 'bg_grey' : ''); ?>">
                                <TD>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $i++;?>.</TD>
                                <TD><?php echo date("M d,Y",strtotime($rl['TransactionDate'])); ?></TD>
                                <TD>US$ <?php echo abs($rl['TransactionAmount']); ?></TD>
                                <TD><?php echo $rl['TransactionDescription']; ?></TD>
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
