<?php
   include "includes/dbconnect.inc.php";
   session_start();

   $adm=$msg1=$msg3='';
   $o_id = $o_username = $o_email = $o_mobile_no = $o_nid = $o_address = $o_space = "";

   if (isset($_SESSION['uname'])) {
     $adm = $_SESSION['uname'];
   }
   else{
     header("Location:Ownerlogin.php");
   }
   
   if (isset($_SESSION['msg3'])) {
    $msg3 = $_SESSION['msg3'];
  }

  if (isset($_SESSION['id'])) {
    $o_id = $_SESSION['id'];
  }

 ?>

<html lang="en">

    <head>
        <title>Owner Dashboard.</title>
        <link rel="stylesheet" href="../../css/admindash_style.css">
        <link rel="stylesheet" href="../../css/admindash_style2.css">
    </head>

    <body>
        <div align="center">
            <img src="LOGO.png" alt="logo"><br>
            <span style="color:#FA5858; font-size:30px; font-family:ebrima"><u> OWNER DASHBOARD. </u></span><br>
            <span style="color:#424242; font-size:22px; font-family:ebrima"> Welcome Mr./ Mrs./ Ms. <?php echo $adm; ?> </span>
        </div>
        <div align="right" style="padding-right:200px;">
            <a href="ologout.php" target="_self"><b>Log Out<b></a>
        </div>

        <div> 
            <button type="submit" class="update_btn" onclick="window.location.href = 'ownerDash.php';">Update owner info</button>
        </div>

        <?php

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $u_name = $_GET['uname'];
                echo $u_name;
            }
        ?>
        <form action="ownerapproval.php" method="POST">
                        
            <?php 

                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $sql1="SELECT * FROM owner WHERE id = '$o_id'";
                    $result1=mysqli_query($conn, $sql1);
    
                    while($row = mysqli_fetch_assoc($result1)){
                        $o_username= $row['username'];
                        $o_email = $row['email'];
                        $o_mobile_no = $row['mobile_no'];
                        $o_nid = $row['nid'];
                        $o_address = $row['address'];
                        $o_p_area = $row['parking_area'];
                        $o_p_division = $row['division'];
                        $o_space = $row['space'];

                        if (isset($_GET['lgn_btn'])) {
                            echo "Login button pressed";
                        }

                        ?>
                        <div>
                            <div>
                                <label for="o_id">Owner ID: </label>
                                <label for="o_id"><?php echo $o_id; ?></label>
                            </div>
                            <div>
                                <label for="o_uname">Owner Name: </label>
                                <label for="o_uname"><?php echo $o_username; ?></label>
                            </div>
                            <div>
                                <label for="o_email">Owner Email: </label>
                                <label for="o_email"><?php echo $o_email; ?></label>
                            </div>
                            <div>
                                <label for="o_mobile_no">Owner Mobile No: </label>
                                <label for="o_mobile_no"><?php echo $o_mobile_no; ?></label>
                            </div>
                            <div>
                                <label for="o_nid">Owner NID: </label>
                                <label for="o_nid"><?php echo $o_nid; ?></label>
                            </div>
                            <div>
                                <label for="o_address">Owner Address: </label>
                                <label for="o_address"><?php echo $o_address; ?></label>
                            </div>
                            <div>
                                <label for="o_p_area">Owner Area: </label>
                                <label for="o_p_area"><?php echo $o_p_area; ?></label>
                            </div>
                            <div>
                                <label for="o_division">Owner Division: </label>
                                <label for="o_division"><?php echo $o_p_division; ?></label>
                            </div>
                            <div>
                                <label for="o_space">Owner Space: </label>
                                <label for="o_space"><?php echo $o_space; ?></label>
                            </div>
                        </div>

                <?php
                    }
                }

            ?>
            
            <h2 class="admpanel">Parker Information panel.</h2>
            <div>
                <label class="id">Parker ID or Address:</label>
                <input type="number" name="oid_add" />
                <input type="submit" value="Activate" name="o_act" class="act" />
                <input type="submit" value="Deactivate" name="o_deact" class="deact" />
                <span style="color:#FF0000; font-size:15px"><sub><?php echo $msg3; ?></sub></span>
            </div>

            <table style="width:100%">
                <tr>
                    <th>ID.</th>
                    <th>User Name</th>
                    <th>Mobile no.</th>
                    <th>E-mail</th>
                    <th>NID no.</th>
                </tr>

                <?php
                $sql1="SELECT * from parker";
                $result1=mysqli_query($conn, $sql1);

                while($row = mysqli_fetch_assoc($result1)){

                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['mobile_no']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['nid']; ?></td>
                </tr>

                <?php } ?>

            </table>

        </form>

    </body>

</html>