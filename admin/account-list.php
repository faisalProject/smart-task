<?php 

    session_start();
    
    include '../libraries/Connection.php';
    include '../libraries/AdminCT.php';

    if ( $_SESSION['role'] !== 'admin' ) {
        header("Location: ../index");
    }

    // Daftar akun user
    $adminObject = new AdminCT();
    $users = $adminObject->listUserAccount($conn);

    // Banned 
    if ( isset($_POST['banned']) ) {
        $adminObject->banned($_POST, $conn);
    }

    // Unbanned
    if ( isset($_POST['unBanned']) ) {
        $adminObject->unBanned($_POST, $conn);
    }

    // Header
    include '../layouts/header.php';

    // Sidebar
    include '../layouts/sidebar.php';

?>

    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Akun</h5>

            <!-- Table with stripped rows -->
            <div style="width: 100%; overflow: auto;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Banned</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( !is_null($users) && is_array($users) ) : ?>
                            <?php $no = 1 ?>
                            <?php foreach ( $users as $row ) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td>
                                        <?php if ( $row['status_banned'] == 0 ) : ?>
                                            Tidak
                                        <?php else : ?>
                                            Ya
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row['id'] ?>" style="display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 4px; gap: 10px;"><i class="bi bi-pencil-square"></i></button>
                                            <?php include 'account-edit.php' ?>
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#view<?= $row['id'] ?>" style="display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 4px; gap: 10px;"><i class="bi bi-eye"></i></button>
                                            <?php include 'account-view.php' ?>
                                        </div>
                                    </td>
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