<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="../asset1/dist/img/fb.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php echo $_SESSION['email']; ?></p>
				<!-- Status -->
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

	    <!-- search form (Optional) -->
	    <form action="#" method="get" class="sidebar-form">
	    	<div class="input-group">
	    		<input type="text" name="q" class="form-control" placeholder="Search...">
	    		<span class="input-group-btn">
	    			<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
	    			</button>
	            </span>
	        </div>
	    </form>
	    <!-- /.search form -->

	    <!-- Sidebar Menu -->

	    <ul class="sidebar-menu" data-widget="tree">
	    	<li class="header">Dashboard</li>
	        <!-- Optionally, you can add icons to the links -->
	        <li>
	        	<a href="./index.php?page=kategori">
	        		<i class="fa fa-link"></i> <span>Kategori</span></a>
	        </li>
	        <li>
	        	<a href="./index.php?page=produk">
	        		<i class="fa fa-link"></i> <span>Produk</span></a>
	        </li>
	        <li>
	        	<a href="./index.php?page=order">
	        		<i class="fa fa-link"></i> <span>Order</span></a>
	        </li>
	        <li>
	        	<a href="./index.php?page=laporan">
	        		<i class="fa fa-link"></i> <span>Laporan</span></a>
	        </li>
	        

	    </ul>
	    
	    <!-- /.sidebar-menu -->
	</section>
</aside>