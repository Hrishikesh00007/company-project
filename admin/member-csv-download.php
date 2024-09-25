<?php
session_start();
include('includes/function.php');
if(!isset($_SESSION['sid']))
{
redirect('index.php');
}

if($_SESSION['sid'])
{
$rand=rand(11111,99999);

$arr=array();
$arr[0][0]="Sl_No";
$arr[0][1]="User_ID";
$arr[0][2]="Sponsor";
$arr[0][3]="Name";
$arr[0][4]="Password";
$arr[0][5]="Phone";
$arr[0][6]="Email";
$arr[0][7]="Status";
$arr[0][8]="Pay_Status";
$arr[0][9]="Date";
$arr[0][10]="Approved";
$sqlm="SELECT * FROM `ee_member` ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{
if($fetchm['status']=='A'){$status='Active';}else{$status='Pending';}
if($fetchm['paystatus']=='A'){$paystatus='Paid';}else{$paystatus='Pending';}

$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=$fetchm['sponsor'];
$arr[$i][3]=ucwords(getMemberUserid($conn,$fetchm['userid'],'name'));
$arr[$i][4]=base64_decode($fetchm['password']);
$arr[$i][5]=ucwords($fetchm['phone']);
$arr[$i][6]=$fetchm['email'];
$arr[$i][7]=$status;
$arr[$i][8]=$paystatus;
$arr[$i][9]=$fetchm['date'];
$arr[$i][10]=$fetchm['approved'];

$i++;
}}

$name='member-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');

}
?>