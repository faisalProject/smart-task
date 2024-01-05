<?php
    session_start();
    
    include '../libraries/Connection.php';
    include '../libraries/AdminCT.php';

    if ( $_SESSION['role'] !== 'admin' ) {
        header("Location: ../index");
    }

    $adminObject = new AdminCT();

    $accounts = $adminObject->showAccount($conn);
    $finished = $adminObject->showTaskByFinished($conn);
    $unfinished = $adminObject->showTaskByUnfinished($conn);
    $categories = $adminObject->showCategories($conn);
    $timelines = $adminObject->timeline($conn);

    // Header
    include '../layouts/header.php';

    // Sidebar
    include '../layouts/sidebar.php';

?>

    <main id="main" class="main">

    <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                    <h5 class="card-title">Akun <span>| Semua</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="ps-3">
                        <h6><?= $accounts['users'] ?></h6>
                        <span class="text-muted small pt-2 ps-1">Daftar Akun</span>

                        </div>
                    </div>
                    </div>

                </div>
                </div><!-- End Sales Card -->

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                    <h5 class="card-title">Tugas <span>| Selesai</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-list-task"></i>
                            </div>
                            <div class="ps-3">
                            <h6><?= $finished['finished'] ?></h6>
                            <span class="text-muted small pt-2 ps-1">Daftar tugas</span>
                        </div>
                    </div>
                    </div>

                </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                    <h5 class="card-title">Tugas <span>| Belum Selesai</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-list-task"></i>
                        </div>
                        <div class="ps-3">
                        <h6><?= $unfinished['unfinished'] ?></h6>
                        <span class="text-muted small pt-2 ps-1">Daftar tugas</span>

                        </div>
                    </div>
                    </div>

                </div>
                </div><!-- End Revenue Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                    <h5 class="card-title">Kategori <span>| Semua</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-tags-fill"></i>
                        </div>
                        <div class="ps-3">
                        <h6><?= $categories['categories'] ?></h6>
                        <span class="text-muted small pt-2 ps-1">Daftar kategori</span>

                        </div>
                    </div>
                    </div>

                </div>
                </div><!-- End Revenue Card -->


            </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

            <!-- Recent Activity -->
            <div class="card">
                <div class="card-body">
                <h5 class="card-title">Timeline <span>| Semua</span></h5>

                <div class="activity">

                    <?php if ( !is_null($timelines) && is_array($timelines) && !empty($timelines) ) : ?>
                        <?php foreach ( $timelines as $timeline ) : ?>
                            <div class="activity-item d-flex">
                            <?php if ( $timeline['days'] < '2' ) : ?>
                                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                            <?php elseif ( $timeline['days'] < '4' ) : ?>
                                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                            <?php else : ?>
                                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                            <?php endif; ?>
                            <div class="activity-content" style="display: flex; flex-direction: column; gap: 10px">
                                <p class="fw-bold" style="margin-bottom: 0 !important;"><?= $timeline['name'] ?></p>
                                <p style="font-size: 14px; color: #8898aa; margin-bottom: 0 !important;"><?= $timeline['cat_name'] ?></p>
                                <p style="margin-bottom: 0 !important;"><?= $timeline['days'] ?> Hari <?= $timeline['hours'] ?> jam <?= $timeline['minutes'] ?> menit</p>
                            </div>
                            </div>
                        <?php endforeach; ?>

                    <?php else : ?>
                        <p>Anda tidak memiliki lencana untuk ditampilkan</p>
                    <?php endif; ?>

                </div>

                </div>
            </div><!-- End Recent Activity -->

            </div><!-- End Right side columns -->

        </div>
    </section>

    </main><!-- End #main -->

<?php

    // Footer
    include '../layouts/footer.php';

?>