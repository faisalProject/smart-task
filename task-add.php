<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" class="modal-content">
            <div class="modal-header" style="height: 50px;">
                <h5 class="modal-title fs-5 card-title" id="exampleModalLabel">Tambah Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="display: flex; flex-direction: column; gap: 10px;">
                <label for="name">Nama Tugas</label>
                <input type="text" class="form-control" id="name" name="name" required style="border-radius: 4px;">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="5" required></textarea>
                <label for="deadline">Tenggat Waktu</label>
                <input type="datetime-local" class="form-control" name="deadlines" id="deadline" required>
                <label for="priority-add">Prioritas</label>
                <select class="form-control" id="priority-add" style="height: 35px; width: 100%" name="priority" required>
                        <option value="low">Rendah</option>
                        <option value="currently">Sedang</option>
                        <option value="high">Tinggi</option>
                </select>
                <label for="category-add">Kategori</label>
                <?php if ( count($categories) > 0 ) : ?>
                    <select class="form-control" id="category-add" name="category_id" style="height: 35px; width: 100%" required>
                        <?php foreach ( $categories as $c ) : ?>
                            <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php else : ?>
                    <p class="text-danger" style="margin-bottom: 0 !important; font-weight: 600; font-size: 14px"><sup>*</sup>Harap isi kategori terlebih dahulu<sup>*</sup></p>
                    <select class="form-control" id="category-add" name="category_id" style="height: 35px; width: 100%" required>
                        <?php foreach ( $categories as $c ) : ?>
                            <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" style="display: flex; justify-content: center; align-items: center; width: 100px; border-radius: 4px; gap: 10px" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Tutup</button>
                <button type="submit" style="display: flex; justify-content: center; align-items: center; width: 110px; border-radius: 4px; gap: 10px" name="add" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Tambah</button>
            </div>
        </form>
    </div>
</div>