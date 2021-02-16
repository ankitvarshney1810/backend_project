<?php include('header.php'); ?>


<section class="content" id="content">
    <div class="product_view">
        <div class="container">
            <div class="row">
                <?php foreach($data as $row) { ?>
                    <div class="col">
                        <div class="card top-margin-20">
                            <div class="description">
                                <div class="heading">Product Detail</div>
                                <div class="image">
                                    <img src="<?php echo base_url().'uploads/products/'.$row->pic; ?>" alt="">
                                </div>
                                <div class="detail">
                                    <div class="head"><span class="title-head">Title : </span><?php echo $row->title; ?></div>
                                    <div class="head"><span class="title-head">Piece: </span><?php echo $row->quantity; ?></div>
                                    <div class="head"><span class="title-head">Price : </span><i class="fas fa-rupee-sign"></i><?php echo $row->price; ?></div>
                                    <div class="product-content"><?php echo $row->content; ?></div>
                                    <div class="head"><span class="title-head">Posted On: </span><?php echo $row->created_on; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><a href="<?php echo base_url(); ?>main/product_edit/<?php echo $row->id; ?>" class="btn btn-edit">Edit</a></div>
                            <div class="col-6"><a href="<?php echo base_url(); ?>main/product_delete/<?php echo $row->id; ?>"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-delete">Delete</a></div>
                        </div>
                    </div>
                <?php  } ?>
            </div>
        </div>
        <!-- <div class="model">
            <div class="new">
                <?php echo validation_errors(); ?>
                <form action="../Main/upload_product" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div id="profile">
                                <div class="dashes"></div>
                                <label>Click to browse image of the Product here</label>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Title for Product</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Quantity of Product</label>
                                <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantity of product">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Price of Product</label>
                                <input type="number" name="price" class="form-control" id="price" placeholder="Price of Product">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea name="content" id="editor">
                                &lt;p&gt;Here goes the initial description of the Product...&lt;/p&gt;
                            </textarea>
                            <script>
                                ClassicEditor
                                    .create( document.querySelector( '#editor' ) )
                                    .then( editor => {
                                        console.log( editor );
                                    } )
                                    .catch( error => {
                                        console.error( error );
                                    } );
                            </script>
                        </div>
                    </div>  
                    <div class="row top-margin-20">
                        <div class="col text-right">
                            <input type="submit" class="btn btn-apply-light" value="Save">
                        </div>
                    </div>
                    <input type="file" name="upload" id="file">
                </form>
                <div class="close">
                <img src="<?php echo base_url('images/close.svg'); ?>">
                </div>
            </div>
        </div> -->
    </div>
</section>



<?php include('footer.php'); ?>