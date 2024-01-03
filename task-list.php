<?php

    include 'libraries/Database.php';
    include 'libraries/Task.php';
    include 'libraries/Category.php';

    session_start();

    if ( $_SESSION['role'] !== 'user' ) {
        header("Location: index");
    }

    // Bikin objek task
    $task = new Task("Localhost", "root", "", "db_smart_task");
    $conn = $task->connect();
    
    $user_id = $_SESSION['id'];

    // Daftar tugas
    $index = $task->index($conn, $user_id);

    // Tambah
    if ( isset($_POST['add']) ) {
        $task->store($_POST, $conn, $user_id);
    }

    // Edit
    if ( isset($_POST['edit']) ) {
        $task->update($_POST, $conn, $user_id);
    }

    // Hapus
    if ( isset($_GET['id']) ) {
        $task->destroy($conn, $_GET['id']);
    }

    // Finished
    if ( isset($_POST['done']) ) {
        $task->finished($_POST, $conn);
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add" style="display: flex; justify-content: center; align-items: center; width: 130px; border-radius: 4px; gap: 10px">
                <i class="bi bi-plus-circle-fill"></i> Tambah
            </button>
            <?php
                include 'task-add.php';
            ?>
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
                    <?php if ( !is_null($index) && is_array($index) ) : ?>
                        <?php $no = 1 ?>
                        <?php foreach ( $index as $row ) : ?>
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
                                    <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row['id'] ?>" style="display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 4px; gap: 10px;"><i class="bi bi-pencil-square"></i></button>
                                        <?php include 'task-edit.php'; ?>
                                        <a href="#" onclick="deleteTask(<?= $row['id'] ?>)" class="btn btn-danger" style="display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 4px; gap: 10px"><i class="bi bi-trash3-fill"></i></a>
                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#view<?= $row['id'] ?>" style="display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 4px; gap: 10px;"><i class="bi bi-eye"></i></button>
                                        <?php include 'task-view.php'; ?>
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
    include 'layouts/footer.php';

?>