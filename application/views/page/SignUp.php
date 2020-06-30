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
                <div class="col-md-12 ftco-animate bg-blue-acara" style="background-color: #123557; border: 1px solid white;">
                    <div class="col-md-12 center-text" style="margin-bottom: 50px">
                        <img class="col-7 col-sm-4" src="<?php echo base_url(); ?>/assets/resources/home/font-bios.png">
                    </div>

                    <form id="form" onsubmit="return false;">

                        <div class="col-md-8 ftco-animate ">
                            <div class="col-md-12" style="background-color: #123557; border: 1px solid white; float: left; padding: 30px; ">

                                <div class="scrolling-wrapper">
                                    <?php 
                                        for($i=0 ; $i<4 ; $i++){
                                    ?>
                                        <div class="cardSignUp" style="height:300px">
                                            <div class="col-md-12" style="float: left; margin-bottom: 15px">
                                                <div class="col-md-7" style="float: left; padding: 0px">
                                                    <p style="text-align: left;">Members Information</p>
                                                </div>
                                                <div class="col-md-5" style="float: right; text-align: center;  padding: 0px">
                                                    <p class=" col-md-6" style="float: right; background-color: #007bff"><?php if($i==0) echo "Leader"; else echo "Member ".$i; ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="float: left; margin-bottom: 10px">
                                                <div class="input-icons col-md-12" style="text-align: left"> 
                                                    <input class="member-input firstName" type="text" maxlength="30" placeholder="First Name" name="firstName[]" pattern="[A-Za-z]{1,30}" title="Must contain letter" <?php if($i!=3) echo "required";?> >
                                                    <i class="col-md-1 fa fa-smile-o icon"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="float: left; margin-bottom: 10px">
                                                <div class="input-icons col-md-12" style="text-align: left"> 
                                                    <input class="member-input lastName" type="text" maxlength="30" placeholder="Last Name" name="lastName[]" pattern="[A-Za-z]{1,30}" title="Must contain letter" >
                                                    <i class="col-md-1 fa fa-smile-o icon"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="float: left; margin-bottom: 10px">
                                                <div class="input-icons col-md-12" style="text-align: left"> 
                                                    <input class="member-input birthPlace" type="text" maxlength="20" placeholder="Birth Place" name="birthPlace[]" pattern="[A-Za-z]{1,50}" title="Must contain letter" <?php if($i!=3) echo "required";?> >
                                                    <i class="col-md-1 fa fa-map-marker icon"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="float: left; margin-bottom: 10px">
                                                <div class="input-icons col-md-12" style="text-align: left"> 
                                                    <input class="member-input birthDate" type="date" maxlength="15" placeholder="Birth Date/Month/Year" name="birthDate[]" min="1994-01-01" max="2005-01-01" <?php if($i!=3) echo "required";?> >
                                                    <i class="col-md-1 fa fa-calendar-o icon"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="float: left; margin-bottom: 10px">
                                                <div class="input-icons col-md-12" style="text-align: left"> 
                                                    <input class="member-input phoneNumber" type="tel" maxlength="15" placeholder="Phone Number" name="phoneNumber[]" pattern="628[0-9]{7,12}" title="Must contain number (format 628xxxxxxxx)" <?php if($i!=3) echo "required";?> >
                                                    <i class="col-md-1 fa fa-mobile icon"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="float: left; margin-bottom: 10px">
                                                <div class="input-icons col-md-12" style="text-align: left"> 
                                                    <input class="member-input email" type="text" placeholder="Email" maxlength="50" name="email[]" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" title="Please input the correct email" <?php if($i!=3) echo "required";?> >
                                                    <i class="col-md-1 fa fa-envelope icon"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="float: left; margin-bottom: 10px">
                                                <div class="input-icons col-md-12" style="text-align: left"> 
                                                    <input class="member-input idLine" type="text" placeholder="ID Line" maxlength="15" name="idLine[]" pattern="^[A-Za-z0-9_]{1,32}$" >
                                                    <i class="col-md-1 fa fa-commenting icon"></i>
                                                </div>
                                            </div>  
                                        </div>
                                    <?php }?>
                                  
                                    

                                  <!--   <div class="cardSignUp">
                                        <div id="member3">
                                            <div class="col-md-12" style="float: left;">
                                                <div class="col-md-7" style="float: left; padding: 0px">
                                                    <p style="text-align: left;">Members Information</p>
                                                </div>
                                                <div class="col-md-5" style="float: right; text-align: center;  padding: 0px">
                                                    <p class="btn-primary col-md-6" style="float: right">Member 3</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="float: left;">
                                                <input class="register-input" type="text" placeholder="First Name" name="" required>
                                            </div>
                                            <div class="col-md-6" style="float: left;">
                                                <input class="register-input" type="text" placeholder="Last Name" name="" required>
                                            </div>
                                            <div class="col-md-6" style="float: left;">
                                                <input class="register-input" type="text" placeholder="Birth Place" name="" required>
                                            </div>
                                            <div class="col-md-6" style="float: left;">
                                                <input class="register-input" type="text" placeholder="Birth Date/Month/Year" name="" required>
                                            </div>
                                            <div class="col-md-6" style="float: left;">
                                                <input class="register-input" type="text" placeholder="Phone Number" name="" required>
                                            </div>
                                            <div class="col-md-6" style="float: left;">
                                                <input class="register-input" type="text" placeholder="Email" name="" required>
                                            </div>
                                            <div class="col-md-6" style="float: left;">
                                                <input class="register-input" type="text" placeholder="ID Line" name="" required>
                                            </div>
                                        </div>
                                    </div> -->
                                  
                                </div>


                            </div>
                            
                        </div>


                        <div class="col-md-4 ftco-animate " style="float: right;">
                            <div class="col-md-12" style="background-color: #123557; border: 1px solid white; float: left; padding: 30px; ">

                                <div class="col-md-12" style="float: left; margin-bottom: 20px">
                                    <p style="text-align: left;">Group Account</p>
                                </div>
                                <div class="col-md-12" style="float: left; margin-bottom: 20px">
                                    <div class="input-icons"> 
                                        <i class="fa fa-user icon" style="width: 10%"></i>
                                        <input class="group-input" type="text" placeholder="Group Name" name="gname" required>
                                    </div>
                                </div>
                                <div class="col-md-12" style="float: left; margin-bottom: 20px">
                                    <div class="input-icons"> 
                                        <i class="fa fa-map-marker icon" style="width: 10%"></i>
                                        <input class="group-input" type="text" placeholder="University Name" name="uname" required>
                                    </div>
                                </div>
                                <div class="col-md-12" style="float: left; margin-bottom: 20px">
                                    <div class="input-icons"> 
                                        <i class="fa fa-lock icon" style="width: 10%"></i>
                                        <input id="pass" class="group-input" type="password" placeholder="Password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one special character, one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    </div>
                                </div>
                                <div class="col-md-12" style="float: left; margin-bottom: 20px">
                                    <div class="input-icons"> 
                                        <i class="fa fa-key icon" style="width: 10%"></i>
                                        <input id="pass2" class="group-input" type="password" placeholder="Re-type Your Password" name="pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one special character, one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-md-12" style="text-align: center">        

                            <div class="col-md-12 col-xs-12 div-seminar center-text" style="margin-top: 20px">
                                <input type="checkbox" class="checkbox_check"> I have filled in all this register data correctly<br>

                                <input type="submit" onclick="signUpAction()" class="col-md-4 btn btn-primary px-4 py-2" style=" text-align: center; margin-bottom: 0.3rem !important; font-size: 16px; color: white;" value="SIGN UP">
                                    <!-- SIGN UP
                                </button> -->
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
    });


    function signUpAction() {
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
                emailCek[iEmail] = $(this)[0].value;
            }
            iEmail++;
            k++;
        });i++; k=0;
        $('input[name^="idLine"]').each(function() {
            if($(this)[0].checkValidity()==true){
                checkValidForm[i]++;
            }
            k++;
        });i++;
        var st = true;
        for( var j=0 ; j<i ; j++){
            if(j!=1 && j!=6 ){
                if(checkValidForm[j]<4)
                    st = false;
            }
            // console.log(checkValidForm[j]);
        }
        var stEmail = true;
        for(var j=0 ; j<iEmail ; j++){
            for( var m=j+1 ; m<iEmail ; m++){
                if(emailCek[m]==emailCek[j])
                    stEmail=false;
            }
        }

        console.log("idata: "+iData);
        if(st==false || $('input[name="gname"]')[0].checkValidity()==false || $('input[name="uname"]')[0].checkValidity()==false  || $('input[name="pass"]')[0].checkValidity()==false || $('input[name="pass2"]')[0].checkValidity()==false ){
            console.log("false");
        }
        else if(iData<4 && iData!=0){
            alert("Please fill out member 4");
        }
        else if( stEmail==false){
            alert("Each member must have a different email");            
        }
        else if(st==true && $('input[name="gname"]')[0].checkValidity()==true && $('input[name="uname"]')[0].checkValidity()==true  && $('input[name="pass"]')[0].checkValidity()==true && $('input[name="pass2"]')[0].checkValidity()==true){
            console.log("msk true");
            if ($('input.checkbox_check').is(':checked')==0){
                alert("You must checked");
            }
            else if($('#pass').val()!=$('#pass2').val()){
                alert("Your password doesn't match");
            }
            else{
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
                    url: "<?php echo base_url(); ?>SignUp/action",
                    data: form_data,
                    success: function(ret) {
                        console.log(ret);
                        console.log(ret.status);
                        if(ret.stEmail==false){
                            alert("Your email has been used ("+ret.member+")");
                        }
                        else if(ret.stGname==false){
                            alert("Your group name has been used by another group");
                        }
                        else if(ret.status==true){
                            alert("You have registered. Please check your email");
                            window.location.assign("<?php echo base_url(); ?>SignIn");
                        }
                        // alert(ret.firstName[0]);
                    },
                    error: function(ret) {
                        console.log("eror");
                        console.log(ret);
                    },
                    complete: function(ret) {
                        $('#ftco-loader').removeClass("show");
                    }
                });
            }
        }
        
    }
</script>
</html>
