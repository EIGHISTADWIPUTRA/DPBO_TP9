<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("view/TampilMahasiswa.php");

$tp = new TampilMahasiswa();

// Proses Form Submit
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'submit_add' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        // Proses tambah data
        $tp->prosesAdd($_POST);
    } else if ($_GET['action'] == 'submit_edit' && isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        // Proses edit data
        $tp->prosesEdit($_GET['id'], $_POST);
    }
}

// Tampilkan view
$tp->tampil();
