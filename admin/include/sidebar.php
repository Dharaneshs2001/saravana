<div class="span3">
					<div class="sidebar">


<ul class="widget widget-menu unstyled">
<li>
								<a style="background-color:limegreen;color: white;" href="dashboard.php">
									<i style="color:white;" class="menu-icon icon-home"></i>
									Home
								</a>
							</li>
							<ul class="widget widget-menu unstyled">
								<li><a style="background-color: green; color:white;"><i style="color:white;"class="menu-icon icon-plus" style="color:white;"></i> ADD </a></li>
                                <li><a style="background-color: limegreen; color:white;"href="category.php"><i style="color:white;"class="menu-icon icon-paste"></i> Add Category </a></li>
                                <li><a style="background-color: limegreen; color:white;"href="subcategory.php"><i style="color:white;"class="menu-icon icon-paste"></i> Add Sub Category </a></li>
                                <li><a style="background-color: limegreen; color:white;"href="insert-product.php"><i style="color:white;"class="menu-icon icon-paste"></i>Add Product </a></li>
                            </ul><!--/.widget-nav-->
                            

							<li>
								<li><a style="background-color:green; color: white;"><i class="menu-icon icon-table" style="color: #fff;"></i> LIST </a></li>
								<li><a style="background-color: limegreen; color:white;"href="category-list.php"><i style="color:white" class="menu-icon icon-paste"></i> Category List </a></li>
                                <li><a style="background-color: limegreen; color:white;"href="subcategory-list.php"><i style="color:white" class="menu-icon icon-paste"></i> Sub Category List </a></li>
                                <li><a style="background-color: limegreen; color:white;"href="manage-products.php"><i style="color:white" class="menu-icon icon-paste"></i>Product List</a></li>
                                <li><a style="background-color: limegreen; color:white;"href="manage-users.php"><i style="color:white" class="menu-icon icon-group"></i>Users List</a></li>
                                <li><a style="background-color: limegreen; color:white;"href="user-logs.php"><i style="color:white" class="menu-icon icon-signin"></i>Users Logs</a></li>
							</li>

							<ul class="widget widget-menu unstyled">
								<li><a style="background-color: green; color: #fff;"><i class="menu-icon icon-table" style="color: #fff;"></i> ORDER STATUS </a></li>
                                
									<li>
										<a style="background-color: limegreen; color:white;"href="todays-orders.php">
											<i class="icon-tasks"></i>
											Today's Orders
  <?php
  $f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
 $result = mysql_query("SELECT * FROM Orders where orderDate Between '$from' and '$to'");
$num_rows1 = mysql_num_rows($result);
{
?>
											<b class="label orange pull-right"><?php echo htmlentities($num_rows1); ?></b>
											<?php } ?>
										</a>
									</li>
									<li>
										<a style="background-color: limegreen; color:white;"href="pending-orders.php">
											<i class="icon-tasks"></i>
											Pending Orders
										<?php	
	$status='Delivered';									 
$ret = mysql_query("SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
$num = mysql_num_rows($ret);
{?><b class="label orange pull-right"><?php echo htmlentities($num); ?></b>
<?php } ?>
										</a>
									</li>
									<li>
										<a style="background-color: limegreen; color:white;"href="delivered-orders.php">
											<i class="icon-inbox"></i>
											Delivered Orders
								<?php	
	$status='Delivered';									 
$rt = mysql_query("SELECT * FROM Orders where orderStatus='$status'");
$num1 = mysql_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>

										</a>
									</li>
									<li>
										<a style="background-color: limegreen; color:white;"href="review.php">
										<i class="icon-comments"></i> Review</a>
									</li>
									<li>
										<a style="background-color: limegreen; color:white;"href="getdatefororderadmin.php">
										<i class="icon-bar-chart"></i> Sales Report</a>
									</li>
									<!-- <li>
										<a style="background-color: limegreen; color:white;"href="getdateforordercustomer.php">
										<i style="color:white" class="menu-icon icon-group"></i> Customer Report</a>
									</li> -->
							
							
                            </ul><!--/.widget-nav-->
							
							
						</ul>


						

						<ul class="widget widget-menu unstyled">
							
							
							<li>
								<a style="background-color: green; color:white;"href="logout.php">
									<i style="color:white" class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->
