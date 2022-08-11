<?php 
//session_start();

?>

<div class="top-bar animate-dropdown" style="background-color: green;">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">

<?php if(strlen($_SESSION['login']))
    {   ?>
				<li><a  style="color:white"  href="#"><i style="color:white;background-color: green;" class="icon fa fa-user"></i> Welcome -<?php echo htmlentities($_SESSION['username']);?></a></li>
				<?php } ?>

					<li><a href="my-account.php" style="color:white;"><i class="icon fa fa-user"></i>My Account</a></li>
					<li><a href="my-cart.php" style="color:white"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
					<li><a href="my-wishlist.php" style="color:white"><i class="icon fa fa-heart"></i>My Wishlist</a></li>
					<li><a href="order-history.php" style="color:white"><i class="icon fa fa-history"></i>My Orders</a></li>


					<?php if(strlen($_SESSION['login'])==0)
    				{   ?>
                        <li><a href="login.php" style="color:white"><i class="icon fa fa-sign-in"></i>Login</a></li>
                        <?php }
                        else{ ?>
            
                        
                                    <li><a style="color:white;background-color: green;" href="logout.php"><i class="icon fa fa-sign-out"></i>Logout</a></li>
                        <?php } ?>	
				</ul>
			</div><!-- /.cnt-account -->

<div class="cnt-block">
				<ul class="list-unstyled list-inline">
                
                <li class="dropdown dropdown-small">
						<a href="admin/index.php" class="dropdown-toggle" style="background-color: white; color: #000" ><span class="key">Admin Login</b></a>
						
					</li>
					
				</ul>
			</div>
			
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->