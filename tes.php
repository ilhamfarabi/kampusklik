<?php
$koneksi = mysqli_connect("localhost", "root", "", "contoh") or die();
//var_dump($koneksi);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://irvankedesmm.co.id/api/services',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'api_id=847&api_key=7rubwz-zvygyp-cmthet-kpyuux-53aiyz',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
    ),
));

$response = curl_exec($curl);
$proses = json_decode($response, true);
curl_close($curl);
// echo $response;

foreach ($proses['data'] as $key) {
    $idnya = $key['id'];
    $namanya = $key['name'];
    $typenya = $key['type'];
    $categorynya = $key['category'];
    $price = $key['price'];
    $min = $key['min'];
    $max = $key['max'];
    $refill = $key['refill'];
    $status = $key['status'];
    $note = $key['note'];
    $masukin_kedb = mysqli_query($koneksi, "INSERT INTO daftar_harga (id_layanan, name, type, category, price, min,	max, refill, status, note) VALUES
    ('$idnya', '$namanya', '$typenya', '$categorynya','$price','$min','$max','$refill','$status','". htmlentities($note)."')");
    if ($masukin_kedb) {
        echo 'id '.$idnya.' berhasil dimasukkan ke database<br>';
    }
}