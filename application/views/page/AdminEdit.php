<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- home.php -->
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/bootstrap.css.map">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/bootstrap-theme.css.map">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css2/font-awesome.min.css">

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js2/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js2/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js2/dataTables.bootstrap.min.js"></script>

    <style>
        .cardSignUp{
            padding: 20px;
        }
    </style>

    <title>BIOS</title>
</head>
<body>
    <nav class="navbar navbar-default ">
        <div class="container-fluid">
            <div class="navbar-header" style="padding:0 5%">
                <a class="navbar-brand" href="#">BIOS UMN</a>
            </div>
            <ul class="nav navbar-nav navbar-right" style="padding:0 5%">
                <li class="active"><a href="<?php echo base_url(); ?>Admin">Group List</a></li>    

            </ul>
        </div>
    </nav>


    <!-- main content here -->
    
    <div style="padding:0px 16px 0px 16px;">
        <form id="form" onsubmit="return false;" method="post">
            <div class="col-md-12 ftco-animate " style="float: right; margin-bottom: 20px;">
                <div class="col-md-6" style=" float: left; padding: 20px; ">
                    <div class="col-md-12" style="float: left;">
                        <p style="text-align: left;"><strong>Group Account</strong></p>
                    </div>
                    <div class="col-md-12" style="float: left; margin: 10px">
                        <label class="col-md-12" style="font-size: 11px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Group Name</strong></label><br>
                        <input class="col-md-12" type="text" name="gname" value="<?php if(isset($groupdetail)) echo $groupdetail['gname']?>">
                    </div>
                    <div class="col-md-12" style="float: left; margin: 10px">
                        <label class="col-md-12" style="font-size: 11px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>University Name</strong></label><br>
                        <input class="col-md-12" type="text" name="uname" value="<?php if(isset($groupdetail)) echo $groupdetail['uname']?>">
                    </div>
                </div>
                <div class="col-md-6" style=" float: right; padding: 20px; ">
                    <div class="col-md-12" style="float: left;">
                        <p style="text-align: left;"><strong>Assignment Status</strong></p>
                    </div>
                    <div class="col-md-12" style="float: left; margin: 10px">
                         <label class="col-md-12" style="font-size: 11px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Bukti Pembayaran</strong></label>
                         <a href="<?php echo base_url().'mantapBios1Secret/resources/pembayaran/'.$groupdetail['filePembayaran'];?>" target="_blank" download><?php echo $groupdetail['filePembayaran'];?></a>
                         <input  class="col-md-12" type="file" name="filePembayaran[]" />
                    </div>
                    <div class="col-md-12" style="float: left; margin: 10px">
                        <label class="col-md-12" style="font-size: 11px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Proposal</strong></label>
                        <a href="<?php echo base_url().'mantapBios1Secret/resources/proposal/'.$groupdetail['fileProposal'];?>" target="_blank" download><?php echo $groupdetail['fileProposal'];?></a>
                        <input  class="col-md-12"type="file" name="fileProposal[]" />
                    </div>
                </div>
            </div>


        <?php if(isset($persondetail)){
            $stMember = 0;
            foreach ($persondetail as $person) {
                foreach ($person as $key) {                                            
        ?>
            <div class="cardSignUp" >
                <div class="col-md-12" style="float: left;padding: 0px">
                    <div class="col-md-12" style="float: right; text-align: center;  padding: 0px; ">
                        <p class="btn-primary col-md-12" style="float: right"><?php if($stMember==0) echo "Leader"; else echo "Member".$stMember; $stMember++;?></p>
                    </div>
                </div>
                <div class="col-md-12" style="float: right; padding: 0px">
                     <input name="id[]" value="<?php echo $key['id']; ?>" type="hidden">
                    <div class="col-md-6" style="float: left;">
                        <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>First Name</strong></label><br>
                        <input class="col-md-12 register-input" type="text" maxlength="30" placeholder="First Name" name="firstName[]" pattern="[A-Za-z]{1,30}" title="Must contain letter" value="<?php echo $key['firstName']; ?>" required>
                    </div>
                    <div class="col-md-6" style="float: left; padding: 10px">
                        <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Last Name</strong></label><br>
                        <input class="col-md-12 register-input"  type="text" maxlength="30" placeholder="Last Name" name="lastName[]" pattern="[A-Za-z]{1,30}" title="Must contain letter" value="<?php echo $key['lastName']; ?>">
                    </div>
                    <div class="col-md-6" style="float: left; padding: 10px">
                        <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Birth Place</strong></label><br>
                        <input class="col-md-12 register-input"  type="text" maxlength="20" placeholder="Birth Place" name="birthPlace[]" pattern="[A-Za-z]{1,20}" title="Must contain letter" value="<?php echo $key['birthPlace']; ?>" required>
                    </div>
                    <div class="col-md-6" style="float: left; padding: 10px">
                        <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Birth Date</strong></label><br>
                        <input class="col-md-12 register-input" type="date" maxlength="15" placeholder="Birth Date/Month/Year" name="birthDate[]" min="1994-01-01" max="2005-01-01" value="<?php echo $key['birthDate']; ?>" required>
                    </div>
                    <div class="col-md-6" style="float: left; padding: 10px">
                        <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Phone Number</strong></label><br>
                        <input class="col-md-12 register-input" maxlength="15" placeholder="Phone Number" name="phoneNumber[]" pattern="[0-9]{10,15}" title="Must contain number" value="<?php echo $key['phoneNumber']; ?>" required>
                    </div>
                    <div class="col-md-6" style="float: left; padding: 10px">
                        <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>Email</strong></label><br>
                        <input class="col-md-12 register-input"  type="text" placeholder="Email" maxlength="50" name="email[]" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" value="<?php echo $key['email']; ?>" required>
                    </div>
                    <div class="col-md-6" style="float: left; padding: 10px">
                        <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px"><strong>ID Line</strong></label><br>
                        <input class="col-md-12 register-input"  type="text" placeholder="ID Line" maxlength="15" name="idLine[]" pattern="^[A-Za-z0-9_]{1,32}$" value="<?php echo $key['idLine']; ?>" required>
                    </div>
                    <div class="col-md-6" style="float: left; padding: 10px">
                        <label class="col-md-12" style="font-size: 12px; margin-bottom: 0px; text-align: left; padding-left: 0px">Student ID Card</label><br>
                        <input type="file" name="fileCard[]" />
                        <a href="<?php echo base_url().'mantapBios1Secret/resources/card/'.$key['fileCard'];?>" target="_blank" download>
                            <?php echo $key['fileCard'];?>
                        </a><br>
                        <input type="hidden" name="fileCardBefore[]" value="<?php echo $key['fileCard'];?>">
                    </div>
                </div>

            </div>
        <?php 
                }
            }
        } 
        ?>
            <div class="col-md-5 ftco-animate " style="float: left; margin: 20px; margin-bottom: 50px">
                <input type="submit" onclick="saveChanges()" class="col-md-4 btn btn-primary px-4 py-2" style="float:left; text-align: center; margin-bottom: 0.3rem !important; font-size: 16px; color: white;" value="Save Changes">
            </div>
        </form>


    </div>
    <div class="text-center footer">
        <p>Copyright 2019 - BIOS</p>
    </div>

    <style>
    .footer{
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: grey;
        color: white;
        text-align: center;
    }

    </style>

</body>
<script>
    $(document).ready(function() {
        
    });
    function saveChanges(){      
        $('#ftco-loader').addClass("show");  
        var form_data = new FormData($("#form")[0]);  
        $.ajax({
            type: "POST",
            dataType: "JSON",
            async: true,
            cache: false,
            processData: false,
            contentType: false,
            url: "<?php echo base_url(); ?>Admin/action",
            data: form_data,
            success: function(ret) {
                console.log(ret);
                console.log(ret.status);
                if(ret.status==true){
                    alert("Success");
                    window.location.assign("<?php echo base_url(); ?>Admin");
                }
                // alert(ret.firstName[0]);
            },
            error: function(ret) {
            },
            complete: function(ret) {
                $('#ftco-loader').removeClass("show");
            }
        });
    }
</script>
</html>












