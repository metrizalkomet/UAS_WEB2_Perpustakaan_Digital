<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

    <div class="container">

        <h1>Tambah Buku</h1>

        <?php if (validation_errors()): ?>

            <div class="error">
                <?= validation_errors() ?>
            </div>

        <?php endif; ?>

        <form method="post" action="<?= base_url('index.php/buku/tambah') ?>">

            <label>Judul Buku</label>

            <input
                type="text"
                name="judul"
                value="<?= set_value('judul') ?>"
            >

            <label>Penulis</label>

            <input
                type="text"
                name="penulis"
                value="<?= set_value('penulis') ?>"
            >

            <label>Penerbit</label>

            <input
                type="text"
                name="penerbit"
                value="<?= set_value('penerbit') ?>"
            >

            <label>Tahun Terbit</label>

            <input
                type="number"
                name="tahun_terbit"
                value="<?= set_value('tahun_terbit') ?>"
            >

            <label>Kategori</label>

            <input
                type="text"
                name="kategori"
                value="<?= set_value('kategori') ?>"
            >

            <label>Jumlah</label>

            <input
                type="number"
                name="jumlah"
                value="<?= set_value('jumlah') ?>"
            >

            <button type="submit" class="btn-tambah">
                Simpan
            </button>

            <a
                href="<?= base_url('index.php/buku') ?>"
                class="btn-hapus"
            >
                Kembali
            </a>

        </form>

    </div>

</body>

</html>