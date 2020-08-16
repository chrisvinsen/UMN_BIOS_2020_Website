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
</head>

<body>
    <?php
    echo $header;
    ?>

    <!-- hero -->
    <div class="hero-wrap js-fullheight" data-stellar-background-ratio="0.5">
        <!-- <div class="overlay"></div> -->
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-10 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                    <!-- <img class="col-9 col-sm-4" src="<?php echo base_url(); ?>/assets/resources/home/logo-bios.png">
                    <br>
                    <img class="col-7 col-sm-4" src="<?php echo base_url(); ?>/assets/resources/home/font-bios.png" style="margin-bottom:20px"> -->
                    <div class="box">
                        <h2 class="featured">SELAMAT DATANG</h2>
                    </div>
                    <div class="box">
                        <h3 class="featured">DI <b>BIOS 2020</b></h3>
                    </div>
                    <div class="featured-info">
                        <p>Hackathon merupakan ajang kompetisi software development yang di laksanakan dalam durasi 24 jam.</p>
                    </div>
                    <div class="container" id="container2">
                        <a href="<?php echo base_url()?>signin" class="btn btn-login" style="color: white;">SIGN IN</a>
                        <a href="<?php echo base_url()?>signup" class="btn btn-signUp" style="color: white;">SIGN UP</a>
                    </div>
                </div>
            </div>

            <!-- <div class="hero-title">
                Selamat Datang Di <b>BIOS 2020</b>
            </div> -->
        </div>
    </div>
    <!-- hero end -->


    <section class="ftco-intro py-5" style="background-color:#ab206c" id="about-section">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 pl-md-5 ftco-animate" style="padding: 20px">
                    <h2 style="border-bottom: 5px solid white;"><a href="#" style="font-weight:bold">About US</a></h2>
                    <p style="color: white">BIOS (Building Informatic's Competitive Soul) merupakan rangkaian acara yang terdiri dari seminar dan kompetisi Hackaton yang dislenggarakan oleh Himpunan Mahasiswa Informatika (HMIF) Universitas Multimedia Nusantara.
                        <br><br>
                        Tema : Fill the Future with Creativity</p>
                    <h2><a href="#" style="font-weight:bold;">Organized By</a></h2>
                    <hr style="margin:0px;width:30%;border-color:#ffffff;background-color:#ffffff">
                    <div style="text-align: left">
                        <img class="col-5" src="<?php echo base_url('/assets/resources/home/logo-hmif.png'); ?>" style="background-color: white; border-radius: 50px; padding: 10px; padding-left: 30px;  padding-right: 30px; margin-top: 20px">
                    </div>
                </div>
                <div class="col-md-6 ftco-animate">
                    <img class="col-12 col-sm-12" src="<?php echo base_url('/assets/img/aboutus-img.png'); ?>" style=" text-align: right">
                </div>
            </div>
            <div class="row d-flex align-items-center" style="margin-top: 60px">
                <div class="col-md-6 ftco-animate">
                    <img class="col-12 col-sm-12" src="<?php echo base_url('assets/img/seminar-img.png'); ?>">
                </div>
                <div class="col-md-6 pl-md-5 ftco-animate" style="padding: 20px">
                    <h2 style="border-bottom: 5px solid white;"><a href="#" style="font-weight:bold">Seminar</a></h2>
                    <p style="color: white">Seminar yang membahas mengenai penerapan Artificial Intelligence dan Augmented Reality pada teknologi MBUX oleh Mercedes-Benz Distribution Indonesia</p>
                    <p style="color: white"><a href="<?php echo base_url() ?>Seminar" class="px-4 py-2" style="color:#ffffff;background-color:#301b40;text-transform: uppercase; font-size: 12px">Read More ></a></p>
                </div>
            </div>
            <div class="row d-flex align-items-center" style="padding: 20px; ">
                <div class="col-md-6 ftco-animate" style="text-align: left">
                    <h2 style="border-bottom: 5px solid white;"><a href="#" style="font-weight:bold">Hackathon</a></h2>
                    <p style="color: white">Perlombaan yang menantang peserta untuk memecahkan problem yang diberikan menjadi sebuah solusi berupa prototipe aplikasi yang inovatif selama 24 jam.</p>
                    <p style="color: white"><a href="<?php echo base_url() ?>Hackaton" class="px-4 py-2" style="color:#ffffff;background-color:#301b40;text-transform: uppercase; font-size: 12px">Read More ></a></p>
                </div>
                <div class="col-md-6 pl-md-5 ftco-animate">
                    <img class="col-12 col-sm-12" src="<?php echo base_url('/assets/img/hackathon-img.png'); ?>">
                </div>
            </div>
            <div class="row d-flex align-items-center" style="padding: 20px; ">
                <div class="col-md-2 ftco-animate">
                    <img class="col-12 col-sm-12" src="<?php echo base_url('assets/img/shadow.png'); ?>">
                </div>
                <div class="col-md-8 ftco-animate">
                    <h2 style="border-bottom: 5px solid white; text-align:center;"><a href="#" style="font-weight:bold">Sponsors</a></h2>
                    <div class="col-md-12 d-flex" style=" border-radius: 25px; padding: 10px;">
                        <div class="col-md-3" style="float: left">
                            <img src="<?php echo base_url(); ?>/assets/resources/sponsor/sponsor-1.png" class="col-12" style="margin: 0px; padding: 0px">
                        </div>
                        <div class="col-md-3" style="float: left">
                            <img src="<?php echo base_url(); ?>/assets/resources/sponsor/sponsor-1.png" class="col-12" style="margin: 0px; padding: 0px">
                        </div>
                        <div class="col-md-3" style="float: left">
                            <img src="<?php echo base_url(); ?>/assets/resources/sponsor/sponsor-1.png" class="col-12" style="margin: 0px; padding: 0px">
                        </div>
                        <div class="col-md-3" style="float: left">
                            <img src="<?php echo base_url(); ?>/assets/resources/sponsor/sponsor-1.png" class="col-12" style="margin: 0px; padding: 0px">
                        </div>
                    </div>
                    <h2 style="border-bottom: 5px solid white; margin-top: 20px;text-align:center;"><a href="#" style="font-weight:bold">Media Partners</a></h2>
                    <div class="col-md-12 d-flex" style=" border-radius: 25px; padding: 10px;">
                        <div class="col-md-3" style="float: left">
                            <img src="<?php echo base_url(); ?>/assets/resources/sponsor/sponsor-1.png" class="col-12" style="margin: 0px; padding: 0px">
                        </div>
                        <div class="col-md-3" style="float: left">
                            <img src="<?php echo base_url(); ?>/assets/resources/sponsor/sponsor-1.png" class="col-12" style="margin: 0px; padding: 0px">
                        </div>
                        <div class="col-md-3" style="float: left">
                            <img src="<?php echo base_url(); ?>/assets/resources/sponsor/sponsor-1.png" class="col-12" style="margin: 0px; padding: 0px">
                        </div>
                        <div class="col-md-3" style="float: left">
                            <img src="<?php echo base_url(); ?>/assets/resources/sponsor/sponsor-1.png" class="col-12" style="margin: 0px; padding: 0px">
                        </div>
                    </div>
                </div>
                <div class="col-md-2 ftco-animate">
                    <img class="col-12 col-sm-12" src="<?php echo base_url('assets/img/shadow.png'); ?>">
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