<?php
$pagename = "Transfer to the same  bank";
require "header.php";
$user_id = $_SESSION['user_id'];

?>

<div class="container">
  <div class="row my-4 py-4">
    <div class="col-lg-6 mx-auto my-4">

      <h3 class="mb-0 text-blue">Transfer To another account </h3><br />
      <div class="card  mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">

          <h5 class="mb-0 ">Available balance : $<?php echo $rem_bal; ?></h5><br />




          <small class="text-muted float-end"></small>
        </div>
        <div class="card-body">
          <form method="post" id="transferForm">
            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-email">Select Beneficiary (optional)</label>
              <select name="beneficiary" class="form-select border" onchange="getBenef(this.value)">
                <option hidden selected>Select beneficiary</option>
                <?php
                $get_portfolios = mysqli_query($conn, "SELECT * FROM beneficiaries WHERE user_id='$id'");
                while ($accounts = mysqli_fetch_assoc($get_portfolios)) {
                  $id = $accounts['id'];

                  $benef_name = $accounts['name'];
                ?>
                  <option value="<?php echo $id; ?>"><?php echo $benef_name; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-email">Enter account number to transfer</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class='bx bx-dollar-circle'></i></span>
                <input type="text" name="tf" id="to" class="form-control" placeholder="Enter Account Number" aria-label="email" aria-describedby="basic-icon-default-email2" required />
              </div>
            </div>

            <!--<div class="mb-3">-->
            <!--  <label class="form-label" for="basic-icon-default-email" >Beneficiary Fullname</label>-->
            <!--  <div class="input-group input-group-merge">-->
            <!--    <span class="input-group-text"><i class='bx bx-user'></i></span>-->
            <!--    <input-->
            <!--      type="text"-->
            <!--      name="benef_name"-->
            <!--      id="benef_name"-->
            <!--      class="form-control"-->
            <!--      placeholder="Enter Beneficiary Name"-->
            <!--      aria-label="email"-->
            <!--      aria-describedby="basic-icon-default-email2"-->
            <!--      required-->
            <!--    />-->
            <!--  </div>-->
            <!--</div>-->

            <!--<div class="mb-3">-->
            <!--  <label class="form-label" for="basic-icon-default-email">Beneficiary Bank Name</label>-->
            <!--  <div class="input-group input-group-merge">-->
            <!--    <span class="input-group-text"><i class='bx bxs-bank'></i></span>-->
            <!--    <input-->
            <!--      type="text"-->
            <!--      name="benef_bank"-->
            <!--      id="benef_bank"-->
            <!--      class="form-control"-->
            <!--      placeholder="Enter Beneficiary Bank"-->
            <!--      aria-label="email"-->
            <!--      aria-describedby="basic-icon-default-email2"-->
            <!--      required-->
            <!--    />-->
            <!--  </div>-->
            <!--</div>-->

            <!--<div class="mb-3">-->
            <!--  <label class="form-label" for="basic-icon-default-email">Routing Number/Swift code</label>-->
            <!--  <div class="input-group input-group-merge">-->
            <!--    <span class="input-group-text"><i class='bx bxs-shield-minus'></i></span>-->
            <!--    <input-->
            <!--      type="number"-->
            <!--      name="route"-->
            <!--      id="route"-->
            <!--      class="form-control"-->
            <!--      placeholder="Routing Number"-->
            <!--      aria-label="email"-->
            <!--      aria-describedby="basic-icon-default-email2"-->
            <!--      required-->
            <!--    />-->
            <!--  </div>-->
            <!--</div>-->

            <!--<div class="mb-3">-->
            <!--  <label class="form-label" for="basic-icon-default-email">Beneficiary's bank address</label>-->
            <!--  <div class="input-group input-group-merge">-->
            <!--    <span class="input-group-text"><i class='bx bxs-shield-minus'></i></span>-->
            <!--    <input-->
            <!--      type="text"-->
            <!--      name="address"-->
            <!--      id="adress"-->
            <!--      class="form-control"-->
            <!--      placeholder="Enter address"-->
            <!--      aria-label="email"-->
            <!--      aria-describedby="basic-icon-default-email2"-->
            <!--      required-->
            <!--    />-->
            <!--  </div>-->
            <!--</div>-->

            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-email">Amount to transfer</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class='bx bx-dollar-circle'></i></span>
                <input type="number" name="amount" id="amount" class="form-control" placeholder="Amount" aria-label="Amount" aria-describedby="basic-icon-default-email2" required />
                <span id="basic-icon-default-email2" class="input-group-text">NGN</span>
              </div>
            </div>


            <button name="transfer" type="button" onclick="brief()" data-bs-target="#confirm-modal" data-bs-toggle="modal" class="btn btn-primary">Transfer</button>
          </form>
        </div>
      </div>
    </div>

  </div>
  <script>
    function brief() {
      var to = $("#to").val();
      //   var benef_name=$("#benef_name").val();
      //   var routing=$("#route").val();
      //   var bank=$("#benef_bank").val();
      var amount = $("#amount").val();


      $("#modal-to").html(to);
      //   $("#modal-benef_name").html(benef_name);
      //   $("#modal-route").html(routing);
      //   $("#modal-bank").html(bank);
      $("#modal-amount").html(amount);



    }

    function submitForm() {
      document.getElementById("transferForm").submit();
    }
  </script>


  <div class="modal fade" id="confirm-modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          Transfer Details
          <button class="btn btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="my-2">
            <table class="table table-bordered">

              <!--<tr>-->
              <!--<td class="text-white">Beneficiary Name: <span id="modal-benef_name"></span></td>-->
              <!--    </tr>-->
              <tr>
                <td class="text-white">Beneficiary Account: <span id="modal-to"></span></td>
              </tr>
              <!--<tr>-->
              <!--<td  class="text-white">Beneficiary Bank: <span id="modal-bank"></span></td>-->
              <!--</tr>-->
              <tr>
                <td class="text-white">Amount: $<span id="modal-amount"></span></td>
              </tr>
              <!--<tr>-->
              <!--<td  class="text-white">Routing Number: <span id="modal-route"></span></td>-->
              <!--</tr>-->


            </table>
            <button class="btn btn-success" onclick="submitForm()">
              Confirm Transfer
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
if ($_POST) {

  if ($acc_status != "suspended") {
    if (isset($_POST['tf']) && isset($_POST['amount'])) {
      require "scripts/create-activity.php";
      $user_id = $_SESSION['user_id'];
      $mail =  mysqli_real_escape_string($conn, $_POST['tf']);
      $amount = mysqli_real_escape_string($conn, $_POST['amount']);
      $currency = mysqli_real_escape_string($conn, $_POST['currency']);
      $description = "new transfer of $$amount to ";


      $_SESSION['mail'] = $mail;
      $_SESSION['amount'] = $amount;
      $_SESSION['currency'] = $currency;
      $_SESSION['description'] = $description;







      if ($rem_bal >= $amount) {

        //send otp on login
        $subject = "OTP Verification";

        //generate random password
        $comb = '1234567890';
        $pass = array();
        $combLen = strlen($comb) - 1;
        for ($i = 0; $i < 6; $i++) {
          $n = rand(0, $combLen);
          $pass[] = $comb[$n];
        }
        $OTP = implode($pass);

        //generate otp email message
        $message = "<p>You have requested to make a transfer on Falcon Pay. your transfer code  is <b>$OTP</b></p>
     Do not share this code with anyone.
     ";
        mysqli_query($conn, "UPDATE users SET otp='$OTP' WHERE email='$email'");
        sendmail($email, $subject, $message);
        $nextstep = 'transfer-auth.php';
        header("Location: $nextstep");
      } else {
        echo "
      <script>
      swal('An error occurred', 'You do not have enough balance to perform this transaction', 'error');
      </script>
    ";
      }
    } else {
      echo "
        <script>
        swal('Oops','Please fill all the fields','error');
        </script>
        ";
    }
  } else {
    echo "
                    <script>
                    swal('Oops','You cant perform any activity while your account is on hold','error');
                    </script>
                    ";
  }
}





?>
<script>
  function getBenef(val) {
    $.ajax({
      type: 'post',
      url: 'scripts/get-benefs.php',
      data: {
        val: val
      },
      success: function(data) {
        let results = JSON.parse(data)
        console.log(results);
        swal("warning", `you are about to send to ${results.name}`, "warning")
          .then(() => {
            $("#to").val(results.account);
            $("#benef_name").val(results.name);
            $("#route").val(results.zip);
            $("#benef_bank").val(results.bank);
            $("#adress").val(results.address);

          })
      }
    })
  }
</script>
<?php require "footer.php"; ?>