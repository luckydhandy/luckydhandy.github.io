<?php
/* tentukan email penerima */
$myemail  = "aaronabbyla@gmail.com";
/* Mengecek semua kolom input menggunakan  function check_input */
$name = check_input($_POST['name'], "Masukkan nama anda");
$category  = check_input($_POST['category']);
$message= check_input($_POST['message'], "Message for Groom & Bride");
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
$message = "Maaf kami tak bisa datang.
Ada pesan baru dari contact form:
Name: $name
Category: $category
Message:
$message
";
/* Mengrim pesan menggunakan mail() function */
mail($myemail, $subject, $message);
/* Alihkan pengunjung ke halaman sukses */
header('Location: thankyou.html');
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
    <?php echo $myError; ?><a href="form.html"> Kembali ke form</a>
    </body>
    </html>
<?php
exit();
}
?>