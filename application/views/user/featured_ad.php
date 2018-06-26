<h4 style="padding:10px;border-radius:1px;"> FeaturedAd: </h4>

            <div id="classyad-posts" class="row">
                <div class="blog-sizer"></div>


<?php 
$ad = $ads->result();
$i=0;
foreach($ads->result() as $row):
  $i++;?>
  <div class="blog">

    <div class="card ">
      <div href="#" data-position="right" data-delay="50" data-tooltip=" Regular ClassyAd"class="btn-floating btn-small tooltipped flow-text but_type_list left green darken-3 waves-effect waves-light ">
        <i class="mdi-action-stars"></i></div>
        <div class="card-image waves-effect waves-block waves-light">
            <a href="#!"><img src="<?php echo base_url('assets/images/gallary/'.($i%19+1).'.jpg');?>" alt="blog-img">
            </a>
        </div>

        <ul class="card-action-buttons">
            <li><a class="btn-floating waves-effect waves-light color activator"><i class="mdi-social-share"></i></a>
            </li>                            
            <li><a class="btn-floating btn-large waves-effect waves-light red accent-4"><b>₹ <?php echo $row->ad_price;?></b></a>
            </li>
        </ul>

        <div class="card-content">
            <p class="row">
              <span class="left"><a href=""><b><?php echo ucfirst($row->ad_cat);?></b></a></span>
              <span class="right">18th June, 2015</span>
            </p>
            <h4 class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4"><?php echo $row->ad_name;?></a>
            </h4>
            <p class="blog-post-content"><?php echo $row->ad_desc;?></p>
            <div class="row">
              <div class="col s2">
                <img src="<?php echo base_url('assets/images/avatar.jpg');?>" alt="" class="circle responsive-img valign profile-image">
              </div>
              <div class="col s9"> <br> By <a href="#">John Doe</a></div>
            </div>
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i><?php echo $row->ad_name;?></span>
            <p><?php echo $row->ad_desc;?></p>
           <div class="sharethis-inline-share-buttons"></div>

            

        </div>
    </div></div>

<?php endforeach;?>  

  <div class="append_ad">

  </div>
</div>
<!-- 
<script type="text/javascript">
  $(document).ready(function(){
    setInterval(function(){
      $.ajax({
        url:"http://localhost/deepak/classyad/application/views/user/card.php",
        success:function(html){
          $('.append_ad').append(html);
        }
      })
       var $containerBlog = $("#classyad-posts");
    $containerBlog.imagesLoaded(function() {
      $containerBlog.masonry({
        itemSelector: ".blog",
        columnWidth: ".blog-sizer",
      });
    });
    },2000);
  });
</script>
 -->




