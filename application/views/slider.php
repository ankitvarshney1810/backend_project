<?php include('header.php'); ?>


<section class="content" id="content">
    <div class="news">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="heading">Sliders</div>
                </div>
                <div class="col top-margin-10">
                    <button class="btn btn-apply-light" id="add">Add Sliders</button>
                </div>
            </div>
            <div class="row">
                <?php foreach($data as $row) { ?>
                    <div class="col-md-4">
                        <div class="card top-margin-20">
                            <div class="description">
                                <div class="image">
                                    <img src="<?php echo base_url().'uploads/sliders/'.$row->image; ?>" alt="">
                                </div>
                            </div>
                            <div class="action">
                                <div class="row no-gutters">
                                    <div class="col-4">
                                        <a href="<?php echo base_url(); ?>main/slider_view/<?php echo $row->id; ?>" class="btn btn-view">View</a>
                                    </div>
                                    <div class="col-4">
                                        <a href="<?php echo base_url(); ?>main/slider_edit/<?php echo $row->id; ?>" class="btn btn-edit">Edit</a>
                                    </div>
                                    <div class="col-4">
                                        <a href="<?php echo base_url(); ?>main/slider_delete/<?php echo $row->id; ?>"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-delete">Delete</a>
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
                <form action="<?php echo base_url(); ?>Main/upload_slider" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div id="profile">
                                <div class="dashes"></div>
                                <label>Click to browse image of the Sliders here</label>
                            </div> 
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