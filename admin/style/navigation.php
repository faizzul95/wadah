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
				     <?php if($_SESSION['role'] == 'admin') { ?>
						<li><a href="../index.php?page=home">Halaman Utama</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ahli<span class="caret"></span></a>
						   <ul class="dropdown-menu">
						       <li><a href="list_member.php">Senarai Ahli</a></li>
						       <li><a href="list_speaker.php">Senarai Penceramah</a></li>
						       <li><a href="list_naqib.php">Senarai Naqib</a></li>
						    </ul>
					     </li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Program/Aktiviti<span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="../activity/list_activity.php">Senarai Aktiviti</a></li>
					          <li><a href="#">Ahli</a></li>
					        </ul>
				      	</li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Aset<span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="../asset/asset_list.php">Senarai Aset</a></li>
					          <li><a href="../asset/maintenance_list.php">Senarai Penyelenggaraan Aset</a></li>
                              <li><a href="../asset/rent_list.php">Senarai Sewaan Aset</a></li>
					        </ul>
				      	</li>
				      	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Akaun<span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="account/">Senarai Penaja</a></li>
					          <li><a href="account/">Pembelanjaan</a></li>
					        </ul>
				      	</li>
				     <?php }  ?>
			    </ul>
			    
			    <?php if(isset($_SESSION['role'])){ ?>
					    <ul class="nav navbar-nav navbar-right">
						 <li><a href="logout.php">Log Keluar &nbsp;<span class="glyphicon glyphicon-log-out"></span></a></li>
						</ul> 
				<?php } else { ?>
					 <ul class="nav navbar-nav navbar-right">
						 <li><a href="login.php?page=logmasuk">Log Masuk &nbsp;<span class="glyphicon glyphicon-log-in"></span></a></li>
					 </ul> 
				<?php } ?>

			     
			  </div>
				<!--/.nav-collapse -->
</div>



