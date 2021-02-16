<?php include('header.php'); ?>


<section class="content" id="content">
    <div class="event_view">
        
        <?php foreach($data as $row) { ?>
            <div class="new">
                <?php echo validation_errors(); ?>
                <form action="<?php echo base_url(); ?>Main/slider_edit_done" method="post" enctype="multipart/form-data">
                    <input type="hidden"  id="id"  name="id"  value="<?php echo $row->id; ?>">
                    <input type="hidden"  id="old"  name="old"  value="<?php echo $row->image; ?>">
                    <div class="row">
                        <div class="col">
                            <div id="profile" style="background-image: url('<?php echo base_url().'uploads/sliders/'.$row->image; ?>')">
                                <div class="dashes"></div>
                                <label>Click to browse image of the Sliders here</label>
                            </div> 
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