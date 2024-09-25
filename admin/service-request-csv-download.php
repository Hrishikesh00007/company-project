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
$arr[0][2]="Name";

$arr[0][3]="Amount";
$arr[0][4]="Status";
$arr[0][5]="Request_Date";
$arr[0][6]="Approved_Date";


$sqlm="SELECT * FROM `ee_member_service` ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{
if($fetchm['status']=='P'){$status='Pending';}else{$status='Approved';}

$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=ucwords(getMemberUserid($conn,$fetchm['userid'],'name'));

$arr[$i][3]=$fetchm['amount'];
$arr[$i][4]=$status;
$arr[$i][5]=$fetchm['date'];
$arr[$i][6]=$fetchm['approved'];

$i++;
}}

$name='Service-Request-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');

}
?>