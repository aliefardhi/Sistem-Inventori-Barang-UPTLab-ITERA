<!DOCTYPE html>
<html lang="en">

<head>
    <!-- load title -->
    <?php $this->load->view('partials/title-meta') ?>

    <!-- load css -->
    <?php $this->load->view('partials/head-css') ?>
</head>

<body class="bg-light">
    <header>
        <nav class="navbar-header mx-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img width="40px" src="<?= base_url() ?>assets/images/itera_logo.png">
                    Sistem Inventori Barang UPTLab ITERA
                </a>
            </div>
        </nav>
    </header>

    <div class="container my-5">
        <div class="row d-flex align-items-center">
            <div class="col">
                <img class="img-fluid" src="<?= base_url() ?>assets/images/storyset.png" alt="" width="700px">
            </div>
            <div class="col">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="card ms-auto p-3" style="width: 23rem; height: 30rem">
                            <div class="card-body form">
                                <h1 class="mb-3">Login</h1>
                                <h6 class="card-subtitle mb-2 text-muted">Masukkan email dan password yang terdaftar</h6>
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-5">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                        <a id="emailHelp" class="form-text float-end">Lupa password?</a>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>