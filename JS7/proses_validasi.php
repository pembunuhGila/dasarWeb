<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"] ?? '';
    $email = $_POST["email"] ?? '';
    $errors_list = array();

    if (empty($nama)) {
        $errors_list[] = "Nama harus diisi.";
    }

    if (empty($email)) {
        $errors_list[] = "Email harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors_list[] = "Format email tidak valid.";
    }

    if (!empty($errors_list)) {
        $response = [
            'status' => 'error',
            'message' => 'Validasi gagal di server.',
            'errors' => $errors_list
        ];
    } else {
        $response = [
            'status' => 'success',
            'message' => "Data berhasil dikirim: Nama = $nama, Email = $email",
            'data' => [
                'nama' => $nama,
                'email' => $email
            ]
        ];
    }
    
    echo json_encode($response);
    exit;

} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Metode request tidak diizinkan.']);
    exit;
}
?>