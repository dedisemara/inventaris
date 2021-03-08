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
    <div class="container-fluid" style="margin-top: 60px;">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Form Peminjaman
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('coba')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Menunggu Konfirmasi</strong> <?= $this->session->flashdata('coba'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php $this->session->sess_destroy(); ?>
                            </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="form-group" hidden>
                                <label for="id_unit">ID Alat</label>
                                <input readonly type="text" name="id_unit" id="id_unit" class="form-control" value="<?= $qualitycontrol['id']; ?>">
                                <small id="" class="form-text text-muted">Jangan Dirubah!</small>
                            </div>
                            <div class="form-group">
                                <label for="namaalat">Nama Alat</label>
                                <input readonly type="text" name="namaalat" id="namaalat" class="form-control" value="<?= $qualitycontrol['nama_alat']; ?>">
                                <small id="" class="form-text text-muted">Jangan Dirubah!</small>
                            </div>
                            <div class="form-group">
                                <label for="kodealat">Kode Alat</label>
                                <input readonly type="text" name="kodealat" id="kodealat" class="form-control" value="<?= $qualitycontrol['kode']; ?>">
                                <small id="" class="form-text text-muted">Jangan Dirubah!</small>
                            </div>
                            <div class="form-group" hidden>
                                <label for="kodealat">Kondisi</label>
                                <input type="text" name="kondisi" id="kondisi" class="form-control" value="<?= $qualitycontrol['kondisi']; ?>">
                                <small id="" class="form-text text-muted">Jangan Dirubah!</small>
                            </div>
                            <div class="form-group">
                                <label for="namapeminjam">Nama Peminjam</label>
                                <input type="text" name="namapeminjam" id="namapeminjam" autocomplete="off" class="form-control">
                                <small id="" class="form-text text-muted">Contoh : Dedi Semara</small>
                            </div>
                            <div class="form-group">
                                <label for="divisi">Divisi</label>
                                <select class="form-control" id="divisi" name="divisi">
                                    <option selected disabled style="display: none;">Pilih Divisi</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Quality Control">Quality Control</option>
                                    <option value="Production">Production</option>
                                    <option value="R&D">R&D</option>
                                    <option value="Sarana Kesehatan">Sarana Kesehatan</option>
                                    <option value="Laboratorium">Laboratorium</option>
                                    <option value="GBMP">GBMP</option>
                                    <option value="After Sales & Perbaikan">After Sales & Perbaikan</option>
                                    <option value="Logistic">Logistic</option>
                                    <option value="PID">PID</option>
                                    <option value="Admin">Admin</option>
                                    <option value="GK & PPIC">GK & PPIC</option>
                                    <option value="Sarana Lingkungan">Sarana Lingkungan</option>
                                    <option value="Maintenance">Maintenance</option>
                                    <option value="IT">IT</option>
                                    <option value="GBJ">GBJ</option>
                                </select>
                                <small id="" class="form-text text-muted">Sesuai Divisi Masing-Masing</small>
                            </div>
                            <div class="form-group">
                                <label for="tanggalpeminjaman">Tanggal Peminjaman</label>
                                <input type="text" placeholder="dd/mm/yyyy" name="tanggalpeminjaman" class="form-control" id="date" autocomplete="off">
                            </div>
                            <span class="float-right"> <a href="<?= base_url() ?>qualitycontrol" class="btn btn-primary ">Back</a>
                                <?php if ($qualitycontrol['status'] === "1") : ?>
                                    <span style="color:red; margin-left:5%;" disabled="true"><i class="fas fa-exclamation-triangle"></i></span>
                                <?php elseif ($qualitycontrol['status'] === "2") : ?>
                                    <span style="color:green; margin-left:5%;" disabled="true"><i class="fas fa-exclamation-triangle"></i></span>
                                <?php else : ?>
                                    <button type="submit" name="tambah" class="btn btn-success ">Pinjam</button>
                                <?php endif; ?>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

            </div>
        </div>
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