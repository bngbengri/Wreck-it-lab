<?php require_once '../header_ch.php'; ?>
     <title>Employee Information</title>
    <div class="container pb-5">
        <div class="necklace-box">
            <div class="line d-flex justify-content-between m-auto">
                <div></div>
                <div></div>
            </div>
            <div class="head-line mx-auto"></div>
            <div class="hook-line mx-auto"></div>
            <div class="subhook-line mx-auto"></div>
        </div>
        <div class="detail-box mx-auto">
            <div class="title">
                <div class="head-detail mx-auto mb-2"></div>
                SUGAR RUSH COMPANY
            </div>
            <div class="mx-auto w-75 my-3">
                <?php if($_GET['id'] <= 6 && $_GET['id'] > 0) {?>
                    <img src="images/<?php echo $_GET['id'] ?>.png" class="w-100" alt="">
                <?php }else {?>
                    <img src="images/99.png" class="w-100" alt="">
                <?php } ?>
            </div>
            <?php
            error_reporting(0);
            $servername = 'localhost:3306';
            $username = 'root';
            $password = '';
            $dbname = 'wreck-it-lab';
            $id = $_GET['id'];
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if (isset($id)) {
                if (!is_numeric($id)) {
                    ?>
                    <div class="footer-card">
                        What are u doing hacker?!
                    </div>
                    <?php
                    die;
                }
            }
            if ($conn->connect_error) {
                die('Connection failed: '.$conn->connect_error);
            }
            $sql = "SELECT * FROM users WHERE userID=$id";
                $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="name-card text-center">
                   <h4 class="font-weight-bold m-0"><?php echo $row['firstname']. ' ' .$row['lastname'] ?></h4> 
                   <h5><?php echo $row['role'] ?></h5>
                </div>
                <div class="table-detail mx-3 py-2">
                    <table>
                        <tbody>
                            <tr>
                                <td>Username :</td>
                                <td>&nbsp;<?php echo $row['username'] ?></td>
                            </tr>
                            <tr>
                                <td>Email :</td>
                                <td>&nbsp;<?php echo $row['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Phone :</td>
                                <td>&nbsp;<?php echo $row['phone'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="footer-card">
                    ID : <?php echo $row['userID'] ?>
                </div>
            <?php }
            } else {
                ?>
                <div class="footer-card">
                    ID : No Employee Found
                </div>
                <?php
            }
                $conn->close();
            ?>                   
        </div>
    </div>    
  </body>
</html>