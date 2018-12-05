
<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
				</div>

				<?php
					session_start();
				    $page = $_GET['page'];
				?>


				

			  <div class="container-fluid collapse navbar-collapse">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="index.php?page=home">Wadah</a>
			    </div>
			    <ul class="nav navbar-nav">
			      <?php if ($page == "home") { ?>
						<li class="active"><a href="index.php?page=home">Halaman Utama</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Aktiviti<span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="#">Awam</a></li>
					          <li><a href="#">Ahli</a></li>
					        </ul>
				      	</li>
						<li><a href="about.php?page=tentangwadah">Tentang Wadah</a></li>
					<?php } else if ($page == "tentangwadah") { ?>
						<li><a href="index.php?page=home">Halaman Utama</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Aktiviti<span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="#">Awam</a></li>
					          <li><a href="#">Ahli</a></li>
					        </ul>
				      	</li>
						<li  class="active"><a href="about.php?page=tentangwadah">Tentang Wadah</a></li>
					<?php }  else if ($page == "aktiviti") { ?>
						<li><a href="index.php?page=home">Halaman Utama</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Aktiviti<span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="#">Awam</a></li>
					          <li><a href="#">Ahli</a></li>
					        </ul>
				      	</li>
						<li><a href="about.php?page=tentangwadah">Tentang Wadah</a></li>
					<?php } else if ($page == "logmasuk" || $page == "LoginFail") { ?>
						<li><a href="index.php?page=home">Halaman Utama</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Aktiviti<span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="#">Awam</a></li>
					          <li><a href="#">Ahli</a></li>
					        </ul>
				      	</li>
						<li><a href="about.php?page=tentangwadah">Tentang Wadah</a></li>
					<?php } else { ?>
						<li><a href="index.php?page=home">Halaman Utama</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Aktiviti<span class="caret"></span></a>
					        <ul class="dropdown-menu">
					          <li><a href="#">Awam</a></li>
					          <li><a href="#">Ahli</a></li>
					        </ul>
				      	</li>
						<li><a href="about.php?page=tentangwadah">Tentang Wadah</a></li>
					<?php } ?>
			    </ul>
			    
			    <?php if(isset($_SESSION['role'])){ ?>
					    <ul class="nav navbar-nav navbar-right">
						 <li><a href="../logout.php">Log Keluar</a></li>
						</ul> 
				<?php } else { ?>
					 <ul class="nav navbar-nav navbar-right">
						 <li><a href="login.php?page=logmasuk">Log Masuk</a></li>
					 </ul> 
				<?php } ?>

			     
			  </div>
				<!--/.nav-collapse -->
</div>



