<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>

<head>
	<title>BIOS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php
	echo $style;
	?>

	<style>
		

/* timeline */

.timeline__section{
    height: 100vh;
    width: 100%;
}

.headingx-timeline{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color:#ab206c;
    color: white;

}


.timelinex{
    width:80%;
    height:auto;
    max-width: 800px;
    position: relative;
    margin: 0 auto;
}

.timelinex ul{
	list-style:none;
	padding: 30px;
}

.timelinex ul li{
    background-color:#301b40;
    color: white;
    border-radius:10px;
    margin-bottom:20px;
}

.timelinex ul li:last-child{
    margin-bottom:0;
}

.timelinex-content h1{
    font-weight:500;
    font-size:25px;
    line-height:30px;
    margin-bottom:10px;
}

.timelinex-content p{
    font-weight:300 ;
    padding:  50px 30px;
    text-align: center;
}

.timelinex-content .date{
    font-size:12px;
    font-weight:300;
    padding: 10px 30px;
    letter-spacing:2px;
    background-color:#583870;
    text-align: center;
}

.timeline-content .date{
    color: white;
}

@media only screen and (min-width:768px){

	.date{
		color:white;
	}

    .timelinex:before{
        content: "";
        position: absolute;
        top:0;
        left:49%;
        transform : translateX(320%);
        width:2px;
        height:100%;
        background-color:#301b40;
    }

    .timelinex ul li{
        width:50%;
        position: relative;
        margin-bottom: 50px;
    }

    .timelinex ul li:nth-child(odd){
        float: left;
        clear:right;
        transform: translateX(-30px);
        border-radius:0px;
    }
    .timelinex ul li:nth-child(even){
        float: right;
        clear:left;
        transform: translateX(30px);
        border-radius:0px;
    }

    .timelinex ul li::before{
        content:"";
        position:absolute;
        height:20px;
        width: 20px;
        border-radius:50%;
        background-color: #301b40;
        top:0px;
    }

    .timelinex ul li:nth-child(odd)::before{
        transform: translate(50%,-50%);
        right:-30px;
    }
    .timelinex ul li:nth-child(even)::before{
        transform: translate(-50%,-50%);
        left:-30px;    
    }

    .timelinex ul li:hover::before{
        background-color:rgb(152, 240, 52);
        transition: 0.5s ease;
    }


    .timelinex-content p{
        text-align: left;
    }

    .timelinex-content .date{
        text-align: left;
    }
    

    
}


@keyframes moveInRight{
    0%{
    
    }
}

.card-header .fa {
  transition: .3s transform ease-in-out;
}
.card-header .collapsed .fa {
  transform: rotate(90deg);
}

.box{
	width:50%;
}

@media screen and (max-width:350px){
	.box{
		margin: 10px;
		width: 100%;
	}
}
.check-benefits{
    font-weight: 300;
}
.date{
	color:white;
}



	</style>
</head>

