<?php
$motor = ["Merk" => 'Kawasaki D-Tracker', 
"Harga" => "36000000", 
"Tenor"=>"2",
"Leasing1" => "Merdeka Leasing",
"Leasing2" => "Riau Finance"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Beranda</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-top">
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <div class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/riau') }}">Riau Finance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/merdeka') }}">Merdeka Leasing</a>
                    </li>
                </div>
            </div>
        </nav>
    </header>
    <main>
    <div class="container">
            <div class="jumbotron" style="margin-top:5em">
                <h1>Promo Kredit Spesial</h1>
            </div>
            <table class="table table-striped table-bordered table-hover">
              <tbody>
                <tr>
                    <td>Merk & Tipe Motor</td>
                    <td>{{$motor["Merk"]}}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>{{'Rp ' . number_format($motor["Harga"], 0, '.', ',')}}</td>
                </tr>
                <tr>
                    <td>Tenor</td>
                    <td>{{$motor["Tenor"] . " Tahun"}}</td>
                </tr>
                <tr>
                    <td>Leasing Opsi #1</td>
                    <td>{{$motor["Leasing1"]}}</td>
                </tr>
                <tr>
                    <td>Leasing Opsi #2</td>
                    <td>{{$motor["Leasing2"]}}</td>
                </tr>
              </tbody>
            </table>
        </div>
    </main>

</body>

</html>