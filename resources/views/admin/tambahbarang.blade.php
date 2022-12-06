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
body{
    background: linear-gradient(rgba(229, 231, 255, 0.9), rgba(229, 231, 255, 0.9)), url({{asset('pic/motor-wallpaper.jpg')}});
}
</style>
<body>
    <div style="display:flex;justify-content: center;align-items: center;">
        <div class="container" style="background-color: white; width:700px;height:990px;text-align:center;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 2rem auto 2rem auto;">
            <label style="font-size: 40px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top:10px;">Tambah Barang</label>
            <form action="{{ url("/admin/menambahbarang") }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row mt-2">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Nama :</label>
                    </div>
                    <div class="col-5">
                        <input type="text" name="nama" required class="form-control mt-4">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Warna :</label>
                    </div>
                    <div class="col-5">
                        <input class="form-control mt-4" type="text" name="warna" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Silinder :</label>
                    </div>
                    <div class="col-5">
                        <input class="form-control mt-4" type="number" name="silinder" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Harga Sewa :</label>
                    </div>
                    <div class="col-5">
                        <input class="form-control mt-4" type="number" name="harga" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Plat Nomor :</label>
                    </div>
                    <div class="col-5">
                        <input class="form-control mt-4" type="text" name="plat" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Tahun Produksi :</label>
                    </div>
                    <div class="col-5">
                        <input class="form-control mt-4" type="date" name="tahun" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Nomor Rangka :</label>
                    </div>
                    <div class="col-5">
                        <input class="form-control mt-4" type="text" name="rangka" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Nomor Mesin :</label>
                    </div>
                    <div class="col-5">
                        <input class="form-control mt-4" type="text" name="mesin" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Nomor BPKB :</label>
                    </div>
                    <div class="col-5">
                        <input class="form-control mt-4" type="text" name="bpkb" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Nomor STNK :</label>
                    </div>
                    <div class="col-5">
                        <input class="form-control mt-4" type="text" name="stnk" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Gambar :</label>
                    </div>
                    <div class="col-5">
                        <input class="form-control mt-4" type="file" name="photo[]">
                    </div>
                </div>
                <button name="btnTambah" type="submit" class="btn btn-primary mt-5" style="width: 600px">Tambah Barang</button>
            </form>
            <a href="{{url('/admin/gudang')}}" class="btn btn-link">Back to List Barang</a>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>