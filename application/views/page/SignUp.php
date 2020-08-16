<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (isset($_SESSION['user_data'])) {
    echo ("<script>location.href='GroupName'</script>");
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
                <div class="col-lg-12 ftco-animate box-bios">
                    <div class="col-lg-12 center-text" style="margin-bottom: 50px">
                        <img src="<?php echo base_url(); ?>/assets/img/logo-text.png" width="175px">
                    </div>
                    <form id="form" class="row">
                        <div class="col-lg-8 order-lg-1 order-2 ftco-animate pr-4 my-2">
                            <div class="px-2">
                                <h4 class="text-white font-weight-bold"> Member Information </h4>
                                <hr class="rounded">
                            </div>
                            <div id="data-member" class="scrolling-wrapper pb-4">
                                <?php 
                                    for($i = 0; $i < 4; $i++) {
                                ?>
                                    <div class="cardSignUp" id="data<?= $i ?>" style="height: auto;">
                                        <div class="col-md-12 text-left">
                                            <?php if($i == 0) { ?>
                                                <h5 class="text-white font-weight-bold"> Leader </h5>
                                            <?php } else { ?>
                                                <h5 class="text-white font-weight-bold"> Member <?= $i ?> </h5>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-6 float-left px-0 py-1">
                                            <input type="text" class="member-input custom-input-signup required firstName" minlength="3" maxlength="50" placeholder="First Name" name="firstName[]" pattern="[A-Za-z\s]+" title="Must contain letter" <?php if($i == 0) echo "required";?> >
                                        </div>
                                        <div class="col-md-6 float-left px-0 py-1">
                                            <input type="text" class="member-input not-required custom-input-signup lastName" minlength="3" maxlength="50" placeholder="Last Name" name="lastName[]" pattern="[A-Za-z\s]+" title="Must contain letter" >
                                        </div>
                                        <div class="col-md-6 float-left px-0 py-1">
                                            <input type="text" class="member-input custom-input-signup required birthPlace" minlength="3" maxlength="50" placeholder="Birth Place" name="birthPlace[]" pattern="[A-Za-z\s]+" title="Must contain letter" <?php if($i == 0) echo "required";?> >
                                        </div>
                                        <div class="col-md-6 float-left px-0 py-1">
                                            <input type="date" class="member-input custom-input-signup required birthDate" placeholder="Birth Date/Month/Year" name="birthDate[]" min="1990-01-01" max="2010-01-01" <?php if($i == 0) echo "required";?> >
                                        </div>
                                        <div class="col-md-6 float-left px-0 py-1">
                                            <input type="tel" class="member-input custom-input-signup required phoneNumber" minlength="10" maxlength="15" placeholder="Phone Number" name="phoneNumber[]" title="Must contain number (format +628xxxxxxxx)" <?php if($i == 0) echo "required";?> >
                                        </div>
                                        <div class="col-md-6 float-left px-0 py-1">
                                            <input type="email" class="member-input custom-input-signup required email" placeholder="Email" minlength="10" maxlength="100" name="email[]" title="Please input the correct email" <?php if($i == 0) echo "required";?> >
                                        </div>
                                        <div class="col-md-6 float-left px-0 py-1">
                                            <input type="text" class="member-input custom-input-signup required idLine" placeholder="ID Line" minlength="3" maxlength="50" name="idLine[]" <?php if($i == 0) echo "required";?> >
                                        </div>  
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-lg-4 order-lg-2 order-1 ftco-animate box-bios p-4 my-2">
                            <h4 class="text-white font-weight-bold mb-3">Group Account</h4>
                            <div class="input-icons bg-transparent pb-1 pt-2"> 
                                <input type="text" name="group_name" class="bg-transparent text-white ph-text-white border-none" minlength="3" maxlength="50" placeholder="Group Name" required>
                            </div>
                            <div class="input-icons bg-transparent pb-1 pt-2"> 
                                <input type="text" name="university" class="bg-transparent text-white ph-text-white border-none" minlength="3" maxlength="50" placeholder="University Name" required>
                            </div>
                            <div class="input-icons bg-transparent pb-1 pt-2"> 
                                <input type="password" id="password" name="password" class="bg-transparent text-white ph-text-white border-none" placeholder="Password" minlength="8" maxlength="50" required>
                            </div>
                            <div class="input-icons bg-transparent pb-1 pt-2"> 
                                <input type="password" id="cpassword" name="cpassword2" class="bg-transparent text-white ph-text-white border-none" placeholder="Re-type Your Password" minlength="8" maxlength="50" required>
                            </div>
                            <span id="error_password" class="text-danger"></span>
                        </div>
                        <div class="col-lg-8 order-3">
                            <div class="custom-control custom-checkbox py-2 ml-4">
                                <input type="checkbox" class="custom-control-input checkbox_check" id="checkbox_check">
                                <label class="custom-control-label" for="checkbox_check"> I have filled in all this register data correctly </label>
                                <span id="error_message" class="d-block text-danger"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 order-4 py-3 text-right">
                            <button type="submit" class="btn custom-btn-signup"> Register </button>
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
    $(document).ready(function() {
        $(".phoneNumber").mask("+62800000000000");

        $("#data-member input.required").on("focusout", function() {
            if ($(this).val() != "") {
                if (!$(this).prop("required")) {
                    parent_id = $(this).closest("div.cardSignUp").attr("id");

                    if (parent_id != "data0") {
                        $(`#${parent_id} input.required`).each(function() {
                            $(this).prop("required", true)
                        })
                    }
                } 
            } else {
                if ($(this).prop("required")) {
                    parent_id = $(this).closest("div.cardSignUp").attr("id");

                    if (parent_id != "data0") {
                        var isAllEmpty = true;

                        $(`#${parent_id} input`).each(function() {
                            if ($(this).val() != "") {
                                isAllEmpty = false
                            }
                        })

                        if (isAllEmpty) {
                            $(`#${parent_id} input.required`).each(function() {
                                $(this).prop("required", false)
                            })
                        } 
                    }
                } 
            }
        })

        $("#data-member input.not-required").on("focusout", function() {
            parent_id = $(this).closest("div.cardSignUp").attr("id");
            if (parent_id != "data0") {
                if ($(this).val() != "") {
                    $(`#${parent_id} input.required`).each(function() {
                        if (!$(this).prop("required")) {
                            $(this).prop("required", true)
                        }
                    })
                } else {
                    var isAllEmpty = true
                    $(`#${parent_id} input`).each(function() {
                        if ($(this).val() != ""){
                            isAllEmpty = false
                        }
                    })

                    if (isAllEmpty) {
                        $(`#${parent_id} input.required`).each(function() {
                            if ($(this).prop("required")) {
                                $(this).prop("required", false)
                            }
                        })
                    } 
                }
            }
        })
    });

    $("#form").on('submit', function(event) {
        event.preventDefault();

        var validation = true;

        password = $("#password").val();
        cpassword = $("#cpassword").val()

        if (password != cpassword) {
            $("#error_password").text("*Those password didn't match. Try again.")
            validation = false;
        } else {
            $("#error_password").text("")
        }
        if (!$("#checkbox_check").is(":checked")) {
            $("#error_message").text("*Please agree to continue.")
            validation = false;
        } else {
            $("#error_message").text("")
        }

        if (validation) {
            $('#ftco-loader').addClass("show");
            var form_data = new FormData($("#form")[0]); 
            $.ajax({
                type: "POST",
                dataType: "JSON",
                async: true,
                cache: false,
                processData: false,
                contentType: false,
                url: "<?php echo base_url(); ?>SignUp/action",
                data: form_data,
                success: function(ret) {
                    console.log(ret);
                    console.log(ret.status);
                    if (ret.stEmail == false) {
                        alert("Your email has been used ("+ret.member+")");
                    }
                    else if (ret.stGname == false) {
                        alert("Your group name has been used by another group");
                    }
                    else if (ret.status == true) {
                        alert("Your team account has been registered, please activate your account via the email that was sent, so that the team account can be used.");
                        window.location.assign("<?php echo base_url(); ?>SignIn");
                    }
                },
                error: function(ret) {
                    console.log("error");
                    console.log(ret);
                },
                complete: function(ret) {
                    $('#ftco-loader').removeClass("show");
                }
            });
        }
    })
</script>
</html>
