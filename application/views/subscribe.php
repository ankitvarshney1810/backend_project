<?php include('header.php'); ?>


<section class="content" id="content">
    <div class="magazine">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="heading">Subscribers</div>
                </div>
            </div>
            <div class="row top-margin-20">
                <div class="col">
                    <table class="table w-100">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Number</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row) { ?>
                                <tr>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->number; ?></td>
                                    <td><?php echo $row->amount; ?></td>
                                    <td><?php echo $row->create_on; ?></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>






<?php include('footer.php'); ?>