<html>
<head>
<title>Invoice details</title>
</head>
<body>
<div> </div>
<table border="0" cellpadding="4" bordercolor="#ccc" cellspacing="4" width="100%" style="background:#f4f4f4; font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:left;">
  <tr>
    <th colspan="2" style="background:#025D89; text-align:center; color:#9FCFE7;">Invoice Details</th>
  </tr>
  <tr>
    <td>Project Name : </td>
    <td><?=$invs_details['project_name']?></td>
  </tr>
  <tr>
    <td>Invoice Number : </td>
    <td><?=$invs_details['invoice_number']?></td>
  </tr>
  <tr>
    <td>Invoice Sender/Professional : </td>
    <td><? echo $_SESSION['user_session_fullname'];?></td>
  </tr>
  <tr>
    <td>Invoice Reciever/Client : </td>
    <td><? echo $invs_details['ClientFirstname']." ".$invs_details['ClientLastname'];?></td>
  </tr>
  <tr>
    <td>Invoice Sent Date : </td>
    <td><? echo $invs_details['cr_date'];?></td>
  </tr>
  <tr>
    <td>Amount : </td>
    <td><? echo $invs_details['amount'];?></td>
  </tr>
  </tr>
  
</table>
</body>
</html>
