<?php
  $kota_asal = 196;
  $kota_tujuan = $_POST['destination'];
  $kurir = $_POST['courier'];
  $berat = $_POST['weight'];

  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=".$kota_asal."&destination=".$kota_tujuan."&weight=".$berat."&courier=".$kurir."",
    CURLOPT_HTTPHEADER => array(
      "content-type: application/x-www-form-urlencoded",
      "key: d65e62854ebab5d24f32ecdedc8b8d63"
    ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  $data = json_decode($response, true);
  $servis = $data['rajaongkir']['results'][0]['costs'][0]['service'];

  // echo "<option disabled selected>Pilih Layanan</option>";
  foreach ($data['rajaongkir']['results'][0]['costs'] as $value) {
    foreach ($value['cost'] as $tarif) {
      echo "<option value='".$tarif['value']."' hargakurir='".$tarif['value']."'>".$servis."-".number_format($tarif['value'],0,",",".")."</option>";
    }
  }


 // $kotaasal=$data['rajaongkir']['origin_details']['city_name'];
 // $provinsiasal=$data['rajaongkir']['origin_details']['province'];
 // $kotatujuan=$data['rajaongkir']['destination_details']['city_name'];
 // $provinsitujuan=$data['rajaongkir']['destination_details']['province'];
 // $berat=$data['rajaongkir']['query']['weight']/1000;
