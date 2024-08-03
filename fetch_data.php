<?php
function fetchData($koneksi, $id_sekolah) {
    $data = array();

    // Fetch data from the 'sekolah' table
    $sekolahQuery = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE id_sekolah = '" . mysqli_real_escape_string($koneksi, $id_sekolah) . "'");

    // Check if the query was successful
    if ($sekolahQuery) {
        // Fetch the data row
        $sekolahData = mysqli_fetch_assoc($sekolahQuery);

        // Extract the column values into separate variables
        $data['id_sekolah'] = $sekolahData['id_sekolah'];
        $data['nama_sekolah'] = $sekolahData['nama_sekolah'];
        $data['nama_kepsek'] = $sekolahData['nama_kepsek'];
        $data['akreditasi'] = $sekolahData['akreditasi'];
        $data['kebsus'] = $sekolahData['kebsus'];
        $data['kurikulum'] = $sekolahData['kurikulum'];
        $data['latitude'] = $sekolahData['latitude'];
        $data['longitude'] = $sekolahData['longitude'];
    } else {
        // Handle the query error
        echo "Error: " . mysqli_error($koneksi);
        return false;
    }

    // Fetch data from the 'profil' table
    $profilQuery = mysqli_query($koneksi, "SELECT * FROM profil WHERE id_sekolah = '" . mysqli_real_escape_string($koneksi, $id_sekolah) . "'");

    // Check if the query was successful
    if ($profilQuery) {
        // Fetch the data row
        $profilData = mysqli_fetch_assoc($profilQuery);

        // Extract the column values into separate variables
        $data['status'] = $profilData['status'];
        $data['npsn'] = $profilData['npsn'];
        $data['bentukpend'] = $profilData['bentukpend'];
        $data['statuspem'] = $profilData['statuspem'];
        $data['tglpen'] = $profilData['tglpen'];
        $data['tglskpen'] = $profilData['tglskpen'];
        $data['skizin'] = $profilData['skizin'];
    } else {
        // Handle the query error
        echo "Error: " . mysqli_error($koneksi);
        return false;
    }

// Fetch data from the 'rekap' table
    $rekapQuery = mysqli_query($koneksi, "SELECT * FROM rekap WHERE id_sekolah = '" . mysqli_real_escape_string($koneksi, $id_sekolah) . "'");

    // Check if the query was successful
    if ($rekapQuery) {
        // Fetch the data row
        $rekapData = mysqli_fetch_assoc($rekapQuery);

        // Extract the column values into separate variables
        $data['id_sekolah'] = $rekapData['id_sekolah'];
        $data['r_pimpinan'] = $rekapData['r_pimpinan'];
        $data['r_guru'] = $rekapData['r_guru'];
        $data['r_kelas'] = $rekapData['r_kelas'];
        $data['r_perpus'] = $rekapData['r_perpus'];
        $data['r_labo'] = $rekapData['r_labo'];
        $data['r_prak'] = $rekapData['r_prak'];
        $data['r_ibadah'] = $rekapData['r_ibadah'];
        $data['r_uks'] = $rekapData['r_uks'];
        $data['r_tu'] = $rekapData['r_tu'];
        $data['r_bk'] = $rekapData['r_bk'];
        $data['r_osis'] = $rekapData['r_osis'];
        $data['r_toilet'] = $rekapData['r_toilet'];
        $data['r_gudang'] = $rekapData['r_gudang'];
        $data['r_berolahraga'] = $rekapData['r_berolahraga'];

        // Fetch data from the 'data_ptkpd' table using the fetched id_rekap
        $id_rekap = $rekapData['id_rekap'];
        $dataPTKPDQuery = mysqli_query($koneksi, "SELECT * FROM data_ptkpd WHERE id_rekap = '" . mysqli_real_escape_string($koneksi, $id_rekap) . "'");

        // Check if the query was successful
        if ($dataPTKPDQuery) {
            // Fetch the data row
            $dataPTKPDData = mysqli_fetch_assoc($dataPTKPDQuery);

            // Extract the column values into separate variables
            $data['guru_laki'] = $dataPTKPDData['guru_laki'];
            $data['guru_perem'] = $dataPTKPDData['guru_perem'];
            $data['tendik_laki'] = $dataPTKPDData['tendik_laki'];
            $data['tendik_perem'] = $dataPTKPDData['tendik_perem'];
            $data['pd_laki'] = $dataPTKPDData['pd_laki'];
            $data['pd_perem'] = $dataPTKPDData['pd_perem'];
        } else {
            // Handle the query error
            echo "Error: " . mysqli_error($koneksi);
            return false;
        }
    } else {
        // Handle the query error
        echo "Error: " . mysqli_error($koneksi);
        return false;
    }


    // Fetch data from the 'kontak' table
    $kontakQuery = mysqli_query($koneksi, "SELECT * FROM kontak WHERE id_sekolah = '" . mysqli_real_escape_string($koneksi, $id_sekolah) . "'");

    // Check if the query was successful
    if ($kontakQuery) {
        // Fetch the data row
        $kontakData = mysqli_fetch_assoc($kontakQuery);

        // Extract the column values into separate variables
        $data['alamat'] = $kontakData['alamat'];
        $data['rtrw'] = $kontakData['rtrw'];
        $data['kelurahan'] = $kontakData['kelurahan'];
        $data['kecamatan'] = $kontakData['kecamatan'];
        $data['kabupaten'] = $kontakData['kabupaten'];
        $data['provinsi'] = $kontakData['provinsi'];
        $data['kode_pos'] = $kontakData['kode_pos'];
        $data['notelp'] = $kontakData['notelp'];
        $data['nofaks'] = $kontakData['nofaks'];
        $data['email'] = $kontakData['email'];
        $data['situs'] = $kontakData['situs'];
    } else {
        // Handle the query error
        echo "Error: " . mysqli_error($koneksi);
        return false;
    }

    // Fetch data from the 'kurikulum' table
    $kurikulumQuery = mysqli_query($koneksi, "SELECT * FROM kurikulum WHERE id_sekolah = '" . mysqli_real_escape_string($koneksi, $id_sekolah) . "'");

    // Check if the query was successful
    if ($kurikulumQuery) {
        // Store the kurikulum data in an array
        $kurikulumData = array();
        while ($row = mysqli_fetch_assoc($kurikulumQuery)) {
            $kurikulumData[] = $row;
        }
        $data['kurikulum_data'] = $kurikulumData;
    } else {
        // Handle the query error
        echo "Error: " . mysqli_error($koneksi);
        return false;
    }

    return $data;
}
