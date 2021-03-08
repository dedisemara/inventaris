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
                    <a class="nav-item nav-link" href="<?= base_url() ?>qualitycontrol/dokumen">Table Utama</a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>qualitycontrol/tambah">Tambah data</a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>qualitycontrol/login">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid" style="margin-top: 5%;">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata('hapus')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil </strong> <?= $this->session->flashdata('hapus'); ?>
                    <?php $this->session->sess_destroy(); ?>
                </div>
            <?php endif; ?>
        </div>
        <div>
            <a href="<?= base_url() ?>qualitycontrol/tambah" class="btn btn-success">Tambah Data!</a>
        </div>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Klasifikasi</th>
                    <th>Action</th>
                    <th>Nama Alat</th>
                    <th>Kode Alat</th>
                    <th>Seria Number</th>
                    <th>Supplier</th>
                    <th>Gambar</th>
                    <th>Fungsi</th>
                    <th>SOP</th>
                    <th>Manual Book</th>
                    <th>Riwayat Alat</th>
                    <th>Tanggal Masuk</th>
                    <th>Lokasi</th>
                    <th>Kondisi</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1; ?>
                <?php foreach ($dokumen as $dk) : ?>

                    <tr>
                        <td><?= $a++; ?></td>
                        <td><?= $dk['klasifikasi']; ?></td>
                        <td>
                            <a href="<?= base_url() ?>qualitycontrol/edit/<?= $dk['id']; ?>" class="badge badge-warning" style="margin-left: 3px;">Edit</a>
                            <a href="<?= base_url() ?>qualitycontrol/hapus_alatuji/<?= $dk['id']; ?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"><button class="badge badge-danger">Hapus</button></a>
                        </td>
                        <td><?= $dk['nama_alat']; ?></td>
                        <td><?= $dk['kode']; ?></td>
                        <td><?= $dk['serial_number']; ?></td>
                        <td>
                            <?php if ($dk['supplier'] === "") : ?>
                                <?= "-"; ?>
                            <?php else : ?>
                                <?= $dk['supplier']; ?>
                            <?php endif; ?>
                        </td>
                        <td><img src="<?= base_url() ?>tambahan/img/<?= $dk['gambar']; ?>" style="width: 28px "></td>
                        <td><?= $dk['fungsi']; ?></td>
                        <td>
                            <?php if ($dk['sop'] === "") : ?> <span style="color:red;" disabled="true"><i class="fas fa-times"></i></span>
                            <?php else : ?>
                                <a href="<?= base_url() ?>tambahan/sop/<?= $dk['sop']; ?>" target="_blank"><i class="fas fa-file-pdf"></i>Click</a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($dk['manual'] === "") : ?> <span style="color:red;" disabled="true"><i class="fas fa-times"></i></span>
                            <?php else : ?>
                                <a href="<?= base_url() ?>tambahan/sop/<?= $dk['sop']; ?>" target="_blank"><i class="fas fa-file-pdf"></i>Click</a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($dk['riwayat'] === "") : ?> <span style="color:red;" disabled="true"><i class="fas fa-times"></i></span>
                            <?php else : ?>
                                <a href="<?= base_url() ?>tambahan/sop/<?= $dk['sop']; ?>" target="_blank"><i class="fas fa-file-pdf"></i>Click</a>
                            <?php endif; ?>
                        </td>
                        <td><?= $dk['tanggal_masuk']; ?></td>
                        <td><?= $dk['lokasi']; ?></td>
                        <td><?= $dk['kondisi']; ?></td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "scrollX": true,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, 'all']
                ],
                columnDefs: [{
                    visible: false,
                    targets: 1
                }],
                displayLength: 10,
                drawCallback: function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(1, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class=""bg-primary text-light><td colspan="5">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    })
                }
            });
        });
    </script>
</body>

</html>