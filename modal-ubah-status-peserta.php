<div class="modal fade" id="ubahStatus-<?php echo $dataPeserta_pelatihan['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Status -
                    <?php echo $dataPeserta_pelatihan['id_jurusan'] ?>
                    <?php echo $dataPeserta_pelatihan['id_gelombang'] ?>
                    <?php echo $dataPeserta_pelatihan['status'] ?>
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="#" method="post">
                <input type="hidden" name="id" value="<?php echo $dataPeserta_pelatihan['id'] ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Ubah Jurusan</label>
                        <select name="id_jurusan" id="" class="form-control">
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="1">Operator Komputer</option>
                            <option value="2">Bahasa Inggris</option>
                            <option value="3">Desain Grafis</option>
                            <option value="4">Tata Boga</option>
                            <option value="5">Tata Busana</option>
                            <option value="6">Tata Graha</option>
                            <option value="7">Teknik Pendingin</option>
                            <option value="8">Teknik Komputer</option>
                            <option value="9">Otomotif Sepeda Motor</option>
                            <option value="10">Jaringan Komputer</option>
                            <option value="11">Barista</option>
                            <option value="12">Bahasa Korea</option>
                            <option value="13">Make Up Artist</option>
                            <option value="14">Video Editor</option>
                            <option value="15">Content Creator</option>
                            <option value="0">Web Programming</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Ubah Gelombang</label>
                        <select name="id_gelombang" id="" class="form-control">
                            <option value="">-- Pilih Gelombang --</option>
                            <option value="1">Angkatan 1</option>
                            <option value="2">Angkatan 2</option>
                            <option value="3">Angkatan 3</option>
                            <option value="0">Angkatan 4</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Ubah Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="">-- Pilih Status --</option>
                            <option value="1">Peserta Lulus</option>
                            <option value="2">Lulus Wawancara</option>
                            <option value="3">Lulus Administrasi</option>
                            <option value="0">Tidak Lulus</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" name="ubah_status">Ubah Status</button>
                </div>
            </form>

        </div>
    </div>
</div>