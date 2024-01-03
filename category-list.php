<?php
    include 'libraries/Database.php';
    include 'libraries/Category.php';
    
    session_start();

    if ( $_SESSION['role'] !== 'user' ) {
        header("Location: index");
    }

    $category = new Category("Localhost", "root", "", "db_smart_task");
    $conn = $category->connect();
    $user_id = $_SESSION['id'];

    // Daftar kategori
    $index = $category->index($conn, $user_id);

    // Tambah
    if ( isset($_POST['add']) ) {
        $category->store($_POST, $conn, $user_id);
    }    

    // Edit
    if ( isset($_POST['edit']) ) {
        $category->update($_POST, $conn, $user_id);
    }

    // Hapus
    if ( isset($_GET['id']) ) {
        $category->destroy($conn, $_GET['id']);
    }

    // Header
    include 'layouts/header.php';

    // Sidebar
    include 'layouts/sidebar.php';
?>

    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Kategori</h5>
              
              <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add" style="display: flex; justify-content: center; align-items: center; width: 130px; border-radius: 4px; gap: 10px">
                <i class="bi bi-plus-circle-fill"></i> Tambah
            </button>
            <?php
                include 'category-add.php';
            ?>
            <!-- Table with stripped rows -->
            <div style="width: 100%; overflow: auto;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Updated at</th>
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
                                    <td><?= $row['created_date'] ?></td>
                                    <td><?= $row['updated_date'] ?></td>
                                    <td>
                                        <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $row['id'] ?>" style="display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 4px; gap: 10px;"><i class="bi bi-pencil-square"></i></button>
                                            <?php include 'category-edit.php'; ?>
                                            <a href="#" onclick="deleteCategory(<?= $row['id'] ?>)" class="btn btn-danger" style="display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 4px; gap: 10px"><i class="bi bi-trash3-fill"></i></a>
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