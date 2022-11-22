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
<body><div class="container-fluid position-relative nav-bar p-0">
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
                            <button value="1" name="btnReport" type="submit" class="btn btn-info">Report Page</button>
                            <button value="1" name="btnListKaryawan" type="submit" class="btn btn-primary">Master Karyawan</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase mb-3">Welcome, {{Session::get('loguser')}}</h1>
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
                <table style="width:100%;">
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