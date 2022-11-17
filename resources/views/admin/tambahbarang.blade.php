<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
        <div class="container-fluid position-relative nav-bar p-0">
                <div class="position-relative px-lg-5" style="z-index: 9;">
                    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                        <a href="" class="navbar-brand">
                            <h1 class="text-uppercase text-primary mb-1">Motorent</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                            <div class="navbar-nav ml-auto py-0">
                                <form action="{{ url("/admin/logout") }}" method="post">
                                    @csrf
                                    <button value="1" name="btnLogout" type="submit" class="btn btn-danger">Logout</button> 
                                    <button value="1" name="btnListBarang" type="submit" class="btn btn-primary">Back</button>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Welcome, {{Session::get('loguser')}}</h1>
    </div>
    
    <div class="container" style="margin-left: 40%;">
        <div class="row">
            <div class="col-4">
            <h3>Tambah Barang</h3>
            <form action="{{ url("/admin/menambahbarang") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <br>Nama : <input type="text" name="nama" required><br>
                <br>Warna : <input type="text" name="warna" required><br>
                <br>Silinder : <input type="number" name="silinder" required><br>
                <br>Harga Sewa : <input type="number" name="harga" required><br>
                <br>Plat : <input type="text" name="plat" required><br>
                <br>Tahun Produksi : <input type="date" name="tahun" required><br>
                <br>No Rangka : <input type="text" name="rangka" required><br>
                <br>No Mesin : <input type="text" name="mesin" required><br>
                <br>No BPKB : <input type="text" name="bpkb" required><br>
                <br>No STNK : <input type="text" name="stnk" required><br>
                Gambar : <input type="file" name="photo[]"> <br>
                <button name="btnTambah" type="submit" class="btn btn-success">Tambah</button><br><br>
            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>