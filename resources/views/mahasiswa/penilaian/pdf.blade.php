<!DOCTYPE html>
<html>
<head>
    <title>PDF</title>
    <style>

        *{
            font-family: Verdana, sans-serif;
        }
        /* Atur gaya CSS Anda di sini */
        hr {
            border: none;
            border-top: 1px solid #000; /* Warna dan ketebalan garis dapat disesuaikan */
            margin: 20px 0;
        }

        /* Gaya CSS untuk tabel */
    </style>
</head>
<body>

        <div style="width: 80%; background: #FFF; margin: 0 auto;">
            <table border="0" align="center">
                <tr>
                    <td>
                        <img src="{{ public_path('/images/logo-polinema.png') }}" width="120" height="120">
                    </td>
                    <td>
                        <center>
                            <font size="4">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</font> <br>
                            <font size="5">POLITEKNIK NEGERI MALANG</font> <br>
                            <font size="2">Jl. Soekarno Hatta No. 9, Jatimulyo, Lowokwaru, Malang 65141 Telp. (0341) 404424 - 404425, Fax (0341) 404420</font> <br>
                        </center>
                    </td>
                </tr>
            </table>
        
            <hr>
        
            <center>
                <h4>SURAT HASIL REKOMENDASI TOPIK SKRIPSI MAHASISWA JURUSAN TEKNOLOGI INFORMASI</h4>
            </center>

        </div>
        <table border="0" style="width: 50%;">
            <tr>
                <td colspan="1" style="width: 40%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td colspan="8" style="width: 55%;">{{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <td colspan="1">Nim</td>
                <td>:</td>
                <td colspan="8">{{ Auth::user()->nim }}</td>
            </tr>
            <tr>
                <td colspan="1">Program Studi</td>
                <td>:</td>
                <td colspan="8">{{ Auth::user()->major }}</td>
            </tr>
            <tr>
                <td colspan="1">Kelas</td>
                <td>:</td>
                <td colspan="8">{{ Auth::user()->class }}</td>
            </tr>
        </table>

        <center>
            <h3>Hasil rangking</h3>
        </center>
        
        <div class="tablex">
            <table style=" width: 100%;
            border-collapse: collapse;
            margin-top: 20px; 
            border: 1px solid black; /* Garis untuk sel dan header */
            padding: 8px;">
                <thead>
                    <tr>
                        <th style="width: 10%;  border: 1px solid black; /* Garis untuk sel dan header */
                        padding: 8px;">No.</th>
                        <th style="width: 90%;  border: 1px solid black; /* Garis untuk sel dan header */
                        padding: 8px;">Alternatif</th>
                        {{-- <th>No. Telepon</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i < count($rangking)+1; $i++)      
                        <tr>
                            <td style="border: 1px solid black; /* Garis untuk sel dan header */
                            padding: 8px;  border: 1px solid black; /* Garis untuk sel dan header */
                padding: 8px; text-align: center;">{{ $i }}</td>
                            <td style="border: 1px solid black; /* Garis untuk sel dan header */
                            padding: 8px;  border: 1px solid black; /* Garis untuk sel dan header */
                padding: 8px;">{{ $rangking[$i-1][0] }}</td>
                            {{-- <td>1234567890</td> --}}
                        </tr>
                    @endfor
                    <!-- Tambahkan baris lain sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
</body>
</html>