<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
table, th, td {
  border:1px solid black;
}

</style>
<body>
    <br><br>
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase mb-3">Welcome, {{Session::get('loguser')}}</h1>
        <form action="{{ url("/admin/logout") }}" method="post">
            @csrf
            <span><button type="submit" class="btn btn-danger">Logout</button> 
        </form>
    </div>
    <br>

    @php
        $listTrans = DB::table('transaksi')->get();
        $listUser = DB::table('user')->get();
        $listKaryawan = DB::table('karyawan')->get();
        $listBarang = DB::table('barang')->get();
    @endphp
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="row" style="margin-top: -170px;">
            <form method="POST">
    <span><h2>Transaksi</h2><input id="filter1" type="radio" id="filter" name="filter" value="All"> Show All
    <input id="filter2" type="radio" id="filter" name="filter" value="Accepted" style="margin-left: 20px"> Accepted
    <input id="filter3" type="radio" id="filter" name="filter" value="Rejected" style="margin-left: 20px"> Rejected </span>
    <input id="filter4" type="radio" id="filter" name="filter" value="Pending" style="margin-left: 20px"> Pending </span><br>
    <br><button align="right" name="btnFilter" type="submit" class="btn btn-success">Apply</button></form> <br> 
    
    <table style="width:100%; margin-top:20px ; color:black;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Durasi</th>
                            <th>Customer</th>
                            <th>Barang</th>
                            <th>No STNK</th>
                            <th>Total</th>                  
                            <th>Bukti bayar</th>
                            <th>Action/Status</th>
                        </tr>
                    </thead>
                    <form method="POST">
                    <tbody>
                        @forelse ($listTrans as $value)
                        @php
                            $usernya = "";
                            $karyawannya = "";
                            $barangnya = "";
                            $stnk = "";
                        @endphp
                        <tr>
                            <td>{{$value->ID_Trans}}</td>
                            <td>{{$value->Tanggal_Trans}}</td>
                            <td>{{$value->FK_ID_SUBSCRIPTION}} Hari</td>
                            @forelse ($listUser as $user)
                                @if ($user->ID_User == $value->FK_ID_USER)
                                    @php
                                        $usernya = $user->Nama_User;
                                    @endphp
                                @endif
                            @empty
                                
                            @endforelse
                            @forelse ($listBarang as $barang)
                                @if ($barang->ID_Barang == $value->FK_ID_Barang)
                                    @php
                                        $barangnya = $barang->Nama_Motor;
                                        $stnk = $barang->No_STNK;
                                    @endphp
                                @endif
                            @empty
                                
                            @endforelse
                            @forelse ($listKaryawan as $karyawan)
                                @if ($karyawan->ID_Karyawan == $value->FK_ID_Karyawan)
                                    @php
                                        $karyawannya = $karyawan->Nama_Karyawan;
                                    @endphp
                                @endif
                            @empty
                                
                            @endforelse
                            <td>{{$usernya}}</td>
                            <td>{{$barangnya}}</td>
                            <td>{{$stnk}}</td>
                            <td>Rp {{number_format($value->Total,2,",",".")}}</td>
                            @if ($value->Bukti_Bayar != null)
                                <td><img src="assets/bukti/'.{{$value->Bukti_Bayar}}.'" style="width: 200px;height: 200px;"></td>
                            @else
                                <td>Belum ada bukti bayar!</td>
                            @endif
                            <td>
                                @if ($value->Status != 0)
                                    @if ($value->Status == 1)
                                        <p style='color: green;'>Accepted</p> By: {{$karyawannya}}
                                    @else
                                        <p style='color: red;'>Rejected</p> By: {{$karyawannya}}
                                    @endif
                                @else
                                    <button name="btnRejectTrans" value="" type="submit" class="btn btn-danger">Reject</button><button name="btnAcceptTrans" value="" type="submit" class="btn btn-success">Accept</button>
                                @endif
                            </td>
                        </tr>
                      @empty
                        <tr>
                            <td colspan="9">BELUM ADA TRANSAKSI!</td>
                        </tr>
                      @endforelse
                    </tbody>
                    </form>
                </table>
            </div>
        </div>
    </div>
</body>
</html>