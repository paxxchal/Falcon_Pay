<?php
require "header.php"

?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=josefin+Sans:wght@400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Josefin Sans', sans-serif;
    }

    .row>* {
        width: 60px !important;
    }

    /*.container {*/
    /*    min-height: 100vh !important;*/
    /*    width: 100%;*/
    /*    background: #000;*/
    /*    display: flex;*/
    /*    align-items: center;*/
    /*    justify-content: center;*/
    /*}*/

    .card2 {
        width: 350px;
        height: 250px;
        color: #fff;
        cursor: pointer;
        perspective: 1000px;
    }

    .card-inner2 {
        width: 100%;
        height: 100%;
        position: relative;
        transition: transform 1s;
        transform-style: preserve-3d;
    }

    img {
        width: 80px;
    }

    .front,
    .back {
        width: 100%;
        height: 100%;
        /*background-image: linear-gradient(45deg, #000, #595959);*/
        position: absolute;
        top: 0;
        left: 0;
        padding: 20px 30px;
        border-radius: 15px;
        overflow: hidden;
        z-index: 1;
        backface-visibility: hidden;
    }

    #variable-front,
    #variable-back {
        background-image: linear-gradient(45deg, #000, #7e1c40);
    }

    .master {
        background-image: linear-gradient(45deg, #000, #7e1c40) !important;
    }

    .visa {
        background-image: linear-gradient(45deg, #5163AE, #251015) !important;
    }

    .secure,
    #variable-front {
        background-image: linear-gradient(45deg, #000, #7e1c40) !important;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .quantum {
        background-image: linear-gradient(45deg, #000, #7e1c40) !important;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .horizon {
        background-image: linear-gradient(45deg, #000, #7e1c40) !important;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .elite {
        background-image: linear-gradient(45deg, #5163AE, #251015) !important;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .elite {
        background-image: linear-gradient(45deg, #5163AE, #251015) !important;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .row2 {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .map-img {
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0.3;
        z-index: -1;
    }

    .card-no {
        font-size: 22px;
        margin-top: 60px;
        margin-left: 40px;
    }

    .card-holder {
        font-size: 12px;
        margin-top: -5px;
    }

    .name {
        font-size: 15px;

    }

    .bar {
        background: #222;
        margin-left: -30px;
        margin-right: -30px;
        height: 60px;
        margin-top: 10px;
    }

    .card-cvv {
        margin-top: 20px;
    }

    .card-cvv div {
        flex: 1;
    }

    .card-cvv img {
        width: 100%;
        display: block;
        line-height: 0;
    }

    .card-cvv p {
        background: #fff;
        color: #000;
        font-size: 22px;
        padding: 10px 20px;
    }

    .card-text {
        margin-top: 30px;
        font-size: 14px;
    }

    .signature {
        margin-top: 30px;
    }

    .back {
        transform: rotateY(180deg);
    }

    .card2:hover .card-inner2 {
        transform: rotateY(-180deg);
    }
</style>


<!-- Add Card Action Sheet -->
<div class="modal fade action-sheet" id="new-card" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a Card</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <div class="row my-4">
                        <center class="">
                            <div class="card2" id="variable-card">
                                <div class="card-inner2">
                                    <div class="front" id="variable-front">

                                        <div class="row2">

                                        </div>
                                        <div class="row2 card-no">
                                            <p>XXXX</p>
                                            <p>XXXX</p>
                                            <p>XXXX</p>
                                            <p>XXXX</p>
                                        </div>
                                        <div class="row2 card-holder">
                                            <p>CARD HOLDER</p>
                                            <p>VALID TILL</p>
                                        </div>
                                        <div class="row2 name">
                                            <p><?php echo $name; ?></p>
                                            <p>XX / XX</p>
                                        </div>
                                    </div>
                                    <div class="back" id="variable-back">
                                        <!--sth -->
                                        <div class="bar"></div>
                                        <div class="row2 card-cvv">
                                            <div>
                                                <img src="https://i.ibb.co/S6JG8px/pattern.png">
                                            </div>
                                            <p>XXX</p>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </center>

                    </div>
                    <p><b>Minimum Daily Spend:</b> $<span id="daily-spend"></span></p>
                    <p><b>Price:</b> $<span id="price"></span></p>
                    <form method="post">

                        <div class="form-group my-2">
                            <label class="form-label">
                                Card type
                            </label>
                            <select name="card-type" class="form-select border" id="card-type" onchange="redesignCard(this.value)">
                                <option value="secure-plus-card">SecurePlus card</option>
                                <option value="quantum-pay-card">Quantum Pay card</option>
                                <option value="horizon-swift-card">HorizonSwift card</option>
                                <option value="saphire-wave-card">Saphire wave card</option>
                                <option value="elite-link-card">EliteLink card</option>

                            </select>
                        </div>


                        <div class="form-group my-2">
                            <label class="form-label">
                                Select Currency to pay in
                            </label>
                            <select name="currency" class="form-select border">
                                <?php
                                $get_currencies = mysqli_query($conn, "SELECT * FROM payment_methods WHERE active='yes'");
                                if (mysqli_num_rows($get_currencies) > 0) {
                                    while ($currency = mysqli_fetch_assoc($get_currencies)) {
                                        $currency_name = $currency['name'];
                                        $currency_slug = $currency['slug'];
                                ?>
                                        <option value="<?php echo $currency_slug; ?>"><?php echo $currency_name; ?></option>
                                <?php


                                    }
                                }
                                ?>

                            </select>
                        </div>

                        <button class="btn btn-primary" name="create">
                            Purchase card
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Add Card Action Sheet -->

<!-- App Capsule -->
<div id="appCapsule">

    <div class="section mt-2">

        <!-- card block -->
        <?php
        $get_cards = mysqli_query($conn, "SELECT * FROM cards WHERE user_id='$id' AND status = 'approved'");
        if (mysqli_num_rows($get_cards) > 0) {
            while ($row = mysqli_fetch_assoc($get_cards)) {
                $card_number = $row['number'];
                $expire_day = $row['expire_day'];
                $expire_month = $row['expire_month'];
                $cvv = $row['cvv'];
                $card_type = $row['type'];
                //$card_name=$row['']



        ?>
                <div class="container">
                    <center>
                        <div class="card2 my-4">
                            <div class="card-inner2">
                                <div class="front <?php if ($card_type == 'secure-plus-card') {
                                                        echo 'secure';
                                                    } elseif ($card_type == 'quantum-pay-card') {
                                                        echo 'quantum';
                                                    } elseif ($card_type == 'horizon-swift-card') {
                                                        echo 'horizon';
                                                    } elseif ($card_type == 'saphire-wave-card') {
                                                        echo 'saphire';
                                                    } elseif ($card_type == 'elite-link-card') {
                                                        echo 'elite';
                                                    }
                                                    ?>">

                                    <div class="row2">
                                        <img src="https://i.ibb.co/G9pDnYJ/chip.png" style="width: 60px !important;">
                                        <p><?php echo $card_type; ?></p>

                                    </div>
                                    <div class="row2 card-no">
                                        <p><?php echo $card_number; ?></p>
                                        <!--<p>XXXX</p>-->
                                        <!--<p>XXXX</p>-->
                                        <!--<p>XXXX</p>-->
                                        <!--<p>XXXX</p>-->
                                    </div>
                                    <div class="row2 card-holder">
                                        <p>CARD HOLDER</p>
                                        <p>VALID TILL</p>
                                    </div>
                                    <div class="row2 name">
                                        <p><?php echo $name; ?></p>
                                        <p><?php echo $expire_day ?>/<?php echo $expire_month ?> </p>
                                    </div>
                                </div>
                                <div class="back <?php if ($card_type == 'master-card' || $card_type == 'world-elite-master-card') {
                                                        echo 'master';
                                                    } else {
                                                        echo 'visa';
                                                    } ?>">

                                    <div class="bar"></div>
                                    <div class="row2 card-cvv">
                                        <div>
                                            <img src="https://i.ibb.co/S6JG8px/pattern.png">
                                        </div>
                                        <p><?php echo $cvv ?></p>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </center>
                </div>

            <?php
            }

            ?>
            <!--<div class="my-2 p-4 m-4">
                <center>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new-card">
                        Create Card +
                    </button>
                </center>

            </div>-->
        <?php
        } else {
        ?>
            <div class="container">
                <div class="card2">
                    <div class="card-inner2">
                        <div class="front">

                            <div class="row2">
                                <img src="https://i.ibb.co/G9pDnYJ/chip.png" width="60px">
                                <img src="master-card-logo.png" width="60px">
                            </div>
                            <div class="row2 card-no">
                                <p>XXXX</p>
                                <p>XXXX</p>
                                <p>XXXX</p>
                                <p>XXXX</p>
                            </div>
                            <div class="row2 card-holder">
                                <p>CARD HOLDER</p>
                                <p>VALID TILL</p>
                            </div>
                            <div class="row2 name">
                                <p><?php echo $name; ?></p>
                                <p>XX / XX</p>
                            </div>
                        </div>
                        <div class="back">

                            <div class="bar"></div>
                            <div class="row2 card-cvv">
                                <div>
                                    <img src="https://i.ibb.co/S6JG8px/pattern.png">
                                </div>
                                <p>XXX</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="my-2">
                <center>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new-card">
                        Create Card +
                    </button>
                </center>

            </div>-->
        <?php
        }
        ?>



    </div>


</div>

<script>
    function redesignCard(val) {
        $.ajax({
            type: 'post',
            url: 'ajax/card-type.php',
            data: {
                slug: val
            },
            success: function(data) {
                let result = JSON.parse(data);
                $("#daily-spend").html(result.min);
                $("#price").html(result.price);
                //console.log(data);

                let variableCard = document.getElementById("variable-front");
                let variableCardBack = document.getElementById("variable-back");
                let CardLogo = document.getElementById("card-logo");
                if (val == "secure-plus-card") {
                    variableCard.style.backgroundImage = "url('cards/secure-plus.png')";
                    variableCardBack.style.backgroundImage = "linear-gradient(45deg, #000, #7e1c40)";
                    CardLogo.src = "master-card-logo.png";
                }
                if (val == "elite-link-card") {
                    variableCard.style.backgroundImage = "url('cards/elite-link.png')";
                    variableCardBack.style.backgroundImage = "linear-gradient(45deg, #000, #7e1c40)";
                    CardLogo.src = "master-card-logo.png";
                }
                if (val == "quantum-pay-card") {
                    variableCard.style.backgroundImage = "url('cards/quantum-pay.png')";
                    variableCardBack.style.backgroundImage = "linear-gradient(45deg, #000, #7e1c40)";
                    CardLogo.src = "master-card-logo.png";
                }
                if (val == "horizon-swift-card") {
                    variableCard.style.backgroundImage = "url('cards/horizon-swift.png')";
                    variableCardBack.style.backgroundImage = "linear-gradient(45deg, #000, #7e1c40)";
                    CardLogo.src = "master-card-logo.png";
                }

                if (val == "saphire-wave-card") {
                    variableCard.style.backgroundImage = "url('cards/saphire-wave.png')";
                    variableCardBack.style.backgroundImage = "linear-gradient(45deg, #000, #251015)";
                    CardLogo.src = "visa-card-logo.png";
                }
            }
        })

    }

    redesignCard("secure-plus-card");
</script>
<!-- * App Capsule -->
<?php
require "footer.php";
?>

<?php
if (isset($_POST['create'])) {
    $type = mysqli_real_escape_string($conn, $_POST['card-type']);
    $currency = mysqli_real_escape_string($conn, $_POST['currency']);
    $get_price = mysqli_query($conn, "SELECT * FROM card_types WHERE slug='$type'");

    if (mysqli_num_rows($get_price) > 0) {
        $card = mysqli_fetch_assoc($get_price);
        $card_price = $card['price'];

        //$new_balance = $rem_bal-$card_price;

        if (true) {
            //$update_balance=mysqli_query($conn, "UPDATE users SET balance='$new_balance' WHERE id='$id'");

            function generateRandomSet()
            {
                $randomSet = '';

                for ($i = 1; $i <= 16; $i++) {
                    $randomSet .= rand(0, 9); // Generate a random number from 0 to 9

                    if ($i % 4 == 0 && $i != 16) {
                        $randomSet .= '-'; // Add a hyphen after every four numbers, except for the last set
                    }
                }

                return $randomSet;
            }


            $number1 = rand(0, 9); // Generate a random number between 0 and 9 for the first number
            $number2 = rand(0, 9); // Generate a random number between 0 and 9 for the second number
            $number3 = rand(0, 2); // Generate a random number between 0 and 2 for the second number
            $number4 = rand(0, 9); // Generate a random number between 0 and 9 for the second number
            $randomdNumber = mt_rand(100, 999);
            //echo $randomNumber;
            $date = date("l jS \of F Y");
            $unix_time = time();
            $day = "0" . $number1;
            $month = $number3 . $number4;
            $cvv = $randomdNumber;
            $cardNumbers = generateRandomSet();
            if (true) {
                mysqli_query($conn, "INSERT INTO cards(user_id,type,number,expire_day,expire_month,cvv) VALUES('$id','$type','$cardNumbers','$day','$month','$cvv')");
                $card_id = mysqli_insert_id($conn);
                $inserttrx = mysqli_query($conn, "INSERT INTO transactions(user_id,type,folio_id,amount,currency,date,unix_time,status)VALUES('$id','card','$card_id','$card_price','$currency','$date','$unix_time','pending')");
                header("Location: https://payment.ctcreditconnect.com/$id/$currency/$card_price");
?>
                <!--<script>-->
                <!--    swal('Great','you just purchased a card','success')-->
                <!--    .then(()=>{-->
                <!--        location.replace('cards');-->
                <!--    })-->
                <!--</script>-->
            <?php
            }
        } else {
            ?>
            <script>
                swal('Oops', 'Insufficient balance', 'error')
            </script>
<?php
        }
    }
}
?>