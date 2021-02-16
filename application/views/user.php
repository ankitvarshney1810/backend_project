<?php include('header.php'); ?>


<section class="content" id="content">
    <div class="magazine">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="heading">Users</div>
                </div>
                <div class="col top-margin-10">
                    <button class="btn btn-apply-light" id="add">Add user</button>
                </div>
            </div>
            <div class="row top-margin-20">
                <div class="col">
                    <table class="table w-100">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Address</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row) { ?>
                                <tr>
                                    <th><?php echo $row->name; ?></th>
                                    <td><?php echo $row->number; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo $row->password; ?></td>
                                    <td><?php echo $row->address; ?></td>
                                    <td><?php echo $row->user_type; ?></td>
                                    <td><a href="<?php echo base_url(); ?>main/user_edit/<?php echo $row->id; ?>" class="btn btn-edit">Edit</a></td>
                                    <td><a href="<?php echo base_url(); ?>main/user_delete/<?php echo $row->id; ?>"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-delete">Delete</a></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
                <!-- <?php foreach($data as $row) { ?>
                    <div class="col-md-4">
                        <div class="card top-margin-20">
                            <div class="description">
                                <div class="image">
                                    <img src="<?php echo base_url().'uploads/magazines/'.$row->pdf; ?>" alt="">
                                </div>
                                <div class="detail">
                                    <div class="head"><?php echo $row->title; ?></div>
                                </div>
                            </div>
                            <div class="action">
                                <div class="row no-gutters">
                                    <div class="col-4">
                                        <a href="<?php echo base_url(); ?>main/magazine_view/<?php echo $row->id; ?>" class="btn btn-view">View</a>
                                    </div>
                                    <div class="col-4">
                                        <a href="<?php echo base_url(); ?>main/magazine_edit/<?php echo $row->id; ?>" class="btn btn-edit">Edit</a>
                                    </div>
                                    <div class="col-4">
                                        <a href="<?php echo base_url(); ?>main/magazine_delete/<?php echo $row->id; ?>"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-delete">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php  } ?> -->
            </div>
        </div>
        <div class="model">
            <div class="new">
                <?php echo validation_errors(); ?>
                <form action="<?php echo base_url(); ?>Main/upload_user" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Name of User</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name of User">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Number of User</label>
                                <input type="number" name="number" class="form-control" id="number" placeholder="Number of User">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Email of User</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email of User">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Password of User</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password of User">
                            </div>
                        </div>
                    </div>
                    <div class="row top-margin-20">
                        <div class="col text-right">
                            <input type="submit" class="btn btn-apply-light" value="Save">
                        </div>
                    </div>
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
        $("#add").click(function(){
            $(".model").css("display","grid");
        });
        $(".close").click(function(){
            $(".model").css("display","none");
            //$("#add").css("display","inline-block");
        });
    });
</script>




<?php include('footer.php'); ?>