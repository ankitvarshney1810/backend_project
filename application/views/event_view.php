<?php include('header.php'); ?>


<section class="content" id="content">
    <div class="event_view">
        <div class="container">
            <div class="row">
                <?php foreach($data as $row) { ?>
                    <div class="col">
                        <div class="card top-margin-20">
                            <div class="description">
                                <div class="heading">Event Detail</div>
                                <div class="image">
                                    <img src="<?php echo base_url().'uploads/events/'.$row->image; ?>" alt="">
                                </div>
                                <div class="detail">
                                    <div class="head"><span class="title-head">Title : </span><?php echo $row->title; ?></div>
                                    <div class="head"><span class="title-head">Address: </span><?php echo $row->address; ?></div>
                                    <div class="event-content"><?php echo $row->description; ?></div>
                                    <div class="head"><span class="title-head">Posted On: </span><?php echo $row->created_on; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><a href="<?php echo base_url(); ?>main/event_edit/<?php echo $row->id; ?>" class="btn btn-edit">Edit</a></div>
                            <div class="col-6"><a href="<?php echo base_url(); ?>main/event_delete/<?php echo $row->id; ?>"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-delete">Delete</a></div>
                        </div>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </div>
</section>



<?php include('footer.php'); ?>