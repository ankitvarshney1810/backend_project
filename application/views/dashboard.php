<?php include('header.php'); ?>

<section class="content" id="content">
    <div class="dashboard">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="heading">Dashboard</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="<?php echo base_url(); ?>main/event" class="card top-margin-20">
                        <div class="card-content">
                            <div class="title">
                                <small>TOTAL</small>
                                <strong>Events</strong>
                            </div>
                            <div class="variable"><?php echo $event ?></div>
                        </div>
                        <div class="view">VIEW ALL</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo base_url(); ?>main/product" class="card top-margin-20">
                        <div class="card-content">
                            <div class="title">
                                <small>TOTAL</small>
                                <strong>Products</strong>
                            </div>
                            <div class="variable"><?php echo $product ?></div>
                        </div>
                        <div class="view">VIEW ALL</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo base_url(); ?>main/news" class="card top-margin-20">
                        <div class="card-content">
                            <div class="title">
                                <small>TOTAL</small>
                                <strong>News</strong>
                            </div>
                            <div class="variable"><?php echo $news ?></div>
                        </div>
                        <div class="view">VIEW ALL</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo base_url(); ?>main/magazine" class="card top-margin-20">
                        <div class="card-content">
                            <div class="title">
                                <small>TOTAL</small>
                                <strong>Magazines</strong>
                            </div>
                            <div class="variable"><?php echo $magazine ?></div>
                        </div>
                        <div class="view">VIEW ALL</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo base_url(); ?>main/user" class="card top-margin-20">
                        <div class="card-content">
                            <div class="title">
                                <small>TOTAL</small>
                                <strong>Users</strong>
                            </div>
                            <div class="variable"><?php echo $user ?></div>
                        </div>
                        <div class="view">VIEW ALL</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo base_url(); ?>main/order" class="card top-margin-20">
                        <div class="card-content">
                            <div class="title">
                                <small>TOTAL</small>
                                <strong>Orders</strong>
                            </div>
                            <div class="variable"><?php echo $order; ?></div>
                        </div>
                        <div class="view">VIEW ALL</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="<?php echo base_url(); ?>main/subscribe" class="card top-margin-20">
                        <div class="card-content">
                            <div class="title">
                                <small>TOTAL</small>
                                <strong>Subscribers</strong>
                            </div>
                            <div class="variable"><?php echo $subscribe; ?></div>
                        </div>
                        <div class="view">VIEW ALL</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>