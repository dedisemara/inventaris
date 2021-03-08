<link rel="stylesheet" href="<?= base_url() ?>tambahan/css/login.css">
<!------ Include the above in your HEAD tag ---------->

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
                </div>
            </div>
        </div>
    </nav>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="<?= base_url() ?>tambahan/img/user.png" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <form action="<?= base_url() ?>/produksi/login" method="post">
                <input type="text" autocomplete="off" id="login" class="fadeIn second" name="login" placeholder="Nama">
                <input type="text" autocomplete="off" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>