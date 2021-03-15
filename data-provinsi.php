<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: d65e62854ebab5d24f32ecdedc8b8d63"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

$data = json_decode($response, true);
      echo "<option disabled selected>Pilih Provinsi</option>";
    for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
      echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
    }
