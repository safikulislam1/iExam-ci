<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .wrapper {
        width: 100%;
    }
</style>

<div class="wrapper">
    <table style="width:100%">
        <?php foreach ($row as $value) : ?>
            <tr>
                <th colspan="2" style="text-align:right">
                    <img src="<?php echo $value['photo']; ?>" alt="" width="100" height="100"><br><br>
                    <img src="<?php echo $value['signature']; ?>" alt="" width="100" height="40">
                </th>

            </tr>
            <tr>
                <th colspan="2">Basic Details</th>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $value['fname']; ?> <?php echo $value['lname']; ?></td>
            </tr>
            <tr>
                <th>Father Name</th>
                <td><?php echo $value['father']; ?></td>
            </tr>
            <tr>
                <th>Mother Name</th>
                <td><?php echo $value['mother']; ?></td>
            </tr>
            <tr>
                <th>Sex</th>
                <td><?php echo $value['sex']; ?></td>
            </tr>
            <tr>
                <th>Brith</th>
                <td><?php echo $value['date']; ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $value['address']; ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $value['city']; ?></td>
            </tr>
            <tr>
                <th>State</th>
                <td><?php echo $value['state']; ?></td>
            </tr>
            <tr>
                <th>Zip Code</th>
                <td><?php echo $value['zip']; ?></td>
            </tr>
            <tr>
                <th colspan="2">Payment Details</th>
            </tr>
            <tr>
                <th>Amount</th>
                <td><?php echo $value['str_amount']; ?></td>
            </tr>
            <tr>
                <th>Transtion Id</th>
                <td><?php echo $value['str_trn']; ?></td>
            </tr>
            <tr>
                <th>Brand</th>
                <td><?php echo $value['str_brand']; ?></td>
            </tr>
            <tr>
                <th>Last Digits</th>
                <td><?php echo $value['str_last']; ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <br>
    <center><button onclick="myFunction()">Print</button></center>
</div>


<script>
    function myFunction() {
        window.print();
        setTimeout(() => {
            window.close('<?= base_url('index.php/dashboard/print') ?>');
        }, 2000);
    }
</script>