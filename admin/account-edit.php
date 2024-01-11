<div class="modal fade" id="edit<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" class="modal-content">
            <div class="modal-header" style="height: 50px;">
                <h5 class="modal-title fs-5 card-title" id="exampleModalLabel">Akun <?= $row['name'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="display: flex; flex-direction: column; gap: 10px;">
                <table style="width: 100%; border: none; display: flex; flex-direction: column; gap: 20px">
                    <tr style="display: flex; align-items: center; gap: 20px;">
                        <td>
                            <input type="text" class="form-control" name="id" value="<?= $row['id'] ?>" style="display: none;" readonly>
                        </td>
                    </tr>
                    <tr style="display: flex; align-items: center; gap: 20px;">
                        <td style="width: 30%">Username</td>
                        <td>:</td>
                        <td style="width: 60%;"><?= $row['name'] ?></td>
                    </tr>
                    <tr style="display: flex; align-items: center; gap: 20px;">
                        <td style="width: 30% !important">Email</td>
                        <td>:</td>
                        <td style="width: 60%;"><?= $row['email'] ?></td>
                    </tr>
                    <tr style="display: flex; align-items: center; gap: 20px;">
                        <td style="width: 30%">Status Banned</td>
                        <td>:</td>
                        <td>
                            <?php if ( $row['status_banned'] == 0 ) : ?>
                                Tidak
                            <?php else : ?>
                                Ya
                            <?php endif; ?>    
                        </td>
                    </tr>
                    <tr style="display: flex; align-items: center; gap: 20px;">
                        <td style="width: 30%">Role</td>
                        <td>:</td>
                        <td><?= $row['role'] ?></td>
                    </tr>
                    <tr style="display: flex; align-items: center; gap: 20px;">
                        <td style="width: 30%">Created date</td>
                        <td>:</td>
                        <td><?= $row['created_date'] ?></td>
                    </tr>
                    <tr style="display: flex; align-items: center; gap: 20px;">
                        <td style="width: 30%">Updated date</td>
                        <td>:</td>
                        <td><?= $row['updated_date'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" style="display: flex; justify-content: center; align-items: center; width: 100px; border-radius: 4px; gap: 10px" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Tutup</button>
                <?php if ( $row['status_banned'] == 0 ) : ?>
                    <button type="submit" name="banned" class="btn btn-primary" style="display: flex; justify-content: center; align-items: center; width: 100px; border-radius: 4px; gap: 10px"><i class="bi bi-person-fill-slash"></i> Banned</button>
                <?php else : ?>
                    <button type="submit" name="unBanned" class="btn btn-primary" style="display: flex; justify-content: center; align-items: center; width: 160px; border-radius: 4px; gap: 10px"><i class="bi bi-person-fill-check"></i> Batal banned</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>