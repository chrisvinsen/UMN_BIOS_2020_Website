<?php defined('BASEPATH') or exit('No direct script access allow'); ?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	<div class="container">
		<a class="navbar" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/assets/img/logo-bios.png" style="width:50px"></a>
		<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav" style="justify-content: space-between;">
			
			<ul class="navbar-nav nav" >
				<li class="nav-item"><a href="<?php echo base_url(); ?>Hackathon" class="nav-link"><span>Hackathon</span></a></li>
				<li class="nav-item"><a href="<?php echo base_url(); ?>Seminar" class="nav-link"><span>Seminar</span></a></li>
				<li class="nav-item"><a href="<?php if (strpos($_SERVER['REQUEST_URI'], 'Hackathon') || strpos($_SERVER['REQUEST_URI'], 'Seminar')) echo base_url() . "#about-section";
												else echo "#about-section"; ?>" class="nav-link"><span>About</span></a></li>
				
				
				<!-- <?php if (isset($_SESSION['user_data'])) { ?>
					<li class="nav-item"><a href="<?php echo base_url(); ?>GroupName" class="nav-link"><span><?php echo $_SESSION['user_data']; ?></span></a></li>
				<?php } ?>
				<?php if (!isset($_SESSION['user_data'])) { ?>
					<li class="nav-item"><a href="<?php echo base_url(); ?>SignIn" class="nav-link"><span>Sign In</span></a></li>
				<?php } ?>
				<?php if (!isset($_SESSION['user_data'])) { ?>
					<li class="nav-item"><a href="<?php echo base_url(); ?>SignUp" class="nav-link"><span>Sign Up</span></a></li>
				<?php } ?>
				<?php if (isset($_SESSION['user_data'])) { ?>
					<li class="nav-item"><a href="<?php echo base_url(); ?>GroupName/signOut" class="nav-link"><span>Signout</span></a></li>
				<?php } ?> -->
			</ul>

			<ul class="navbar-nav nav" >
					<?php if(!isset($_SESSION['user_data'])){ ?>
				<li class="nav-item" style="margin-right:10px;">

						<button class="btn btn-login " ><a href="<?php echo base_url()?>signin">SIGN IN</a> </button>
				</li>
				<li class="nav-item">
						<button class="btn btn-signUp " ><a href="<?php echo base_url()?>signup">SIGN UP</a> </button>
				</li>
					<?php }else {?>
						<li class="nav-item">
							<button class="btn btn-signUp " ><a href="<?php echo base_url()?>GroupName/signOut">LOGOUT</a> </button>
						</li>
					<?php }?>
			</ul>
		</div>
	</div>
</nav>