<?php require_once('header.php') ?>
<?php require_once('header_home.php') ?>
    <div class="bg-main">
        <div class="content-wrapper mx-0">
            <div class="content-banner">
                <?php 
                    if(isset($_GET['tool'])){
                        if($_GET['tool'] != "cyberChef"){
                            require_once('how-to/burp.html');
                        }else{
                            require_once('how-to/cyberChef.html');
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>  <!-- for nav-bar -->