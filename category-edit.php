<!-- Modal -->
<div class="modal fade" id="edit<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" class="modal-content">
            <div class="modal-header" style="height: 50px;">
                <h5 class="modal-title fs-5 card-title" id="exampleModalLabel">Ubah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="display: flex; flex-direction: column; gap: 10px;">
                <input type="text" class="form-control" readonly name="id" value="<?= $row['id']; ?>" style="display: none;">
                <label for="name" style="font-weight: 600;">Nama Kategori</label>
                <input type="text" class="form-control" value="<?= $row['name'] ?>" id="name" name="name" required style="border-radius: 4px;">
            </div>
            <div class="modal-footer">
                <button type="button" style="display: flex; justify-content: center; align-items: center; width: 100px; border-radius: 4px; gap: 10px" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Tutup</button>
                <button type="submit" style="display: flex; justify-content: center; align-items: center; width: 110px; border-radius: 4px; gap: 10px" name="edit" class="btn btn-warning"><i class="bi bi-pencil-fill"></i> Ubah</button>
            </div>
        </form>
    </div>
</div>