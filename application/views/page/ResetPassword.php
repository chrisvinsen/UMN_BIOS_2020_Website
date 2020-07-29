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

    <section class="ftco-intro py-5" style="background-image: url(<?php echo base_url('assets/img/background.png'); ?>);">
        <div class="overlay"></div>
        <div class="container" style="margin-top:100px">

            <div class="row d-flex align-items-center">
                <div class="col-md-3 ftco-animate bg-blue-acara">
                </div>
                <div class="col-md-6 ftco-animate bg-blue-acara" style="background-color: #301b40; border: 1px solid white; border-radius: 8px;">
                    <div class="col-md-12 center-text" style="margin-bottom: 50px">
                        <img class="col-7 col-sm-4" src="<?php echo base_url(); ?>/assets/resources/home/font-bios.png">
                    </div>

                    <form class="col-md-12" id="form" onsubmit="return false;" style="margin-top: 30px">
                        <input id="pass" class="login-input" type="password" placeholder="New Password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required style="color: white">
                        <input id="pass2" class="login-input" type="password" placeholder="Re-type Your New Password" name="pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required style="color: white">

                        <div class="col-md-12" style="text-align: center; margin-top: 20px">
                            <input type="submit" onclick="updatePassAction()" class="btn px-4 py-2" style="border-radius:25px;background-color:#c9e096;color: white; text-align: center; margin-bottom: 0.3rem !important; font-size: 16px" value="Update Password">
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
    $(document).ready(function() {});


    function updatePassAction() {
        if ($('#pass').val() != $('#pass2').val()) {
            alert("Your password doesn't match");
        } else {
            $('#ftco-loader').addClass("show");
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?php echo base_url() . 'UpdatePassword/resetPasswordAction/token/' . $token; ?>",
                data: {
                    pass: $("#pass").val(),
                    pass2: $("#pass2").val()
                },
                success: function(ret) {
                    if (ret == 1) {
                        alert("Update password success");
                        window.location.assign("<?php echo base_url(); ?>SignIn");
                    } else {
                        alert("Update password failed");
                    }
                    // alert(ret.firstName[0]);
                },
                error: function(ret) {
                    console.log("error");
                    console.log(ret.status);
                },
                complete: function(ret) {
                    $('#ftco-loader').removeClass("show");
                }
            });
        }
        // alert($("#pass").val());

    }
</script>

</html>