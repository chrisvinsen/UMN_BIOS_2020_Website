<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
</head>
<body>
    <?php
        echo $header;
    ?>

    <div class="hero-wrap js-fullheight" style="background-image: url('assets/resources/home/bg-home-main.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-10 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <img class="col-9 col-sm-4" src="<?php echo base_url(); ?>/assets/resources/home/logo-bios.png">
            <br>
            <img class="col-7 col-sm-4" src="<?php echo base_url(); ?>/assets/resources/home/font-bios.png" style="margin-bottom:20px">
            <h3 class="subheading mb-4 pb-1">Building Informatics' Competitive Soul</h3>
           
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-intro py-5" style="background-image: url(assets/resources/home/bg-home2.png);" id="about-section">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 pl-md-5 ftco-animate" style="padding: 20px">
                    <h2 style="border-bottom: 5px solid white;"><a href="#" style="font-weight:bold">About US</a></h2>
                    <p style="color: white">BIOS (Building Informatics’ Competitive Soul) merupakan rangkaian acara yang terdiri dari seminar dan kompetisi Hackathon yang diselenggarakan oleh Himpunan Mahasiswa Informatika (HMIF) Universitas Multimedia Nusantara. Tema dari BIOS pada tahun 2019 yaitu "Bring Innovation Into Solution" yang mencerminkan semangat mahasiswa yang kreatif dalam membawa inovasi menjadi solusi.</p>
                    <h2 style="border-bottom: 5px solid white; text-align: right"><a href="#" style="font-weight:bold;">Organized By</a></h2>
                    <div style="text-align: right">
                        <img class="col-5" src="<?php echo base_url(); ?>/assets/resources/home/logo-hmif.png" style="background-color: white; border-radius: 50px; padding: 10px; padding-left: 30px;  padding-right: 30px; margin-top: 20px">
                    </div>
                </div>
                <div class="col-md-6 ftco-animate">
                    <img class="col-12 col-sm-12" src="<?php echo base_url(); ?>/assets/resources/home/pict-about.png" style=" text-align: right">
                </div>
            </div>
            <div class="row d-flex align-items-center" style="margin-top: 60px">
                <div class="col-md-6 pl-md-5 ftco-animate" style="padding: 20px">
                    <h2 style="border-bottom: 5px solid white;"><a href="#" style="font-weight:bold">Seminar</a></h2>
                    <p style="color: white">Seminar yang membahas mengenai penerapan Artificial Intelligence dan Augmented Reality pada teknologi MBUX oleh Mercedes-Benz.</p>
                    <p style="color: white"><a href="<?php echo base_url() ?>Seminar" class="btn btn-primary px-4 py-2" style="text-transform: uppercase; font-size: 12px">Read More</a></p>
                </div>
                <div class="col-md-6 ftco-animate">
                    <img class="col-12 col-sm-12" src="<?php echo base_url(); ?>/assets/resources/home/pict-seminar.png">
                </div>
            </div>
            <div class="row d-flex align-items-center" style="padding: 20px; ">
                <div class="col-md-6 pl-md-5 ftco-animate">
                    <img class="col-12 col-sm-12" src="<?php echo base_url(); ?>/assets/resources/home/pict-hackathon.png">
                </div>
                <div class="col-md-6 ftco-animate" style="text-align: right">
                    <h2 style="border-bottom: 5px solid white;"><a href="#" style="font-weight:bold">Hackathon</a></h2>
                    <p style="color: white">Perlombaan yang menantang peserta untuk memecahkan  problem yang diberikan menjadi sebuah solusi berupa prototipe aplikasi yang inovatif selama 24 jam.</p>
                    <p><a href="<?php echo base_url() ?>Hackathon" class="btn btn-primary px-4 py-2" style="text-transform: uppercase; font-size: 12px">Read More</a></p>
                </div>
            </div>
            <div class="row d-flex align-items-center" style="padding: 20px; ">
                <div class="col-md-6 pl-md-5 ftco-animate">
                    <img class="col-12 col-sm-12" src="<?php echo base_url(); ?>/assets/resources/home/pict-sponsor.png">
                </div>
                <div class="col-md-6 ftco-animate">
                    <h2 style="border-bottom: 5px solid white;"><a href="#" style="font-weight:bold">Sponsors</a></h2>
                    <div class="col-md-12 d-flex" style="background-color: white; border-radius: 25px; padding: 10px;">
                        <div class="col-md-3" style="float: left">
                            <img src="<?php echo base_url(); ?>/assets/resources/sponsor/sponsor-1.png" class="col-12" style="margin: 0px; padding: 0px">
                        </div>
                        <div class="col-md-4" style="float: left">
                            <img src="<?php echo base_url(); ?>/assets/resources/sponsor/sponsor-2.png" class="col-12" style="margin: 0px; padding: 0px">
                            <img src="<?php echo base_url(); ?>/assets/resources/sponsor/sponsor-3.png" class="col-12" style="margin: 0px; padding: 0px">
                        </div>
                        <div class="col-md-4" style="float: left">
                            <img src="<?php echo base_url(); ?>/assets/resources/sponsor/sponsor-4.jpg" class="col-12" style="margin: 0px; padding: 0px">
                            <img src="<?php echo base_url(); ?>/assets/resources/sponsor/sponsor-5.png" class="col-12" style="margin: 0px; padding: 0px">
                        </div>
                    </div>
                    <h2 style="border-bottom: 5px solid white; margin-top: 20px"><a href="#" style="font-weight:bold">Media Partners</a></h2>
                    <div class="col-md-12 d-flex" style="background-color: white; border-radius: 25px; padding: 10px;">
                        <div class="col-md-4" style="float: left; padding-top: 0px">
                            <img src="http://localhost/Bios//assets/resources/medpar/sponsor-1.png" class="col-12" style="margin-top: 10px; padding: 0px">
                            <img src="http://localhost/Bios//assets/resources/medpar/sponsor-2.png" class="col-12" style="margin: 0px; padding: 0px">
                            <img src="http://localhost/Bios//assets/resources/medpar/sponsor-3.png" class="col-12" style="margin-top: 10px; margin-bottom: 10px; padding: 0px">
                        </div>
                        <div class="col-md-4" style="float: left">
                            <img src="<?php echo base_url(); ?>/assets/resources/medpar/sponsor-4.png" class="col-12" style="margin: 0px; padding: 0px">
                            <img src="<?php echo base_url(); ?>/assets/resources/medpar/sponsor-5.png" class="col-12" style="margin: 0px; padding: 0pxx">
                            <img src="<?php echo base_url(); ?>/assets/resources/medpar/sponsor-6.png" class="col-12" style="margin: 0px; padding: 0px">
                        </div>
                        <div class="col-md-4" style="float: left">
                            <img src="<?php echo base_url(); ?>/assets/resources/medpar/sponsor-7.png" class="col-10" style="margin: 0px; padding: 10px">
                            <img src="<?php echo base_url(); ?>/assets/resources/medpar/sponsor-8.png" class="col-10" style="margin: 0px; padding: 0px">
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
    $(document).ready(function() {
    });
</script>
</html>
