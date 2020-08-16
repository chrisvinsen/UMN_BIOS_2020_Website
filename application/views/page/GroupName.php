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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        echo $header;
        $stMember = 0;
    ?> 

    <section class="ftco-intro" style="background-image: url(<?php echo base_url(); ?>assets/img/registration-img.png); padding-top: 5vw">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-12 ftco-animate bg-blue-acara" style="padding: 2rem 20px !important">
                    <form id="form" onsubmit="return false;" enctype="multipart/form-data" method="post">
                        <div class="row pb-2">
                            <div class="col-md-6">
                                <div class="text-left" style="max-width: 225px; border-bottom: 6px solid white;">
                                    <h2 class="text-white font-weight-bolder m-0"> Welcome! </h2>
                                </div>
                            </div>
                            <div class="col-md-6 row justify-content-end align-items-center pt-4">
                                <input type="submit" class="btn custom-btn-save text-white" value="Save Changes">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 ftco-animate p-2">
                                <div class="box-bios-2">
                                    <div class="scrolling-wrapper">
                                        <?php if(isset($persondetail)){
                                            foreach ($persondetail as $person) {
                                                foreach ($person as $key) {                                            
                                        ?>
                                            <div class="cardSignUp m-0" id="<?= "member" . $stMember ?>">
                                                <div class="col-md-3 float-left p-0">
                                                    <img class="col-md-12" src="<?php echo base_url(); ?>assets/resources/groupname/pict-group.png" style="max-width: 200px">
                                                    <p class="font-weight-bold px-5 my-4 rounded mx-auto d-block" style="background-color: #b5a9d3; max-width: 200px"><?php if($stMember==0) echo "Leader"; else echo "Member".$stMember; $stMember++;?></p>
                                                </div>
                                                <div class="col-md-9 p-0 float-right">
                                                    <input name="id[]" value="<?php echo $key['id']; ?>" type="hidden">
                                                    <div class="col-md-6 float-left">
                                                        <label class="col-md-12 mb-0 pl-0 text-left" style="font-size: 12px;">First Name</label><br>
                                                        <input type="text" class="col-md-12 register-input custom-bg-6 border-none" minlength="3" maxlength="50" placeholder="First Name" name="firstName[]" pattern="[A-Za-z\s]+" title="Must contain letter" value="<?php echo $key['firstName']; ?>" <?php if($groupdetail['statusCard']==2) echo "readonly"; ?> required>
                                                    </div>
                                                    <div class="col-md-6 float-left">
                                                        <label class="col-md-12 mb-0 pl-0 text-left" style="font-size: 12px;">Last Name</label><br>
                                                        <input type="text" class="col-md-12 register-input custom-bg-6 border-none"  minlength="3" maxlength="50" placeholder="Last Name" name="lastName[]" pattern="[A-Za-z\s]+" title="Must contain letter" value="<?php echo $key['lastName']; ?>" <?php if($groupdetail['statusCard']==2) echo "readonly"; ?>>
                                                    </div>
                                                    <div class="col-md-6 float-left">
                                                        <label type="text" class="col-md-12 mb-0 pl-0 text-left" style="font-size: 12px;">Birth Place</label><br>
                                                        <input class="col-md-12 register-input custom-bg-6 border-none" minlength="3" maxlength="50" placeholder="Birth Place" name="birthPlace[]" pattern="[A-Za-z\s]+" title="Must contain letter" value="<?php echo $key['birthPlace']; ?>" required <?php if($groupdetail['statusCard']==2) echo "readonly"; ?>>
                                                    </div>
                                                    <div class="col-md-6 float-left">
                                                        <label class="col-md-12 mb-0 pl-0 text-left" style="font-size: 12px;">Birth Date</label><br>
                                                        <input type="date" class="col-md-12 register-input custom-bg-6 border-none" maxlength="15" placeholder="Birth Date/Month/Year" name="birthDate[]" min="1990-01-01" max="2010-01-01" value="<?php echo $key['birthDate']; ?>" required <?php if($groupdetail['statusCard']==2) echo "readonly"; ?>>
                                                    </div>
                                                    <div class="col-md-6 float-left">
                                                        <label class="col-md-12 mb-0 pl-0 text-left" style="font-size: 12px;">Phone Number</label><br>
                                                        <input type="tel" class="col-md-12 register-input custom-bg-6 border-none phoneNumber" minlength="10" maxlength="15" placeholder="Phone Number" name="phoneNumber[]" title="Must contain number (format +628xxxxxxxx)" value="<?php echo $key['phoneNumber']; ?>" required <?php if($groupdetail['statusCard']==2) echo "readonly"; ?>>
                                                    </div>
                                                    <div class="col-md-6 float-left">
                                                        <label class="col-md-12 mb-0 pl-0 text-left" style="font-size: 12px;">Email</label><br>
                                                        <input type="email" class="col-md-12 register-input custom-bg-6 border-none" placeholder="Email" minlength="10" maxlength="100" name="email[]" title="Please input the correct email" value="<?php echo $key['email']; ?>" required readonly>
                                                    </div>
                                                    <div class="col-md-6 float-left">
                                                        <label class="col-md-12 mb-0 pl-0 text-left" style="font-size: 12px;">ID Line</label><br>
                                                        <input type="text" class="col-md-12 register-input custom-bg-6 border-none" placeholder="ID Line" minlength="3" maxlength="50" name="idLine[]"value="<?php echo $key['idLine']; ?>" required <?php if($groupdetail['statusCard']==2) echo "readonly"; ?> >
                                                    </div>
                                                    <div class="col-md-6 float-left">
                                                        <label class="col-md-12 mb-0 pl-0 text-left" style="font-size: 12px;">Student ID Card & SKMA (.zip)</label><br>
                                                        <?php if($groupdetail['statusCard']!=2){?>
                                                            <div class="upload-btn-wrapper col-md-12 ">
                                                                 <?php if($groupdetail['statusCard']==-1 ) { ?>
                                                                    <button class="btn btn-disabled-custom custom-bg-3 w-100" style="margin: -30px; font-size: 10px; padding-left: 40px; padding-right: 40px; height:25px;">Upload</button>
                                                                <?php } else{ ?>
                                                                    <button class="btn custom-bg-3 text-white w-100" style="margin: -30px; font-size: 10px; padding-left: 30px; padding-right: 30px; border-radius: 24px">Upload</button>
                                                                <?php }  ?>
                                                                <input type="file" accept=".zip" name="fileCard[]" <?php if($groupdetail['statusPembayaran']!=2 ) echo "disabled"; ?> />
                                                            </div>
                                                        <?php }?>
                                                        <div class="col-md-12 float-left p-0 text-left" style="margin-top: 5px">
                                                            <?php if($groupdetail['statusCard']==-1){?>
                                                                <img class="float-left" src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px;">
                                                                <p style="font-size: 10px; margin-bottom: 0px; margin-left: 20px">Disabled</p>
                                                            <?php } else if($groupdetail['statusCard']==2){?>
                                                                <img class="float-left" src="<?php echo base_url(); ?>assets/resources/groupname/pict-done.png" style="width: 14px;">
                                                                <p style="font-size: 10px; margin-bottom: 0px; margin-left: 20px">Done</p>
                                                                <input type="hidden" name="fileCardBefore[]" value="<?php echo $key['fileCard'];?>">
                                                            <?php } 
                                                                else if($key['fileCard']==""){
                                                            ?>
                                                                <img class="float-left" src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px;">
                                                                <p style="font-size: 10px; margin-bottom: 0px; margin-left: 20px">Not yet</p>
                                                                <input type="hidden" name="fileCardBefore[]" value="">
                                                            <?php } else{
                                                            ?>
                                                                <img class="float-left" src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px;">
                                                                <p style="font-size: 10px; margin-bottom: 0px; margin-left: 20px">Waiting</p>
                                                                <input type="hidden" name="fileCardBefore[]" value="<?php echo $key['fileCard'];?>">
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php 
                                                }
                                            }
                                        } 
                                        ?>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 ftco-animate p-2">
                                <div class="row m-0 h-100">
                                    <div class="col-md-12 box-bios-3 mb-3" style="height: auto">
                                        <div class="col-md-12 float-left">
                                            <p class="font-weight-bold text-left">Group Account</p>
                                        </div>
                                        <div class="col-md-12 float-left">
                                            <label class="col-md-12 text-left pl-0" style="font-size: 11px; margin-bottom: 0px;">Group Name</label><br>
                                            <p style="font-size: 12px"><?php if(isset($groupdetail)) echo $groupdetail['gname']?></p>
                                        </div>
                                        <div class="col-md-12 float-left">
                                            <label class="col-md-12 mb-0 pl-0 text-left" style="font-size: 11px;">University Name</label><br>
                                            <p style="font-size: 12px"><?php if(isset($groupdetail)) echo $groupdetail['uname']?></p>
                                        </div>
                                        <div class="col-md-12 float-left">
                                            <label class="col-md-6 mb-0 text-left pl-0" style="font-size: 11px;">Password</label>
                                            <a href="<?php echo base_url();?>UpdatePassword" class="btn col-md-6 custom-bg-3 text-white float-right" style="font-size: 10px; border-radius: 24px;">Change Password</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 box-bios-3 mb-3" style="height: auto">
                                        <div class="col-md-12 float-left">
                                            <p class="font-weight-bold text-left">Assignment Status</p>
                                        </div>
                                        <div class="col-md-12 text-left">
                                            <label class="col-md-6 mb-0 pl-0 text-left" style="font-size: 11px;">Bukti Pembayaran</label>
                                            <div class="upload-btn-wrapper col-md-6 float-right">
                                                <?php if($groupdetail['statusPembayaran']!=2){?>
                                                    <button class="btn custom-bg-3 text-white" style="margin: -15px; font-size: 10px; padding-left: 47px; padding-right: 47px; border-radius: 24px;">Upload</button>
                                                    <input type="file" name="filePembayaran[]" accept=".png,.jpg,.jpeg" />
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 float-left">
                                            <?php if($groupdetail['statusPembayaran']==0){?>
                                                <img class="float-left" src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px;">
                                                <p style="font-size: 10px; margin-bottom: 0px; margin-left: 20px">Not yet</p>
                                            <?php }
                                                else if($groupdetail['statusPembayaran']==1){?>
                                                <img class="float-left" src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px;">
                                                <p style="font-size: 10px; margin-bottom: 0px; margin-left: 20px">Waiting</p>
                                            <?php } else{
                                            ?>
                                                <img src="<?php echo base_url(); ?>assets/resources/groupname/pict-done.png" style="width: 14px; float: left;">
                                                <p style="font-size: 10px; margin-bottom: 0px; margin-left: 20px">Done</p>
                                            <?php }
                                            ?>
                                        </div>
                                        <div class="col-md-12 float-left">
                                            <label class="col-md-6 mb-0 pl-0 text-left" style="font-size: 11px;">Proposal</label>
                                            <?php  if($groupdetail['statusProposal']!=2){
                                            ?>
                                                <div class="upload-btn-wrapper col-md-6 " style="float: right">
                                                    <?php if($groupdetail['statusProposal']==-1 || $groupdetail['statusProposal']==2) {?>
                                                        <button class="btn btn-disabled-custom custom-bg-3" style="margin: -15px; font-size: 10px; padding-left: 47px; padding-right: 47px; height:25px">Upload</button>
                                                        <input type="file" name="fileProposal[]" readonly />
                                                    <?php } else {?>
                                                        <button class="btn text-white custom-bg-3" style="margin: -15px; font-size: 10px; padding-left: 47px; padding-right: 47px; border-radius: 24px">Upload</button>
                                                        <input type="file" name="fileProposal[]" accept=".pdf"/>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-12 float-left">
                                            <?php  if($groupdetail['statusProposal']==2){
                                            ?>
                                                <img class="float-left" src="<?php echo base_url(); ?>assets/resources/groupname/pict-done.png" style="width: 14px;">
                                                <p style="font-size: 10px; margin-bottom: 0px; margin-left: 20px">Done</p>
                                            <?php } else if($groupdetail['statusProposal']==0){?>
                                                <img class="float-left" src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px;">
                                                <p style="font-size: 10px; margin-bottom: 0px; margin-left: 20px">Not yet</p>
                                            <?php }
                                                else if($groupdetail['fileProposal']!="") {?>
                                                <img class="float-left" src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px;">
                                                <p style="font-size: 10px; margin-bottom: 0px; margin-left: 20px">Waiting</p>
                                                <input type="hidden" name="fileProposalBefore[]" value="<?php echo $groupdetail['fileProposal'];?>">
                                            <?php } else{
                                            ?>
                                                <img class="float-left" src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px;">
                                                <p style="font-size: 10px; margin-bottom: 0px; margin-left: 20px">Disabled</p>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

        $('input[name^="fileCard"]').unbind().change(function () {
            if (this.files.length > 0) {

                $.each(this.files, function (index, value) {
                    if(Math.round((value.size / 1024)) > 5000){
                        alert("Max size for ID Card and SKMA is 5MB");
                        location.reload();
                    }
                })
            }
        });
        $('input[name^="filePembayaran"]').unbind().change(function () {
            if (this.files.length > 0) {

                $.each(this.files, function (index, value) {
                    if(Math.round((value.size / 1024)) > 5000){
                        alert("Max size for ID Card and SKMA is 5MB");
                        location.reload();
                    }
                })
            }
        });
        $('input[name^="fileProposal"]').unbind().change(function () {
            if (this.files.length > 0) {

                $.each(this.files, function (index, value) {
                    if(Math.round((value.size / 1024)) > 25000){
                        alert("Max size for ID Card and SKMA is 25MB");
                        location.reload();
                    }
                })
            }
        });
    });

    $("#form").on('submit', function(event) {
        event.preventDefault();
        alert("SUBMITTED")
        // $('#ftco-loader').addClass("show");
        var form_data = new FormData($("#form")[0]);  
        $.ajax({
            type: "POST",
            dataType: "JSON",
            async: true,
            cache: false,
            processData: false,
            contentType: false,
            url: "<?php echo base_url(); ?>GroupName/action",
            data: form_data,
            success: function(ret) {
                console.log(ret);
                console.log(ret.status);
                if(ret.status==true){
                    alert("You have edited");
                    location.reload();
                }
            },
            error: function(ret) {
                alert("There's something wrong, please try again!");
                location.reload();
            },
            complete: function(ret) {
                $('#ftco-loader').removeClass("show");
            }
        });

        
    })
</script>
</html>
