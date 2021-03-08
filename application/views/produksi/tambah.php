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
    <div class="container-fluid" style="margin-top: 5%;">
        <?php
        $test = 'produksi/tambah';
        echo form_open_multipart($test); ?>
        <div class="card">
            <div class="card-header">
                Form Tambah Database
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?= validation_errors(); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php $this->session->sess_destroy(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-12">
                        <?php if ($this->session->flashdata('message')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Perhatian </strong><?= $this->session->flashdata('message'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php $this->session->sess_destroy(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- form 1 -->
                        <div class="form-group row">
                            <label for="klasifikasi_tambah" class="col-sm-2 col-form-label">Klasifikasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="klasifikasi_tambah" name="klasifikasi_tambah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_alat_tambah" class="col-sm-2 col-form-label">Nama Unit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_alat_tambah" name="nama_alat_tambah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="merk_tambah" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="merk_tambah" name="merk_tambah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipe_ukuran_tambah" class="col-sm-2 col-form-label">Tipe/Ukuran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tipe_ukuran_tambah" name="tipe_ukuran_tambah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_tambah" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jumlah_tambah" name="jumlah_tambah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="satuan_tambah" class="col-sm-2 col-form-label">Satuan</label>
                            <div class="col-sm-10">
                                <select class="form-control" aria-placeholder="pcs" id="satuan_tambah" name="satuan_tambah">
                                    <option value="pcs">pcs</option>
                                    <option value="lusin">Lusin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kondisi_tambah" class="col-sm-2 col-form-label">Kondisi</label>
                            <div class="col-sm-10">
                                <select class="form-control" aria-placeholder="OK" id="kondisi_tambah" name="kondisi_tambah">
                                    <option value="OK">OK</option>
                                    <option value="NOT OK">NOT OK</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lokasi_tambah" class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lokasi_tambah" name="lokasi_tambah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan_tambah" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="keterangan_tambah" name="keterangan_tambah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kegunaan_tambah" class="col-sm-2 col-form-label">Kegunaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kegunaan_tambah" name="kegunaan_tambah">
                            </div>
                        </div>
                    </div>
                    <!-- form 2 -->
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <div class="col-sm-2">Gambar</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url() ?>tambahan/gambar/select.png" style="margin-left: -3%;" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image_tambah" name="image_tambah">
                                            <label class="custom-file-label" for="image_tambah">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="float-right">
                            <a href="<?= base_url() ?>produksi" class="btn btn-primary ">Back</a>
                            <button type="submit" name="tambah" class="btn btn-success " value="upload">Submit</button>
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
    </script>
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>

</body>

</html>