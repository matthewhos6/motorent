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
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase mb-3 ms-5">Welcome, {{Session::get('loguser')}}</h1>
    </div>

    <form action="{{ url("/admin/searchkaryawan") }}" method="post">
        @csrf
    <div class="container">
    Nama :
        <input value="{{Session::get('carikaryawan')}}" id="cari" type="text" name="cari" size="50px"> <button name="btnSearch" type="submit" class="btn btn-info">Search</button></form> <br><br>
        <form action="{{ url("/admin/tambahkaryawan") }}" method="post">
            @csrf
            <button name="btnMaster" type="submit" class="btn btn-success">Tambah Karyawan</button> <br><br> </form>
        <div class="row">
            <div>
                <table class="table table-success table-striped mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>KTP</th>
                            <th>Nama</th>
                            <th>Nomor Telepon</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <form method="POST">
                    <tbody>
                        @php
                            if (Session::get('carikaryawan') != null) {
                                $listKaryawan = DB::table('karyawan')->where('Nama_Karyawan', 'like', '%'.Session::get('carikaryawan').'%')->get();
                            }else {
                                $listKaryawan = DB::table('karyawan')->get();
                            }
                        @endphp
                        @forelse ($listKaryawan as $value)
                            <tr>
                                <td>{{$value->ID_Karyawan}}</td>
                                @if ($value->KTP_Karyawan == null)
                                    <td>Belum setor KTP</td>
                                @else
                                    <td> <img src="{{ asset("photo/".$value->KTP_Karyawan) }}" style="margin: 10px;width:200px;height:130px;"></td>
                                @endif
                                <td>{{$value->Nama_Karyawan}}</td>
                                <td>{{$value->NomorTelepon_Karyawan}}</td>
                                <td>{{$value->Username_Karyawan}}</td>
                                <td>
                                    @php
                                        for ($i=0; $i < strlen($value->Password_Karyawan); $i++) { 
                                            echo "*";
                                        }
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        if ($value->FK_ID_JABATAN == 0) {
                                            echo "Transaksi";
                                        }else if ($value->FK_ID_JABATAN == 1) {
                                            echo "Gudang";
                                        }else if ($value->FK_ID_JABATAN == 2) {
                                            echo "Report";
                                        }
                                    @endphp
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                    </form>
                </table>
            </div>
        </div>
    </div><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>