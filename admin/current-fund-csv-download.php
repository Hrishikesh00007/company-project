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
$arr[0][3]="Current";
$arr[0][4]="Charge";
$arr[0][5]="Fund";
$arr[0][6]="Remarks";
$arr[0][7]="Date";

$sqlm="SELECT * FROM `ee_transfer_current_fund` ORDER BY `id` DESC";
$resm=query($conn,$sqlm);
$numm=numrows($resm);
if($numm>0)
{
$i=1;
while($fetchm=fetcharray($resm))
{
$arr[$i][0]=$i;
$arr[$i][1]=$fetchm['userid'];
$arr[$i][2]=ucwords(getMemberUserid($conn,$fetchm['userid'],'name'));
$arr[$i][3]=$fetchm['current'];
$arr[$i][4]=$fetchm['charge'];
$arr[$i][5]=ucwords($fetchm['fund']);
$arr[$i][6]=$fetchm['remarks'];
$arr[$i][7]=$fetchm['date'];
$i++;
}}

$name='Current-Fund-Statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');

}
?>