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
    <div class="container-fluid" style="margin-top: 5%;">
        <form action="" method="POST" class="row-fluid">

            <div class="card">
                <div class="card-header">
                    Form Pengembalian
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('coba')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Telah di kembalikan</strong> <?= $this->session->flashdata('coba'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <?php $this->session->sess_destroy(); ?>
                                </div>
                            <?php endif; ?>
                            <!-- form 1 -->
                            <div class="form-group">
                                <label for="">Nama Peminjam</label>
                                <input readonly type="text" name="" id="" class="form-control" value="<?= $user['nama_peminjam']; ?>">

                            </div>
                            <div class="form-group">
                                <label for="">Divisi</label>
                                <input readonly type="text" name="" id="" class="form-control" value="<?= $user['divisi']; ?>">

                            </div>
                            <div class="form-group">
                                <label for="namaalat">Nama Alat</label>
                                <input readonly type="text" name="namaalat" id="namaalat" class="form-control" value="<?= $user['nama_unit']; ?>">

                            </div>
                            <div class="form-group">
                                <label for="kodealat">Kode Alat</label>
                                <input readonly type="text" name="kodealat" id="kodealat" class="form-control" value="<?= $user['kode_alat']; ?>">

                            </div>
                            <div class="form-group">
                                <label for="penerima">Penerima</label>
                                <select class="form-control" id="penerima" name="penerima">
                                    <option selected disabled style="display: none;">Pilih Operator</option>
                                    <option value="putu dedi">Putu Dedi</option>
                                    <option value="rizki auliya">Rizki Auliya</option>
                                    <option value="erik">Erik</option>
                                    <option value="kristin">Kristin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kondisi">Kondisi Setelah Peminjaman</label>
                                <select class="form-control" id="kondisi" name="kondisi">
                                    <option value="OK">OK</option>
                                    <option value="NOT OK">NOT OK</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggalpengembalian">Tanggal pengembalian</label>
                                <input type="text" placeholder="dd/mm/yyyy" name="tanggalpengembalian" class="form-control" id="date" autocomplete="off">
                            </div>
                        </div>
                        <input hidden type="text" name="id_alat1" id="id_alat1" value="<?= $user['idalat']; ?>">
                        <input hidden type="text" name="id_user" id="id_user" value="<?= $user['no']; ?>">
                        <input hidden type="text" name="status_user" id="status_user" value="">
                        <input hidden type="text" name="status_utama" id="status_utama" value="">
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="durasi">Waktu Penggunaan</label>
                                <div class="row align-items-start">
                                    <div class="col-2">
                                        <select class="form-control" id="jam" name="jam">
                                            <option value="00" style="display: none;">Jam</option>
                                            <?php foreach ($jam as $j) : ?>
                                                <option placeholder="jam" value="<?= sprintf("%02d", $j); ?>"><?= sprintf("%02d", $j); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <select class="form-control" id="menit" name="menit">
                                            <option value="00" style="display: none;">Menit</option>
                                            <?php foreach ($menit as $m) : ?>
                                                <option placeholder="menit" value="<?= sprintf("%02d", $m); ?>"><?= sprintf("%02d", $m); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <select class="form-control" id="detik" name="detik">
                                            <option value="00" style="display: none;">Detik</option>
                                            <?php foreach ($detik as $d) : ?>
                                                <option placeholder="detik" value="<?= sprintf("%02d", $d); ?>"><?= sprintf("%02d", $d); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah Penggunaan</label>
                                <input type="text" name="jumlah" id="jumlah" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="Keterangan">Keterangan Tambahan</label>
                                <textarea class="form-control" rows="3" name="keterengan" id="keterangan"></textarea>
                            </div>
                            <span class="float-right">
                                <a href="<?= base_url() ?>qualitycontrol/user/<?= $user['no']; ?>" class="btn btn-primary ">Back</a>
                                <button type="submit" name="tambah" class="btn btn-success ">Submit</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- bootstrap -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $('#date').datepicker({
            dateFormat: 'dd-mm-yy'
        }).val();
        $("#date").datepicker().datepicker("setDate", new Date());
    </script>

</body>

</html>