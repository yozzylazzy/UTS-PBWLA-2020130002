<?php
$motor = [
    "Merk" => 'Kawasaki D-Tracker',
    "Harga" => "36000000",
    "Tenor" => "2",
    "Leasing1" => "Merdeka Leasing",
    "Leasing2" => "Riau Finance"
];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Merdeka Leasing</title>
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
                        <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/riau') }}">Riau Finance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/merdeka') }}">Merdeka Leasing</a>
                    </li>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="jumbotron" style="margin-top:5em">
                <h1>Skema Kredit Merdeka Leasing</h1>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <tbody>
                    <tr>
                        <td>Harga Motor</td>
                        <td>{{'Rp ' . number_format($motor["Harga"], 0, '.', ',')}}</td>
                    </tr>
                    <tr>
                        <td>Uang Muka</td>
                        <td>{{'Rp ' . number_format($motor["Harga"]*0.1, 0, '.', ',')}}</td>
                    </tr>
                    <tr>
                        <td>Bunga/Tahun</td>
                        <td>12%</td>
                    </tr>
                    <tr>
                        <td>Sistem Angsuran</td>
                        <td>Flat</td>
                    </tr>
                    </tr>
                </tbody>
            </table>
            <div class="mt-3">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-dark table-dark">
                        <tr>
                            <th>Bulan Ke :</th>
                            <th>Sisa Kredit</th>
                            <th>Angsuran Pokok</th>
                            <th>Bunga (Rp)</th>
                            <th>Jumlah Angsuran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $angsurandata = [[]];
                        $plafon = ($motor["Harga"] - ($motor["Harga"] * 0.1));
                        $angsuran = $plafon / 24;
                        //sisa kredit 1 = plafon kredit
                        $bunga = 0.12 * $plafon/12;
                        $sisa = 0;
                        for ($i=0; $i <24 ; $i++) { 
                            # code...
                            if($i==0){
                                $sisa = $plafon;
                            } else if ($i > 0) {
                               $sisa = $angsurandata[$i-1]["sisa"]-$angsuran;
                            }
                            $angsurandata[$i] = ["bulan" => $i+1,
                        "sisa" => $sisa, "angsuran" => $angsuran, "bunga" =>$bunga,
                        "jumlah" => $angsuran+$bunga];
                        }
                        
                        // echo $angsurandata[5]['bunga'];

                        ?>

                        @foreach ($angsurandata as $data)
                        <tr>
                            <td>{{$data['bulan']}}</td>
                            <td>{{'Rp ' . number_format($data['sisa'], 0, '.', ',')}}</td>
                            <td>{{'Rp ' . number_format($data['angsuran'], 0, '.', ',')}}</td>
                            <td>{{'Rp ' . number_format($data['bunga'], 0, '.', ',')}}</td>
                            <td>{{'Rp ' . number_format($data['jumlah'], 0, '.', ',')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>