$umur; <br>
if (isset($umur) && $umur >= 18) {
    <br>echo " Anda sudah dewasa."; <br>
} else {
    <br>echo "Anda belum dewasa atau variabel 'umur' tidak ditemukan.";
}
<br><br>
$data = array("nama" => "Jane", "usia" => 25); <br>
if (isset($data["nama"])) {
    <br>echo "Nama: " . $data["nama"]; <br>
} else {
    <br>echo "Variabel 'nama' tidak ditemukan dalam array.";
}