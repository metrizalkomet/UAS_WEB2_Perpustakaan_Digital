<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Perpustakaan Digital</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

    <div class="container">

        <h1>Perpustakaan Digital</h1>

        <h2>Daftar Buku</h2>

        <form method="get" action="<?= base_url('index.php/buku') ?>">

            <input
                type="text"
                name="keyword"
                placeholder="Cari judul, penulis, atau kategori..."
                value="<?= isset($keyword) ? html_escape($keyword) : '' ?>"
            >

            <button type="submit" class="btn-tambah">
                Cari
            </button>

            <?php if (!empty($keyword)): ?>

                <a
                    href="<?= base_url('index.php/buku') ?>"
                    class="btn-hapus"
                >
                    Reset
                </a>

            <?php endif; ?>

        </form>

        <?php if ($this->session->flashdata('success')): ?>

            <div class="success" id="success-message">
                <?= html_escape($this->session->flashdata('success')) ?>
            </div>

        <?php endif; ?>

        <a
            class="btn-tambah"
            href="<?= base_url('index.php/buku/tambah') ?>"
        >
            + Tambah Buku
        </a>

        <?php
        $start = $this->input->get('per_page');

        if (!$start) {
            $start = 0;
        }

        $no = (int) $start + 1;
        ?>

        <table>

            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>

            <?php foreach ($buku as $item): ?>

                <tr>

                    <td><?= $no++ ?></td>

                    <td><?= html_escape($item->judul) ?></td>

                    <td><?= html_escape($item->penulis) ?></td>

                    <td><?= html_escape($item->penerbit) ?></td>

                    <td><?= html_escape($item->tahun_terbit) ?></td>

                    <td><?= html_escape($item->kategori) ?></td>

                    <td><?= html_escape($item->jumlah) ?></td>

                    <td>

                        <a
                            class="btn-edit"
                            href="<?= base_url('index.php/buku/edit/' . $item->id) ?>"
                        >
                            Edit
                        </a>

                        <a
                            class="btn-hapus"
                            href="<?= base_url('index.php/buku/hapus/' . $item->id) ?>"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')"
                        >
                            Hapus
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </table>

        <?php if (!empty($pagination)): ?>

            <?= $pagination ?>

        <?php endif; ?>

    </div>

    <script>
        setTimeout(function() {

            var message = document.getElementById('success-message');

            if (message) {
                message.style.display = 'none';
            }

        }, 3000);
    </script>

</body>

</html>