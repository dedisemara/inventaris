<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

</head>

<body id="home">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>home">Elitech</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="<?= base_url() ?>produksi">Table Utama</a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>produksi/tambah">Tambah data</a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>produksi/logout">logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid" style="margin-top: 4%;">
        <div>
            <a href="<?= base_url() ?>produksi/tambah" class="btn btn-success">Tambah Data +</a>
        </div>
        <div class="col" style="margin-top: 1%;">
            <table id="example" class="display norwarp" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>klasifikasi</th>
                        <th>Action</th>
                        <th>Nama Alat</th>
                        <th>Merk</th>
                        <th>Tipe Ukuran</th>
                        <th>jumlah</th>
                        <th>Satuan</th>
                        <th>Kode Gambar</th>
                        <th>Kondisi</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                        <th>Kegunaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1; ?>
                    <?php foreach ($produksi as $pr) : ?>
                        <tr>
                            <td><?= $a++; ?></td>
                            <td><?= $pr['Klasifikasi']; ?></td>
                            <td>
                                <a href="<?= base_url() ?>produksi/edit/<?= $pr['No']; ?>" class="badge badge-warning" style="margin-left: 3px;">Edit</a>
                                <a href="<?= base_url() ?>produksi/detail/<?= $pr['No']; ?>" class="badge badge-success" style="margin-left: 3px;">Detail</a>
                                <a href="<?= base_url() ?>produksi/hapus/<?= $pr['No']; ?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"><button class="badge badge-danger">Hapus</button></a>
                            </td>
                            <td><?= $pr['Nama_Alat']; ?></td>
                            <td><?= $pr['Merk']; ?></td>
                            <td><?= $pr['Tipe_Ukuran']; ?></td>
                            <td><?= $pr['Jumlah']; ?></td>
                            <td><?= $pr['Satuan']; ?></td>
                            <td><img src="<?= base_url() ?>tambahan/gambar/<?= $pr['kode_Gambar']; ?>" style="width: 28px "></td>
                            <td><?= $pr['Kondisi']; ?></td>
                            <td><?= $pr['Lokasi']; ?></td>
                            <td><?= $pr['Keterangan']; ?></td>
                            <td><?= $pr['Kegunaan']; ?></td>
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
                "order": [
                    [0, "asc"],
                    [1, "asc"]
                ],
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