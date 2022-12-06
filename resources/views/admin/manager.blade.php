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
    <div class="container">
        <div class="row">
            <div class="col-7">
                @php
                    $filter = Session::get('filterreport');
                    $judul = "";
                    if ($filter == 1 || $filter == null) {
                        $judul = "Borrowed Items Report";
                    }else if ($filter == 2) {
                        $judul = "Borrowed Items Currently";
                    }else if ($filter == 3) {
                        $judul = "Most ordered Items";
                    }else if ($filter == 4) {
                        $judul = "Most Valued Customer";
                    }else if ($filter == 5) {
                        $judul = "Most Valued Karyawan";
                    }
                    $listTrans = "";
                    if (Session::get('startDate') != null && Session::get('endDate') != null) {
                        $listTrans = DB::table('transaksi')->get()->where('Tanggal_Trans', '>=', Session::get('startDate'))->where('Tanggal_Trans', '<=', Session::get('endDate'))->where('Status', '=', '1');
                    }else{
                        $listTrans = DB::table('transaksi')->get()->where('Status', '=', '1');
                    }
                    $listUser = DB::table('user')->get();
                    $listKaryawan = DB::table('karyawan')->get();
                    $listBarang = DB::table('barang')->get();
                    $filter = Session::get('filterreport');
                    //dd($listTrans);
                @endphp
                <h2 id="titel">{{$judul}}<br>
                @php
                    if (Session::get('startDate') != null && Session::get('endDate') != null) {
                        echo "(".Session::get('startDate')." / ".Session::get('endDate').")";
                    }
                @endphp
                </h2>
                <form action="{{url('admin/filterreport' )}}" method="post">
                    @csrf
                <span>
                    <input id="filter1" type="radio" id="filter" name="filter" value="1"> Borrowed Items Report
                    <input id="filter2" type="radio" id="filter" name="filter" value="2" style="margin-left: 20px"> Borrowed Items Currently
                    <input id="filter3" type="radio" id="filter" name="filter" value="3" style="margin-left: 20px"> Most ordered Items <br>
                    <input id="filter4" type="radio" id="filter" name="filter" value="4" style="margin-left: 20px"> Most Valued User
                    <input id="filter5" type="radio" id="filter" name="filter" value="5" style="margin-left: 20px"> Most Valued Karyawan </span><br>
                    @if ($filter == 2 || $filter == 3 || $filter == 4 || $filter == 5)
                    
                    @else
                        <span id="opt"> From : <input id="date" value="{{Session::get('startDate')}}" type="date" name="dateAwal" id="dateAwal" style="margin-right: 20px;">
                        To : <input value="{{Session::get('endDate')}}" id="date1" type="date" name="dateAkhir" id="dateAkhir">  <span style="color:red;margin-left:20px">
                            <button id="btnReset" value="1" class="btn btn-warning" name="resetDate">Reset Date</button></span> </span>
                    @endif
                <br><button name="btnFilter" type="submit" class="btn btn-success">Apply</button>
            </form> <br> <br>
            </div>
            <div class="col-5">
                <br>
                <h3>
                    @php
                        if ($filter == 1 || $filter == null) {
                            $total = 0;
                            foreach ($listTrans as $key => $value) {
                                $total += $value->Total;
                            }
                            echo "Total Pendapatan : Rp ". number_format("$total",2,",",".");
                        }
                    @endphp
                </h3>
            </div>
        </div>
        <div class="row">
    <table class="table table-success table-striped mt-3">
                    <thead>
                        <tr>
                            @if ($filter == 1 || $filter == null)
                                <th>ID</th>
                                <th>Tanggal</th>
                                <th>Durasi</th>
                                <th>Customer</th>
                                <th>Motor</th>
                                <th>Gambar</th>
                                <th>No STNK</th>
                                <th>Total</th>                  
                                <th>Action/Status</th>
                            @elseif ($filter == 2)
                                <th>No.</th>
                                <th>Start Date</th>
                                <th>Jangka Waktu</th>
                                <th>End Date</th>
                                <th>Customer</th>
                                <th>Barang</th>
                                <th>No STNK</th>
                                <th>Status</th>
                            @elseif ($filter == 3)
                                <th>Barang</th>
                                <th>Silinder Mesin</th>
                                <th>Jumlah Hari Di Pinjam</th>
                            @elseif ($filter == 4)
                                <th>Username</th>
                                <th>Nama User</th>
                                <th>Total Transaksi</th>
                                <th>Total Spent</th>
                            @elseif ($filter == 5)
                                <th>Username</th>
                                <th>Nama Karyawan</th>
                                <th>Total Approved Transactions</th>
                                <th>Total Earned (Gross)</th>
                            @endif
                        </tr>
                    </thead>
                    <form method="POST">
                    <tbody>
                        @php
                            $usernya = "";
                            $karyawannya = "";
                            $barangnya = "";
                            $stnk = "";
                            $silinder = "";
                            $num = 0;
                        @endphp
                        @if ($filter == 1 || $filter == null)
                            @forelse ($listTrans as $value)
                            <tr>
                                @forelse ($listUser as $user)
                                @if ($user->ID_User == $value->FK_ID_USER)
                                    @php
                                        $usernya = $user->fullname;
                                    @endphp
                                @endif
                                @empty
                                    
                                @endforelse
                                @forelse ($listBarang as $barang)
                                    @if ($barang->ID_Barang == $value->FK_ID_Barang)
                                        @php
                                            $barangnya = $barang->Nama_Motor;
                                            $stnk = $barang->No_STNK;
                                            $gambarnya = $barang->gambar;
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
                                <td>{{$value->ID_Trans}}</td>
                                <td>{{$value->Tanggal_Trans}}</td>
                                <td><p>From : {{$value->Start_Date}}</p><p>To : {{$value->End_Date}}</p><p>Durasi : {{$value->FK_ID_SUBSCRIPTION}} Hari</p></td>
                                <td>{{$usernya}}</td>
                                <td>{{$barangnya}}</td>
                                @if ($gambarnya == null)
                                    <td>Belum input gambar</td>
                                @else
                                    <td> <img src="{{ asset("photo/".$gambarnya) }}" style="margin: 10px;width:120px;height:120px;"></td>
                                @endif
                                <td>{{$stnk}}</td>
                                <td>Rp {{number_format($value->Total,2,",",".")}}</td>
                                <td>
                                    @if ($value->Status != 0)
                                        @if ($value->Status == 1)
                                            <p style='color: green;'>Accepted</p> By: {{$karyawannya}}
                                        @else
                                            <p style='color: red;'>Rejected</p> By: {{$karyawannya}}
                                        @endif
                                    @else
                                        {{-- <form action="{{url('admin/transstatus/'.$value->ID_Trans.'/'.Session::get('logid') )}}" method="post">
                                            @csrf
                                            <button name="btnRejectTrans" value="1" type="submit" class="btn btn-danger">Reject</button>
                                            <button name="btnAcceptTrans" value="1" type="submit" class="btn btn-success">Accept</button>
                                        </form> --}}
                                    @endif
                                </td>
                            </tr>
                            @empty
                                
                            @endforelse
                        @elseif ($filter == 2)
                            @forelse ($listTrans as $value)
                                @forelse ($listUser as $user)
                                @if ($user->ID_User == $value->FK_ID_USER)
                                    @php
                                        $usernya = $user->fullname;
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
                                <tr>
                                    @if ($value->End_Date > date("Y-m-d") && $value->Status == 1)
                                        @php
                                            $num += 1;
                                        @endphp
                                        <td>{{$num}}</td>
                                        <td>{{$value->Start_Date}}</td>
                                        <td>{{$value->FK_ID_SUBSCRIPTION}} Hari</td>
                                        <td>{{$value->End_Date}}</td>
                                        <td>{{$usernya}}</td>
                                        <td>{{$barangnya}}</td>
                                        <td>{{$stnk}}</td>
                                        <td>
                                                <p style='color:red;'>Sedang Di Pinjam</p>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                
                            @endforelse
                            
                        @elseif ($filter == 3)
                            @php
                                    $listTrans = DB::select('SELECT b.nama_motor,tr.FK_ID_Barang,sum(tr.FK_ID_SUBSCRIPTION) as durasi
                                            FROM transaksi tr
                                            INNER JOIN barang b on tr.FK_ID_Barang = b.ID_Barang
                                            WHERE tr.Status = 1 GROUP BY tr.FK_ID_Barang,b.nama_motor');

                            @endphp
                            @forelse ($listTrans as $value)
                                @forelse ($listBarang as $barang)
                                @if ($barang->ID_Barang == $value->FK_ID_Barang)
                                    @php
                                        $barangnya = $barang->Nama_Motor;
                                        $stnk = $barang->No_STNK;
                                        $silinder = $barang->Isi_Silinder;
                                    @endphp
                                @endif
                                @empty
                                @endforelse
                                <tr>
                                    <td>{{$value->nama_motor}}</td>
                                    <td>{{$silinder}}</td>
                                    <td>{{$value->durasi}}</td>
                                </tr>

                            @empty
                                    
                            @endforelse
                        @elseif ($filter == 4)
                            @php
                                $listTrans = DB::select('SELECT u.Username,u.fullname,count(tr.FK_ID_USER) as transaksinya,sum(tr.Total) as total
                                        FROM transaksi tr
                                        INNER JOIN user u on tr.FK_ID_USER = u.ID_User
                                        WHERE tr.Status = 1 GROUP BY u.Username,u.fullname');
                            @endphp
                            @forelse ($listTrans as $value)
                                <tr>
                                    <td>{{$value->Username}}</td>
                                    <td>{{$value->fullname}}</td>
                                    <td>{{$value->transaksinya}}</td>
                                    <td>Rp {{number_format($value->total,2,",",".")}}</td>
                                </tr>
                                
                            @empty
                                
                            @endforelse
                        @elseif ($filter == 5)
                            @php
                            $listTrans = DB::select('SELECT k.Username_Karyawan,k.Nama_Karyawan,count(tr.FK_ID_KARYAWAN) as transaksinya,sum(tr.Total) as total
                                    FROM transaksi tr
                                    INNER JOIN karyawan k on tr.FK_ID_KARYAWAN = k.ID_Karyawan
                                    WHERE tr.Status = 1 GROUP BY k.Username_Karyawan,k.Nama_Karyawan');
                            @endphp
                            @forelse ($listTrans as $value)
                                <tr>
                                    <td>{{$value->Username_Karyawan}}</td>
                                    <td>{{$value->Nama_Karyawan}}</td>
                                    <td>{{$value->transaksinya}}</td>
                                    <td>Rp {{number_format($value->total,2,",",".")}}</td>
                                </tr>
                                
                            @empty
                                
                            @endforelse
                        @endif
                    </tbody>
                    </form>
                </table>
        </div><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>