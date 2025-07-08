<?php
include 'koneksi.php';

$nama   = $_POST['name'];
$email  = $_POST['email'];
$pesan  = $_POST['message'];

// Simpan ke database
$sql = "INSERT INTO pesan (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
mysqli_query($conn, $sql);

// Kirim ke email
$to      = "aan.f4r4n@gmail.com"; // Email kamu
$subject = "Pesan Baru dari $nama";
$message = "Nama: $nama\nEmail: $email\nPesan:\n$pesan";
$headers = "From: $email";

mail($to, $subject, $message, $headers);

// Tampilkan pesan sukses
echo "<script>alert('Pesan berhasil dikirim dan disimpan!'); window.location.href='contact.php';</script>";

mysqli_close($conn);
