<div class="sidebar" style=" background-image: radial-gradient(circle, #b84efd, #9a3bdb, #7c29ba, #601699, #45017a);">
<div class="sidebar-background" ></div>
<div class="sidebar-wrapper scrollbar-inner">
<div class="sidebar-content">
<div class="user">
<div class="avatar-sm float-left mr-2">
<?php
if(getMember($conn,$_SESSION['mid'],'profile'))
{
?>
<img src="profile/<?=getMember($conn,$_SESSION['mid'],'profile')?>" alt="..." class="avatar-img rounded-circle">
<?php }else{?>
<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
<?php }?></div>
<div class="info">
<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
<span>
<?=getMember($conn,$_SESSION['mid'],'name')?>
<span class="user-level"><?=getMember($conn,$_SESSION['mid'],'userid')?></span>
<span class="caret"></span>
</span>
</a>
<div class="clearfix"></div>

<div class="collapse in" id="collapseExample">
<ul class="nav">
<li><a href="edit-profile.php"><span class="link-collapse">Edit Profile</span></a></li>


<li><a href="change-password.php"><span class="link-collapse">Change Password</span></a></li>
<li><a href="logout.php" onclick="return confirm('Are you sure want to logout?');"><span class="link-collapse">Logout</span></a></li>
</ul>
</div>
</div>
</div>

<ul class="nav">
<li class="nav-item active"><a href="dashboard.php"><i class="fas fa-home"></i><p>Dashboard</p></a></li>

<li class="nav-item">
<a data-toggle="collapse" href="#base">
<i class="fas fa-layer-group"></i>
<p>Sponsor & Team</p>
<span class="caret"></span>
</a>
<div class="collapse" id="base">
<ul class="nav nav-collapse">
<li><a href="member-direct-downline.php"><span class="sub-item">My Sponsor</span></a></li>
<li><a href="member-team.php"><span class="sub-item">My Team</span></a></li>
<li><a href="member-reward-statement.php"><span class="sub-item">My Rank Reward</span></a></li>
<li><a href="member-service-statement.php"><span class="sub-item">My Service</span></a></li>


</ul>
</div>
</li>


<li class="nav-item">
<a data-toggle="collapse" href="#forms">
<i class="fas fa-pen-square"></i>
<p>Income</p>
<span class="caret"></span>
</a>
<div class="collapse" id="forms">
<ul class="nav nav-collapse">
<li><a href="comm-direct-bonus.php"><span class="sub-item">Direct Bonus</span></a></li>
<li><a href="comm-level.php"><span class="sub-item">Level Bonus</span></a></li>
<li><a href="comm-cashback-bonus.php"><span class="sub-item">Cashback Bonus</span></a></li>
<li><a href="comm-level-bonus.php"><span class="sub-item">Cashback Level Bonus</span></a></li>
<li><a href="comm-rank-reward.php"><span class="sub-item">Rank Reward</span></a></li>






</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#tables2">
<i class="fas fa-table"></i>
<p>Deposit Fund</p>
<span class="caret"></span>
</a>
<div class="collapse" id="tables2">
<ul class="nav nav-collapse">
<li><a href="payment.php"><span class="sub-item">New Request</span></a></li>
<li><a href="payment-statement.php"><span class="sub-item">View History</span></a></li>
</ul>
</div>
</li>

<li class="nav-item">
<a data-toggle="collapse" href="#form1">
<i class="fas fa-pen-square"></i>
<p>P2P Transfer</p>
<span class="caret"></span>
</a>
<div class="collapse" id="form1">
<ul class="nav nav-collapse">
<li><a href="fund.php"><span class="sub-item">Fund To Others</span></a></li>

<li><a href="fund-statement.php"><span class="sub-item">View History</span></a></li>
<li><a href="current.php"><span class="sub-item">Current To Fund</span></a></li>
<li><a href="current-statement.php"><span class="sub-item">View History</span></a></li>
</ul>
</div>
</li>






<li class="nav-item">
<a data-toggle="collapse" href="#investoth">
<i class="fas fa-pen-square"></i>
<p>Topup</p>
<span class="caret"></span>
</a>
<div class="collapse" id="investoth">
<ul class="nav nav-collapse">
<li><a href="topup.php"><span class="sub-item">Others Activation</span></a></li>
<li><a href="topup-statement.php"><span class="sub-item">View Activation</span></a></li>
</ul>
</div>
</li>


<li class="nav-item">
<a data-toggle="collapse" href="#Genealogy">
<i class="fas fa-layer-group"></i>
<p>Genealogy</p>
<span class="caret"></span>
</a>
<div class="collapse" id="Genealogy">
<ul class="nav nav-collapse">
<li><a href="grid-view.php"><span class="sub-item">Grid View</span></a></li>

</ul>
</div>
</li>


<li class="nav-item">
<a data-toggle="collapse" href="#submenu">
<i class="fas fa-bars"></i>
<p>Payout</p>
<span class="caret"></span>
</a>
<div class="collapse" id="submenu">
<ul class="nav nav-collapse">
<li><a href="withdrawal.php?case=add"><span class="sub-item">New Request</span></a></li>

<li><a href="withdrawal-statement.php"><span class="sub-item">View History</span></a></li>
</ul>
</div>
</li>




<li class="nav-item">
<a data-toggle="collapse" href="#charts">
<i class="far fa-chart-bar"></i>
<p>Support</p>
<span class="caret"></span>
</a>
<div class="collapse" id="charts">
<ul class="nav nav-collapse">
<li><a href="support.php?case=add"><span class="sub-item">New Support</span></a></li>
<li><a href="support-statement.php"><span class="sub-item">View Support</span></a></li>
</ul>
</div>
</li>

<li class="nav-item active">
<a href="logout.php"  onclick="return confirm('Are you sure want to logout?')" data-i18n="nav.dash.main" class="menu-item"><i class="fas fa-lock"></i><p>Logout</p></a>
</li>

</ul>
</div>
</div>
</div>