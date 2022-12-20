@extends('layout.user.master')
@section('title','History')
@section('history','active')
@section('content')
@php
        $listUser = DB::table('user')->where("Username","=",Session::get("login"))->get()->first();
        $listTrans = DB::table('transaksi')->where("FK_ID_USER","=",$listUser->ID_User)->get();
        // dd($listUser);
        $listKaryawan = DB::table('karyawan')->get();
        $listBarang = DB::table('barang')->get();
        $filter = Session::get('filtertrans');
    @endphp
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
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($listTrans as $value)
        @php
            $usernya = "";
            $karyawannya = "";
            $barangnya = "";
            $stnk = "";
            $kode_ambil = $value->kode_ambil;
        @endphp
            <tr>
                <td>{{$value->ID_Trans}}</td>
                <td>{{$value->Tanggal_Trans}}</td>
                <td>{{$value->FK_ID_SUBSCRIPTION}} Hari</td>
                    {{-- @php
                        dd($user);
                    @endphp --}}
                    @if ($listUser->ID_User == $value->FK_ID_USER)
                        @php
                            $usernya = $listUser->fullname;
                        @endphp
                    @endif
                    
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
                            <p style='color: green;'>Accepted</p><p style='color: green;'>Kode pengambilan: {{$kode_ambil}}</p> By: {{$karyawannya}}
                        @else
                            <p style='color: red;'>Rejected</p> By: {{$karyawannya}}
                        @endif
                    @else
                        <p style="color: darkorchid">Pending</p>
                    @endif
                </td>
                <td>
                    @if ($value->Status == 2)
                        <p style='color: green;'>Returned</p>
                    @elseif ($value->Status == -1)
                        
                        <form action="{{url('user/returned/'.$value->ID_Trans )}}" method="post">
                            @csrf
                            <button name="btnReturn" value="{{$value->FK_ID_Barang}}" type="submit" class="btn btn-secondary" disabled>Return</button>
                        </form>
                        
                    @elseif($value->Status == 1)
                        <form action="{{url('user/returned/'.$value->ID_Trans )}}" method="post">
                            @csrf
                            <button name="btnReturn" value="{{$value->FK_ID_Barang}}" type="submit" class="btn btn-success">Return</button>
                        </form>
                    @endif
                </td>
            </tr>
        
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

@endsection
