<?php
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function row_query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function kode_pesanan()
{
    global $conn;
    $latest = mysqli_query($conn, "SELECT kode_pesanan FROM pesanan ORDER BY id_pesanan DESC LIMIT 1");

    if (mysqli_num_rows($latest) != 0) {
        $row = mysqli_fetch_assoc($latest);
        $kode = substr($row['kode_pesanan'], 3, 6) + 1;
        return 'INV' . sprintf('%06s', $kode);
    }else{
        return 'INV' . sprintf('%06s', 1);;
    }
}
