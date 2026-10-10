<?php
session_start();

session_unset();
session_destroy();

session_start();
$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Seluruh data sesi berhasil dibersihkan.'
];

header("Location: index.php");
exit;