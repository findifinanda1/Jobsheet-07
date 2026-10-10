<?php
$page_title = "Debug Session";
include __DIR__ . '/includes/header.php';
?>

<section>
    <h2>Isi Raw $_SESSION</h2>
    <p>Berikut adalah seluruh data yang sedang tersimpan dalam sesi saat ini:</p>
    <pre style="background: #1e1e1e; color: #00ff00; padding: 1rem; border-radius: 6px; overflow-x: auto; margin-top: 1rem; font-family: monospace; text-align: left;"><?php print_r($_SESSION); ?></pre>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>