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
                        <input id="email" class="login-input email" type="text" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" placeholder="Enter your leader's email" name="email" required style="color: white;">

                        <div class="col-md-12" style="text-align: center; margin-top: 20px">
                            <input type="submit" onclick="updatePassAction()" class="btn btn-primary px-4 py-2" style="color: white; text-align: center; margin-bottom: 0.3rem !important; font-size: 16px" value="SEND EMAIL">
                        </div>
                    </form>

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
    });


    function updatePassAction() {
        $('#ftco-loader').addClass("show");
        // alert($("#email").val());
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "<?php echo base_url(); ?>UpdatePassword/updatePassAction",
            data: {
                email: $("#email").val()
            },
            success: function(ret) {
                if(ret==0){
                    alert("Your email is invalid");
                }
                else{
                    alert("Please check your email!");
                    window.location.assign("<?php echo base_url(); ?>");
                }
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
