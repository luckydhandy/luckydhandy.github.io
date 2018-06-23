<?php
/* tentukan email penerima */
$myemail  = "luckydhandy791991@gmail.com";
/* Mengecek semua kolom input menggunakan  function check_input */
$yourname = check_input($_POST['name'], "Masukkan nama anda");
$email  = check_input($_POST['email'], "Tulis subject");
$phone    = check_input($_POST['phone']);
$whatsapp  = check_input($_POST['whatsapp']);
$ukuranrumahtanah  = check_input($_POST['ukuranrumahtanah']);
$jumlahkamar  = check_input($_POST['jumlahkamar']);
$dinding  = check_input($_POST['dinding']);
$dapurdindingbelakang  = check_input($_POST['dapurdindingbelakang']);
$pagar = check_input($_POST['pagar']);
$message= check_input($_POST['message'], "Tuliskan pertanyaan atau komentar anda");
/* Jika e-mail tidak valid, tampilkan pesan error */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("Alamat e-mail tidak valid");
}
/* If URL is not valid set $website to empty */
if (!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i", $website))
{
    $website = '';
}
/* Isi pesan di kotak masuk e-mail anda */
$message = "Hallo..,!
Ada pesan baru dari contact form:
Nama: $yourname
Phone: $phone
E-mail: $email
WhatsApp: $whatsapp
Ukuran Rumah / Tanah: $ukuranrumahtanah
Jumlah Kamar: $jumlahkamar
Dinding: $dinding
Dapur dan Dinding Belakang: $dapurdindingbelakang
Pagar: $pagar

Pertanyaan/Komentar:
$message
";
/* Mengrim pesan menggunakan mail() function */
mail($myemail, $subject, $message);
/* Alihkan pengunjung ke halaman sukses */
header('Location: Success.html');
exit();
/* Functions yg kita gunakan */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}
function show_error($myError)
{
?>
    <html>
    <body>
    <b>Eror! Tolong lengkapi formulir pemesanan anda.</b><br />
    <?php echo $myError; ?><a href="Contactus.html"> Kembali ke form</a>
    </body>
    </html>
<?php
exit();
}
?>