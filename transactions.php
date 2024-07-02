<?php
require "header.php";
?>


<div class="section my-4 py-4">
    <div class="section-heading my-4">
        <h2 class="title text-white">Transactions</h2>

    </div>
    <div class="transactions">
        <?php
        $getActivities = mysqli_query($conn, "SELECT transactions.folio_id, transactions.id, transactions.type, transactions.amount, transactions.status, transactions.date, transactions.description FROM `transactions` LEFT JOIN users ON users.id=transactions.user_id WHERE `user_id` = '$id' AND NOT(transactions.type='card' AND transactions.status='pending') ORDER BY `id` DESC ");
        if (mysqli_num_rows($getActivities) > 0) {
            while ($activities = mysqli_fetch_assoc($getActivities)) {
                $portifolioId = $activities['folio_id'];
                $date = $activities['date'];
                $type = $activities['type'];
                $amount = $activities['amount'];
                $trxID = $activities['id'];
                $transaction_status = $activities['status'];
                $transaction_description = $activities['description'];
        ?>
                <!-- item -->
                <div class="container table-responsive py-5">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th><b>Type</b></th>
                            <th><b>Amount</b></th>
                            <th><b>Description</b></th>
                            <th><b>Status</b></th>
                            <th><b>Date</b></th>
                        </thead>
                        <tbody>



                            <?php
                            $getActivities = mysqli_query($conn, "SELECT transactions.folio_id, transactions.id, transactions.type, transactions.amount, transactions.status, transactions.description, transactions.date FROM `transactions` LEFT JOIN users ON users.id=transactions.user_id WHERE `user_id` = '$id' AND NOT(transactions.type='card' AND transactions.status='pending') ORDER BY `id` DESC ");
                            if (mysqli_num_rows($getActivities) > 0) {
                                while ($activities = mysqli_fetch_assoc($getActivities)) {
                                    $portifolioId = $activities['folio_id'];
                                    $date = $activities['date'];
                                    $type = $activities['type'];
                                    $amount = $activities['amount'];
                                    $trxID = $activities['id'];
                                    $transaction_status = $activities['status'];
                                    $transaction_description = $activities['description'];
                            ?>
                                    <!-- item -->
                                    <tr>
                                        <td><?php echo $type; ?></td>
                                        <td>₦<?php echo number_format($amount, 2); ?></td>
                                        <td><?php echo $transaction_description; ?></td>
                                        <td><?php echo $transaction_status; ?></td>
                                        <td><?php echo $date; ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>

                                <!-- item -->
                                <span href="card" class="item">
                                    <div class="card-body">

                                        <div>
                                            <strong></strong>
                                            <p>No Transactions to display</p>
                                        </div>
                                    </div>
                                    <div class="right">

                                    </div>
                                </span>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            <?php
            }
        } else {
            ?>

            <!-- item -->
            <span href="#" class="item">
                <div class="detail">

                    <div>
                        <strong></strong>
                        <p>No Transactions to display</p>
                    </div>
                </div>
                <div class="right">

                </div>
            </span>

        <?php
        }
        ?>

    </div>
</div>


<?php
require "footer.php";
?>