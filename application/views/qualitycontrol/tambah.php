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
        <?php
        $temp = 'qualitycontrol/tambah';
        $test = 'con_edit/do_upload';
        echo form_open_multipart($temp); ?>

        <div class="card">
            <div class="card-header">
                Form Edit Database
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
                    <div class="col-lg-12">
                        <?php if ($this->session->flashdata('error_sop')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Perhatian </strong>Terdapat Format File yang Tidak Didukung/File Yang tidak di Upload!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <!-- form 1 -->
                        <div class="form-group row">
                            <label for="klasifikasi_e" class="col-sm-2 col-form-label">Klasifikasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="klasifikasi_e" name="klasifikasi_e">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namaunit_e" class="col-sm-2 col-form-label">Nama Unit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namaunit_e" name="namaunit_e">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_e" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kode_e" name="kode_e">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="serialnumber_e" class="col-sm-2 col-form-label">Serial Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="serialnumber_e" name="serialnumber_e">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="supplier_e" class="col-sm-2 col-form-label">Supplier</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="supplier_e" name="supplier_e">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggalmasuk_e" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                            <div class="col-sm-10">
                                <input type="text" name="tanggalmasuk_e" class="form-control" id="date" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kondisi_e" class="col-sm-2 col-form-label">Kondisi</label>
                            <div class="col-sm-10">
                                <select class="form-control" aria-placeholder="Pilih" id="kondisi_e" name="kondisi_e">
                                    <option selected disabled style="display: none;">Pilih</option>
                                    <option value="OK">OK</option>
                                    <option value="NOT OK">NOT OK</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lokasi_e" class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lokasi_e" name="lokasi_e">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fungsi_e" class="col-sm-2 col-form-label">Fungsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="fungsi_e" id="fungsi_e"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- form 2 -->
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label for="sop_e" class="col-sm-2 col-form-label">SOP</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="sop_e" name="sop_e">
                                    <label class="custom-file-label" for="sop_e"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="manual_e" class="col-sm-2 col-form-label">Manual Book</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="manual_e" name="manual_e">
                                    <label class="custom-file-label" for="manual_e"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="riwayat_e" class="col-sm-2 col-form-label">Riwayat</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="riwayat_e" name="riwayat_e">
                                    <label class="custom-file-label" for="riwayat_e"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sertif_e" class="col-sm-2 col-form-label">Sertifikat Kalibrasi</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="sertif_e" name="sertif_e">
                                    <label class="custom-file-label" for="sertif_e"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Gambar</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url() ?>tambahan/img/select.png" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="float-right">
                            <a href="<?= base_url() ?>qualitycontrol/dokumen" class="btn btn-primary ">Back</a>
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