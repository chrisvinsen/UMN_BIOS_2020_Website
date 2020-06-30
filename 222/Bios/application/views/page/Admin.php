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
    <style>
        
#ftco-loader {
  position: fixed;
  width: 96px;
  height: 96px;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  background-color: rgba(255, 255, 255, 0.9);
  -webkit-box-shadow: 0px 24px 64px rgba(0, 0, 0, 0.24);
  box-shadow: 0px 24px 64px rgba(0, 0, 0, 0.24);
  border-radius: 16px;
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity .2s ease-out, visibility 0s linear .2s;
  -o-transition: opacity .2s ease-out, visibility 0s linear .2s;
  transition: opacity .2s ease-out, visibility 0s linear .2s;
  z-index: 1000; }

#ftco-loader.fullscreen {
  padding: 0;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  -webkit-transform: none;
  -ms-transform: none;
  transform: none;
  background-color: #fff;
  border-radius: 0;
  -webkit-box-shadow: none;
  box-shadow: none; }

#ftco-loader.show {
  -webkit-transition: opacity .4s ease-out, visibility 0s linear 0s;
  -o-transition: opacity .4s ease-out, visibility 0s linear 0s;
  transition: opacity .4s ease-out, visibility 0s linear 0s;
  visibility: visible;
  opacity: 1; }

#ftco-loader .circular {
  -webkit-animation: loader-rotate 2s linear infinite;
  animation: loader-rotate 2s linear infinite;
  position: absolute;
  left: calc(50% - 24px);
  top: calc(50% - 24px);
  display: block;
  -webkit-transform: rotate(0deg);
  -ms-transform: rotate(0deg);
  transform: rotate(0deg); }

#ftco-loader .path {
  stroke-dasharray: 1, 200;
  stroke-dashoffset: 0;
  -webkit-animation: loader-dash 1.5s ease-in-out infinite;
  animation: loader-dash 1.5s ease-in-out infinite;
  stroke-linecap: round; }

    </style>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js2/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js2/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js2/dataTables.bootstrap.min.js"></script>
    <title>BIOS</title>
