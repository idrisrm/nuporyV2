
<div class="row justify-content-center">

    <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tambah User</h1>
                            </div>
                            <?= $this->session->flashdata('pesan'); ?>
                            <form method="post">
                                <div>
                                    <label for="nama">Nama</label><br>
                                    <input type="text" id="nama"  name="nama">
                                </div>
                                <div>
                                    <label for="email">Email</label><br>
                                    <input type="email" id="email" name="email">
                                </div>
                                <div>
                                    <label for="foto">Foto</label><br>
                                    <input type="file" id="foto" name="foto">
                                </div>
                                <div>
                                    <label for="password">Password</label><br>
                                    <input type="password" id="password" name="password">
                                </div>
                                <div>
                                    <label for="level">Sebagai</label><br>
                                    <input type="number" id="level" name="level">
                                </div>
                                </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>