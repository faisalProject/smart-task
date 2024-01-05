<!-- Modal -->
<div class="modal fade" id="edit<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" class="modal-content">
            <div class="modal-header" style="height: 50px;">
                <h5 class="modal-title fs-5 card-title" id="exampleModalLabel">Ubah Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="display: flex; flex-direction: column; gap: 10px;">
                <input type="text" name="id" class="form-control" value="<?= $row['id'] ?>" readonly style="display: none;">
                <label for="name" style="font-weight: 600;">Nama Tugas</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>" required style="border-radius: 4px;">
                <label for="description	" style="font-weight: 600;">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="5" required><?= $row['description'] ?></textarea>
                <label for="deadline">Tenggat Waktu</label>
                <input type="datetime-local" class="form-control" value="<?= $row['deadlines'] ?>" name="deadlines" id="deadline" required>
                <label for="priority">Prioritas</label>
                <select class="priority-edit form-control" id="priority" style="height: 35px; width: 100%" name="priority" required>
                    <?php if ( $row['priority'] === 'high' ) : ?>
                        <option selected value="<?= $row['priority'] ?>">Tinggi</option>
                        <option value="low">Rendah</option>
                        <option value="currently">Sedang</option>
                    <?php elseif ( $row['priority'] === 'currently' ) : ?>
                        <option value="high">Tinggi</option>
                        <option selected value="<?= $row['priority'] ?>">Sedang</option>
                        <option value="low">Rendah</option>
                    <?php else : ?>
                        <option value="high">Tinggi</option>
                        <option value="currently">Sedang</option>
                        <option selected value="<?= $row['priority'] ?>">Rendah</option>
                    <?php endif; ?>
                </select>
                <label for="category" style="font-weight: 600;">Kategori</label>
                <select class="category-edit form-control" id="category" name="category_id" style="height: 35px; width: 100%" required>
                    <?php if ( count($categories) > 1 ) : ?>
                        <?php foreach ( $categories as $c ) : ?>
                            <?php if ( $c['name'] !== $row['desc_name'] ) : ?>
                                <option selected value="<?= $row['cat_id'] ?>"><?= $row['desc_name'] ?></option>
                                <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <?php foreach ( $categories as $c ) : ?>
                            <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" style="display: flex; justify-content: center; align-items: center; width: 100px; border-radius: 4px; gap: 10px" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Tutup</button>
                <button type="submit" style="display: flex; justify-content: center; align-items: center; width: 110px; border-radius: 4px; gap: 10px" name="edit" class="btn btn-warning"><i class="bi bi-plus-circle-fill"></i> Ubah</button>
            </div>
        </form>
    </div>
</div>