</head>
<body>
    <nav class="navbar navbar-default ">
        <div class="container-fluid">
            <div class="navbar-header" style="padding:0 5%">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">BIOS UMN</a>
            </div>
            <ul class="nav navbar-nav navbar-right" style="padding:0 5%">
                <li><a href="<?php echo base_url(); ?>Admin/uploadView">Upload</a></li>  
                <li><a href="<?php echo base_url(); ?>Admin">Group List</a></li>  
            </ul>
        </div>
    </nav>


    <!-- main content here -->
    
    <div style="padding:0px 16px 0px 16px;">
        <table id='tableGroup' class='table table-striped' cellspacing='0' width='100%' style="color: black">
            <thead>
                <tr>
                    <th>Group Name</th>
                    <th>Team Members</th>
                    <th>Card</th>
                    <th>Bukti Pembayaran</th>
                    <th>Proposal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    function checkSt($check){
                        $st="";
                        if($check==1)
                            $st = "#F1F1BD"; //$st="WAITING FOR CONFIRMATION";
                        else if($check==2)
                            $st = "#6BD89D";// $st="DONE";
                        else 
                            $st = "#DADEDC";// $st="NOT YET";
                        return $st;
                    }
                    if($group)
                    foreach ($group as $row){
                    
                        echo"<tr>";
                            echo "<td>" . $row['groupdetail']['gname'] . "</td>";
                            echo "<td>";
                            foreach ($row['persondetail'] as $person) {
                                echo $person['firstName'] . " " . $person['lastName'] . "<br>";
                            }
                            echo "</td>";
                            echo "<td style='background-color:".checkSt($row['groupdetail']['statusCard'])."'>" ;  
                            foreach ($row['persondetail'] as $person) {
                                echo "<a href='".base_url()."mantapBios1Secret/resources/card/".$person['fileCard']."' download>". $person['fileCard'] . "</a><br>";
                            }
                                if($row['groupdetail']['statusCard']==1)
                                    echo '<br><button class = "btn btn-default" style="color:dodgerblue" onclick="sendEmail(\''.$row['persondetail'][0]['email'].'\', \''.$row['groupdetail']['id'].'\',\'card\')">Send Email</button>';
                            echo "</td>";
                            echo "<td style='background-color:".checkSt($row['groupdetail']['statusPembayaran'])."'>" ;  
                                echo "<a href='".base_url()."mantapBios1Secret/resources/pembayaran/".$row['groupdetail']['filePembayaran']."' download>". $row['groupdetail']['filePembayaran'] . "</a>";
                                if($row['groupdetail']['statusPembayaran']==1)
                                    echo '<br><br><button class = "btn btn-default" style="color:dodgerblue" onclick="sendEmail(\''.$row['persondetail'][0]['email'].'\', \''.$row['groupdetail']['id'].'\',\'pembayaran\')">Send Email</button>';
                            echo "</td>";
                            echo "<td style='background-color:".checkSt($row['groupdetail']['statusProposal'])."'>" ;  
                                echo "<a href='".base_url()."mantapBios1Secret/resources/proposal/".$row['groupdetail']['fileProposal']."' download>". $row['groupdetail']['fileProposal'] . "</a>";
                                if($row['groupdetail']['statusProposal']==1)
                                    echo '<br><br><button class = "btn btn-default" style="color:dodgerblue" onclick="sendEmail(\''.$row['persondetail'][0]['email'].'\', \''.$row['groupdetail']['id'].'\',\'proposal\')">Send Email</button>';
                            echo "</td>";
                            //  action='editGroup(".$row['groupdetail']['id'] ."')'
                            echo "<td>";
                                echo"<form action='".base_url()."Admin/editAction' method='post'> 
                                    <input type='hidden' name='groupId' value='".$row['groupdetail']['id']."'>
                                    <button class = 'btn btn-default glyphicon glyphicon-edit' style='color:dodgerblue' type='submit'> </button> 
                                </form>";
                                echo '<button class="btn btn-default glyphicon glyphicon-remove" style="color:dodgerblue" onclick="deleteGroup(\''.$row['groupdetail']['gname'].'\', \''.$row['groupdetail']['id'].'\')"> </button> </form>';
                           
                        echo "</tr>";
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Group Name</th>
                    <th>Team Members</th>
                    <th>Card</th>
                    <th>Bukti Pembayaran</th>
                    <th>Proposal</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
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
<?php
    echo $loader;
?>
<script>
    $(document).ready(function() {
        $('#tableGroup').DataTable();
         $('#ftco-loader').removeClass("show");
    });

    function deleteGroup(gname, groupId){
        $('#ftco-loader').addClass("show");
        if (confirm('Are you sure you want to send email?')) {
            // alert(email+" "+groupId);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?php echo base_url(); ?>Admin/deleteAction",
                data: {
                    groupId: groupId
                },
                success: function(ret) {
                    console.log(ret);
                    if(ret==1){
                        alert(gname+" has been deleted");
                        location.reload();
                    }
                },
                error: function(ret) {
                },
                complete: function(ret) {
                    $('#ftco-loader').removeClass("show");
                }
            });
        } 
        else{
            $('#ftco-loader').removeClass("show");
        }
    }

    function sendEmail(email, groupId, statusEmail){
        if (confirm('Are you sure you want to send email?')) {
            $('#ftco-loader').addClass("show");
            // alert(email+" "+groupId);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?php echo base_url(); ?>Admin/sendEmailAction",
                data: {
                    email: email, 
                    groupId: groupId,
                    statusEmail: statusEmail
                },
                success: function(ret) {
                    console.log(ret);
                    if(ret==1){
                        alert("Email sent");
                        location.reload();
                    }
                },
                error: function(ret) {
                },
                complete: function(ret) {
                    $('#ftco-loader').removeClass("show");
                }
            });
        } 
    }
</script>
</html>













