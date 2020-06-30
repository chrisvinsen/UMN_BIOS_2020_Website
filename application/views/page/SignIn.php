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

    <section class="ftco-intro py-5" style="background-image: url(<?php echo base_url(); ?>assets/resources/home/bg-acara.jpg);">
        <div class="overlay"></div>
        <div class="container" style="margin-top:100px">
            
            <div class="row d-flex align-items-center">
                <div class="col-md-3 ftco-animate bg-blue-acara" >
                </div>
                <div class="col-md-6 ftco-animate bg-blue-acara" style="background-color: #123557; border: 1px solid white;">
                    <div class="col-md-12 center-text" style="margin-bottom: 50px">
                        <img class="col-7 col-sm-4" src="<?php echo base_url(); ?>/assets/resources/home/font-bios.png">
                    </div>

                    <form class="col-md-12" id="form" onsubmit="return false;" style="margin-top: 30px">
                        <input id="gname" class="login-input" type="text" placeholder="Group Name" name="gname" required style="color: white;">
                        <input id="pass" class="login-input" type="password" placeholder="Password" name="pass" required style="color: white;">

                        <label class="col-md-6">
                            <input type="checkbox" class="checkbox_check" id="remember_me"> Remember me
                        </label>
                        <label class="col-md-6" style=" text-align: right; float: right;">
                            <a href="<?php echo base_url() ?>UpdatePassword" style="color: white;">Forgot your password?</a>
                        </label>
                        
                        <div class="col-md-12" style="text-align: center; margin-top: 20px">
                            <input type="submit" onclick="signInAction()" class="btn btn-primary px-4 py-2" style="color: white; text-align: center; margin-bottom: 0.3rem !important; font-size: 16px" value="SIGN IN">
                        </div>
                    </form>
                        <p style="font-size: 9px; text-align: center;  margin-top: 10px">Don't have an account yet? <a href="<?php echo base_url(); ?>SignUp" style="color: white"><strong>Sign Up</strong></a></p>
                </div>
                <div class="col-md-3 ftco-animate bg-blue-acara" >
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
        if (localStorage.chkbx && localStorage.chkbx != '') {
            $('#remember_me').attr('checked', 'checked');
            $('#gname').val(localStorage.gname);
            $('#pass').val(localStorage.pass);
        } else {
            $('#remember_me').removeAttr('checked');
            $('#loginEmail').val('');
            $('#loginPW').val('');
        }
        $('#remember_me').click(function() {

            if ($('#remember_me').is(':checked')) {
                // save username and password
                localStorage.gname = $('#gname').val();
                localStorage.pass = $('#pass').val();
                localStorage.chkbx = $('#remember_me').val();
            } else {
                localStorage.usrname = '';
                localStorage.pass = '';
                localStorage.chkbx = '';
            }
        });
    });


    function signInAction() {
        $('#ftco-loader').addClass("show");
        
        var form_data = new FormData($("#form")[0]);   
        $.ajax({
            type: "POST",
            dataType: "JSON",
            async: true,
            cache: false,
            processData: false,
            contentType: false,
            url: "<?php echo base_url(); ?>SignIn/action",
            data: form_data,
            success: function(ret) {
                console.log(ret.status);
                if(ret.status==true){
                    window.location.assign("<?php echo base_url(); ?>GroupName");
                }
                else{
                    alert("Group name and password doesn't match");
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
</script>
</html>
