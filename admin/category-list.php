<?php
    include '../libraries/Connection.php';
    include '../libraries/AdminCT.php';
    
    session_start();

    if ( $_SESSION['role'] !== 'admin' ) {
        header("Location: ../index");
    }

    $user_id = $_SESSION['id'];

    $adminObject = new AdminCT();

    $categories = $adminObject->showCategoriesByUser($conn);


    // Header
    include '../layouts/header.php';

    // Sidebar
    include '../layouts/sidebar.php';
?>

    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Kategori</h5>

            <!-- Table with stripped rows -->
            <div style="width: 100%; overflow: auto;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Dari</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( !is_null($categories) && is_array($categories) ) : ?>
                            <?php $no = 1 ?>
                            <?php foreach ( $categories as $row ) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['created_date'] ?></td>
                                    <td><?= $row['updated_date'] ?></td>
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