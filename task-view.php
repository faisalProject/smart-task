<div class="modal fade" id="view<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" class="modal-content">
            <div class="modal-header" style="height: 50px;">
                <h5 class="modal-title fs-5 card-title" id="exampleModalLabel">Daftar Tugas</h5>
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
                        <td style="width: 30%">Nama</td>
                        <td>:</td>
                        <td style="width: 60%;"><?= $row['name'] ?></td>
                    </tr>
                    <tr style="display: flex; align-items: center; gap: 20px;">
                        <td style="width: 30% !important">Deskripsi</td>
                        <td>:</td>
                        <td style="width: 60%;"><?= $row['description'] ?></td>
                    </tr>
                    <tr style="display: flex; align-items: center; gap: 20px;">
                        <td style="width: 30%">Tenggat Waktu</td>
                        <td>:</td>
                        <td><?= $row['deadlines'] ?></td>
                    </tr>
                    <tr style="display: flex; align-items: center; gap: 20px;">
                        <td style="width: 30%">Kategori</td>
                        <td>:</td>
                        <td><?= $row['desc_name'] ?></td>
                    </tr>
                    <tr style="display: flex; align-items: center; gap: 20px;">
                        <td style="width: 30%">Prioritas</td>
                        <td>:</td>
                        <td>
                            <?php if ( $row['priority'] === 'high' ) : ?>
                                <p style="margin-bottom: 0 !important;">Tinggi</p>
                            <?php elseif ( $row['priority'] === 'currently' ) : ?>
                                <p style="margin-bottom: 0 !important;">Sedang</p>
                            <?php else : ?>
                                <p style="margin-bottom: 0 !important;">Rendah</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr style="display: flex; align-items: center; gap: 20px;">
                        <td style="width: 30%">Status</td>
                        <td>:</td>
                        <td>
                            <?php if ( $row['status'] === 'finished' ) : ?>
                                <p style="margin-bottom: 0 !important;">Selesai</p> 
                            <?php else : ?>   
                                <p style="margin-bottom: 0 !important;">Belum selesai</p>
                            <?php endif; ?> 
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" style="display: flex; justify-content: center; align-items: center; width: 100px; border-radius: 4px; gap: 10px" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Tutup</button>
                <button type="submit" name="done" style="display: flex; justify-content: center; align-items: center; width: 100px; border-radius: 4px; gap: 10px" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-check-circle-fill"></i> Selesai</button>
            </div>
        </form>
    </div>
</div>