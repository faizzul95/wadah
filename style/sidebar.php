
					<aside>

					<!-- sidebar-widget -->
					<div class="sidebar-widget">
						<h3 class="sidebar-title">Aktiviti Hari Ini</h3>
						<div class="widget-container">
							<?php //Open php
					    require('connection.php');
					    
					   $category = "Awam";
					   $today = date('Y-m-d');
					   $sql = mysqli_query($myConnection,"SELECT * FROM `activity` WHERE `act_category` = '$category'") or die (mysqli_error());//Select table from database

							while($row=mysqli_fetch_array($sql))//loop the data
							{
								$act_id = $row['act_id'];
								$act_name = $row['act_name'];
								$act_description = $row['act_description'];
								$act_date = $row['act_date'];
								$act_time = $row['act_time'];

						?>
							<?php if($today == $act_date) { ?>
							<!-- loop here -->
							<article class="widget-post">
								<div class="post-image">
									<a href="post.php"><img src="images/event.jpg" width="90" height="60" alt=""></a>
								</div>
								<div class="post-body">
									<h2><a href="post.php?baca=<?php echo $act_id; ?>"><?php echo $act_name; ?></a></h2>
									<div class="post-meta">
										<span><i class="fa fa-clock-o"></i> <?php echo $act_date; ?></span>
									</div>
								</div>
							</article>
							<!-- end loop -->
						<?php } } ?>
						</div>
					</div>
					<!-- sidebar-widget -->
					<div class="sidebar-widget">
						<h3 class="sidebar-title">Aktiviti Seterusnya</h3>
						<div class="widget-container">

					<?php //Open php
					    require('connection.php');
					    
					   $category = "Awam";
					   $today = date('Y-m-d');
					   $sql = mysqli_query($myConnection,"SELECT * FROM `activity` WHERE `act_category` = '$category'") or die (mysqli_error());//Select table from database

							while($row=mysqli_fetch_array($sql))//loop the data
							{
								$act_id = $row['act_id'];
								$act_name = $row['act_name'];
								$act_description = $row['act_description'];
								$act_date = $row['act_date'];
								$act_time = $row['act_time'];

						?>
							<?php if($today < $act_date) { ?>
							<!-- loop here -->
							<article class="widget-post">
								<div class="post-image">
									<a href="post.php"><img src="images/event.jpg" width="90" height="60" alt=""></a>
								</div>
								<div class="post-body">
									<h2><a href="post.php?baca=<?php echo $act_id; ?>"><?php echo $act_name; ?></a></h2>
									<div class="post-meta">
										<span><i class="fa fa-clock-o"></i> <?php echo $act_date; ?></span>
									</div>
								</div>
							</article>
							<!-- end loop -->
						<?php } } ?>

						</div>
					</div>
					<!-- sidebar-widget -->
					<div class="sidebar-widget">
						<h3 class="sidebar-title">Aktiviti</h3>
						<div class="widget-container">
							<?php //Open php
					    require('connection.php');
					    
					   $category = "Awam";
					   $today = date('Y-m-d');
					   $sql = mysqli_query($myConnection,"SELECT * FROM `activity` WHERE `act_category` = '$category'") or die (mysqli_error());//Select table from database

							while($row=mysqli_fetch_array($sql))//loop the data
							{
								$act_id = $row['act_id'];
								$act_name = $row['act_name'];
								$act_description = $row['act_description'];
								$act_date = $row['act_date'];
								$act_time = $row['act_time'];

						?>
							<?php if($today > $act_date) { ?>
							<!-- loop here -->
							<article class="widget-post">
								<div class="post-image">
									<a href="post.php"><img src="images/event.jpg" width="90" height="60" alt=""></a>
								</div>
								<div class="post-body">
									<h2><a href="post.php?baca=<?php echo $act_id; ?>"><?php echo $act_name; ?></a></h2>
									<div class="post-meta">
										<span><i class="fa fa-clock-o"></i> <?php echo $act_date; ?></span>
									</div>
								</div>
							</article>
							<!-- end loop -->
						<?php } } ?>
						</div>
					</div>
					
					<!-- sidebar-widget -->
					<div class="sidebar-widget">
						<h3 class="sidebar-title">Media Sosial</h3>
						<div class="widget-container">
							<div class="widget-socials">
								<a href="https://web.facebook.com/pages/category/Nonprofit-Organization/Wadah-Pencerdasan-Umat-Malaysia-Wadah-174488169352505/?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</div>
						</div>
					</div>
					</div>
					</aside>