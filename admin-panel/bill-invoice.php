<?php
session_start();
include('config.php');
error_reporting(0);
if($_SESSION['username'] == '')
{
    ?>
    <script>
        window.location = "login.php";
    </script>
    <?php
}
if(!$_REQUEST['id'])
{
    ?>
    <script>
        window.location = "bill.php";
    </script>
    <?php
}

$date = '';
// $t_date = date("Y-m-d");

$bill ="select * from `bills` where uid = '$_REQUEST[id]'";
$bill_rs = mysqli_query($con, $bill);
$bill_arr = mysqli_fetch_array($bill_rs);

$sql_st = "select * from company_details where id='$bill_arr[company_id]'";
$rs_st = mysqli_query($con,$sql_st);
$arr_st = mysqli_fetch_array($rs_st);

$sql_st86 = "select * from state_master where state_code='$arr_st[state_name]'";
$rs_st86 = mysqli_query($con,$sql_st86);
$arr_st86 = mysqli_fetch_array($rs_st86);


$sql_cust = "select * from customer_details where id='$bill_arr[cust_id]'";
$sql_cust_rs = mysqli_query($con, $sql_cust);
$sql_cust_arr = mysqli_fetch_array($sql_cust_rs);



if($_REQUEST['generate'] == 1)
{
    $fet_inv = "select max(inv_max) as maxid from invoice";
    $fet_inv_rs = mysqli_query($con, $fet_inv);
    $fet_inv_arr = mysqli_fetch_array($fet_inv_rs);
    
    $dater = date('y');
    $monthr = date('m');

    if($monthr <= 3)
    {
        $date1 = $dater-1;
        $dt = $date1.'-'.$dater;
    }
    else
    {
        $date1 = $dater+1;
        $dt = $dater.'-'.$date1;
    }
    if($fet_inv_arr['maxid'])
    {
        $number = $fet_inv_arr['maxid']+1;
    }
    else
    {
        $number = 18;
    }
    $auto = ($number < 10) ? '0' . $number : $number;
    $invoice_no = "XT01".'-'. $auto.'/'. $dt;
    
    $tot_amt = "select * from bills where uid='$_REQUEST[id]' and status=0";
    $tot_amt_rs = mysqli_query($con, $tot_amt);
    while($tot_amt_arr = mysqli_fetch_array($tot_amt_rs))
    {
        $tot += $tot_amt_arr['amount'];
        $tot_cgst += $tot_amt_arr['amount'] * ($tot_amt_arr['cgst'] / 100) ;
        $tot_sgst += $tot_amt_arr['amount'] * ($tot_amt_arr['sgst'] / 100) ;
        $tot_igst += $tot_amt_arr['amount'] * ($tot_amt_arr['igst'] / 100) ;
        $tot_other_tax += $tot_amt_arr['amount'] * ($tot_amt_arr['other_tax'] / 100) ;
        $grand_tot = $tot+$tot_cgst+$tot_sgst+$tot_igst+$tot_other_tax;
        // $grand_tot1 += $grand_tot;
        $tot_bill_date = $tot_amt_arr['date'];
        
    }
    
    $ins = "INSERT INTO `invoice` (`invoice_no`, `inv_max`, `bills_uid`, `amount`, `invoice_date`) VALUES ('$invoice_no', '$number', '$_REQUEST[id]', '$grand_tot', '$tot_bill_date')";
    $ins_rs = mysqli_query($con, $ins);
}
else
{
    $fet_inv = "select * from invoice where bills_uid='$_REQUEST[id]'";
    $fet_inv_rs = mysqli_query($con, $fet_inv);
    $fet_inv_arr = mysqli_fetch_array($fet_inv_rs);
    $invoice_no = $fet_inv_arr['invoice_no'];
}
?>
<style>
    body {
      background: rgb(204,204,204); 
    }
    page {
      background: white;
      display: block;
      margin: 0 auto;
      margin-bottom: 0.5cm;
      box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
    }
    page[size="A4"] {  
      width: 21cm;
      /*height: 29.7cm; */
    }
    page[size="A4"][layout="portrait"] {
      width: 29.7cm;
      /*height: 21cm;  */
    }
    @media print {
      body, page {
        margin: 0;
        box-shadow: 0;
      }
      td {
          font-size: 18px;
      }
      .break {
          margin-top:150px;
      }
      .spacer {
          margin-top:20px;
          margin-bottom:20px;
          min-height:50px;
      }
      tr {
      line-height: 1.5em;
      }
    }
