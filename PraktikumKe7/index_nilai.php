<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        background-color: rgb(17, 155, 247);
    }
    * {
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI',
            Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .row:after {
        display: grid;
        content: "";
        display: table;
        clear: both;
    }
    .column {
        display: grid;
        float: left;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 10px 30px 25px;
        width: 40%;
        height: 390px;
        margin: 80px 0 0 85px;
    }
    h1{
        text-align: center;
    }
    input[type=text]{
        width: 300px;
        height: 30px;
        padding: 8px 8px;
        margin: 5px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    table{
        padding: 0 0 15px 20px;
    }
    input[type=submit] {
        width: 65px;
        height: 30px;
        background-color: #19d820;
        color: white;
        margin-left: 195px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=submit]:hover {
        background-color: #4CAF50;
    }
    </style>
</head>
<body>
    <div class="row">
        <div class="column">
        <form action="" method="post">
            <h1>Nilai Akhir Mahasiswa</h1>
            <table>
            <tr>
            <td><label>Nama</label></td>
            <td><input type="text" name="nama"/></td>
            </tr>
            <tr>
            <td><label>NIM</label></td>
            <td><input type="text" name="nim" maxlength="10"/></td>
            </tr>
            <tr>
            <td><label>Nilai Tugas</label></td>
            <td><input type="text" name="tugas" maxlength="3"/></td>
            </tr>
            <tr>
            <td><label>Nilai UTS</label></td>
            <td><input type="text" name="uts" maxlength="3"/></td>
            </tr>
            <tr>
            <td><label>Nilai UAS</label></td>
            <td><input type="text" name="uas" maxlength="3"/></td>
            </tr>
            </table>
            <input type="submit" name="submit">
        </form>
        </div>
        <div class="column">
            <h1>Hasil Input</h1>
        <?php
        if (isset($_POST['submit'])) {
            $nama   = $_POST['nama'];
            $nim    = $_POST['nim'];
            $tugas  = $_POST['tugas'];
            $uts    = $_POST['uts'];
            $uas    = $_POST['uas'];
            
            $akhir = ($tugas * 0.4) + ($uts * 0.3) + ($uas * 0.3);
            
            if ($akhir >= 80) {
                $grade = "lulus dengan predikat A";
            }
            elseif ($akhir >= 70) {
                $grade = "lulus dengan predikat B";
            }
            elseif ($akhir >= 60) {
                $grade = "lulus dengan predikat C";
            }
            else {
                $grade = "gagal dengan predikat D";
            }
            
            echo "
                Nama : $nama<br>
                NIM : $nim<br>
                <br>
                Nilai Tugas : $tugas<br>
                Nilai UTS : $uts<br>
                Nilai UAS : $uas<br>
                <br>
                Nilai Akhir : $akhir<br>
                Anda dinyatakan $grade<br>
                <br>
            ";
        }
        ?>
        </div>
    </div>
</body>
</html>