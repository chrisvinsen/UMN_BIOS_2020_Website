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
    <title>BIOS</title>
    <style>
        
        body {font-family: Arial, Helvetica, sans-serif;}

        /* Full-width input fields */
        input[type=text], input[type=password] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
        }

        button:hover {
          opacity: 0.8;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
          width: auto;
          padding: 10px 18px;
          background-color: #f44336;
        }

        /* Center the image and position the close button */
        .imgcontainer {
          text-align: center;
          margin: 24px 0 12px 0;
          position: relative;
        }

        img.avatar {
          width: 40%;
          border-radius: 50%;
        }

        .container {
          padding: 16px;
        }

        span.psw {
          float: right;
          padding-top: 16px;
        }

        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
          padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
          background-color: #fefefe;
          margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
          border: 1px solid #888;
          width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */
        .close {
          position: absolute;
          right: 25px;
          top: 0;
          color: #000;
          font-size: 35px;
          font-weight: bold;
        }

        .close:hover,
        .close:focus {
          color: red;
          cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
          -webkit-animation: animatezoom 0.6s;
          animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
          from {-webkit-transform: scale(0)} 
          to {-webkit-transform: scale(1)}
        }
          
        @keyframes animatezoom {
          from {transform: scale(0)} 
          to {transform: scale(1)}
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
          span.psw {
             display: block;
             float: none;
          }
          .cancelbtn {
             width: 100%;
          }
        }
        </style>
    </style>
</head>
<body>
    <nav class="navbar navbar-default ">
        <div class="container-fluid">
            <div class="navbar-header" style="padding:0 5%">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">BIOS UMN</a>
            </div>
        </div>
    </nav>

    <!-- main content here -->
    
    <div style="padding:0px 16px 0px 16px;">
        <form class="col-md-12 container" onsubmit="return false;">
            <div class="col-md-12">
                <input id="uname" class="login-input" type="text" placeholder="Username" name="uname" required>
            </div><br>
            <div class="col-md-12">
                <input id="pass" class="login-input" type="password" placeholder="Password" name="pass" required>
            </div>
            
            <div class="col-md-12" style="text-align: center; margin-top: 20px">
            <input type="submit" onclick="signInAction()" class="btn btn-primary px-4 py-2" style="color: white; text-align: center; margin-bottom: 0.3rem !important; font-size: 16px" value="SIGN IN">
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

    function signInAction(){
        // alert($("#uname").val());
        $('#ftco-loader').addClass("show");
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: "<?php echo base_url(); ?>AdminLogin/action/"+$("#uname").val()+"/"+$("#pass").val(),
            success: function(ret) {
                if(ret){
                    window.location.assign("<?php echo base_url(); ?>Admin");
                }
                else{
                    alert("Username and password doesn't match");
                }
                // alert(ret.firstName[0]);
            },
            error: function(ret) {
                console.log("error");
                console.log(ret);
            },
            complete: function(ret) {
                $('#ftco-loader').removeClass("show");
                $('#ftco-loader').fadeOut();
            }
        });
    }
</script>
</html>
<!-- 
     type: "POST",
            dataType: "JSON",
            contentType: false,
            url: "<?php echo base_url(); ?>AdminLogin/action",
            data: {
                uname: $("#uname").val(),
                pass: $("#pass").val()
            },
            success: function(ret) {
                if(ret){
                    window.location.assign("<?php echo base_url(); ?>Admin");
                }
                else{
                    alert("Username and password doesn't match");
                }
                // alert(ret.firstName[0]);
            },
            error: function(ret) {
                console.log("error");
                console.log(ret);
            },
            complete: function(ret) {
                $('#ftco-loader').fadeOut();
            } -->











