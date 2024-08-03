<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "menu_sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "menu_topbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Data Kurikulum Sekolah</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                        </div>
                        <div class="card-body">
                            <!-- Main content -->
                            <form id="dynamic-form" class="form-horizontal style-form" style="margin-top: 10px;" action="tambah_aksi_kurikulum.php?id_sekolah=<?php echo $_GET['id_sekolah']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <!-- Year Dropdown -->
                                <h6 class="m-0 font-weight-bold text-primary">Pilih Kelas: </h6>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <select id="school-year" class="form-select">
                                            <option value="year1">Kelas 1</option>
                                            <option value="year2">Kelas 2</option>
                                            <option value="year3">Kelas 3</option>
                                            <option value="year4">Kelas 4</option>
                                            <option value="year5">Kelas 5</option>
                                            <option value="year6">Kelas 6</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Subject and Keterangan Inputs (will be dynamically generated) -->
                                <div id="subject-keterangan-container">
                                    <!-- The subjects and keterangan inputs will be added here -->
                                </div>
                                <!-- Add more and Remove form fields buttons -->
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-2 col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <button type="button" id="add-subject" class="btn btn-primary btn-sm">Tambah Form</button>
                                        <button type="button" id="remove-subject" class="btn btn-danger btn-sm">Hapus Form</button>
                                    </div>
                                </div>
                                <!-- Save Button -->
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-2 col-sm-4 control-label"></label>
                                    <div class="col-sm-8">
                                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />
                                        <a href="javascript:history.back()" class="btn btn-secondary btn-sm ms-2" aria-label="Kembali">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php include "footer.php"; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to generate subject and keterangan inputs for the selected school year
        function generateSubjectInputs(selectedYear) {
            const numberOfSubjects = getNumberOfSubjects(selectedYear);
            let subjectInputs = '';
            for (let i = 1; i <= numberOfSubjects; i++) {
                subjectInputs += `
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Mata Pelajaran ${i}:</label>
                        <div class="col-sm-6">
                            <input name="subjects[${selectedYear}][subject${i}]" type="text" class="form-control" placeholder="Masukkan Nama Mata Pelajaran ${i}" required/>
                        </div>
                        <div class="col-sm-6">
                            <input name="subjects[${selectedYear}][keterangan${i}]" type="text" class="form-control" placeholder="Masukkan Keterangan Mata Pelajaran ${i}" />
                        </div>
                    </div>
                `;
            }
            $("#subject-keterangan-container").html(subjectInputs);
        }

        // Function to get the number of existing subjects for the selected school year
        function getNumberOfSubjects(selectedYear) {
            const subjects = $(`[name="subjects[${selectedYear}][]"]`);
            return subjects.length / 2; // Divide by 2 to get the number of subjects (subject and keterangan inputs)
        }

        // Initial generation of subject inputs for the first school year
        $(document).ready(function () {
            generateSubjectInputs("year1");

            // Listen for changes in the selected school year or level
            $("#school-year").on("change", function () {
                const selectedYear = $(this).val();
                generateSubjectInputs(selectedYear);
            });

            // Add subject inputs dynamically
            $("#add-subject").on("click", function () {
                const selectedYear = $("#school-year").val();
                const numberOfSubjects = getNumberOfSubjects(selectedYear) + 1; // Count existing subjects and add 1
                const newSubjectInput = `
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Mata Pelajaran ${numberOfSubjects}:</label>
                        <div class="col-sm-6">
                            <input name="subjects[${selectedYear}][]" type="text" class="form-control" placeholder="Masukkan Nama Mata Pelajaran ${numberOfSubjects}" required/>
                        </div>
                        <div class="col-sm-6">
                            <input name="subjects[${selectedYear}][]" type="text" class="form-control" placeholder="Masukkan Keterangan Mata Pelajaran ${numberOfSubjects}" />
                        </div>
                    </div>
                `;
                $("#subject-keterangan-container").append(newSubjectInput);
            });

            // Remove subject inputs dynamically
            $("#remove-subject").on("click", function () {
                const selectedYear = $("#school-year").val();
                const numberOfSubjects = getNumberOfSubjects(selectedYear);
                if (numberOfSubjects > 1) {
                    $("#subject-keterangan-container").children().last().remove();
                }
            });
        });
    </script>

</body>
</html>
