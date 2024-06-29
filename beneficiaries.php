<?php
$pagename = "Beneficiaries";
require "header.php";
?>

<div class="container my-4 py-4">
    <div class="row my-4 py-4">
        <center>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#beneficiaries-modal">
                Add new beneficiary
            </button>
        </center>
    </div>
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card">
                <div class="card-header h3">
                    My Beneficiaries
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Account Number</th>
                                    <th>Address</th>
                                    <th>Zip code</th>
                                    <th>Bank Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM beneficiaries WHERE user_id='$id'");
                                if (mysqli_num_rows($query) > 0) {
                                    while ($beneficiaries = mysqli_fetch_assoc($query)) {
                                        $beneficiary_name = $beneficiaries['name'];
                                        $aza = $beneficiaries['account_number'];
                                        $zip = $beneficiaries['zip'];
                                        $bank_name = $beneficiaries['bank_name'];
                                        $home_address = $beneficiaries['address'];

                                ?>

                                        <tr>
                                            <td>
                                                <?php echo $beneficiary_name; ?>
                                            </td>
                                            <td>
                                                <?php echo $aza; ?>
                                            </td>
                                            <td>
                                                <?php echo $home_address; ?>
                                            </td>
                                            <td>
                                                <?php echo $zip; ?>
                                            </td>
                                            <td>
                                                <?php echo $bank_name; ?>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="beneficiaries-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header h3">
                    Add a new beneficiary
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group my-2">
                            <label class="form-label">
                                Beneficiary Name
                            </label>
                            <input type="text" class="form-control" placeholder="Enter Beneficiary Name" name="beneficiary_name" />
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label">
                                Beneficiary Account Number
                            </label>
                            <input type="text" class="form-control" placeholder="Enter Beneficiary Account Number" name="beneficiary_account" />
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label">
                                Beneficiary Bank Name
                            </label>
                            <input type="text" class="form-control" placeholder="Enter Beneficiary Bank Name" name="beneficiary_bank" />
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label">
                                Beneficiary Address
                            </label>
                            <input type="text" class="form-control" placeholder="Enter Beneficiary Address" name="beneficiary_address" />
                        </div>
                        <div class="form-group my-2">
                            <label class="form-label">
                                Beneficiary Zip
                            </label>
                            <input type="number" class="form-control" placeholder="Enter Beneficiary Zip" name="beneficiary_zip" />
                        </div>
                        <div class="form-group my-2">
                            <button type="submit" class="btn btn-primary" name="add">
                                Add beneficiary
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>



<?php
require "footer.php";


if (isset($_POST['add'])) {
    $benef_name = mysqli_real_escape_string($conn, $_POST['beneficiary_name']);
    $benef_account = mysqli_real_escape_string($conn, $_POST['beneficiary_account']);
    $benef_bank = mysqli_real_escape_string($conn, $_POST['beneficiary_bank']);
    $benef_zip = mysqli_real_escape_string($conn, $_POST['beneficiary_zip']);
    $benef_address = mysqli_real_escape_string($conn, $_POST['beneficiary_address']);

    $insert = mysqli_query($conn, "INSERT INTO beneficiaries(user_id,name,account_number,zip,address,bank_name)VALUES('$id','$benef_name','$benef_account','$benef_zip','$benef_address','$benef_bank')");
    if ($insert) {
?>
        <script>
            swal('Success', 'New Beneficiary Added', 'success')
                .then(() => {
                    location.replace('beneficiaries.php')
                })
        </script>
<?php
    }
}
?>