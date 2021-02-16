<?php include('header.php'); ?>


<section class="content" id="content">
    <div class="product_view">
        
        <?php foreach($data as $row) { ?>
            <div class="new">
                <?php echo validation_errors(); ?>
                <form action="<?php echo base_url(); ?>Main/product_edit_done" method="post" enctype="multipart/form-data">
                    <input type="hidden"  id="id"  name="id"  value="<?php echo $row->id; ?>">
                    <input type="hidden"  id="old"  name="old"  value="<?php echo $row->pic; ?>">
                    <div class="row">
                        <div class="col">
                            <div id="profile" style="background-image: url('<?php echo base_url().'uploads/products/'.$row->pic; ?>')">
                                <div class="dashes"></div>
                                <label>Click to browse image of the Product here</label>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Title for Product</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $row->title; ?>" id="title" placeholder="Title">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Quantity of Product</label>
                                <input type="number" name="quantity" class="form-control" value="<?php echo $row->quantity; ?>" id="quantity" placeholder="Quantity of product">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">Price of Product</label>
                                <input type="number" name="price" class="form-control" value="<?php echo $row->price; ?>" id="price" placeholder="Price of Product">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea name="content" id="editor">
                                <?php echo $row->content; ?>
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
                            <input type="submit" class="btn btn-apply-light" value="Update">
                        </div>
                    </div>
                    <input type="file" name="upload" value="" id="file">
                </form>
            </div>
            <?php  } ?>
    </div>
</section>


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