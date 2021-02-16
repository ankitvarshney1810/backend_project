<?php include('header.php'); ?>


<section class="content" id="content">
    <div class="magazine">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="heading">Orders</div>
                </div>
            </div>
            <div class="row top-margin-20">
                <div class="col">
                    <table class="table w-100">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Order Id</th>
                                <th scope="col">Number</th>
                                <th scope="col">Txn Id</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row) { ?>
                                <tr>
                                    <th><?php echo $row->order_id; ?></th>
                                    <td><?php echo $row->number; ?></td>
                                    <td><?php echo $row->txnid; ?></td>
                                    <td><a href="<?php echo base_url(); ?>Main/orderdetail/<?php echo $row->id; ?>" class="btn btn-primary">View Detail</a></td>
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