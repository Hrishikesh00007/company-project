<?php
include('includes/function.php');

$rand=rand(11111,99999);

$arr=array();
$arr[0][0]="Sl_No";
$arr[0][1]="User_ID";
$arr[0][2]="Name";


$arr[0][3]="Request";
$arr[0][4]="Service";
$arr[0][5]="Payout";
$arr[0][6]="Bank";
$arr[0][7]="Account_Name";
$arr[0][8]="Account_No";
$arr[0][9]="IFSC_Code";
$arr[0][10]="UPI_ID";
$arr[0][11]="Status";
$arr[0][12]="Date";
$arr[0][13]="Approved_Date";

$sqlm="SELECT * FROM `ee_withdrawal` WHERE `status`='C' ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{
if($fetchm['status']=='C'){$status='Approved';}
$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=ucwords(getMemberUserid($conn,$fetchm['userid'],'name'));


$arr[$i][3]=$fetchm['request'];
$arr[$i][4]=$fetchm['service'];
$arr[$i][5]=$fetchm['payout'];
$arr[$i][6]=$fetchm['bname'];
$arr[$i][7]=$fetchm['accname'];
$arr[$i][8]=$fetchm['accno'];
$arr[$i][9]=$fetchm['ifscode'];
$arr[$i][10]=$fetchm['upiid'];
$arr[$i][11]=$status;
$arr[$i][12]=getDateConvert($fetchm['date']);
$arr[$i][13]=getDateConvert($fetchm['approved']);

$i++;
}}

$name='Approved-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');
