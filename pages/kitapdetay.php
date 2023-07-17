<?php include '../php/baglan.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kitap</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Css-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/kitapdetay.css">
</head>
<body>
    <?php include 'header.php';?> 

    <?php
        $id = $_GET['id'];
        $kitap_sorgu = $db->query("SELECT kitap.*, yazar.isim as yazar_isim, 
        yayinevi.isim as yayinevi_isim, kategori.isim as kategori_isim FROM 
        (((kitap inner join yazar on kitap.yazar_id = yazar.id) 
        inner join yayinevi on kitap.yayinevi_id = yayinevi.id) 
        inner join kategori on kitap.kategori_id = kategori.id) where kitap.id=$id")->fetchAll(PDO::FETCH_ASSOC);
        $kitap = $kitap_sorgu[0];
        $kullanici_id = $_SESSION['kullanici_id'];
        $query_fav = $db->query("select * from favori where kullanici_id=$kullanici_id and kitap_id=$id")->fetch(PDO::FETCH_ASSOC);
        (isset($query_fav['id'])) ? $favori = $query_fav['id'] : $favori = '0' ;
    ?>

    <div class="container">
        <a href="#" onclick="fav(<?= $kitap['id'] ?>)"><i id="fav" class="fa-regular fa-heart fa-2xl"></i></a>
        <div class="img-box">
            <img src="<?= str_replace('\\','/',$kitap['kapak']) ?>" alt="<?= $kitap['isim'] ?>">
        </div>
        <div class="info-box">
            <h1 class="w-75"><?= $kitap['isim'] ?></h1>
            <div class="baslik-info">
                <p><?= $kitap['yazar_isim'] ?></p>
                <p><?= $kitap['yayinevi_isim'] ?></p>
            </div>
            <div class="ozet">
                <p> <?= $kitap['ozet'] ?> </p>
            </div>
            <div class="detay w-25" style="display:inline-table;">
                <div class="detay-group">
                    <label>Kitap Adı:</label>
                    <p><?= $kitap['isim'] ?></p>
                </div>
                <div class="detay-group">
                    <label>Yazar:</label>
                    <p><?= $kitap['yazar_isim'] ?></p>
                </div>
                <div class="detay-group">
                    <label>Yayınevi:</label>
                    <p><?= $kitap['yayinevi_isim'] ?></p>
                </div>
                <div class="detay-group">
                    <label>Stok Adedi:</label>
                    <p><?= $kitap['stok'] ?></p>
                </div>
                <div class="detay-group">
                    <label>Sayfa Sayısı:</label>
                    <p><?= $kitap['sayfa_sayisi'] ?></p>
                </div>
                <div class="detay-group">
                    <label>ISBN:</label>
                    <p><?= $kitap['isbn'] ?></p>
                </div>
            </div>
            <?php
                $kullanici_id = $_SESSION['kullanici_id'];
                $query = $db->query("select aktif_kira_sayisi from kullanici where id=$kullanici_id")->fetch(PDO::FETCH_ASSOC);
                $kullanici_kira_sayisi = $query['aktif_kira_sayisi'];
                $kitap_id = $kitap['id'];
                $query2 = $db->query("select * from kiralama where kullanici_id=$kullanici_id and kitap_id=$kitap_id and aktiflik='1'")->fetch(PDO::FETCH_ASSOC);
                if(isset($query2['aktiflik'])) {
                    $durum = $query2['aktiflik'];
                    $son_tarih = $query2['son_teslim_tarihi'];
                    $son_tarih = explode("-", $son_tarih);
                    $son_tarih = "$son_tarih[2]/$son_tarih[1]/$son_tarih[0]";
                }
                else {
                    $durum = '0';
                    $son_tarih = '0';
                }
            ?>
            <button onClick="kirala(<?= $kitap['id'] ?>,<?= $kullanici_kira_sayisi ?>,<?= $kitap['stok'] ?>,'<?= $_SESSION['kullanici_ceza_tarihi']; ?>')" id="kira_buton" class="btn btn2 btn-danger">Kirala</button>            
            <button onClick="teslimEt(<?= $query2['id']?>,<?= $kitap['id'] ?>)" id="teslim_buton" class="btn btn2 btn-success" style="display:none">Teslim Et</button>
        </div>
    </div>

    <!--JS-->
    <script src="../js/global.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        function kirala(kitap_id,kullanici_kira_sayisi,stok,ceza_tarihi) {
            var hata = "yok";
            if(kullanici_kira_sayisi>=3)
                hata = 'Aktif olarak en fazla 3 kiralama yapabilirsiniz.';
            else if(stok==0)
                hata = 'İstediğiniz kitap stokta mevcut değildir.';
            var bugun = new Date();
            var ay;
            ((bugun.getMonth()+1)<10) ?  ay= '0'+((bugun.getMonth()+1).toString()) : ay= bugun.getMonth()+1
            var gun;
            ((bugun.getDate()+1)<10) ?  gun= '0'+(bugun.getDate().toString()) : gun= bugun.getDate()
            bugun = bugun.getFullYear()+'-'+ay+'-'+gun; 
            var ceza_formatli = ceza_tarihi.split("-");
            ceza_formatli = ceza_formatli[2]+"/"+ceza_formatli[1]+"/"+ceza_formatli[0];

            (ceza_tarihi > bugun) ? hata = ceza_formatli+" tarihine kadar cezalısınız" : gun="boş geç";
            if(hata != "yok")
                Swal.fire({
                    title: 'Kiralama Başarısız',
                    text: hata,
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Tamam'
                    })
            else {
                Swal.fire({
                    title: 'Kiralama Başarılı',
                    icon: 'success',
                    showConfirmButton: false
                });
                setTimeout(function() {
                    window.location.href = '../php/islem.php?islem=kirala&id='+kitap_id; 
                }, 1500);
            }      
        }

        function teslimEt(kira_id,kitap_id) {
            Swal.fire({
                    title: 'Teslim İşlemi Başarılı',
                    icon: 'success',
                    showConfirmButton: false
                });
                setTimeout(function() {
                    window.location.href = '../php/islem.php?islem=teslim_et&id='+kitap_id+'&kira_id='+kira_id; 
                }, 1500);            
        }

        function fav(kitap_id) {
            var fav_durum = <?= $favori ?>;
            if(fav_durum == '0') // favori ekle
                window.location.href = '../php/islem.php?islem=favla&id='+kitap_id; 
            else // favori kaldır
                window.location.href = '../php/islem.php?islem=unfavla&kitap_id='+kitap_id+'&id='+fav_durum; 
        }

        window.onload = function() { // buton ve favori belirleme
            var fav_durum = <?= $favori ?>;
            if(fav_durum != '0') { // favorilere ekliyse
                var fav = document.querySelector("#fav");
                fav.classList.remove("fa-regular");
                fav.classList.add("fa-solid");
            }            

            kiralik_mi = <?= $durum ?>;
            if(kiralik_mi){ // aktif kiralıksa                
            var kira_buton = document.querySelector("#kira_buton");    
            var teslim_buton = document.querySelector("#teslim_buton");
            var info_box = document.querySelector(".info-box");
            teslim_buton.style.display = "block";
            info_box.replaceChild(teslim_buton,kira_buton);

            var info = document.querySelector(".baslik-info");           
            var baslik = document.createElement("h5");
            var mesaj = document.createElement("span");
            mesaj.textContent = "*Son teslim tarihi: <?= $son_tarih ?>";
            mesaj.classList.add("badge");
            mesaj.classList.add("bg-secondary");
            mesaj.style.color = "black";
            baslik.appendChild(mesaj);
            info.appendChild(baslik);
            }
        }
    </script>    
</body>
</html>