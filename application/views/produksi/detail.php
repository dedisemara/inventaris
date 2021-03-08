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
                    <a class="nav-item nav-link" href="<?= base_url() ?>produksi">Table Utama</a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>produksi/tambah">Tambah data</a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>login">login</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid" style="padding-top: 4%;">
        <!-- header -->

        <div class="row header">
            <div class="col-lg-6">
                <div class="alert alert-primary text-center juduldetail" role="alert">
                    Detail Alat
                </div>
                <img class="img-fluid text-center" alt="header" src="<?= base_url() ?>tambahan/gambar/<?= $produk['kode_Gambar']; ?>">
            </div>
            <div class="col-lg-6">
                <table class="table table-striped ">
                    <tbody>
                        <tr>
                            <th>Klasifikasi</th>
                            <td><?= $produk['Klasifikasi']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Alat</th>
                            <td><?= $produk['Nama_Alat']; ?></td>
                        </tr>
                        <tr>
                            <th>Merk</th>
                            <td><?= $produk['Merk']; ?></td>
                        </tr>
                        <tr>
                            <th>Tipe Ukuran</th>
                            <td><?= $produk['Tipe_Ukuran']; ?></td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td><?= $produk['Jumlah']; ?></td>
                        </tr>
                        <tr>
                            <th>Satuan</th>
                            <td><?= $produk['Satuan']; ?></td>
                        </tr>
                        <tr>
                            <th>Kondisi</th>
                            <td><?= $produk['Kondisi']; ?></td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td><?= $produk['Lokasi']; ?></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td><?= $produk['Keterangan']; ?></td>
                        </tr>
                        <tr>
                            <th>Kegunaan</th>
                            <td><?= $produk['Kegunaan']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <a href="<?= base_url() ?>produksi" class="btn btn-primary" style="margin-left: 3px;">Table Utama</a>

                </div>
            </div>
        </div>

    </div>

</body>

</html>