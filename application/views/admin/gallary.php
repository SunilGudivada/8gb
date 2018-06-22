<link href="<?php echo base_url('assets/js/plugins/magnific-popup/magnific-popup.css');?>" rel="stylesheet">

<section id="content">

  <div class="container center">
  <div class="row">
<br>

<div class="masonry-gallery-wrapper">                
                <div class="popup-gallery">
                  <div class="gallary-sizer"></div>
                  <div class="gallary-item"><a href="<?php echo base_url('assets/images/gallary/1.jpg');?>" title="The Cleaner"><img src="<?php echo base_url('assets/images/gallary/1.jpg');?>"></a></div>
                  <div class="gallary-item"><a href="<?php echo base_url('assets/images/gallary/2.jpg');?>" title="Winter Dance"><img src="<?php echo base_url('assets/images/gallary/2.jpg');?>"></a></div>
                  <div class="gallary-item"><a href="<?php echo base_url('assets/images/gallary/3.jpg');?>" title="The Uninvited Guest"><img src="<?php echo base_url('assets/images/gallary/3.jpg');?>"></a></div>
                  <div class="gallary-item"><a href="<?php echo base_url('assets/images/gallary/4.jpg');?>" title="Oh no, not again!"><img src="<?php echo base_url('assets/images/gallary/4.jpg');?>"></a></div>
                  <div class="gallary-item"><a href="<?php echo base_url('assets/images/gallary/5.jpg');?>" title="Swan Lake"><img src="<?php echo base_url('assets/images/gallary/5.jpg');?>"></a></div>
                  <div class="gallary-item"><a href="<?php echo base_url('assets/images/gallary/6.jpg');?>" title="The Shake"><img src="<?php echo base_url('assets/images/gallary/6.jpg');?>"></a></div>
                  <div class="gallary-item"><a href="<?php echo base_url('assets/images/gallary/7.jpg');?>" title="Who's that, mommy?"><img src="<?php echo base_url('assets/images/gallary/7.jpg');?>"></a></div>
                  <div class="gallary-item"><a href="<?php echo base_url('assets/images/gallary/8.jpg');?>" title="Who's that, mommy?"><img src="<?php echo base_url('assets/images/gallary/8.jpg');?>"></a></div>
                </div>
              </div>
</div></div></section>

    <script src="<?php echo base_url('assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js');?>"></script> 
     <script type="text/javascript">
      $(document).ready(function(){
      /*
       * Masonry container for Gallery page
       */
      var $containerGallery = $(".masonry-gallery-wrapper");
      $containerGallery.imagesLoaded(function() {
        $containerGallery.masonry({
            itemSelector: '.gallary-item img',
           columnWidth: '.gallary-sizer',
           isFitWidth: true
        });
      });

      //popup-gallery
      $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: true,    
        fixedContentPos: true,
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile mfp-no-margins mfp-with-zoom',
        gallery: {
          enabled: true,
          navigateByImgClick: true,
          preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
          verticalFit: true,
          tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
          titleSrc: function(item) {
            return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
          },
        zoom: {
          enabled: true,
          duration: 300 // don't foget to change the duration also in CSS
        }
        }
      });

    });
    </script>
    

