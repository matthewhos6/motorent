<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <div class="row ms-5 mt-5">
        <div class="col-10">
            <h1 class="display-3 text-uppercase mb-5">Welcome, {{Session::get('loguser')}}</h1>
        </div>
        <div class="col-2">
            <a href="{{url('/admin/logout')}}" class="btn btn-danger">Logout</a>
        </div>
    </div>

    @php
        $listTrans = DB::table('transaksi')->get();
        $listUser = DB::table('user')->get();
        $listKaryawan = DB::table('karyawan')->get();
        $listBarang = DB::table('barang')->get();
        $filter = Session::get('filtertrans');
    @endphp
    <div class="container-fluid py-5 mt-5">
        <div class="container pt-5 pb-3">
            <div class="row" style="margin-top: -170px;">
    <form action="{{url('admin/filtertrans' )}}" method="post">
        @csrf
        <span><h2>Transaksi</h2>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-10">
                        <input id="filter1" type="radio" id="filter" name="filter" value="All"> Show All
                        <input id="filter2" type="radio" id="filter" name="filter" value="Accepted" style="margin-left: 20px"> Accepted
                        <input id="filter3" type="radio" id="filter" name="filter" value="Rejected" style="margin-left: 20px"> Rejected </span>
                        <input id="filter4" type="radio" id="filter" name="filter" value="Pending" style="margin-left: 20px"> Pending </span><br>
                    </div>
                    <div class="col-2">
                        <button align="right" name="btnFilter" type="submit" class="btn btn-success">Apply</button>
                    </div>
                </div>
            </div>
            <div class="col-6"></div>
        </div>
    </form>
    
    <table class="table table-success table-striped mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Durasi</th>
                            <th>Customer</th>
                            <th>Barang</th>
                            <th>No STNK</th>
                            <th>Total</th>                  
                            {{-- <th>Bukti bayar</th> --}}
                            <th>Action/Status</th>
                            <th>Input pengambilan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($listTrans as $value)
                        @php
                            $usernya = "";
                            $karyawannya = "";
                            $barangnya = "";
                            $stnk = "";
                        @endphp
                        @if ($filter == null || $filter == "All")
                            <tr>
                                <td>{{$value->ID_Trans}}</td>
                                <td>{{$value->Tanggal_Trans}}</td>
                                <td>{{$value->FK_ID_SUBSCRIPTION}} Hari</td>
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
                                <td>
                                    @if ($value->Status != 0)
                                        @if ($value->Status == 1 || $value->Status == 2)
                                            <p style='color: green;'>Accepted</p> By: {{$karyawannya}}
                                        @else
                                            <p style='color: red;'>Rejected</p> By: {{$karyawannya}}
                                        @endif
                                    @else
                                        <form action="{{url('admin/transstatus/'.$value->ID_Trans.'/'.Session::get('logid') )}}" method="post">
                                            @csrf
                                            <button name="btnRejectTrans" value="1" type="submit" class="btn btn-danger">Reject</button>
                                            <button name="btnAcceptTrans" value="1" type="submit" class="btn btn-success">Accept</button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($value->Status == 1 || $value->Status == 2)
                                            @if ($value->sudah_diambil == null)
                                            <form method="POST" action="{{url('admin/ambilmotor/'.$value->ID_Trans)}}">
                                                @csrf
                                                <input type="text" name="inp_kode">
                                                <button type="submit" class="btn btn-success">Check</button>
                                            </form>
                                            <p style="color: red">{{Session::get('salah'.$value->ID_Trans)}}</p>
                                            @else
                                                <p style='color: green;'>Telah diambil</p>
                                            @endif
                                        @else
                                            <h1 style='color: red;'>X</h1>
                                        @endif
                                    
                                </td>
                            </tr>
                        @elseif ($filter == "Accepted" && ($value->Status == 1 || $value->Status == 2))
                            <tr>
                                <td>{{$value->ID_Trans}}</td>
                                <td>{{$value->Tanggal_Trans}}</td>
                                <td>{{$value->FK_ID_SUBSCRIPTION}} Hari</td>
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
                                
                                <td>
                                    @if ($value->Status != 0)
                                        @if ($value->Status == 1 || $value->Status == 2)
                                            <p style='color: green;'>Accepted</p> By: {{$karyawannya}}
                                        @else
                                            <p style='color: red;'>Rejected</p> By: {{$karyawannya}}
                                        @endif
                                    @else
                                        <form action="{{url('admin/transstatus/'.$value->ID_Trans.'/'.Session::get('logid') )}}" method="post">
                                            @csrf
                                            <button name="btnRejectTrans" value="1" type="submit" class="btn btn-danger">Reject</button>
                                            <button name="btnAcceptTrans" value="1" type="submit" class="btn btn-success">Accept</button>
                                        </form>
                                    @endif
                                    <td></td>
                                </td>
                            </tr>
                        @elseif ($filter == "Rejected" && $value->Status == -1)
                            <tr>
                                <td>{{$value->ID_Trans}}</td>
                                <td>{{$value->Tanggal_Trans}}</td>
                                <td>{{$value->FK_ID_SUBSCRIPTION}} Hari</td>
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
                                <td>
                                    @if ($value->Status != 0)
                                        @if ($value->Status == 1 || $value->Status == 2)
                                            <p style='color: green;'>Accepted</p> By: {{$karyawannya}}
                                        @else
                                            <p style='color: red;'>Rejected</p> By: {{$karyawannya}}
                                        @endif
                                    @else
                                        <form action="{{url('admin/transstatus/'.$value->ID_Trans.'/'.Session::get('logid') )}}" method="post">
                                            @csrf
                                            <button name="btnRejectTrans" value="1" type="submit" class="btn btn-danger">Reject</button>
                                            <button name="btnAcceptTrans" value="1" type="submit" class="btn btn-success">Accept</button>
                                        </form>
                                    @endif
                                </td>
                                <td></td>
                            </tr>
                        @elseif ($filter == "Pending" && $value->Status == 0)
                            <tr>
                                <td>{{$value->ID_Trans}}</td>
                                <td>{{$value->Tanggal_Trans}}</td>
                                <td>{{$value->FK_ID_SUBSCRIPTION}} Hari</td>
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
                                        @if ($value->Status == 1 || $value->Status == 2)
                                            <p style='color: green;'>Accepted</p> By: {{$karyawannya}}
                                        @else
                                            <p style='color: red;'>Rejected</p> By: {{$karyawannya}}
                                        @endif
                                    @else
                                        <form action="{{url('admin/transstatus/'.$value->ID_Trans.'/'.Session::get('logid') )}}" method="post">
                                            @csrf
                                            <button name="btnRejectTrans" value="1" type="submit" class="btn btn-danger">Reject</button>
                                            <button name="btnAcceptTrans" value="1" type="submit" class="btn btn-success">Accept</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endif
                        
                      @empty
                        <tr>
                            <td colspan="9">BELUM ADA TRANSAKSI!</td>
                        </tr>
                      @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>