</style>
<page size="A4"  id="printableArea">
    <table style="padding:0; width:100%; margin-top:15px; margin-bottom:15px;" border="1" class="table spacer">
        <tr style="height:100px; border-bottom:0" border="0">
            <td style= "border:1px solid #000000; border-right:0; text-align:center;" colspan="2">
                <img src="dist/images/logo/<?php echo $arr_st['img']; ?>" style="max-width:150px;">
            </td>
            
        </tr>
        
        <?php
            // $sessionyear=$_SESSION['username'];
           
            
            $sql_st75 = "select * from state_master where id='$sql_cust_arr[state]'";
            $rs_st75 = mysqli_query($con,$sql_st75);
            $arr_st75 = mysqli_fetch_array($rs_st75);
            $date = date('Y-m-d');
            
            $dater = date('y');
            $monthr = date('m');

            if($monthr <= 3)
            {
                $date1 = $dater-1;
                $dt = $date1.'-'.$dater;
            }
            else
            {
                $date1 = $dater+1;
                $dt = $dater.'-'.$date1;
            }
            
            
            $bill_mx ="select max(id) as maxid from `bills`";
            $bill_mx_rs = mysqli_query($con, $bill_mx);
            $bill_mx_arr = mysqli_fetch_array($bill_mx_rs);
            
            $montha = date('m', strtotime($bill_arr['date']));
            
            if($montha == '1' or $montha == '01')
            {
                $monthx = 'January';
            }
            elseif($montha == '2' or $montha == '02')
            {
                $monthx = 'February';
            }
            elseif($montha == '3' or $montha == '03')
            {
                $monthx = 'March';
            }
            elseif($montha == '4' or $montha == '04')
            {
                $monthx = 'April';
            }
            elseif($montha == '5' or $montha == '05')
            {
                $monthx = 'May';
            }
            elseif($montha == '6' or $montha == '06')
            {
                $monthx = 'June';
            }
            elseif($montha == '7' or $montha == '07')
            {
                $monthx = 'July';
            }
            elseif($montha == '8' or $montha == '08')
            {
                $monthx = 'August';
            }
            elseif($montha == '9' or $montha == '09')
            {
                $monthx = 'September';
            }
            elseif($montha == '10')
            {
                $monthx = 'October';
            }
            elseif($montha == '11')
            {
                $monthx = 'November';
            }
            elseif($montha == '12')
            {
                $monthx = 'December';
            }
        ?>
        <tr>
            <td colspan="2">
                <table style="padding:0; width:100%; margin-top:15px; margin-bottom:15px;" class="table">
                    <tr>
                        <td><strong>Invoice Number </strong><?php echo $invoice_no;  ?></td>
                        <td style="text-align:right;"><strong>Date: </strong><?php echo date('d-m-Y', strtotime($bill_arr['date'])); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <strong>Invoice</strong>
            </td>
        </tr>
        <tr>
            <td style="width:50%; padding:2%;">
                <h2 style="margin:1%; font-size:20px;"><?php echo $arr_st['firm_name']; ?></h2>
                <p style="margin:1%;"><strong><?php echo $arr_st['tagline']; ?></strong></p>
                <p style="margin:1%;"><?php echo $arr_st['address']; ?></p>
                <hr>
                <p style="margin:1%;"><strong> Ph: </strong><?php echo $arr_st['contact_no']; ?> <strong> || </strong> <?php echo $arr_st['alternate_no']; ?> </p>
                <p style="margin:1%;"><strong> Email:</strong> <?php echo $arr_st['email_id']; ?></p>
                <hr>
                <p style="margin:1%;"><strong> State: </strong><?php echo $arr_st86['state_name'].' ('. $arr_st86['state_code'].' - '.$arr_st86['state_form'].')'; ?></p>
                <p style="margin:1%;"><strong> GSTIN: </strong><?php echo $arr_st['gst_no']; ?> </p>
                <p style="margin:1%;"><strong> Pan:</strong> <?php echo $arr_st['pan_no']; ?></p>
            </td>
            <td style="width:50%; padding:2%; vertical-align: baseline;">
                <h2 style="margin:1%; margin-top:0; font-size:20px;">
                    <?php 
                        if($sql_cust_arr['gst_no'])
                        {
                            echo $sql_cust_arr['firm_name']; 
                        }
                        else
                        {
                            echo $sql_cust_arr['person_name']; 
                        }
                    ?>
                </h2>
                <p style="margin:1%;"><strong>Address </strong><?php echo $sql_cust_arr['address']; ?></p>
                <hr>
                <p style="margin:1%;"><strong>Contact Number </strong><?php echo $sql_cust_arr['contact']; ?></p>
                <?php
                    if($arr_st['email_id'])
                    {
                        ?>
                            <p style="margin:1%;"><strong>Email Id: </strong><?php echo $sql_cust_arr['email']; ?></p>
                        <?php
                    }
                ?>
                <hr>
                <?php
                    if($sql_cust_arr['gst_no'])
                    {
                        ?>
                        <p style="margin:1%;"><strong>GST Number </strong><?php echo $sql_cust_arr['gst_no']; ?></p>
                        <?php
                    }
                ?>
                <p style="margin:1%;"><strong>State Name </strong><?php echo $arr_st75['state_name']; ?></p>
                <p style="margin:1%;"><strong>State Code </strong><?php echo $arr_st75['state_code']; ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table border="1" style="width:100%; border:1px solid;padding-left: 0px;padding-right: 0px; line-height: 1.6;" class="spacer">
                    <tr>
                        <th style="width:20px; padding:5px;" rowspan="2">SAC Code</th>
                        <th style="text-align:center; padding:5px;" rowspan="2">Name of Product or Service</th>
                        <th style="text-align:center; padding:5px; min-width:80px;" rowspan="2">Amount</th>
                        <th style="text-align:center; padding:5px;" colspan="2">Within State</th>
                        <th style="text-align:center; padding:5px;">Interstate</th>
                        <th style="text-align:center; padding:5px;" rowspan="2">Other Tax</th>
                        <th style="text-align:center; padding:5px; min-width:100px;" rowspan="2">Total Amount</th>
                    </tr>
                    <tr>
                        <th>CGST</th>
                        <th>SGST</th>
                        <th>IGST</th>
                    </tr>
                    <?php
                    $j=0;
                    $sql_st1 = "select * from bills where uid='$_REQUEST[id]' and status=0";
                    $rs_st1 = mysqli_query($con,$sql_st1);
                    while($arr_st1 = mysqli_fetch_array($rs_st1))
                    {
                        $j++;
                        ?>
                            <tr>
                                <td style="text-align:center; padding-left:10px;"><?php echo $j; ?></td>
                                <td style="text-align:left; padding-left:10px;"><?php echo $arr_st1['description']; ?></td>
                                <td style="text-align:right; padding-left:10px;">₹ <?php echo $tot = $arr_st1['amount']; ?></td>
                                <td style="text-align:right; padding-left:10px;">₹ <?php echo $tot_cgst = $arr_st1['amount'] * ($arr_st1['cgst'] / 100) ; ?></td>
                                <td style="text-align:right; padding-left:10px;">₹ <?php echo $tot_sgst = $arr_st1['amount'] * ($arr_st1['sgst'] / 100) ; ?></td>
                                <td style="text-align:right; padding-left:10px;">₹ <?php echo $tot_igst = $arr_st1['amount'] * ($arr_st1['igst'] / 100) ; ?></td>
                                <td style="text-align:right; padding-left:10px;">₹ <?php echo $tot_other_tax = $arr_st1['amount'] * ($arr_st1['other_tax'] / 100) ; ?></td>
                                <td style="text-align:right; padding-left:10px;">₹ <?php echo $grand_tot = $tot+$tot_cgst+$tot_sgst+$tot_igst+$tot_other_tax; ?></td>
                                <?php $grand_tot1 += $grand_tot; ?>
                            </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan="7" style="text-align:right; padding-left:10px;"><strong>TOTAL</strong></td>
                        <td style="text-align:right; padding-left:10px;"><strong>₹  <?php echo $grand_tot1; ?></strong></td>
                    </tr>
                </table>
            </td>
        </tr>
        <?php
        $bnk = "select * from bank_details where id ='$bill_arr[bank_id]'";
        $bnk_rs = mysqli_query($con, $bnk);
        $bnk_arr = mysqli_fetch_array($bnk_rs);
        ?>
        <tr>
            <td style="height:60px; text-align:right;vertical-align: bottom;padding-right: 28px; line-height: 1.6;  padding:2%;" class="spacer">
                <table>
                    <tr>
                        <td><strong>Account Holder: </strong><?php echo $bnk_arr['acc_holder_name']; ?> </td>
                    </tr>
                    <tr>
                        <td><strong>Bank Name: </strong><?php echo $bnk_arr['bank_name']; ?></td>
                    </tr>
                    <tr>
                        
                        <td><strong>Account No: </strong><?php echo $bnk_arr['acc_no']; ?></td>
                    </tr>
                    <tr>
                        
                        <td><strong>IFSC Code: </strong><?php echo $bnk_arr['ifsc_code']; ?></td>
                    </tr>
                    <tr>
                        
                        <td><strong>Branch: </strong><?php echo $bnk_arr['branch_name']; ?></td>
                    </tr>
                    <tr>
                        
                        <td><strong>A/C Type: </strong><?php echo $bnk_arr['acc_type']; ?></td>
                    </tr>
                </table>
            </td>
            <td>
                <img src="dist/images/Scopycode-Services.jpg" style="max-width:100%;">
            </td>
        </tr>
        <tr>
            <td colspan="2" style=" padding:2%;"><p>System-generated invoice: No signature required</p></td>
        </tr>
    </table>
    
</page>

<script type="text/javascript">
function codeAddress() {
    var printContents = document.getElementById('printableArea').innerHTML;
    var originalContents = document.body.innerHTML;
    
    document.body.innerHTML = printContents;
    document.tite='My Print';
    window.print();
    
    document.body.innerHTML = originalContents;
}
window.onload = codeAddress;

setTimeout(function(){
    window.location.href = "bill-report.php?id=<?php echo $_REQUEST['id']; ?>";
},1000);
</script>