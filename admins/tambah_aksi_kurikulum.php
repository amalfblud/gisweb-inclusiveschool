<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the id_sekolah from the URL parameter
    if (isset($_GET["id_sekolah"])) {
        $id_sekolah = $_GET["id_sekolah"];
    } else {
        echo "Error: id_sekolah not found in URL parameter.";
        exit;
    }

    // Get the subjects data
    $subjectsData = $_POST["subjects"];

    // Prepare an array to store the valid subjects data
    $validSubjectsData = [];

    // Loop through the subjects data and filter out invalid entries
    foreach ($subjectsData as $schoolYear => $subjects) {
        // Check if the subjects data is in a valid format
        if (is_array($subjects)) {
            // Loop through the subjects for this school year
            for ($i = 0; $i < count($subjects); $i += 2) {
                $subjectName = $subjects[$i];
                $keterangan = $subjects[$i + 1];

                // Perform SQL INSERT query with id_sekolah
                $sql = "INSERT INTO kurikulum (school_year, subject_name, keterangan, id_sekolah)
                        VALUES ('$schoolYear', '$subjectName', '$keterangan', $id_sekolah)";

                // Execute the query (use prepared statements for security instead)
                if (mysqli_query($koneksi, $sql)) {
                    // Insert successful
                    // You can redirect to a success page or perform other actions here
                } else {
                    // Insert failed
                    echo "Error: " . mysqli_error($koneksi);
                }
            }
        } else {
            // If subjects data is not an array, handle the error here
            echo "Error: Invalid subjects data format.";
        }
    }

    // Define the alert message based on whether the data was successfully added or not
    if (mysqli_affected_rows($koneksi) > 0) {
        $alertMessage = "Data berhasil ditambahkan";
    } else {
        $alertMessage = "Data gagal ditambahkan";
    }

    // Display the JavaScript alert
    echo '<script>
        alert("' . $alertMessage . '");
        window.location.href = "lihat_kurikulum.php?id_sekolah=' . $id_sekolah . '";
    </script>';
    exit; // Make sure to exit after the redirection
}
?>
