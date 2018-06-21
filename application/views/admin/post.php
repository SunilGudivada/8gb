<div class="row center modal" id="overlay">
    <div class="preloader-wrapper small active">
                      <div class="spinner-layer spinner-white-only">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                          <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
     </div>
                    <p class="center white-text">Please Wait</p>
                    
                    
                    
                    
</div> 

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

    <script src="<?php echo base_url('assets/js/plugins/datatables.net/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datatables.net-buttons/js/buttons.flash.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datatables.net-scroller/js/datatables.scroller.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/jszip/dist/jszip.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pdfmake/build/pdfmake.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pdfmake/build/vfs_fonts.js');?>"></script>
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        TableManageButtons.init();
      });

       $(document).ready(function(){
            $(".dropdown-content.select-dropdown li").on( "click", function() {
                var that = this;
                setTimeout(function(){
                if($(that).parent().hasClass('active')){
                        $(that).parent().removeClass('active');
                        $(that).parent().hide();
                }
                },100);
            });
        });
    </script>

