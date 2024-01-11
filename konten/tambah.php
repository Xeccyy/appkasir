<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Tambah Penjualan </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Penjualan</a></li>
                        <li class="breadcrumb-item active">Tambah Penjualan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="card">
                <div class="card-header">
                    <h5>
                        Input Penjualan
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Form Cari Produk -->
                    <div class="form-row">
                        <div class="form-group col-sm-2">
                            <form action="">
                                <input type="number" name="Jumlah" class="form-control" values="1" placeholder="Jumlah...">
                        </div>
                        <div class="form-group col-sm-4">
                            <input type="text" name="Barcode" class="form-control" placeholder="Barcode...">
                            
                        </div>
                        <div class="form-group col-sm-3">
                            <button class="btn btn-block btn-info" type="submit"><i class="fas fa-barcode"></i>Cari By Barcode</button>
                            </form>
                        </div>
                        <div class="form-group col-sm-3">
                            <button class="btn btn-block btn-success" type="button"><i class="fas fa-tags"></i>Cari By Nama</button>
                        </div>
                    </div>
                    <!-- Tutup Form Cari Produk -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Hapus</th>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                            <tr>
                                <td align="center"><a href=""><i class="fas fa-trash"></i></a></td>
                                <td>1</td>
                                <td>Fiesta Chicken Nugget 500G</td>
                                <td align="right">34,500</td>
                                <td align="right">2</td>
                                <td align="right">69,000</td>
                            </tr>
                            <tr class="text-bold">
                                <td colspan="4">TOTAL</td>
                                <td align="right">2</td>
                                <td align="right">69,000</td>
                            </tr>
                    </table>
                    <button class="btn btn-block bg-info mt-3"><i class="fas fa-save"></i>Simpan Penjualan</button>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal tanbah periode -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="aksi/user.php" method="post">
                    <input type="hidden" name="aksi" value="tambah">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" required>

                    <label for="username">Username </label>
                    <input type="text" name="username" class="form-control" required>

                    <label for="password">Password </label>
                    <input type="password" name="password" class="form-control" required>

                    <label for="hak_akses">Hak Aksess </label>
                    <select class="form-control" name="hak_akses" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                    <br>
                    <button type="sumbit" class="btn btn-block bg-blue"><i class="fas fa-save"></i></button>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-blue" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>