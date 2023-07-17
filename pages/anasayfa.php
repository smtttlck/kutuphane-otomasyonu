<?php include '../php/baglan.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anasayfa</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Css-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/anasayfa.css">
</head>
<body>
    <?php include 'header.php';?>   

    <?php 
        $kitaplar = $db->query("select * from kitap order by id desc limit 5")->fetchAll(PDO::FETCH_ASSOC);
        $yazarlar = $db->query("select * from yazar order by id desc limit 3")->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <div class="kitaplar">
            <div class="baslik">
                <h3>Son Çıkanlar</h3>
                <a href="kitapsec.php?page=1">Tümünü Göster</a>
            </div>
            <div class="kitap">
                <?php foreach($kitaplar as $kitap) {  ?>
                    <a href="kitapdetay.php?id=<?= $kitap['id'] ?>" style="background-image: url('<?= str_replace('\\','/',$kitap['kapak']) ?>');"></a>
                <?php } ?>
            </div>        
        </div>
        <div class="yazarlar">
            <div class="baslik">
                <h3>Yazarlar</h3>
                <a href="yazarsec.php">Tümünü Göster</a>
            </div>
            <div class="yazar">
                <?php foreach($yazarlar as $yazar) {  ?>
                    <a href="yazardetay.php?id=<?= $yazar['id'] ?>">
                        <img src="<?= str_replace('\\','/',$yazar['resim']) ?>" alt="">
                        <h5><?= $yazar['isim'] ?></h5>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>

    <!--JS-->
    <script src="../js/global.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
</body>
</html>