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
                    <a class="nav-item nav-link" href="<?= base_url() ?>qualitycontrol">Quality Control</a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>sarpras">Sarana Prasarana</a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>Maintenance">Maintenance</a>
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
                <img class="img-fluid text-center" alt="header" src="<?= base_url() ?>tambahan/img/<?= $qualitycontrol['gambar']; ?>">
                <div class="row" style="margin-top: 2%;">
                    <!-- <div class="form-group">
                        <span class="col-lg-2 col-sm-2">
                            <a href="<?= base_url() ?>qualitycontrol" class="btn btn-primary btn-sm"><i class="fa fa-step-backward"></i> Back</a>
                        </span>
                        <span class="col-lg-2 col-sm-2" style="margin-left: -10%;">
                            <?php if ($qualitycontrol['status'] === "1") : ?>
                                <span style="color:red; margin-left:5%;" disabled="true"><i class="fas fa-exclamation-triangle"></i></span>
                            <?php elseif ($qualitycontrol['status'] === "2") : ?>
                                <span style="color:green; margin-left:5%;" disabled="true"><i class="fas fa-exclamation-triangle"></i></span>
                            <?php else : ?>
                                <a href="<?= base_url() ?>qualitycontrol/pinjam/<?= $qualitycontrol['id']; ?>" class="btn btn-success btn-sm">Pinjam</a>
                            <?php endif; ?>
                        </span>
                    </div> -->

                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="row-fliud">
                        <span class="col">
                            <a href="<?= base_url() ?>qualitycontrol" class="btn btn-primary btn-sm"><i class="fa fa-step-backward"></i> Back</a>
                        </span>
                        <?php if ($qualitycontrol['status'] === "1") : ?>
                            <span class="col" style=" color:red; margin-left:5%;" disabled="true"><i class="fas fa-exclamation-triangle"></i></span>
                        <?php elseif ($qualitycontrol['status'] === "2") : ?>
                            <span class="col" style="color:green; margin-left:5%;" disabled="true"><i class="fas fa-exclamation-triangle"></i></span>
                        <?php else : ?>
                            <span class="col">
                                <a href="<?= base_url() ?>qualitycontrol/pinjam/<?= $qualitycontrol['id']; ?>" class="btn btn-success btn-sm">Pinjam</a>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <table class="table table-striped ">
                    <tbody>
                        <tr>
                            <th>Status</th>
                            <td>
                                <?php if (($qualitycontrol['status'] == "1")) : ?>
                                    Dipinjam Oleh <?= $user['nama_peminjam']; ?> Selaku Divisi <?= $user['divisi']; ?> Pada Tanggal <?= $user['tanggal_peminjaman']; ?>
                                <?php else : ?>
                                    Barang Ready
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Klasifikasi</th>
                            <td><?= $qualitycontrol['klasifikasi']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Alat</th>
                            <td><?= $qualitycontrol['nama_alat']; ?></td>
                        </tr>
                        <tr>
                            <th>Kode</th>
                            <td><?= $qualitycontrol['kode']; ?></td>
                        </tr>
                        <tr>
                            <th>Serial Number</th>
                            <td><?= $qualitycontrol['serial_number']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <td><?= $qualitycontrol['tanggal_masuk']; ?></td>
                        </tr>
                        <tr>
                            <th>Supplier</th>
                            <td><?= $qualitycontrol['supplier']; ?></td>
                        </tr>
                        <tr>
                            <th>lokasi</th>
                            <td><?= $qualitycontrol['lokasi']; ?></td>
                        </tr>
                        <tr>
                            <th>Kondisi</th>
                            <td><?= $qualitycontrol['kondisi']; ?></td>
                        </tr>
                        <tr>
                            <th>Fungsi</th>
                            <td><?= $qualitycontrol['fungsi']; ?></td>
                        </tr>
                        <tr>
                            <th>Total Waktu Pemakaian</th>
                            <td><?= $qualitycontrol['total_waktu']; ?></td>
                        </tr>
                        <tr>
                            <th>SOP</th>
                            <td>
                                <?php if ($qualitycontrol['sop'] === "") : ?> <span style="color:red;" disabled="true"><i class="fas fa-times"></i></span>
                                <?php else : ?>
                                    <a href="<?= base_url() ?>tambahan/sop/<?= $qualitycontrol['sop']; ?>" target="_blank"><i class="fas fa-file-pdf"></i> Click</a>
                                <?php endif; ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Manual Book</th>
                            <td>
                                <?php if ($qualitycontrol['manual'] === "") : ?> <span style="color:red;" disabled="true"><i class="fas fa-times"></i></span>
                                <?php else : ?>
                                    <a href="<?= base_url() ?>tambahan/manual/<?= $qualitycontrol['manual']; ?>" target="_blank"><i class="fas fa-file-pdf"></i>Click</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Riwayat Alat</th>
                            <td>
                                <?php if ($qualitycontrol['riwayat'] === "") : ?> <span style="color:red;" disabled="true"><i class="fas fa-times"></i></span>
                                <?php else : ?>
                                    <a href="<?= base_url() ?>tambahan/riwayat/<?= $qualitycontrol['riwayat']; ?>" target="_blank"><i class="fas fa-file-pdf"></i>Click</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Sertifikat Kalibrasi</th>
                            <td>
                                <?php if ($qualitycontrol['sertif_kalibrasi'] === "") : ?> <span style="color:red;" disabled="true"><i class="fas fa-times"></i></span>
                                <?php else : ?>
                                    <a href="<?= base_url() ?>tambahan/sertif/<?= $qualitycontrol['sertif_kalibrasi']; ?>" target="_blank"><i class="fas fa-file-pdf"></i>Click</a>
                                <?php endif; ?>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>

    </div>