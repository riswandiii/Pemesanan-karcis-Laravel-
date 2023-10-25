<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: rgb(8, 5, 5);
}
</style>
</head>
<body>

<center><h1>KARCIS</h1></center>
<center><h3>WISATA SALU PAJAAN</h3></center>

<table id="customers">
  <tr>
        <th>Nama Pemesan</th>
        <th>:</th>
        <th>{{ $cetak->user->fullname }}</th>
  </tr>
  <tr>
    <th>Email</th>
    <th>:</th>
    <th>{{ $cetak->user->email }}</th>
  </tr>
  <tr>
  <tr>
    <th>Tanggal pesanan</th>
    <th>:</th>
    <th>{{ $cetak->tanggal_pesanan }}</th>
  </tr>
  <tr>
    <th>Total</th>
    <th>:</th>
    <th>Rp. {{ number_format($cetak->total) }}</th>
  </tr>
</table>

<p><Strong>Alamat : </Strong> Kecamatan Binuang, Desa Batetangnga, Polewali Mandar</p>

</body>
</html>


