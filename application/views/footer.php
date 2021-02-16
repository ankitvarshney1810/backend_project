<script>
        $(document).ready(function(){
            $(".btnmenu").click(function(){
                $(".sidebar").toggleClass('closeside');
                $("header").toggleClass('expand-main');
                $("#content").toggleClass('expand-main');
                $("body").toggleClass('overflow-hide');
            });
        });

        $(document).ready(function(){
            $(".refund").click(function(){
                $(".refund-box").css('display','block');
                $(".cancel-box").css('display','none');
                $(".refund").addClass('border');
                $(".cancel").removeClass('border');
            });
            $(".cancel").click(function(){
                $(".refund-box").css('display','none');
                $(".cancel-box").css('display','block');
                $(".cancel").addClass('border');
                $(".refund").removeClass('border');
            });
        });

    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
</body>
</html>