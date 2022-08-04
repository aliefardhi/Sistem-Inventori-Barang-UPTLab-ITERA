<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/mystyle.css">
    <title>Sistem Inventori Barang UPTLab ITERA</title>
</head>

<body class="bg-light">
    <header>
        <nav class="navbar mx-5 mt-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img width="40px" src="assets/img/itera_logo.png">
                    Sistem Inventori Barang UPTLab ITERA
                </a>
            </div>
        </nav>
    </header>

    <div class="container my-5">
        <div class="row d-flex align-items-center">
            <div class="col">
                <img class="img-fluid" src="assets/img/storyset.png" alt="" width="700px">
            </div>
            <div class="col">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <div class="card ms-auto p-3" style="width: 23rem; height: 30rem">
                            <div class="card-body form">
                                <h2 class="card-title">Login</h2>
                                <h6 class="card-subtitle mb-2 text-muted">Masukkan email dan password yang telah didaftarkan sebelumnya</h6>
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
                                        <button type="submit" class="btn" style="background-color: #BF8411; color: #fff;">Daftar Menggunakan SSO</button>
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