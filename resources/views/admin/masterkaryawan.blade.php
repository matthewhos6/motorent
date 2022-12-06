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
body{
    background: linear-gradient(rgba(229, 231, 255, 0.9), rgba(229, 231, 255, 0.9)), url({{asset('pic/motor-wallpaper.jpg')}});
}
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="btn" href="{{url('/admin/manager')}}" style="font-size: 20px">Report Page</a>
                  </li>
                  <li class="nav-item">
                    <a class="btn" href="{{url('/admin/listkaryawan')}}" style="font-size: 20px">Master Karyawan</a>
                  </li>
                </ul>
                <ul class="navbar-nav ms-5 mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="btn" href="{{url('/admin/logout')}}" style="font-size: 20px">Logout</a>
                    </li>
                  </ul>
            </div>
        </div>
    </nav>
    @if (Session::has('msg'))
    <div style="background-color: rgb(51, 255, 0); padding: 4px; color: white">
        <h3>
            {{ Session::get('msg'); }}
        </h3>
    </div>
  @endif
  <div style="display:flex;justify-content: center;align-items: center;">
    <div class="container" style="background-color: white; width:700px;height:700px;text-align:center;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 2rem auto 2rem auto;">
        <label style="font-size: 40px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top:10px;">Add Karyawan</label>
        <form action="{{ url("/admin/menambahkaryawan") }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row mt-2">
                <div class="col-5 ps-5" style="text-align: right">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Nama :</label>
                </div>
                <div class="col-5">
                    <input type="text" name="nama" required minlength="3" class="form-control mt-4">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-5 ps-5" style="text-align: right">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Nomor Telepon :</label>
                </div>
                <div class="col-5">
                    <input class="form-control mt-4" type="number" name="noTelp" required minlength="10">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-5 ps-5" style="text-align: right">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Username :</label>
                </div>
                <div class="col-5">
                    <input class="form-control mt-4" type="text" name="username" required minlength="3">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-5 ps-5" style="text-align: right">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Password :</label>
                </div>
                <div class="col-5">
                    <input class="form-control mt-4" type="password" name="password" required minlength="5">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-5 ps-5" style="text-align: right">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Jabatan :</label>
                </div>
                <div class="col-5">
                    <select class="form-control mt-4" name="jabatan" id="">
                        <option value='0'>Transaksi</option>
                        <option value='1'>Gudang</option>
                        <option value='2'>Manager</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-5 ps-5" style="text-align: right">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">KTP :</label>
                </div>
                <div class="col-5">
                    <input class="form-control mt-4" type="file" name="photo[]">
                </div>
            </div>
            <button name="btnTambah" type="submit" class="btn btn-primary mt-5" style="width: 600px">Tambah Karyawan</button>
        </form>
        <a href="{{url('/admin/listkaryawan')}}" class="btn btn-link">Back to List Karyawan</a>
    </div>
  </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4" style="margin-left: 31%;">
                
            </div>
        </div>
    </div><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>