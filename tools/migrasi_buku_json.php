<?php
require __DIR__ . '/../includes/koneksi.php';

$file = __DIR__ . '/../data/buku.json';
if (!is_file($file)) {
    die("File data/buku.json tidak ditemukan.\n");
}
$data = json_decode(file_get_contents($file), true);
if (!is_array($data)) {
    die("Isi buku.json bukan JSON yang valid.\n");
}

$stmt = $pdo->prepare(
    "INSERT INTO buku (judul, pengarang, tahun, isbn, stok, kategori)
     VALUES (:judul, :pengarang, :tahun, :isbn, :stok, :kategori)"
);

$cek = $pdo->prepare("SELECT 1 FROM buku WHERE judul = :judul AND pengarang = :pengarang");

$masuk = 0;
$lewat = 0;
foreach ($data as $b) {
    $cek->execute(['judul' => $b['judul'], 'pengarang' => $b['pengarang']]);
    if ($cek->fetchColumn()) {
        $lewat++;      
        continue;
    }
    $stmt->execute([
        'judul'     => $b['judul'],
        'pengarang' => $b['pengarang'],
        'tahun'     => (int) $b['tahun'],
        'isbn'      => $b['isbn'] ?? null,        
        'stok'      => (int) $b['stok'],
        'kategori'  => $b['kategori'] ?? null,
    ]);
    $masuk++;
}

echo "Selesai. Dimasukkan: $masuk buku, dilewati (sudah ada): $lewat buku.\n";