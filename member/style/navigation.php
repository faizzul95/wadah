<?php 
// Turn off error reporting
	error_reporting(0);
 ?>
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
				</div>
				
			  <div class="container-fluid collapse navbar-collapse">
			  	<?php if(isset($_SESSION['role'])) { ?>
					<div class="navbar-header">
				      <a class="navbar-brand" href="../index.php?page=home">Wadah</a>
				    </div>	
				<?php } else { ?>
					<div class="navbar-header">
				      <a class="navbar-brand" href="index.php?page=home">Wadah</a>
				    </div>	
				<?php } ?>
			    
			    <ul class="nav navbar-nav">

				    <!-- only admin can view-->
				     <?php if($_SESSION['role'] == 'member') { ?>
						<li><a href="../index.php?page=home">Halaman Utama</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Program/Aktiviti<span class="caret"></span></a>
						   <ul class="dropdown-menu">
						        <li><a href="../list_public_activity.php?page=awam">Awam</a></li>
					          <li><a href="../list_member_activity.php?page=ahli">Ahli</a></li>
						    </ul>
					     </li>
					    <li><a href="member/user.php">Profil</a></li>
					<?php } else { ?>
						<li><a href="../index.php?page=home">Halaman Utama</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Program/Aktiviti<span class="caret"></span></a>
						   <ul class="dropdown-menu">
					          <li><a href="../list_public_activity.php?page=awam">Awam</a></li>
					          <li><a href="../list_member_activity.php?page=ahli">Ahli</a></li>
						    </ul>
					     </li>
					    <li><a href="about.php?page=tentangwadah">Tentang Wadah</a></li>
					<?php } ?>

			    </ul>
			    
			    <?php if(isset($_SESSION['role'])){ ?>
					    <ul class="nav navbar-nav navbar-right">
						 <li><a href="../logout.php">Log Keluar &nbsp;<span class="glyphicon glyphicon-log-out"></span></a></li>
						</ul> 
				<?php } else { ?>
					 <ul class="nav navbar-nav navbar-right">
						 <li><a href="login.php?page=logmasuk">Log Masuk &nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li>
					 </ul> 
				<?php } ?>

			     
			  </div>
				<!--/.nav-collapse -->
</div>



