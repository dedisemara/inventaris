<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

</head>

<body id="home">
    <!--navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>home">Elitech</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="<?= base_url() ?>qualitycontrol">Table Utama</a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>qualitycontrol/tambah">Tambah data</a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>qualitycontrol/editdata">Ubah Data</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid" style="margin-top: 4%;">
        <div class="col">
            <?php if ($this->session->flashdata('hapus')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Peminjaman</strong> <?= $this->session->flashdata('hapus'); ?>
                </div>
                <?php $this->session->sess_destroy(); ?>
            <?php endif; ?>
        </div>
        <div class="col">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                        <th class="text-center">Peminjam</th>
                        <th class="text-center">Divisi</th>
                        <th class="text-center">Nama Alat</th>
                        <th class="text-center">Kode Alat</th>
                        <th class="text-center">Tanggal Peminjaman</th>
                        <th class="text-center">Waktu order</th>
                        <th class="text-center">Nama Operator</th>
                        <th class="text-center">Kondisi Sebelum</th>
                        <th class="text-center">Kondisi Sesudah</th>
                        <th class="text-center">Tanggal Pengembalian</th>
                        <th class="text-center">Waktu Penggunaan</th>
                        <th class="text-center">Jumlah Penggunaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1; ?>
                    <?php foreach ($peminjamans as $pj) : ?>
                        <tr id="<?= $pj['no']; ?>">
                            <?php if ($pj['kondisi_pengembalian'] === "NOT OK") : ?>
                                <script>
                                    var element = document.getElementById("<?= $pj['no']; ?>");
                                    element.classList.add("table-danger");
                                </script>
                            <?php endif; ?>
                            <td><?= $a++; ?></td>
                            <td>
                                <?php if (($pj['status1'] == "1") && ($pj['tanggal_pengembalian'] == "")) : ?>
                                    <button class="badge badge-warning">Proses</button>
                                <?php elseif (($pj['status1'] == "") && ($pj['tanggal_pengembalian'] == "")) : ?>
                                    <button class="badge badge-danger">Dipinjam</button>
                                <?php else : ?>
                                    <button class="badge badge-success">Dikembalikan</button>
                                <?php endif; ?>
                            </td>
                            <td class="row text-center">
                                <div class="col">
                                    <?php if (($pj['status1'] == "1") && ($pj['tanggal_pengembalian'] == "")) : ?>
                                        <form action="" method="post">
                                            <input hidden type="text" name="id_alat1" id="id_alat1" value="<?= $pj['idalat']; ?>">
                                            <input hidden type="text" name="id_user" id="id_user" value="<?= $pj['no']; ?>">
                                            <input hidden type="text" name="status_user" id="status_user" value="">
                                            <input hidden type="text" name="status_utama" id="status_utama" value="1">
                                            <button class="badge badge-warning">konfirm</button>
                                        </form>
                                        <a href="<?= base_url() ?>qualitycontrol/hapus/<?= $pj['no']; ?>" onclick="return confirm('Apakah Anda Yakin Membatalkan Proses peminjaman?');"><button class="badge badge-danger">batal</button></a>
                                </div>
                                <div class="col">
                                <?php elseif (($pj['status1'] == "") && ($pj['tanggal_pengembalian'] == "")) : ?>
                                    <a href="<?= base_url() ?>qualitycontrol/pengembalian/<?= $pj['no']; ?>"><button class="badge badge-danger">form</button></a>
                                </div>
                                <div class="col">
                                <?php else : ?>
                                    -
                                <?php endif; ?>
                                </div>
                            </td>
                            <td><?= $pj['nama_peminjam']; ?></td>
                            <td><?= $pj['divisi']; ?></td>
                            <td><?= $pj['nama_unit']; ?></td>
                            <td><?= $pj['kode_alat']; ?></td>
                            <td><?= $pj['tanggal_peminjaman']; ?></td>
                            <td><?= $pj['waktu']; ?></td>
                            <td><?= $pj['nama_operator']; ?></td>
                            <td><?= $pj['kondisi']; ?></td>
                            <td><?= $pj['kondisi_pengembalian']; ?></td>
                            <td><?= $pj['tanggal_pengembalian']; ?></td>
                            <td><?= $pj['waktu_penggunaan']; ?></td>
                            <td><?= $pj['jumlah_penggunaan']; ?></td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "scrollX": true
            });
        });
    </script>
</body>

</html>