<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" class="modal-content">
            <div class="modal-header" style="height: 50px;">
                <h5 class="modal-title fs-5 card-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="display: flex; flex-direction: column; gap: 10px;">
                <label for="name" style="font-weight: 600;">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" required style="border-radius: 4px;">
            </div>
            <div class="modal-footer">
                <button type="button" style="display: flex; justify-content: center; align-items: center; width: 100px; border-radius: 4px; gap: 10px" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Tutup</button>
                <button type="submit" style="display: flex; justify-content: center; align-items: center; width: 110px; border-radius: 4px; gap: 10px" name="add" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Tambah</button>
            </div>
        </form>
    </div>
</div>