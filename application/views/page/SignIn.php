<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (isset($_SESSION['user_data'])) {
    echo ("<script>location.href='GroupName'</script>");
}
if (isset($_SESSION['activated'])) {
    echo ("<script>alert('Team account has been successfully activated, please log in now.')</script>");
}

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

    <section class="ftco-intro py-5" style="background-image: url(<?php echo base_url(); ?>assets/img/registration-img.png);">
        <div class="overlay"></div>
        <div class="container" style="margin-top:100px">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-8 mx-auto d-block ftco-animate box-bios">
                    <div class="mb-5">
                        <img class="mx-auto d-block" src="<?php echo base_url(); ?>/assets/img/logo-text.png" width="175px">
                    </div>
                    <form id="form" onsubmit="return false;">
                        <div class="ftco-animate row" style="float: right;">
                            <div class="col-md-12 my-3">
                                <input class="custom-input-signin" type="text" name="group_name" id="group_name" placeholder="Group Name">
                            </div>
                            <div class="col-md-12 my-2">
                                <input class="custom-input-signin" type="password" name="password" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="d-inline-block w-100">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox_check" id="remember_me">
                                <label class="custom-control-label" for="remember_me"><small> Remember Me </small></label>
                                <small class="float-right"><a href="<?= base_url('UpdatePassword') ?>"> Forget your password? </a></small>
                            </div>
                            <span id="error_message" class="text-danger" style="font-weight: 700"></span>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn px-5 py-2 mx-auto d-block custom-btn-signin text-white">LOGIN</button>
                            <small>Don't have an account yet? <a class="font-weight-bold" href="<?php echo base_url() ?>signup"> Sign Up </a></small>
                        </div>
                    </form>
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
    $("#form").on('submit', function(event) {
        event.preventDefault();

        data = new FormData();
        group_name = $("#group_name").val()
        password = $("#password").val()
        remember_me = false;
        if ($('#remember_me').is(":checked")) {
            remember_me = true;
        }

        if (group_name == "" || password == "") {
            $("#error_message").text("*Group name and password must be filled in.")
        } else {
            data.append('group_name', group_name);
            data.append('password', password);
            data.append('remember_me', remember_me);

            $.ajax({
                type: "POST",
                dataType: "JSON",
                async: true,
                cache: false,
                processData: false,
                contentType: false,
                url: "<?php echo base_url(); ?>SignIn/action",
                data: data,
                success: function(res) {
                    if (!res.status) {
                        $("#error_message").text(res.message)
                    } else {
                        window.location.href = "<?php echo base_url(); ?>GroupName";
                    }
                },
                error: function(res) {
                    $("#error_message").text("*Something wrong, please try again later.")
                }
            });
        }
    })
</script>

</html>