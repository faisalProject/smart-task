<?php

    session_start();

    include '../libraries/Connection.php';
    include '../libraries/AdminCT.php';

    if ( $_SESSION['role'] !== 'admin' ) {
        header("Location: ../index");
    }

    $adminObject = new AdminCT();
    $tasks = $adminObject->showTasks($conn);

    // Header
    include '../layouts/header.php';

    // Sidebar
    include '../layouts/sidebar.php';

?>

    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Tugas</h5>

            <!-- Table with stripped rows -->
            <div style="width: 100%; overflow: auto;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Kategori</th>
                            <th>Prioritas</th>
                            <th>Status</th>
                            <th>Dari</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( !is_null($tasks) && is_array($tasks) ) : ?>
                            <?php $no = 1 ?>
                            <?php foreach ( $tasks as $row ) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['category'] ?></td>
                                    <?php if ( $row['priority'] === 'high' ) : ?>
                                        <td>Tinggi</td>
                                    <?php elseif ( $row['priority'] === 'currently' ) : ?>
                                        <td>Sedang</td>
                                    <?php else : ?>
                                        <td>Rendah</td>
                                    <?php endif; ?>
                                    <td>
                                        <?php if ( $row['status'] === 'finished' ) : ?>
                                            <p>Selesai</p>
                                        <?php else : ?>
                                            <p>Belum selesai</p>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $row['username'] ?></td>
                                </tr>
                            <?php $no++ ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!-- End Table with stripped rows -->
            </div>
        </div>
    </main>

<?php

    // Footer
    include '../layouts/footer.php';

?>