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
    <div class="container-fluid" id="los">
        <h5 class="mt-3">Inventaris Alat Uji & Alat Ukur</h5>

        <div class="row">
            <div class="col-sm-2 col-md-4">
                <form action="<?= base_url() ?>qualitycontrol" method="post">
                    <div class="input-group input-group-sm mb-1">
                        <input type="text" class="form-control form-control-sm" placeholder="Masukan Katakunci.." name="keyword" autocomplete="off" autofocus>
                        <!-- <button class="btn btn-primary btn-sm" type="submit" name="submit">Cari</button> -->
                        <input class="btn btn-primary btn-sm" type="submit" name="submit">
                        <span class="input-icon">
                            <label for="file-input"><i id="icon1" class="fas fa-sync"></i></label>
                            <input id="file-input" type="submit" name="submit">
                        </span>
                    </div>
                </form>

            </div>
        </div>


        <div class="container-fliud">
            <div class="row">
                <div class="col">
                    <h6>Hasil Pencarian : <?= $total_rows; ?></h6>

                    <table class="table table-sm" id="detail">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center d-none d-lg-block">Klasifikasi</th>
                                <th class="text-center">Nama Alat</th>
                                <th class="text-center">Kode Alat</th>
                                <th class="text-center d-none d-lg-block">Supplier</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center d-none d-lg-block">Fungsi</th>
                                <th class="text-center">SOP</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($qualitycontrol)) : ?>
                                <tr>
                                    <td colspan="10">
                                        <div class="alert alert-danger" role="alert">
                                            data tidak ditemukan!
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php foreach ($qualitycontrol as $qc) : ?>

                                <tr id="<?= $qc['id']; ?>">
                                    <?php if ($qc['kondisi'] === "NOT OK") : ?>
                                        <script>
                                            var element = document.getElementById("<?= $qc['id']; ?>");
                                            element.classList.add("table-danger");
                                        </script>
                                    <?php endif; ?>
                                    <td class="text-center" style="width: 40px;"><?= ++$start ?></td>
                                    <td class="text-center d-none d-lg-block" class="fc"><?= $qc['klasifikasi']; ?></td>
                                    <td class="setLebar concat text-center" class="fc">
                                        <div>
                                            <a id="detailnama" href="#" class="fc" data-toggle="modal" data-target="#modalnama"><?= $qc['nama_alat']; ?></a>
                                        </div>
                                    </td>
                                    <td class="text-center"><?= $qc['kode']; ?></td>
                                    <td class="text-center d-lg-block d-none">
                                        <?php if ($qc['supplier'] === "") : ?>
                                            <?= "-"; ?>
                                        <?php else : ?>
                                            <?= $qc['supplier']; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <img class="materialboxed" src="<?= base_url() ?>tambahan/img/<?= $qc['gambar']; ?>" style="width: 28px ">
                                    </td>
                                    <td class="setLebar concat text-center d-none d-lg-block" style="width:150px;">
                                        <div>
                                            <a id="detailfungsi" href="#" class="fc" data-toggle="modal" data-target="#modalnama"><?= $qc['fungsi']; ?></a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($qc['sop'] === "") : ?> <span style="color:red;" disabled="true"><i class="fas fa-times"></i></span>
                                        <?php else : ?>
                                            <a href="<?= base_url() ?>tambahan/sop/<?= $qc['sop']; ?>" target="_blank"><i class="fas fa-file-pdf"></i>Click</a>
                                        <?php endif; ?>

                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url() ?>qualitycontrol/detail/<?= $qc['id']; ?>" class="badge badge-warning" style="margin-left: 3px;">Detail</a>
                                        <?php if ($qc['status'] === "") : ?>
                                            <a href="<?= base_url() ?>qualitycontrol/pinjam/<?= $qc['id']; ?>" class="badge badge-success modal-trigger">Pinjam</a>
                                        <?php elseif ($qc['status'] === "2") : ?>
                                            <span style="color:green; margin-left:5%;" disabled="true"><i class="fas fa-exclamation-triangle"></i></span>
                                        <?php else : ?>
                                            <span style="color:red; margin-left:5%;" disabled="true"><i class="fas fa-exclamation-triangle"></i></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>

                    </table>
                    <span>
                        <?= $this->pagination->create_links();; ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalnama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">

                    </div>

                </div>
            </div>
        </div>




        <!-- materialize -->
        <!--JavaScript at end of body for optimized loading-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>tambahan/js/materialize.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#detail #detailnama').on('click', function(e) {
                    //var id = $(this).attr("data-id");
                    var det = $(this).html();
                    $('.modal-body').html(det);
                });
                $('#detail #detailfungsi').on('click', function(e) {
                    //var id = $(this).attr("data-id");
                    var det = $(this).html();
                    $('.modal-body').html(det);
                });
            });
        </script>

        <script>
            const sideNav = document.querySelectorAll('.sidenav');
            M.Sidenav.init(sideNav);


            // untuk material 
            const Materialbox = document.querySelectorAll('.materialboxed');
            M.Materialbox.init(Materialbox);

            // modal
            // const modal = document.querySelectorAll('.modal');
            // M.Modal.init(modal);
        </script>