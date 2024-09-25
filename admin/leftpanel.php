
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" style="background:#222831;">
<div class="main-menu-content">
<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
<li class=" nav-item"><a href="#"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Home</span></a>
<ul class="menu-content">
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="dashboard.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-home"></i>Dashboard</a></li>
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="change-password.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-ios-locked"></i>Change Password</a></li>
<li class="<?php if($left=='1'){?> active<?php }?>"><a href="logout.php" onclick="return confirm('Are you sure want to logout now?');" data-i18n="nav.dash.main" class="menu-item"><i class="icon-power3"></i>Logout</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-gear"></i><span data-i18n="nav.dash.main" class="menu-title">Settings</span></a>
<ul class="menu-content">
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-joining.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Joining</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-level.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Level</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-cashback-level.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Cashback Level</a></li>

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-rank-reward.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Rank Reward</a></li>

<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-transfer.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Transfer</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-withdrawal.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Withdrawal</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-company.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>Company</a></li>
<li class="<?php if($left=='2'){?> active<?php }?>"><a href="settings-onoff.php" data-i18n="nav.dash.main" class="menu-item"><i class="icon-arrow-right3"></i>On Off</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-group"></i><span data-i18n="nav.dash.main" class="menu-title">Member</span></a>
<ul class="menu-content">
<?php if(getTotalMember($conn)<1){?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>First Member</a></li>
<?php }?>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Member</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="bank-details.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Bank Statement</a></li>
<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member-income-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Income Statement</a></li>


<li class="<?php if($left=='3'){?> active<?php }?>"><a href="member-topup-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Topup Statement</a></li>

<li class="<?php if($left=='3'){?> active<?php }?>"><a href="service-request.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Service Statement</a></li>

<li class="<?php if($left=='3'){?> active<?php }?>"><a href="rank-reward-statement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Rank Reward Statement</a></li>

</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Income</span></a>
<ul class="menu-content">
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-level.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Level Bonus</a></li>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-cashback-bonus.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Cashback Bonus</a></li>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-cashback-level.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Cashback Level Bonus</a></li>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-direct-bonus.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Direct Bonus</a></li>
<li class="<?php if($left=='4'){?> active<?php }?>"><a href="commission-rank-reward.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Rank Reward Bonus</a></li>



</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Deposit</span></a>
<ul class="menu-content">
<li class="<?php if($left=='6'){?> active<?php }?>"><a href="deposit.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Deposit</a></li>
<li class="<?php if($left=='6'){?> active<?php }?>"><a href="deposit.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Deposit</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Deduct</span></a>
<ul class="menu-content">
<li class="<?php if($left=='10'){?> active<?php }?>"><a href="deduct.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Deduct</a></li>
<li class="<?php if($left=='10'){?> active<?php }?>"><a href="deduct.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Deduct</a></li>
</ul>
</li>


<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Fund Request</span></a>
<ul class="menu-content">
<li class="<?php if($left=='12'){?> active<?php }?>"><a href="payment-request.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Statement</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-dollar"></i><span data-i18n="nav.dash.main" class="menu-title">Transfer Statement</span></a>
<ul class="menu-content">
<li class="<?php if($left=='20'){?> active<?php }?>"><a href="current-fund.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Current To Fund</a></li>
<li class="<?php if($left=='20'){?> active<?php }?>"><a href="fund-others.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Fund To Others</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">Payout</span></a>
<ul class="menu-content">
<li class="<?php if($left=='21'){?> active<?php }?>"><a href="pending-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Pending</a></li>
<li class="<?php if($left=='21'){?> active<?php }?>"><a href="approved-withdrawal.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Approved</a></li>
</ul>
</li>

<li class="nav-item"><a href="#"><i class="icon-group"></i><span data-i18n="nav.dash.main" class="menu-title">Genealogy</span></a>
<ul class="menu-content">
<li class="<?php if($left=='13'){?> active<?php }?>"><a href="grid-view.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>Grid View</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-money"></i><span data-i18n="nav.dash.main" class="menu-title">Message</span></a>
<ul class="menu-content">
<!--<li class="<?php if($left=='14'){?> active<?php }?>"><a href="announcement.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Message</a></li>-->
<li class="<?php if($left=='14'){?> active<?php }?>"><a href="announcement.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Message</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-money"></i><span data-i18n="nav.dash.main" class="menu-title">Service</span></a>
<ul class="menu-content">
<li class="<?php if($left=='54'){?> active<?php }?>"><a href="service.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Service</a></li>
<li class="<?php if($left=='54'){?> active<?php }?>"><a href="service.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Service</a></li>
</ul>
</li>

<li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">Others</span></a>
<ul class="menu-content">
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="banner.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Banner</a></li>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="banner.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Banner</a></li>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="contact.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Contact</a></li>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="contact.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Contact</a></li>
<li class="<?php if($left=='9'){?> active<?php }?>"><a href="feedback.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Feedback</a></li>
</ul>
</li>

<!--<li class=" nav-item"><a href="#"><i class="icon-group"></i><span data-i18n="nav.dash.main" class="menu-title">Sub Admin & Permission</span></a>
<ul class="menu-content">
<li class="<?php if($left=='15'){?> active<?php }?>"><a href="subadmin.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Sub Admin</a></li>
<li class="<?php if($left=='15'){?> active<?php }?>"><a href="subadmin.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Sub Admin</a></li>
<li class="<?php if($left=='15'){?> active<?php }?>"><a href="permission.php?case=add" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>New Permission</a></li>
<li class="<?php if($left=='15'){?> active<?php }?>"><a href="permission.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Permission</a></li>
</ul>
</li>-->

<li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.dash.main" class="menu-title">Support</span></a>
<ul class="menu-content">
<li class="<?php if($left=='11'){?> active<?php }?>"><a href="support.php" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-arrow-right3"></i>View Support</a></li>
</ul>
</li>

<li class=" nav-item"><a href="logout.php" onclick="return confirm('Are you sure want to logout now?');"><i class="icon-power"></i><span data-i18n="nav.dash.main" class="menu-title">Logout</span></a></li>

</ul>
</div>
</div>
