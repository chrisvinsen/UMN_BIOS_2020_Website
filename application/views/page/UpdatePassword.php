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

    <section class="ftco-intro py-5" style="background-image: url(<?php echo base_url('assets/img/background.png'); ?>">
        <div class="overlay"></div>
        <div class="container" style="margin-top:100px;">
            <div class="row d-flex align-items-center">
                <div class="col-md-3 ftco-animate bg-blue-acara">
                </div>
                <div class="col-md-6 ftco-animate bg-blue-acara" style="background-color: #301b40; border: 1px solid white;border-radius:20px;height:450px;">
                    <div class="col-md-12 center-text" style="margin-bottom: 50px">
                        <img class="col-7 col-sm-4" src="<?php echo base_url(); ?>/assets/resources/home/font-bios.png">
                    </div>

                    <form class="col-md-12" id="form" onsubmit="return false;" style="margin-top: 30px;">
                        <input id="email" class="login-input email" type="text" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" placeholder="Enter your leader's email" name="email" required style="color: white;background-color:#301b40;border-radius:5px;margin-bottom:50px;margin-top:60px;">

                        <div class="col-md-12" style="text-align: center; margin-top: 20px">
                            <div id="sendMessage">
                                <input type="submit" onclick="updatePassAction()" class="btn px-4 py-2" style="background-color:#c9e096;color: white; text-align: center; margin-bottom: 0.3rem !important; font-size: 16px;border-radius:25px;" value="SEND EMAIL">
                            </div>
                            <div>
                                <a href="<?= base_url('Signin') ?>" class="fa fa-arrow-left" style="font-size:18px">
                                    Back
                                </a>
                            </div>
                            <div>
                                <p id="notif" style="font-size:10px;">
                                    Verification Email has been sent
                                </p>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-3 ftco-animate bg-blue-acara">
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
        $('#notif').hide();
    });


    function updatePassAction() {
        $('#ftco-loader').addClass("show");
        // alert($("#email").val());
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>UpdatePassword/updatePassAction",
            data: {
                email: $("#email").val()
            },
            success: function(ret) {
                if (ret == 1) {
                    console.log(ret);
                    // alert("Please check your email!");
                    $('#sendMessage').hide();
                    $('#notif').show();
                    // window.location.assign("<?php echo base_url(); ?>");
                } else {
                    console.log(ret);
                    alert("Your email is invalid");
                }
            },
            error: function(ret) {
                console.log(ret);
                console.log("error");
                console.log(ret.status);
            },
            complete: function(ret) {
                $('#ftco-loader').removeClass("show");
            }
        });
    }
</script>

</html>