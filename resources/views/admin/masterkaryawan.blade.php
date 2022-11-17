<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Page</title>
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
                            <button value="1" name="btnListKaryawan" type="submit" class="btn btn-warning">Back</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase mb-3">Welcome, {{Session::get('loguser')}}</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4" style="margin-left: 31%;">
                <form action="{{ url("/admin/menambahkaryawan") }}" enctype="multipart/form-data" method="POST">
                    @csrf
                <span><h2 id="titel">Add Karyawan </h2><br>
                Nama : <input type="text" name="nama" required minlength="3"><br><br>
                Nomor Telepon : <input type="number" name="noTelp" required minlength="10"><br><br>
                Username : <input type="text" name="username" required minlength="3"><br><br>
                Password : <input type="password" name="password" required minlength="5"><br><br>
                Jabatan : <select name="jabatan" id="">
                            <option value='0'>Transaksi</option>
                            <option value='1'>Gudang</option>
                            <option value='2'>Manager</option>
                        </select><br>
                KTP : <input type="file" name="photo[]">
                <br>
                <button name="btnTambah" type="submit" class="btn btn-success">Tambah Karyawan</button>
            </form>
            </div>
        </div>
    </div><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>