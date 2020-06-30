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

    <section class="ftco-intro py-5" style="background-image: url(<?php echo base_url(); ?>assets/resources/home/bg-home.jpg);">
        <div class="overlay"></div>
        <div class="container" style="margin-top:100px">
            
            <div class="row d-flex align-items-center">
                <div class="col-md-12 ftco-animate bg-blue-acara">

                    <form id="form" onsubmit="return false;" enctype="multipart/form-data" method="post">
                        <div class="col-md-4 center-text" style="margin-bottom: 50px; text-align: left; float: left">
                            <h2 style="border-bottom: 5px solid white; font-weight:bold; color: white">Welcome!</h2>
                        </div>
                        <div class="col-md-8 center-text" style="margin-bottom: 50px; text-align: right; float: right">
                            <input type="submit" onclick="saveChanges()" class="col-md-4 btn btn-primary px-4 py-2" style=" text-align: center; margin-bottom: 0.3rem !important; font-size: 16px; color: white;" value="Save Changes">
                        </div>

                        <div class="col-md-8 ftco-animate">
                            <div class="col-md-12" style="background-color: #123557; border: 1px solid white; float: left; padding: 50px; margin-bottom: 20px;">
                                <div class="scrolling-wrapper">
                                    <?php if(isset($persondetail)){
                                        
                                        foreach ($persondetail as $person) {
                                            foreach ($person as $key) {                                            
                                    ?>
                                        <div class="cardSignUp" >
                                            <div class="col-md-3" style="float: left;padding: 0px">
                                                <img class="col-md-12" src="<?php echo base_url(); ?>assets/resources/groupname/pict-group.png">
                                                <div class="col-md-12" style="float: right; text-align: center;  padding: 0px; margin-top: 20px">
                                                    <p class="col-md-12" style="float: right; background-color: #007bff"><?php if($stMember==0) echo "Leader"; else echo "Member".$stMember; $stMember++;?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-9" style="float: right; height: 300px; padding: 0px">
                                                 <input name="id[]" value="<?php echo $key['id']; ?>" type="hidden">
                                                <div class="col-md-6" style="float: left;">
                                                    <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>First Name</strong></label><br>
                                                    <input class="col-md-12 register-input" type="text" maxlength="30" placeholder="First Name" name="firstName[]" pattern="[A-Za-z]{1,30}" title="Must contain letter" value="<?php echo $key['firstName']; ?>" required <?php if($groupdetail['statusCard']==2) echo "readonly"; ?>>
                                                </div>
                                                <div class="col-md-6" style="float: left;x">
                                                    <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Last Name</strong></label><br>
                                                    <input class="col-md-12 register-input"  type="text" maxlength="30" placeholder="Last Name" name="lastName[]" pattern="[A-Za-z]{1,30}" title="Must contain letter" value="<?php echo $key['lastName']; ?>" <?php if($groupdetail['statusCard']==2) echo "readonly"; ?>>
                                                </div>
                                                <div class="col-md-6" style="float: left;">
                                                    <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Birth Place</strong></label><br>
                                                    <input class="col-md-12 register-input"  type="text" maxlength="20" placeholder="Birth Place" name="birthPlace[]" pattern="[A-Za-z]{1,20}" title="Must contain letter" value="<?php echo $key['birthPlace']; ?>" required <?php if($groupdetail['statusCard']==2) echo "readonly"; ?>>
                                                </div>
                                                <div class="col-md-6" style="float: left;">
                                                    <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Birth Date</strong></label><br>
                                                    <input class="col-md-12 register-input" type="date" maxlength="15" placeholder="Birth Date/Month/Year" name="birthDate[]" min="1994-01-01" max="2005-01-01" value="<?php echo $key['birthDate']; ?>" required <?php if($groupdetail['statusCard']==2) echo "readonly"; ?>>
                                                </div>
                                                <div class="col-md-6" style="float: left;">
                                                    <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Phone Number</strong></label><br>
                                                    <input class="col-md-12 register-input" maxlength="15" placeholder="Phone Number" name="phoneNumber[]" pattern="628[0-9]{7,12}" title="Must contain number (format 628xxxxxxxx)" value="<?php echo $key['phoneNumber']; ?>" required <?php if($groupdetail['statusCard']==2) echo "readonly"; ?>>
                                                </div>
                                                <div class="col-md-6" style="float: left;">
                                                    <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Email</strong></label><br>
                                                    <input class="col-md-12 register-input"  type="text" placeholder="Email" maxlength="50" name="email[]" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" value="<?php echo $key['email']; ?>" required <?php if($groupdetail['statusCard']==2) echo "readonly"; ?>>
                                                </div>
                                                <div class="col-md-6" style="float: left;">
                                                    <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>ID Line</strong></label><br>
                                                    <input class="col-md-12 register-input"  type="text" placeholder="ID Line" maxlength="15" name="idLine[]" pattern="^[A-Za-z0-9_]{1,32}$" value="<?php echo $key['idLine']; ?>" <?php if($groupdetail['statusCard']==2) echo "readonly"; ?> >
                                                </div>
                                                <div class="col-md-6" style="float: left;">
                                                    <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px">Student ID Card & SKMA</label><br>
                                                    <!-- ada buttonnya -->
                                                   <!--  <div class="upload-btn-wrapper col-md-12 ">
                                                         <?php if($groupdetail['statusCard']==-1 || $groupdetail['statusCard']==2) { ?>
                                                            <button class="btn btn-disabled-custom " style="margin: -30px; font-size: 8px; padding-left: 40px; padding-right: 40px; height:25px">Upload Student ID Card</button>
                                                        <?php } else{ ?>
                                                            <button class="btn btn-primary " style="margin: -30px; font-size: 10px; padding-left: 30px; padding-right: 30px;">Upload Student ID Card</button>
                                                        <?php }  ?>
                                                        <input type="file" name="fileCard[]" <?php if($groupdetail['statusPembayaran']==0 || $groupdetail['statusCard']==2) echo "disabled"; ?>/>
                                                    </div> -->

                                                    <?php if($groupdetail['statusCard']!=2){?>
                                                        <div class="upload-btn-wrapper col-md-12 ">
                                                             <?php if($groupdetail['statusCard']==-1 ) { ?>
                                                                <button class="btn btn-disabled-custom " style="margin: -30px; font-size: 8px; padding-left: 40px; padding-right: 40px; height:25px; width: 100%">Upload</button>
                                                            <?php } else{ ?>
                                                                <button class="btn btn-primary " style="margin: -30px; font-size: 10px; padding-left: 30px; padding-right: 30px; width: 100%; ">Upload</button>
                                                            <?php }  ?>
                                                            <input type="file" accept=".zip" name="fileCard[]" <?php if($groupdetail['statusPembayaran']!=2 ) echo "disabled"; ?> />
                                                        </div>
                                                    <?php }?>

                                                    <div class="col-md-12" style="float: left; text-align: left; padding: 0px; margin-top: 5px">
                                                        <?php if($groupdetail['statusCard']==-1){?>
                                                            <img src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px; float: left;">
                                                            <p style="font-size: 8px; margin-bottom: 0px; margin-left: 20px">Disabled</p>
                                                        <?php } else if($groupdetail['statusCard']==2){?>
                                                            <img src="<?php echo base_url(); ?>assets/resources/groupname/pict-done.png" style="width: 14px; float: left;">
                                                            <p style="font-size: 8px; margin-bottom: 0px; margin-left: 20px">Done</p>
                                                            <input type="hidden" name="fileCardBefore[]" value="<?php echo $key['fileCard'];?>">
                                                        <?php } 
                                                            else if($key['fileCard']==""){
                                                        ?>
                                                            <img src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px; float: left;">
                                                            <p style="font-size: 8px; margin-bottom: 0px; margin-left: 20px">Not yet</p>
                                                            <input type="hidden" name="fileCardBefore[]" value="">
                                                        <?php } else{
                                                        ?>
                                                            <img src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px; float: left;">
                                                            <p style="font-size: 8px; margin-bottom: 0px; margin-left: 20px">Waiting</p>
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


                        <div class="col-md-4 ftco-animate " style="float: right; margin-bottom: 20px;">
                            <div class="col-md-12" style="background-color: #123557; border: 1px solid white; float: left; padding: 20px; ">

                                <div class="col-md-12" style="float: left;">
                                    <p style="text-align: left;">Group Account</p>
                                </div>
                                <div class="col-md-12" style="float: left;">
                                    <label class="col-md-12" style="font-size: 11px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Group Name</strong></label><br>
                                    <p style="font-size: 12px"><?php if(isset($groupdetail)) echo $groupdetail['gname']?></p>
                                </div>
                                <div class="col-md-12" style="float: left;">
                                    <label class="col-md-12" style="font-size: 11px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>University Name</strong></label><br>
                                    <p style="font-size: 12px"><?php if(isset($groupdetail)) echo $groupdetail['uname']?></p>
                                </div>
                                <div class="col-md-12" style="float: left;">
                                    <label class="col-md-6" style="font-size: 11px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Password</strong></label>
                                    <button onclick="changePass()" class="btn btn-primary col-md-6" style="font-size: 8px; float: right">Change Password</button></a>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 ftco-animate " style="float: right;">
                            <div class="col-md-12" style="background-color: #123557; border: 1px solid white; float: left; padding: 20px;  min-height: 210px; padding-top: 30px">

                                <div class="col-md-12" style="float: left;">
                                    <p style="text-align: left;">Assignment Status</p>
                                </div>
                                <div class="col-md-12" style="float: left;">
                                    <label class="col-md-6" style="font-size: 11px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Bukti Pembayaran</strong></label>
                                    <div class="upload-btn-wrapper col-md-6 " style="float: right">
                                        <?php if($groupdetail['statusPembayaran']!=2){?>
                                            <button class="btn btn-primary" style="margin: -15px; font-size: 8px; padding-left: 47px; padding-right: 47px;">Upload</button>
                                            <input type="file" name="filePembayaran[]" accept=".png,.jpg,.jpeg" />
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12" style="float: left;">
                                    <?php if($groupdetail['statusPembayaran']==0){?>
                                        <img src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px; float: left;">
                                        <p style="font-size: 8px; margin-bottom: 0px; margin-left: 20px">Not yet</p>
                                    <?php }
                                        else if($groupdetail['statusPembayaran']==1){?>
                                        <img src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px; float: left;">
                                        <p style="font-size: 8px; margin-bottom: 0px; margin-left: 20px">Waiting</p>
                                    <?php } else{
                                    ?>
                                        <img src="<?php echo base_url(); ?>assets/resources/groupname/pict-done.png" style="width: 14px; float: left;">
                                        <p style="font-size: 8px; margin-bottom: 0px; margin-left: 20px">Done</p>
                                    <?php }
                                    ?>
                                </div>
                                <div class="col-md-12" style="float: left;">
                                    <label class="col-md-6" style="font-size: 11px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Proposal</strong></label>
                                    <?php  if($groupdetail['statusProposal']!=2){
                                    ?>
                                        <div class="upload-btn-wrapper col-md-6 " style="float: right">
                                            <?php if($groupdetail['statusProposal']==-1 || $groupdetail['statusProposal']==2) {?>
                                                <button class="btn btn-disabled-custom " style="margin: -15px; font-size: 8px; padding-left: 47px; padding-right: 47px; height:25px">Upload</button>
                                                <input type="file" name="fileProposal[]" readonly />
                                            <?php } else {?>
                                                <button class="btn btn-primary" style="margin: -15px; font-size: 8px; padding-left: 47px; padding-right: 47px;">Upload</button>
                                                <input type="file" name="fileProposal[]" accept=".pdf"/>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <!-- <button class="btn btn-primary col-md-6" style="font-size: 8px; float: right">Upload</button> -->
                                </div>
                                <div class="col-md-12" style="float: left;">
                                    <?php  if($groupdetail['statusProposal']==2){
                                    ?>
                                        <img src="<?php echo base_url(); ?>assets/resources/groupname/pict-done.png" style="width: 14px; float: left;">
                                        <p style="font-size: 8px; margin-bottom: 0px; margin-left: 20px">Done</p>
                                    <?php } else if($groupdetail['statusProposal']==0){?>
                                        <img src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px; float: left;">
                                        <p style="font-size: 8px; margin-bottom: 0px; margin-left: 20px">Not yet</p>
                                    <?php }
                                        else if($groupdetail['fileProposal']!="") {?>
                                        <img src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px; float: left;">
                                        <p style="font-size: 8px; margin-bottom: 0px; margin-left: 20px">Waiting</p>
                                        <input type="hidden" name="fileProposalBefore[]" value="<?php echo $groupdetail['fileProposal'];?>">
                                    <?php } else{
                                    ?>
                                        <img src="<?php echo base_url(); ?>assets/resources/groupname/pict-not-yet.png" style="width: 14px; float: left;">
                                        <p style="font-size: 8px; margin-bottom: 0px; margin-left: 20px">Disabled</p>
                                    <?php }?>
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

    function validate(data) {
        var isvalid = false;
        var photo = data.value.toLowerCase();
        photos = photo.split(".");
        photo = photos[photos.length-1];
        for(var x=0;x<_validFileExtensions.length;x++){
                if(_validFileExtensions[x]==photo){
                    isvalid = true;
                    break;
                }
        }
        if(!isvalid){
            alert('Invalid File');
            return false;
        }
    }
    $(document).ready(function() {

        $('input[name^="fileCard"]').unbind().change(function () {
            if (this.files.length > 0) {

                $.each(this.files, function (index, value) {
                    if(Math.round((value.size / 1024)) > 5000){
                        alert("Max size for ID Card and SKMA is 5MB");
                        location.reload();
                        // this.replaceWith($(this).val('').clone(true));
                        // $(this).val('');
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
                        // $(this).val('');
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
                        // $(this).val('');
                    }
                })
            }
        });
    });

    function changePass(){
        window.location.assign("<?php echo base_url();?>UpdatePassword");
    }

    function saveChanges(){

        var checkValidForm = [];
        for(var j=0 ; j<7 ;j++){
            checkValidForm[j]=0;
        }
        var i=0,k=0, iData=0;
        $('input[name^="firstName"]').each(function() {
            if(k==3 && $(this)[0].value!=""){
                iData++;
            }
            if($(this)[0].checkValidity()==true){
                checkValidForm[i]++;
            }
            k++;
        });i++; k=0;
        $('input[name^="lastName"]').each(function() {
            if(k==3 && $(this)[0].value!=""){
                iData++;
            }
            k++;
        });i++; k=0;
        $('input[name^="birthPlace"]').each(function() {
            if(k==3 && $(this)[0].value!=""){
                iData++;
            }
            if($(this)[0].checkValidity()==true){
                checkValidForm[i]++;
            }
            k++;
        });i++; k=0;
        $('input[name^="birthDate"]').each(function() {
            if(k==3 && $(this)[0].value!=""){
                iData++;
            }
            if($(this)[0].checkValidity()==true){
                checkValidForm[i]++;
            }
        });i++; k=0;
        $('input[name^="phoneNumber"]').each(function() {
            if(k==3 && $(this)[0].value!=""){
                iData++;
            }
            if($(this)[0].checkValidity()==true){
                checkValidForm[i]++;
            }
            k++;
        });i++; k=0;
        var emailCek = [], iEmail =0;
        $('input[name^="email"]').each(function() {
            if(k==3 && $(this)[0].value!=""){
                iData++;
            }
            if($(this)[0].checkValidity()==true){
                checkValidForm[i]++;
                emailCek[iEmail++] = $(this)[0].value;
                console.log("email: "+emailCek[iEmail-1]);
            }
            k++;
        });i++; k=0;
        $('input[name^="idLine"]').each(function() {
            if($(this)[0].checkValidity()==true){
                checkValidForm[i]++;
            }
            k++;
        });i++;
        var st = true, stLine=true;
        var member = <?php echo $stMember; ?>;
        for( var j=0 ; j<i ; j++){
            if(j!=1 && j!=6 ){
                if(checkValidForm[j]<member)
                    st = false;
            }
            if(j==6)
                if(checkValidForm[j]==0)
                    stLine = false;
            console.log(checkValidForm[j]);
        }

        var stEmail = true;
        for(var j=0 ; j<iEmail-1 ; j++){
            for( var m=j+1 ; m<iEmail ; m++){
                console.log(emailCek[j]+"  "+emailCek[m]);
                if(emailCek[j]==emailCek[m])
                    stEmail=false;
            }
        }
        // console.log("idata: "+iData);
        if(st==false){
            console.log("false");
        }
        else if(stLine==false){
            alert("Please fill out idLine field!");
        }
        else if(iData<member && iData!=0){
            alert("Please fill out member 4");
        }
        else if( stEmail==false){
            alert("Each member must have a different email");            
        }
        else if(st==true){
            console.log("msk true");
            var sum=3;
            $('#ftco-loader').addClass("show");
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
                    // alert(ret.firstName[0]);
                },
                error: function(ret) {
                    alert("There's something wrong, please try again!");
                    location.reload();
                },
                complete: function(ret) {
                    $('#ftco-loader').removeClass("show");
                    // $('#ftco-loader').fadeOut();
                }
            });
        }
        





        
    }
</script>
</html>
