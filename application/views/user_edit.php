<?php include('header.php'); ?>


<section class="content" id="content">
    <div class="event_view">
        
        <?php foreach($data as $row) { ?>
            <div class="new">
                <?php echo validation_errors(); ?>
                <form action="<?php echo base_url(); ?>Main/user_edit_done" method="post" enctype="multipart/form-data">
                    <input type="hidden"  id="id"  name="id"  value="<?php echo $row->id; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Name of User</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $row->name; ?>" id="name" placeholder="Name of User">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Number of User</label>
                                <input type="number" name="number" class="form-control" value="<?php echo $row->number; ?>" id="number" placeholder="Number of User">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Email of User</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $row->email; ?>" id="email" placeholder="Email of User">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Password of User</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $row->password; ?>" id="password" placeholder="Password of User">
                            </div>
                        </div>
                    </div>
                    <div class="row top-margin-20">
                        <div class="col text-right">
                            <input type="submit" class="btn btn-apply-light" value="Update">
                        </div>
                    </div>
                </form>
            </div>
            <?php  } ?>
    </div>
</section>



<?php include('footer.php'); ?>