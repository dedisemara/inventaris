<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?= base_url() ?>tambahan/css/materialize.min.css" media="screen,projection" />

    <!--css aing-->
    <link rel="stylesheet" href="<?= base_url() ?>tambahan/css/style.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php echo $judul; ?> </title>
</head>

<body id="home" class="scrollspy">

    <!--navbar-->
    <div class="navbar-fixed">
        <nav class="blue accent-3">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="<?= base_url() ?>home" class="brand-logo">Elitech</a>
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="<?= base_url() ?>qualitycontrol">Quality Control</a></li>
                        <li><a href="<?= base_url() ?>sarpras">Sarana Prasarana</a></li>
                        <li><a href="<?= base_url() ?>produksi">Maintenance</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <ul class="sidenav" id="mobile-nav">
        <li><a href="<?= base_url() ?>qualitycontrol">Quality Control</a></li>
        <li><a href="<?= base_url() ?>sarpras">Sarana Prasarana</a></li>
        <li><a href="<?= base_url() ?>produksi">Maintenance</a></li>
    </ul>

    <!--slide nav-->

    <div class="slider">
        <ul class="slides">
            <li>
                <a href="#qc"><img src="<?= base_url() ?>tambahan/img/alat.jpg"></a> <!-- random image -->
                <div class="caption center-align">
                    <h3>Quality Control</h3>
                    <a href="<?= base_url() ?>qualitycontrol" class="btn waves-effect pink lighten-1 btn-large">Go To Inventory</a>
                </div>
            </li>
            <li>
                <a href="#sarpras"><img src="<?= base_url() ?>tambahan/img/"></a> <!-- random image -->
                <div class="caption left-align">
                    <h3>Sarana Prasarana</h3>
                    <a href="<?= base_url() ?> sarpras" class="btn waves-effect grey btn-large">Go To Inventory</a>
                </div>
            </li>
            <li>
                <a href="#prod"><img src="<?= base_url() ?>tambahan/img/"></a> <!-- random image -->
                <div class="caption right-align">
                    <h3>Maintenance</h3>
                    <a href="<?= base_url() ?> Maintenance" class="btn waves-effect blue accent-3 btn-large">Go To Inventory</a>
                </div>
            </li>
        </ul>
    </div>

    <!--about-->
    <section id="qc" class="about scrollspy">
        <div class="container">
            <div class="row">
                <h3 class="center light grey-text text darken-3">About Us</h3>
                <div class="col m6 light">
                    <h5>Quality Control</h5>
                    <p>Divisi Quality Control PT. Sinko Prima Alloy berfokus pada standart mutu produk Elitech. Dimana setiap produk yang kami buat telah melewati beberapa tahap pengujian. Pengujian yang kami lakukan mengacu pada standart internasional seperti ISO, IEC, NFPA dan lain-lain. Divisi quality control memiliki beberapa inventaris alat uji dan alat ukur yang dapat mendukung proses pengujian berdasarkan standart pengujian internasional. Berikut adalah beberapa klasifikasi alat uji yang terdapat pada diviisi kami:</p>
                    <li>Bunyi (1 Unit)</li>
                    <li>Intensitas Cahaya (28 Unit)</li>
                    <li>Jumlah Zat (57 Unit)</li>
                    <li>Kecepatan (3 Unit)</li>
                    <li>Listrik (93 Unit)</li>
                    <li>Massa (27 Unit)</li>
                    <li>Material Durability (10 Unit)</li>
                    <li>Panjang (21 Unit)</li>
                    <li>Simulator (10 Unit)</li>
                    <li>Suhu (39 Unit)</li>
                    <li>Suhu & Kelembaban (21 Unit)</li>
                    <li>Tekanan (3 Unit)</li>
                    <p>Jumlah Alat Uji dan Alat Ukur pada Divisi Quality Control sebanyak 312 Unit.</p>
                </div>
                <section id="sarpras" class="scrollspy">
                    <div class="col m6 light scrollspy">
                        <h5>Sarana Prasarana</h5>
                        <p>vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
                            vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
                            vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
                            vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv</p>
                    </div>
                </section>
                <section id="prod" class="col m6 light scrollspy">
                    <div>
                        <h5>Maintenance</h5>
                        <p>vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
                            vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
                            vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
                            vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv</p>
                    </div>
                </section>
            </div>
        </div>
        </div>
    </section>



    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="<?= base_url() ?>tambahan/js/materialize.min.js"></script>
    <script>
        const sideNav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sideNav);

        const slider = document.querySelectorAll('.slider');
        M.Slider.init(slider, {
            indicator: false,
            height: 480,
            transition: 600,
            interval: 3000
        });

        const scroll = document.querySelectorAll('.scrollspy')
        M.ScrollSpy.init(scroll, {
            scrollOffset: 10
        });
    </script>



</body>








</html>