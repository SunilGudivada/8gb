<script type="text/javascript" src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/prism/prism.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/prism/prism.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery-validation/jquery.validate.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery-validation/additional-methods.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/uislider/nouislider.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/plugins/dropify/js/dropify.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/masonry.pkgd.min.js');?>"></script>
    <!-- imagesloaded -->
    <script src="<?php echo base_url('assets/js/plugins/imagesloaded.pkgd.min.js');?>"></script> 
 <script type="text/javascript">
    /*
     * Masonry container for Classyad page
     */
    var $containerBlog = $("#classyad-posts");
    $containerBlog.imagesLoaded(function() {
      $containerBlog.masonry({
        itemSelector: ".blog",
        columnWidth: ".blog-sizer",
      });
    });
    </script>