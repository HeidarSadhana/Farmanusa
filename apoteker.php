<?php
    session_start();
    require('db-connect.php');
    if(!isset($_POST['Cari'])){
        $result = mysqli_query($db, "SELECT * FROM user WHERE tipe_akun = 'apoteker'");
    }
    else{
        $cari = $_POST['Search'];
        $result = mysqli_query($db, "SELECT * FROM user WHERE username LIKE '%$cari%' AND tipe_akun = 'apoteker'");
    }
    while($row = mysqli_fetch_assoc($result)){
        $apoteker[] = $row;
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apoteker</title>
    <link rel="browser tab icon" href="./image/heart-health-48.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <?php
        include 'navbar.php';
    ?>

    <!-- apoteker section starts -->

    <section class="apoteker" id="apoteker">

        <h1 class="heading">apoteker</h1>
        <?php 
            if(isset($apoteker) or isset($_POST['Cari'])){
        ?>
            <form id="searchObat" action="" method="POST">
                <input type="text" value="" name="Search" placeholder="Cari Nama Apoteker">
                <button type="submit" name="Cari"><i class="fas fa-search"></i></button>
            </form>
        <?php
            }
        ?>
        <div class="box-container">
            <?php
            if(isset($apoteker)){
                foreach ($apoteker as $staff):
            ?>
                <div class="box">
                    <div class="image">
                        <img src="image/blog-2.jpg" alt="">
                    </div>
                    <h1><?php echo $staff['username'] ?></h1>
                    <span>expert fharmachist</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
            <?php
                endforeach;
            } else {
                if(!isset($_POST['Cari'])){
                    ?>
                    <div class="kosong">
                        <h3>Mohon Maaf</h3>
                        <p>
                            Belum Ada Apoteker yang 
                            Bekerja di Farmanusa
                        </p> 
                    </div>
                    <?php
                        } else {
                    ?>
                    <div class="kosong">
                        <h3>Mohon Maaf</h3>
                        <p>
                            Apoteker yang anda cari tidak 
                            ada di daftar apoteker kami
                        </p> 
                    </div>
                    <?php
                        }
                        }
                    ?>
        </div>
    </section>

    <!-- apoteker section ends -->
    <?php include 'footer.php' ?>

    <?php require 'login.php';?>


    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>