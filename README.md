# Kütüphane Yönetim Sistemi

## Kullanılan Teknolojiler:
Bu sistem geliştirilirken web sayfalarını oluşturmak için HTML, web sayfalarının görselliği için CSS, Bootstrap ve Sweetalert2, web sayfaları ile etkileşim için JavaScript, sunucu etkileşimi için PHP, veri tabanı yönetimi için phpMyAdmin kullanılmıştır. 

## Veri Tabanı Tasarımı:
![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/44d0f805-29a8-47bd-a9b9-5d321739d5d4)

## Sistemin Çalışma Mantığı:
Kütüphane yönetim sisteminin temel çalışma mantığı yöneticiler tarafından sisteme eklenen kitapların kullanıcılar tarafından kiralanıp teslim edilebilmesi ve kiralama işlemlerinin takip edilmesidir. 

Tasarlanan bu sistemde en temel 2 kural şunlardır: 
- Sistem kullanıcıların aktif olarak aynı anda en fazla 3 kiralama yapmasına müsaade eder. Aktif olarak 3 adet kirası bulunan kullanıcı yeni bir kiralama yapabilmesi için kiraladığı kitaplardan en az 1 tanesini teslim etmesi gerekir. 

- Kiralanan bir kitabın teslim edilmesi için verilen süre 20 gündür. Bir kiralama işlemi gerçekleştiğinde son teslim tarihi sistem tarafından hesaplanır ve kaydedilir. Eğer kitap teslim edilmesi gereken tarihten geç bir tarihte teslim edilirse kullanıcı geciktirdiği gün kadar ceza alır ve ceza bitene kadar yeni bir kiralama işlemi gerçekleştiremez.

## Admin Arayüzü:
Sistem yöneticisi sisteme giriş yapmak için ‘loginadmin.php’ sayfasındaki giriş formuna admin adını ve şifresini yazar. Sistem yöneticisi için tanımlanan admin adı ‘admin’, şifresi ‘1234’ şeklindedir. Giriş denemesinin sonucunu sistem bildirir ve eğer giriş başarılı ise ‘pages’ klasöründeki ‘panel.php’ sayfasına yönlendirir. Yöneticinin sistemle ilgili tüm kontrollerini sağladığı yer yönetim panelidir. Yönetici yönetim panelinde veri ekleme, silme ve güncelleme işlemleri yapabilir. Veri eklenirken ‘Id’ bilgisi sistem tarafından otomatik atanır. Kitap ekleme işleminde girilecek olan yazar, yayınevi ve kategori bilgileri veri tabanında daha önce tanımlanmış olan bilgilerdir ve sistem tarafından yöneticiye sunulup bir tanesinin seçilmesini sağlar. Güncellenmek istenen bilginin üzerine tıklanarak açılan formda bilgi görüntülenir ve güncelleme yapılabilir. ‘Id’ bilgisi hariç diğer bilgiler güncellenebilir.

### Admin Arayüzü Örnek Ekran Görüntüleri:

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/a783eee5-f986-43a0-a4f4-d34cf022d1f1)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/97083964-9a91-46ff-85e5-209d68c213f3)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/f8067518-efaa-43a9-b110-9b32a263e8b2)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/a05cf635-9f39-4db5-96db-d34a6c916b5a)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/2a703ccd-6138-472a-b10d-dc2fba8b0c36)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/f8a6f7bc-ac44-4266-9098-3c4422e8086a)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/1b0b3ebd-5374-44a3-acb3-7b5c1c632458)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/9ed002b6-a7a6-4d99-901e-599c7f909e41)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/6fee69b6-a0d5-4538-bb9a-778d6b88771b)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/8f5350a3-0dbb-4495-b5ed-934feb80025d)

## Kullanıcı Arayüzü:
Kullanıcıların görebileceği bütün sayfalar RWS kurallarına uygun hazırlanmıştır. Kullanıcıların sistemde yapabileceği temel işlemler şunlardır:

- Sisteme kaydolma ve giriş yapma
- Bilgilerini güncelleme
- Kitap arama ve filtreleme
- Kitap, yazar ve yayınevi görüntüleme
- Kitap kiralama ve teslim etme
- Kitabı favorilere ekleme ve çıkarma
- Geçmiş işlemlerini görüntüleme

Sisteme bir kullanıcı girdiğinde ilk göreceği ekran giriş ekranı olan ‘login.php’ sayfasıdır. Sisteme kaydolmak istenirse giriş sayfasında bulunan ‘Kaydol’ yazısına tıklayarak kayıt formu ekrana gelir. Sisteme giriş yapılmadan bir sayfa görüntülenmek istenirse bu sayfaya yönlendirme yapılır. Kullanıcılar mail adresi ve şifresiyle giriş yaparak ‘pages’ klasöründeki ‘anasayfa.php’ sayfasına yönlendirilir ve kullanıcı sistemi kullanmaya başlar.

### Kullanıcı Arayüzü Örnek Ekran Görüntüleri

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/276fffdc-d57f-4852-a99e-efbd35da5424)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/b6329775-ce6e-4355-ae1c-1dc3faa99c57)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/0344f60c-6a1d-4bd8-87c6-bca5b17bcc71)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/4ea15884-4330-4322-ad4f-fababea39222)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/b18f86fd-2ac5-4caf-8f16-bbc36b8a92e0)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/8428b0de-5083-46ad-b3e3-a2923537ecf0)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/1f81176f-79f7-4288-aabd-b70538415b86)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/d9ba145f-8e15-4e82-b0ad-26d053c763a0)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/848a5bc5-fb2b-430e-b534-ad942870d69d)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/6de0ab5e-3f7f-44ce-b636-8faa819821ed)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/2c93173b-6668-422a-bd61-40b9ab25356e)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/1e62403d-e604-44f2-ab35-02a2d9604c29)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/039c36a0-eed1-4407-abf0-12fa367721e9)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/380efce2-ee0f-4b00-8d98-e8d91f53f172)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/3a71d303-667a-421e-8c9a-ec6cd59e0408)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/580d674c-7cff-4624-b9e6-da3ac1fda822)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/5940fad6-2247-4f96-8702-32227d01d1ec)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/0337e150-0158-4d11-9e17-824e507aa18e)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/f4173fcf-2fb7-4358-8490-d04c909a88a8)

![image](https://github.com/smtttlck/kutuphane-otomasyonu/assets/61507892/8f81d547-41c0-42d0-bc12-f6cda68949b1)
