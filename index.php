<?php
// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penduduk_db";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel penduduk
$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1px'>
            <tr>
                <th>Kecamatan</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Luas</th>
                <th>Jumlah Penduduk</th>
                <th>Action</th>
            </tr>";

    // Output data tiap baris
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["kecamatan"] . "</td>
                <td>" . $row["longitude"] . "</td>
                <td>" . $row["latitude"] . "</td>
                <td>" . $row["luas"] . "</td>
                <td align='right'>" . $row["jumlah_penduduk"] . "</td>
                <td><a href='delete.php?kecamatan=" . urlencode($row["kecamatan"]) . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a></td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Menutup koneksi
$conn->close();
?>
