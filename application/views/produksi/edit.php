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
        $temp = 'produksi/edit/' . $produk['No'];
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
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- form 1 -->
                        <div class="form-group row">
                            <label for="klasifikasi_edit" class="col-sm-2 col-form-label">Klasifikasi</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $produk['Klasifikasi']; ?>" class="form-control" id="klasifikasi_edit" name="klasifikasi_edit">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_alat_edit" class="col-sm-2 col-form-label">Nama Unit</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $produk['Nama_Alat']; ?>" class="form-control" id="nama_alat_edit" name="nama_alat_edit">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="merk_edit" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $produk['Merk']; ?>" class="form-control" id="merk_edit" name="merk_edit">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipe_ukuran_edit" class="col-sm-2 col-form-label">Tipe/Ukuran</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $produk['Tipe_Ukuran']; ?>" class="form-control" id="tipe_ukuran_edit" name="tipe_ukuran_edit">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_edit" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $produk['Jumlah']; ?>" class="form-control" id="jumlah_edit" name="jumlah_edit">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="satuan_edit" class="col-sm-2 col-form-label">Kondisi</label>
                            <div class="col-sm-10">
                                <select class="form-control" aria-placeholder="<?= $produk['Satuan']; ?>" id="satuan_edit" name="satuan_edit">
                                    <option value="pcs">pcs</option>
                                    <option value="lusin">Lusin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kondisi_edit" class="col-sm-2 col-form-label">Kondisi</label>
                            <div class="col-sm-10">
                                <select class="form-control" aria-placeholder="<?= $produk['Kondisi']; ?>" id="kondisi_edit" name="kondisi_edit">
                                    <option value="OK">OK</option>
                                    <option value="NOT OK">NOT OK</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lokasi_edit" class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $produk['Lokasi']; ?>" class="form-control" id="lokasi_edit" name="lokasi_edit">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan_edit" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $produk['Keterangan']; ?>" class="form-control" id="keterangan_edit" name="keterangan_edit">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kegunaan_edit" class="col-sm-2 col-form-label">Kegunaan</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $produk['Kegunaan']; ?>" class="form-control" id="kegunaan_edit" name="kegunaan_edit">
                            </div>
                        </div>
                    </div>
                    <input hidden type="text" value="<?= $produk['No']; ?>" class="form-control" id="id" name="id">
                    <!-- form 2 -->
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <div class="col-sm-2">Gambar</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url() ?>tambahan/gambar/<?= $produk['kode_Gambar']; ?>" class="img-thumbnail">
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