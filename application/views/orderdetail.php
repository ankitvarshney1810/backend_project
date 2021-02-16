<?php include('header.php'); ?>


<section class="content" id="content">
    <div class="magazine">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="heading">Order Detail</div>
                </div>
            </div>
            <div class="row top-margin-20">
                <div class="col-6">
                    <table class="table w-100">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Head</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row) { $id=$row->id; ?>
                                <tr>
                                    <th>Order Id:</th>
                                    <td><?php echo $row->order_id; ?></td>
                                </tr>
                                <tr>
                                    <th>Product Id:</th>
                                    <td><?php echo $row->product_id; ?></td>
                                </tr>
                                <tr>
                                    <th>Quantity:</th>
                                    <td><?php echo $row->quantity; ?></td>
                                </tr>
                                <tr>
                                    <th>Amount:</th>
                                    <td><?php echo $row->amount; ?></td>
                                </tr>
                                <tr>
                                    <th>Contact Number:</th>
                                    <td><?php echo $row->number; ?></td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td><?php echo $row->address; ?></td>
                                </tr>
                                <tr>
                                    <th>Txn Id:</th>
                                    <td><?php echo $row->txnid; ?></td>
                                </tr>
                                <tr>
                                    <th>Payment Status:</th>
                                    <td><?php echo $row->payment_status; ?></td>
                                </tr>
                                <tr>
                                    <th>Order Status:</th>
                                    <td><?php echo $row->order_status; ?><span style="margin-left:20px;cursor:pointer" id="edit"><i class="fas fa-pen"></i></span></td>
                                </tr>
                                <tr>
                                    <th>Placed On:</th>
                                    <td><?php echo $row->created_on; ?></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="model">
            <div class="new">
                <?php echo validation_errors(); ?>
                <form action="<?php echo base_url(); ?>Main/order_edit" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Order Status</label>
                                <select name="order_type" id="order_type" class="form-control">
                                    <option value="">Select</option>
                                    <option value="order place">Order Place</option>
                                    <option value="order dispatched">Order Dispatched</option>
                                    <option value="order delivered">Order Delivered</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row top-margin-20">
                        <div class="col text-right">
                            <input type="submit" name="submit" class="btn btn-apply-light" value="Save">
                        </div>
                    </div>
                    <input type="file" name="upload" id="file">
                </form>
                <div class="close">
                <img src="<?php echo base_url('images/close.svg'); ?>">
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function(){
        $("#edit").click(function(){
            $(".model").css("display","grid");
        });
        $(".close").click(function(){
            $(".model").css("display","none");
            //$("#add").css("display","inline-block");
        });
    });
</script>




<?php include('footer.php'); ?>