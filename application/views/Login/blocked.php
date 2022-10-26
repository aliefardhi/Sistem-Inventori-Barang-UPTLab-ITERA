<!DOCTYPE html>
<html lang="en">

<head>

    <!-- load title -->
    <?php $this->load->view('partials/title-meta') ?>

    <!-- load css -->
    <?php $this->load->view('partials/head-css') ?>

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">

                            <div class="ex-page-content text-center">
                                <h1 class="text-dark">403!</h1>
                                <h3 class="">Access Blocked!</h3>
                                <br>

                                <a class="btn btn-primary mb-4 waves-effect waves-light" href="javascript:window.history.go(-1);"><i class="mdi mdi-home"></i> Kembali</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('partials/vendor-scripts') ?>
    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.js"></script>
</body>

</html>