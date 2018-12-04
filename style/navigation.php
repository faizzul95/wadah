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
				    $page = $_GET['page'];
				?>

				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">

					<li><a href="index.php?page=home"><img src="images/logo.jpg" width="50" height="50"></a></li>

					<!-- before login -->
					<?php if ($page == "home") { ?>
						<li class="active"><a href="index.php?page=home">Home</a></li>
						<li><a href="activity?page=aktiviti">Aktiviti</a></li>
						<li><a href="about.php?page=tentangwadah">Tentang Wadah</a></li>
						<li style="text-align:right"><a href="login.php?page=logmasuk">Log Masuk</a></li>
					<?php } else if ($page == "tentangwadah") { ?>
						<li><a href="index.php?page=home">Home</a></li>
						<li><a href="activity?page=aktiviti">Aktiviti</a></li>
						<li  class="active"><a href="about.php?page=tentangwadah">Tentang Wadah</a></li>
						<li style="text-align:right"><a href="login.php?page=logmasuk">Log Masuk</a></li>
					<?php }  else if ($page == "aktiviti") { ?>
						<li><a href="index.php?page=home">Home</a></li>
						<li class="active"><a href="activity?page=aktiviti">Aktiviti</a></li>
						<li><a href="about.php?page=tentangwadah">Tentang Wadah</a></li>
						<li style="text-align:right"><a href="login.php?page=logmasuk">Log Masuk</a></li>
					<?php } else if ($page == "logmasuk" || $page == "LoginFail") { ?>
						<li><a href="index.php?page=home">Home</a></li>
						<li><a href="activity?page=aktiviti">Aktiviti</a></li>
						<li><a href="about.php?page=tentangwadah">Tentang Wadah</a></li>
						<li  class="active"><a href="login.php?page=logmasuk">Log Masuk</a></li>
					<?php } ?>
					</ul>
				</div>
				<!--/.nav-collapse -->
</div>