<body>
	<?php
	echo $header;
	?>
	<section class="ftco-intro py-5" style="background-color: #ab206c">
		<div class="overlay"></div>
		<div class="container">
			<div class="row d-flex align-items-center" style="margin-top: 60px;">
				<div class="col-md-6 ftco-animate">
					<img class="col-12 col-sm-12" src="<?php echo base_url('assets/img/Hackathon/Asset-1.png'); ?>">
				</div>
				<div class="col-md-6 pl-md-5 ftco-animate" style="padding: 20px">

					<h4 class="Hackathon"><a href="#" style="font-weight:bold">Hackathon</a></h4>

					<h2 style="color:#fff;font-weight:bold">
						BIOS Hackathon
						<br style="line-height:2px">
						"Improving The Society"
					</h2>
					<div class="col-md-3" style="font-size: 12px; float: left">
						<strong>Powered By</strong>
					</div>
					<div class="col-md-6 d-flex" style="background-color: #301b40; border-radius: 15px; padding: 10px;">
						<div class="col-md-12" style="float: left; margin-top: 5px; padding: 0px">
							<img src="<?php echo base_url('/assets/resources/hackathon/sponsor-2.png') ?>" ; class=" col-12" style="margin: 0px; padding: 0px">
						</div>
					</div>
					<br>
					<hr style="margin:0px;width:100%;border-color:#ffffff;background-color:#ffffff">
					<br style="line-height:2px">
					<div class="" style="display:flex; flex-wrap: wrap;">
						<div class="box">
							<img class="mr-3" src="<?php echo base_url('/assets/img/Hackathon/icon-date.png') ?>">
							<span>09 April 2020</span>
						</div>
						
						<div class="box">
							<img class="mr-3" src="<?php echo base_url('/assets/img/Hackathon/icon-maps.png') ?>">
							<span>Zoom</span>
						</div>
						
						<div class="box">
							<img class="mr-3" src="<?php echo base_url('/assets/img/Hackathon/icon-time.png') ?>">
							<span>10:00 WIB</span>
						</div>
						
					</div>
				</div>
			</div>
			<div class=" row d-flex align-items-center">
				<div class="col-md-6 pl-md-5 ftco-animate" style="padding: 20px">
					<h2><a href="#" style="font-weight:bold">Be Our Participant</a></h2>
					<hr style="margin:0px;width:55%;border-color:#ffffff;background-color:#ffffff">
					<!-- <p class="fa fa-check-square">
						<span style="color:white;"><strong>CHANCE</strong> go to Japan with Grid</span>
					</p><br>
					<p class="fa fa-check-square">
						<span style="color:white;">
							<strong>MENTORING</strong> from experts
						</span>
					</p><br>
					<p class="fa fa-check-square">
						<span style="color:white;">
							<strong>CHANCE</strong> to get incubation program from RII with total additional prize Rp 15.000.000!
						</span>
					</p><br>
					<p class="fa fa-check-square">
						<span style="color:white;">
							<strong>FREE</strong> access to MakeAI courses for top 10 finalists
						</span>
					</p><br>
					<p class="fa fa-check-square">
						<span style="color:white;">
							<strong>Making</strong> new connections with other participants, mentors, and judges
						</span>
					</p> -->
					<div class="check">
						 
							<p class="check-benefits"><span><i class="fas fa-check-square"></i></span> <strong>CHANCE</strong> go to Japan with Grid</p>
						
						
							<p class="check-benefits"><span><i class="fas fa-check-square"></i></span> <strong>MENTORING</strong> from experts</p>
					
						
							<p class="check-benefits"><span><i class="fas fa-check-square"></i></span> <strong>CHANCE</strong> to get incubation program from RII with total additional prize Rp 15.000.000!</p>
							<p class="check-benefits"><span><i class="fas fa-check-square"></i></span> <strong>FREE</strong> access to MakeAI courses for top 10 finalists</p>
							<p class="check-benefits"><span><i class="fas fa-check-square"></i></span> <strong>Making</strong> new connections with other participants, mentors, and judges</p>
					
					</div>

				</div>
				<div class="col-md-6 pl-md-5 ftco-animate">
					<img class="col-12 col-sm-12" src="<?php echo base_url('/assets/img/Hackathon/Asset-2.png'); ?>">
				</div>
				<div class="row d-flex align-items-center" style="padding: 20px;">
					<div class="col-md-2 ftco-animate">
						<img class="col-12 col-sm-12 shadow_img" src="<?php echo base_url('assets/img/shadow.png'); ?>">
					</div>
					<div class="col-md-8 ftco-animate">
						<h2 style=" text-align:center;"><a href="#" style="font-weight:bold">Prize Pool</a></h2>
						<hr style="width:20%;border-color:#FFF;background-color:#fff;height:2px;">
						<div class="col-md-12 d-flex" style=" border-radius: 25px; padding: 10px;">
							<div class="col-md-4" style="float: left">
								<img src="<?php echo base_url('assets/img/Hackathon/trophy-1-hackathon.png'); ?>" class="col-12" style="margin: 0px; padding: 0px">
							</div>
							<div class="col-md-4" style="float: left">
								<img src="<?php echo base_url('assets/img/Hackathon/trophy-2-hackathon.png'); ?>" class="col-12" style="margin: 0px; padding: 0px">
							</div>
							<div class="col-md-4" style="float: left">
								<img src="<?php echo base_url('assets/img/Hackathon/trophy-3-hackathon.png'); ?>" class="col-12" style="margin: 0px; padding: 0px">
							</div>
						</div>
						<h2 style=" text-align:center;"><a href="#" style="font-weight:bold">Facilities</a></h2>
						<hr style="width:20%;border-color:#FFF;background-color:#fff;height:2px;">
						<div class="col-md-12 d-flex" style=" border-radius: 25px; padding: 10px; display:none">
							<div class="col-md-4" style="text-align:center">
								<p>24 Hours Wifi</p>
							</div>
							<div class="col-md-4" style="text-align:center">
								<p>Exclusive Mentoring</p>
							</div>
							<div class="col-md-4" style="text-align:center">
								<p>Free Snack bar</p>
							</div>
						</div>
					</div>
					<div class="col-md-2 ftco-animate">
						<img class="col-12 col-sm-12 shadow_img" src="<?php echo base_url('assets/img/shadow.png'); ?>">
					</div>
				</div>
			</div>
			<div class="row d-flex align-items-center">
			<h2 style=" text-align:center; width:100%;padding-top:30px;"><a href="#" style="font-weight:bold; border-bottom: solid 4px white ;">Our Timeline</a></h2>
				<div class="timelinex" style="width:100%; padding:30px;">
					<ul style="padding:30px;">
						<li>
							<div class="timelinex-content">
								<p>Pendaftaran Time Peserta</p>
								<h3 class="date">20th may, 2020 - 30th may, 2020  </h3>
							
							</div>
						</li>
						<li>
							<div class="timelinex-content">
								<p>Pendaftaran 2 Peserta</p>
								<h3 class="date">20th may, 2020 - 30th may, 2020  </h3>
							
							</div>
						</li>
						<li>
							<div class="timelinex-content">
								<p>Pendaftaran 3 Peserta</p>
								<h3 class="date">20th may, 2020 - 30th may, 2020  </h3>
							
							</div>
						</li>
						<li>
							<div class="timelinex-content">
								<p>Pendaftaran 4 Peserta</p>
								<h3 class="date">20th may, 2020 - 30th may, 2020  </h3>
							
							</div>
						</li>
						<li>
							<div class="timelinex-content">
								<p>Pendaftaran 5 Peserta</p>
								<h3 class="date">20th may, 2020 - 30th may, 2020  </h3>
							
							</div>
						</li>
						
					</ul>
				</div>
			</div>

			<div class="row d-flex">
			<div class="col-md-12 pl-md-5 ftco-animate" style="padding: 20px;">
					<h2><a href="#" style="font-weight:bold">General Guidelines</a></h2>
					<hr style="margin:0px;width:55%;border-color:#ffffff;background-color:#ffffff">
					<br>

					<p class="color-2" style="background-color:#301b40; border-radius:40px; color:white;padding:20px">
						Peserta merupakan Mahasiswa Aktif Perguruan tinggi se-indonesia
					</p>
					
					
					<p class="color-2" style="background-color:#301b40; border-radius:40px; color:white;">
						
						Setiap tim diwajibkan untuk mengumpulkan proposal ide aplikasi untuk diseleksi
					</p>
					
					
					<p class="color-2" style="background-color:#301b40; border-radius:40px; color:white;">
						
						Biaya pendaftaran setiap tim adalah Rp 150.001
					</p>
					
					<p class="color-2" style="background-color:#301b40; border-radius:40px; color:white;">
						
						Batas terakhir Pendaftaran 15 Agustus 2020
					</p>
					<p class="color-2" style="background-color:#301b40; border-radius:40px; color:white;">
						
						Setiap tim diwajibkan untuk mengumpulkan proposal ide aplikasi untuk diseleksi.
					</p>
					<p class="color-2" style="background-color:#301b40; border-radius:40px; color:white;">
						
						Tim yang lolos tahap seleksi diwajibkan untuk mempelajari dan menggunakan <strong>framework AI</strong> Renom pada prototipe yang dibuat. <strong>(www.renom.jp)</strong>
					</p>
					<p class="color-2" style="background-color:#301b40; border-radius:40px; color:white;">
						
						Pembayaran biaya registrasi dapat ditransfer ke rek. <strong>BCA 8883499384 a/n Ucup Surucup</strong>. serta mengupload foto bukti transfer pada halaman profil grup.
					</p>
					
					
					
					

				</div>
			</div>
			

			<div class="col-md-12 pl-md-5 ftco-animate" id="accordion">
			<h2 style=" text-align:center; width:100%;padding-top:30px;"><a href="#" style="font-weight:bold; border-bottom: solid 4px white ;">Frequently Asked Questions (FAQ)</a></h2>

 				 <!-- <div class="card">
					<div class="card-header" id="headingOne">
						<h5 class="mb-0">
							<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							Collapsible Group Item #1
							</button>
						</h5>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						</div>
						</div>
					</div>
				</div> -->
				<div class="card" style="background-color:#301b40" >
					<div class="card-header" id="heading-1">
						<h5 class="mb-0" >
							<a data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-example">
								<i class="fa fa-chevron-down pull-right"></i>
								Apa itu Hackathon 
							</a>
						</h5>
					</div>
					<div id="collapse-1" class="collapse show" style="background-color:#64427e"  aria-labelledby="heading-example">
						<div class="card-block">
							... content
						</div>
					</div>
				</div>
				<div class="card" style="background-color:#301b40" >
					<div class="card-header" id="heading-2">
						<h5 class="mb-0" >
							<a data-toggle="collapse" href="#collapse-2" aria-expanded="true" aria-controls="collapse-example">
								<i class="fa fa-chevron-down pull-right"></i>
								Apakah Peserta diwajibkan untuk menginap saat hackathon ?
							</a>
						</h5>
					</div>
					<div id="collapse-2" class="collapse show" style="background-color:#64427e"  aria-labelledby="heading-example">
						<div class="card-block">
							... content
						</div>
					</div>
				</div>
				<div class="card" style="background-color:#301b40" >
					<div class="card-header" id="heading-3">
						<h5 class="mb-0" >
							<a data-toggle="collapse" href="#collapse-3" aria-expanded="true" aria-controls="collapse-example">
								<i class="fa fa-chevron-down pull-right"></i>
								... title
							</a>
						</h5>
					</div>
					<div id="collapse-3" class="collapse show" style="background-color:#64427e"  aria-labelledby="heading-example">
						<div class="card-block">
							... content
						</div>
					</div>
				</div>
			
			
			</div>

			
		</div>
	</section>


	<?php
	echo $footer;
	?>
</body>

<?php
echo $loader;
echo $script;
?>

<script>
	$(document).ready(function() {});
</script>

</html>