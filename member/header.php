<div class="main-header" style=" background-image: radial-gradient(circle, #b84efd, #9a3bdb, #7c29ba, #601699, #45017a);">
<!-- Logo Header -->
<div class="logo-header" style="background-color:#000;">
<h2><a class="navbar-brand" style="color:#CC3300;font-size:18px;" href="dashboard.php"><img src="images/logo.png" alt="<?=$title?>"  width="170" /></a></h2>
<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon">
<i class="fa fa-bars"></i>
</span>
</button>
<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
<div class="navbar-minimize">
<button class="btn btn-minimize btn-rounded">
<i class="fa fa-bars"></i>
</button>
</div>
</div>
<!-- End Logo Header -->

<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg">

<div class="container-fluid">
<div class="collapse" id="search-nav"></div>
<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

<li class="nav-item dropdown hidden-caret">
<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
<div class="avatar-sm">
<?php
if(getMember($conn,$_SESSION['mid'],'profile'))
{
?>
<img src="profile/<?=getMember($conn,$_SESSION['mid'],'profile')?>" alt="..." class="avatar-img rounded-circle">
<?php }else{?>
<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
<?php }?></div>
</a>
<ul class="dropdown-menu dropdown-user animated fadeIn">
<li>
<div class="user-box">
<div class="avatar-lg"><?php
if(getMember($conn,$_SESSION['mid'],'profile'))
{
?>
<img src="profile/<?=getMember($conn,$_SESSION['mid'],'profile')?>" alt="..." class="avatar-img rounded-circle">
<?php }else{?>
<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
<?php }?></div>
<div class="u-text">
<h4><?=getMember($conn,$_SESSION['mid'],'name')?></h4>
<p class="text-muted"><?=getMember($conn,$_SESSION['mid'],'email')?></p><a href="edit-profile.php" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
</div>
</div>
</li>
<li>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="edit-profile.php">My Profile</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="logout.php" onclick="return confirm('Are you sure want to logout?');">Logout</a>
</li>
</ul>
</li>

</ul>
</div>
</nav>
<!-- End Navbar -->
</div>