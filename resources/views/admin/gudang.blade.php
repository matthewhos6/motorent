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
    <div class="container-fluid page-header">
        <div class="row">
            <div class="col-10">
                <h1 class="display-3 text-uppercase text-black mb-3 ms-5 mt-3">Welcome, {{Session::get('loguser')}}</h1>
            </div>
            <div class="col-2">
                <a href="{{url('/admin/logout')}}" class="btn btn-danger mt-5">Logout</a>
            </div>
        </div>
    </div>
    @if (Session::has('msg'))
    <div style="background-color: rgb(51, 255, 0); padding: 4px; color: white">
        <h3>
            {{ Session::get('msg'); }}
        </h3>
    </div>
    @endif
    @php
        // $listBarang = DB::table('barang')->get();
        // if (Session::get('caribarang') != null) {
        //     $listBarang = DB::table('barang')->where('Nama_Motor', 'like', '%'.Session::get('caribarang').'%')->get();
        // }else {
        //     $listBarang = DB::table('barang')->get();
        // }

        if ($searched != null) {
            $listBarang = DB::table('barang')->where('Nama_Motor', 'like', '%'.$searched.'%')->get();
        }else {
            $listBarang = DB::table('barang')->get();
        }
    @endphp


    <!-- <button name="btnchart" type="submit" class="btn btn-secondary">Chart Barang</button>  -->
        <div class="container">
        <form action="{{ url("/admin/searchbarang") }}" method="post">
            @csrf
            <div class="row">
                <div class="col-1">
                    <label style="font-size: 20px">Model : </label> 
                </div>
                <div class="col-5">
                    <input class="form-control" value="{{$searched}}" type="text" name="cari" size="50px">
                </div>
                <div class="col-2">
                    <button name="btnSearch" type="submit" class="btn btn-info">Search</button>
                </div>
            </div>
        </form> <br>
            {{-- Model : <input value="{{Session::get('caribarang')}}" type="text" name="cari" size="50px"> <button name="btnSearch" type="submit" class="btn btn-info">Search</button></form> <br> --}}
        <form action="{{ url("/admin/tambahbarang") }}" method="post">
            @csrf
        <button name="btnMaster" type="submit" class="btn btn-success">Tambah Barang</button>
        </form><br><br>
                <table class="table table-primary table-striped mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Warna</th>
                            <th>Silinder</th>
                            <th>Plat</th>
                            <th>Tahun Produksi</th>
                            <th>Gambar</th>
                            <th>Harga Sewa</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <form action="{{ url("/admin/detailbarang") }}" method="POST">
                        @csrf
                    <tbody>
                        @forelse ($listBarang as $value)
                            <tr>
                                <td>{{$value->ID_Barang}}</td>
                                <td>{{$value->Nama_Motor}}</td>
                                <td>{{$value->Warna_Motor}}</td>
                                <td>{{$value->Isi_Silinder}}cc</td>
                                <td>{{strtoupper($value->Plat)}}</td>
                                <td>{{$value->Tahun_Pembuatan}}</td>
                                @if ($value->gambar == null)
                                    <td>Belum input gambar</td>
                                @else
                                @php
                                    $str = (explode("-",$value->gambar));
                                @endphp 
                                <td> <img src="{{ asset("photo/".$str[0]."-0.jpg") }}" style="margin: 10px;width:150px;height:150px;"></td>
                                @endif
                                <td>Rp <?= number_format($value->Harga_sewa,2,",",".") ?>/ hari</td>
                                <td><button name="btnDetailBarang" value="{{$value->ID_Barang}}" type="submit" class="btn btn-warning">Detail</button></td>
                            </tr>
                        @empty
                            
                        @endforelse

                    </tbody>
                    </form>
                </table>
    </div><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>