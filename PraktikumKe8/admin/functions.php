<?php

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "toko_kamera");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    };
    return $rows;
}

//FUNGSI UNTUK BARANG
//tambah barang
function tambah($data) {
    global $conn;
    $kode_barang = htmlspecialchars($data["kode_barang"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $spesifikasi = htmlspecialchars($data["spesifikasi"]);
    $harga_barang = htmlspecialchars($data["harga_barang"]);

    //$foto_produk = htmlspecialchars($data["foto_produk"]);

    //uplaod gambar/foto
    $foto_produk = upload();
    if ( !$foto_produk) {
        return false;
    }

    $query = "INSERT INTO tb_barang VALUES 
            ('','$kode_barang','$nama_barang','$kategori','$spesifikasi',$harga_barang,'$foto_produk')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//upload foto produk / barang
function upload() {
    $namaFile = $_FILES['foto_produk']['name'];
    $ukuranFile = $_FILES['foto_produk']['size'];
    $error = $_FILES['foto_produk']['error'];
    $tmpName = $_FILES['foto_produk']['tmp_name'];

    //cek apakah tidak ada gambar yg diupload
    if ( $error === 4) {
        echo "
            <script>
                alert('pilih gambar dahulu!');
                document.location.href = 'lihat barang.php';
            </script>
            ";
        return false;
    }

    //cek apakah file yg diupload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('Yang anda upload bukan gambar!');
                document.location.href = 'lihat barang.php';
            </script>
            ";
        return false;
    }

    //cek jika gambar ukuran terlalu besar
    if ( $ukuranFile === 1000000 ) {
        echo "
            <script>
                alert('Ukuran gambar terlalu besar!');
                document.location.href = 'lihat barang.php';
            </script>
            ";
        return false;
    }

    //generate nama gambar baru, biar file tdk sama
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //lulus pengecekan dan generate, gambar siap diupload
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

//hapus data barang
function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_barang WHERE id = $id");

    return mysqli_affected_rows($conn);
}

//ubah data barang
function ubah($data) {
    global $conn;
    $id = $data["id"];
    $kode_barang = htmlspecialchars($data["kode_barang"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $spesifikasi = htmlspecialchars($data["spesifikasi"]);
    $harga_barang = htmlspecialchars($data["harga_barang"]);
    $gambarLama = $data["gambarLama"];

    //cek user apakah pilih gambar baru atau gak
    if( $_FILES['foto_produk']['error'] === 4){
        $foto_produk = $gambarLama;
    } else {
        $foto_produk = upload();
    }
    

    $query = "UPDATE tb_barang SET
                kode_barang = '$kode_barang',
                nama_barang = '$nama_barang',
                kategori = '$kategori',
                spesifikasi = '$spesifikasi',
                harga_barang = $harga_barang,
                foto_produk = '$foto_produk'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//fungsi cari barang
function cari($keyword) {
    $query = "SELECT * FROM tb_barang
                WHERE
                kode_barang LIKE '%$keyword%' OR
                nama_barang LIKE '%$keyword%' OR
                kategori LIKE '%$keyword%' OR
                spesifikasi LIKE '%$keyword%' OR
                harga_barang LIKE '%$keyword%'
            ";
    return query($query);
}

//registrasi ADMIN
function registrasi($data) {
    global $conn;
    $username = strtolower(stripslashes(htmlspecialchars($data["username"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

    if ( mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('username sudah terdaftar!');
            </script>
            ";
        return false;
    }

    //cek konfirmasi password
    if ( $password != $password2 ) {
        echo "
            <script>
                alert('konfirmasi password tidak sesuai!');
            </script>
            ";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //$password = md5($password);
    
    //tambahkan admin baru ke database
    mysqli_query($conn, "INSERT INTO admin VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

//FUNGSI UNTUK CUSTOMER / USER
function uploadFotoUser() {
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    //cek apakah tidak ada gambar yg diupload
    if ( $error === 4) {
        echo "
            <script>
                alert('pilih gambar dahulu!');
                document.location.href = 'ubah user.php';
            </script>
            ";
        return false;
    }

    //cek apakah file yg diupload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('Yang anda upload bukan gambar!');
                document.location.href = 'ubah user.php';
            </script>
            ";
        return false;
    }

    //cek jika gambar ukuran terlalu besar
    if ( $ukuranFile === 1000000 ) {
        echo "
            <script>
                alert('Ukuran gambar terlalu besar!');
                document.location.href = 'ubah user.php';
            </script>
            ";
        return false;
    }

    //generate nama gambar baru, biar file tdk sama
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //lulus pengecekan dan generate, gambar siap diupload
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

//hapus data user
function hapusUser($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_user WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubahUser($data) {
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $no_telpon = htmlspecialchars($data["no_telpon"]);
    $username = strtolower(stripslashes(htmlspecialchars($data["username"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $gambarLama = $data["gambarLama"];

    //cek konfirmasi password
    if ( $password != $password2 ) {
        echo "
            <script>
                alert('konfirmasi password tidak sesuai!');
            </script>
            ";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //cek user apakah pilih gambar baru atau gak
    if( $_FILES['foto']['error'] === 4){
        $foto = $gambarLama;
    } else {
        $foto = uploadFotoUser();
    }
    

    $query = "UPDATE tb_user SET
                username = '$username',
                password = '$password',
                nama = '$nama',
                email = '$email',
                no_telpon = $no_telpon,
                foto = '$foto'
                WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


?>