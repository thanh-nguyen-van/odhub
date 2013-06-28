<html>
<head>
<title>Invoice details</title>
</head>
<body>
<table border="0" cellpadding="4" bordercolor="#ccc" cellspacing="4" width="100%" style="background:#f4f4f4; font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:left;">
  <tr>
    <th colspan="2" style="background:#E4710A; text-align:center; color:#fff;">Invoice Details</th>
  </tr>
  <tr>
    <td><strong>Project Name</strong> : </td>
    <td><strong><?=$invs_details['project_name']?></strong></td>
  </tr>
  <tr>
    <td>Invoice Number : </td>
    <td><?=$invs_details['invoice_number']?></td>
  </tr>
  <tr>
    <td>Invoice Sender/Professional : </td>
    <td><? echo $invs_details['ProfessionalFirstname']." ".$invs_details['ProfessionalLastname'];?></td>
  </tr>
  <tr>
    <td>Invoice Reciever/Client : </td>
    <td><? echo $_SESSION['user_session_fullname'];?></td>
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
