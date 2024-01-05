<?php

    include 'libraries/Connection.php';
    include 'libraries/Task.php';
    include 'libraries/Category.php';

    session_start();

    if ( $_SESSION['role'] !== 'user' ) {
        header("Location: index");
    }

    $user_id = $_SESSION['id'];

    $taskObject = new Task();

    $categoryObject = new Category();

    $categories = $categoryObject->index($conn, $user_id);
    

    // Daftar tugas
    $tasks = $taskObject->index($conn, $user_id);

    // Tambah
    if ( isset($_POST['add']) ) {
        $taskObject->store($_POST, $conn, $user_id);
    }

    // Edit
    if ( isset($_POST['edit']) ) {
        $taskObject->update($_POST, $conn, $user_id);
    }

    // Hapus
    if ( isset($_GET['id']) ) {
        $taskObject->destroy($conn, $_GET['id']);
    }

    // Finished
    if ( isset($_POST['done']) ) {
        $taskObject->finished($_POST, $conn);
    }

    // Header
    include 'layouts/header.php';

    // Sidebar
    include 'layouts/sidebar.php';

?>

    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Tugas</h5>
              
              <!-- Button trigger modal -->
            <?php if ( $_SESSION['status_banned'] == 0 ) : ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add" style="display: flex; justify-content: center; align-items: center; width: 130px; border-radius: 4px; gap: 10px">
                    <i class="bi bi-plus-circle-fill"></i> Tambah
                </button>
                <?php
                    include 'task-add.php';
                ?>
            <?php else : ?>
                <div style="display: flex; flex-direction: column; gap: 10px">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add" style="display: flex; justify-content: center; align-items: center; width: 130px; border-radius: 4px; gap: 10px; pointer-events: none">
                        <i class="bi bi-plus-circle-fill"></i> Tambah
                    </button>
                    <p class="text-danger" style="font-weight: 600; margin-bottom: 0 !important">Akun Anda di banned, sehingga akses pada fitur terbatas</p>
                </div>
            <?php endif; ?>

            <!-- Table with stripped rows -->
            <div style="width: 100%; overflow: auto;">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Kategory</th>
                        <th>Prioritas</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ( !is_null($tasks) && is_array($tasks) ) : ?>
                        <?php $no = 1 ?>
                        <?php foreach ( $tasks as $row ) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['desc_name'] ?></td>
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
                                <td>
                                    <?php if ( $_SESSION['status_banned'] == 0 ) : ?>
                                        <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row['id'] ?>" style="display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 4px; gap: 10px;"><i class="bi bi-pencil-square"></i></button>
                                            <?php include 'task-edit.php'; ?>
                                            <a href="#" onclick="deleteTask(<?= $row['id'] ?>)" class="btn btn-danger" style="display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 4px; gap: 10px"><i class="bi bi-trash3-fill"></i></a>
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#view<?= $row['id'] ?>" style="display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 4px; gap: 10px;"><i class="bi bi-eye"></i></button>
                                            <?php include 'task-view.php'; ?>
                                        </div>
                                    <?php else : ?>
                                        <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row['id'] ?>" style="display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 4px; gap: 10px; pointer-events: none"><i class="bi bi-pencil-square"></i></button>
                                            <?php include 'task-edit.php'; ?>
                                            <a href="#" onclick="deleteTask(<?= $row['id'] ?>)" class="btn btn-danger" style="display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 4px; gap: 10px; pointer-events: none"><i class="bi bi-trash3-fill"></i></a>
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#view<?= $row['id'] ?>" style="display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 4px; gap: 10px; pointer-events: none"><i class="bi bi-eye"></i></button>
                                            <?php include 'task-view.php'; ?>
                                        </div>
                                    <?php endif; ?>
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
    include 'layouts/footer.php';

?>