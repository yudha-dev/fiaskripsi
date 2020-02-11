<div class="block">
    <div class="container">
        <div class="document">
            <div class="document__header">
                <h3 class="card-title">Pendaftaran</h3>
                <div class="document__content card">
                    <form c style="text-align: left;" method="post" action="daftar.php">
                        <div class="form-group">
                            <label for="signup-email">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukan username" required>
                        </div>
                        <div class="form-group">
                            <label for="signup-password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukan password" required>
                        </div>
                        <div class="form-group">
                            <label for="signup-email">Nama lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukan nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="signup-email">Alamat lengkap</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Masukan alamat lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="no_hp" placeholder="Masukan nomor hp" required>
                        </div>
                        <div class="form-group mb-0">
                            <center><button type="submit" class="btn btn-primary mt-3">Daftar</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="block-space block-space--layout--before-footer">
</div>