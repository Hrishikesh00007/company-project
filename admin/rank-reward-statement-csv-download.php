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
$arr[0][3]="Rank_ID";
$arr[0][4]="Rank";


$arr[0][5]="No_Of_Direct";
$arr[0][6]="Company_Turn_Over";

$arr[0][7]="Date";

$sqlm="SELECT * FROM `ee_member_topup` ORDER BY `id` DESC";
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
$arr[$i][3]=$fetch['rankid'];
$arr[$i][4]=$fetch['rank'];

$arr[$i][5]=$fetch['nodirect'];
$arr[$i][6]=$fetch['ctoper'];
$arr[$i][7]=getDateConvert($fetchm['date']);

$i++;
}}

$name='Rank-Reward-statement-'.date('Y-m-d');

$fp = fopen('csvfile/'.$name.'.csv', 'w');

foreach ($arr as $fields) {
fputcsv($fp, $fields);
}

fclose($fp);
redirect('download2.php?f='.$name.'.csv');

}
?>