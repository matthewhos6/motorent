<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <center><h1>Welcome, {{Session::get('loguser')}}</h1>
    <form action="{{ url("/admin/logout") }}" method="post">
        @csrf
        <button value="1" name="btnLogout" type="submit" class="btn btn-danger">Logout</button> 
        <button value="1" name="btnListBarang" type="submit" class="btn btn-primary">Back</button>
    </form>
    <!-- <button name="btnchart" type="submit" class="btn btn-secondary">Chart Barang</button>  -->
    <hr></center>
    <div class="container">
        <h2>Details :</h2>
        @forelse ($listBarang as $value)
            <form action="{{ url("/admin/actionbarang") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <br>ID : <input enable="false" type="text" name="id" value="{{$value->ID_Barang}}" readonly>
                <br>Nama : <input type="text" name="nama" value="{{$value->Nama_Motor}}">
                <br>Warna : <input type="text" name="warna" value="{{$value->Warna_Motor}}">
                <br>Silinder : <input type="number" name="silinder" value="{{$value->Isi_Silinder}}">
                <br>Harga Sewa : <input type="number" name="harga" value="{{$value->Harga_sewa}}">
                <br>Plat : <input type="text" name="plat" value="{{$value->Plat}}">
                <br>Tahun Produksi : <input type="date" name="tahun" value="{{$value->Tahun_Pembuatan}}">
                <br>No Rangka : <input type="text" name="rangka" value="{{$value->No_Rangka}}">
                <br>No Mesin : <input type="text" name="mesin" value="{{$value->No_Mesin}}">
                <br>No BPKB : <input type="text" name="bpkb" value="{{$value->No_BPKB}}">
                <br>No STNK : <input type="text" name="stnk" value="{{$value->No_STNK}}">
                <br>Status : <select name="status" id="" value="{{$value->Status}}">
                            <option value='1'>Telat</option>
                            <option value='2'>dipinjam</option>
                            <option value='3'>ready</option>
                </select><br>
                Gambar : <input type="file" name="photo[]"> <br>
                <button name="btnEditBarang" value="{{$value->ID_Barang}}" type="submit" class="btn btn-warning">Save</button>
                <button name="btnDeleteBarang" value="{{$value->ID_Barang}}" type="submit" class="btn btn-danger">Delete</button>
            </form>
        @empty
            
        @endforelse

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>