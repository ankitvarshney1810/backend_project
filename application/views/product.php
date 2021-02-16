<?php include('header.php'); ?>


<section class="content" id="content">
    <div class="product">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="heading">Products</div>
                </div>
                <div class="col top-margin-10">
                    <button class="btn btn-apply-light" id="add">Add Products</button>
                </div>
            </div>
            <div class="row">
                <?php foreach($data as $row) { ?>
                    <div class="col-md-4">
                        <div class="card top-margin-20">
                            <div class="description">
                                <div class="image">
                                    <img src="<?php echo base_url().'uploads/products/'.$row->pic; ?>" alt="">
                                </div>
                                <div class="detail">
                                    <div class="head"><?php echo $row->title; ?></div>
                                    <div class="remain">Ramaining Piece: <?php echo $row->quantity; ?></div>
                                    <!-- <div class="price">Price: <i class="fas fa-rupee-sign"></i>2345</div>
                                    <div class="time">Mon, 20 Jan, 2020</div> -->
                                </div>
                            </div>
                            <div class="action">
                                <div class="row no-gutters">
                                    <div class="col-4">
                                        <a href="<?php echo base_url(); ?>main/product_view/<?php echo $row->id; ?>" class="btn btn-view">View</a>
                                    </div>
                                    <div class="col-4">
                                        <a href="<?php echo base_url(); ?>main/product_edit/<?php echo $row->id; ?>" class="btn btn-edit">Edit</a>
                                    </div>
                                    <div class="col-4">
                                        <a href="<?php echo base_url(); ?>main/product_delete/<?php echo $row->id; ?>"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-delete">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>
        </div>
        <div class="model">
            <div class="new">
                <?php echo validation_errors(); ?>
                <form action="<?php echo base_url(); ?>Main/upload_product" method="post" enctype="multipart/form-data">
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
                            <textarea name="content">
                                Here goes the initial description of the Product...
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



    <script>
        $(function() {

        $('#profile').addClass('dragging').removeClass('dragging');
        });

        $('#profile').on('dragover', function() {
        $('#profile').addClass('dragging')
        }).on('dragleave', function() {
        $('#profile').removeClass('dragging')
        }).on('drop', function(e) {
        $('#profile').removeClass('dragging hasImage');
        
        if (e.originalEvent) {
          var file = e.originalEvent.dataTransfer.files[0];
          console.log(file);
        
          var reader = new FileReader();
        
          //attach event handlers here...
        
          reader.readAsDataURL(file);
          reader.onload = function(e) {
            console.log(reader.result);
            $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
        
          }
      
        }
        })
        $('#profile').on('click', function(e) {
            console.log('clicked')
            $('#file').click();
        });
        window.addEventListener("dragover", function(e) {
        e = e || event;
        e.preventDefault();
        }, false);
        window.addEventListener("drop", function(e) {
        e = e || event;
        e.preventDefault();
        }, false);
        $('#file').change(function(e) {
        
        var input = e.target;
        if (input.files && input.files[0]) {
          var file = input.files[0];
        
          var reader = new FileReader();
        
          reader.readAsDataURL(file);
          reader.onload = function(e) {
            console.log(reader.result);
            $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
          }
        }
        })
    </script>


<?php include('footer.php'); ?>