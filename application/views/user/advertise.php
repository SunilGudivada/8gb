<div class="container">
	<div id="preselecting-tab" class="section">
            <div class="row card card-gra white-text">
              <div class="col s12 m4 l3 center">
              	<h5>Steps to follow</h5>
                
                <p class='color' style="padding:10px;border:1px #d50000 solid;">Step 01</p>
                <h1><i class="mdi-action-receipt"></i></h1>
                Enter your Basic Advertisement Details.
                <p class='color' style="padding:10px;border:1px #d50000 solid;">Step 02</p>
                <h1><i class="mdi-action-picture-in-picture"></i></h1>
                Plan Selection.
                <p class='color' style="padding:10px;border:1px #d50000 solid;">Step 03</p>
                <h1><i class="mdi-action-verified-user"></i></h1>
                Confirmation Message.
              </div>
              <div class="col s12 m8 l9">
               	<h5>Add Advertisement</h5>

                <div class="row">
                  <div class="col s12">
                    <ul class="tabs tab-demo-active z-depth-1 color">
                      <li class="tab col s3"><a class="white-text waves-effect waves-light active" href="#step1">Step 01</a>
                      </li>
                      <li class="tab col s3"><a class="white-text waves-effect waves-light disabled" href="#step2">Step 02</a>
                      </li>
                      <li class="tab col s3"><a class="white-text waves-effect waves-light disabled" href="#step3">Step 03</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col s12">
                    <div id="step1" class="col s12  red lighten-4 color-text">
                      <div class="row">
                        <br>
                        <div class="col s3"> What are you advertising? </div>
                        <div class="input-field col s8">
                            <input id="adname" name="adname" class="placeholder_color" type="text" data-error=".errorTxt1" placeholder="House for rent">
                            <div class="errorTxt1"></div>
                        </div>
                      </div>

                      <div class="row">
                        <br>
                        <div class="col s3"> Price </div>
                        <div class="input-field col s8">
                            <input id="price" name="price" class="placeholder_color" type="number" data-error=".errorTxt1" placeholder="200">
                            <div class="errorTxt1"></div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <br>
                        <div class="col s3"> Describe your Advertisement </div>
                        <div class="input-field col s8">
                          <textarea id="desc" class="materialize-textarea placeholder_color" placeholder="Write Something about your advertisement."></textarea>
                        </div>
                      </div>

                       <div class="row">
                        <br>
                        <div class="col s3"> Please click your category</div>
                        <div class="input-field col s8">
                         
                            <div class="col s2">
                              <div class="card card-gra red accent-4 waves-effect waves-light input-category" data-category="motor">
                                <img src="<?php echo base_url('assets/images/icons/motor_big.PNG');?>" style="width:100%;height:100%;">
                              </div>
                            </div>
                         
                            <div class="col s2">
                              <div class="card card-gra red accent-4 waves-effect waves-light input-category" data-category="classifieds">
                                <img src="<?php echo base_url('assets/images/icons/classifieds_big.PNG');?>" style="width:100%;height:100%;">
                              </div>
                            </div>
                          
                            <div class="col s2">
                              <div class="card card-gra red accent-4 waves-effect waves-light input-category" data-category="rent">
                                <img src="<?php echo base_url('assets/images/icons/p_rent_big.png');?>" style="width:100%;height:100%;">
                              </div>
                            </div>

                            <div class="col s2">
                              <div class="card card-gra red accent-4 waves-effect waves-light input-category" data-category="sale">
                                <img src="<?php echo base_url('assets/images/icons/p_sale_big.png');?>" style="width:100%;height:100%;">
                              </div>
                            </div>

                            <div class="col s2">
                              <div class="card card-gra red accent-4 waves-effect waves-light input-category" data-category="jobs">
                                <img src="<?php echo base_url('assets/images/icons/jobs_big.png');?>" style="width:100%;height:100%;">
                              </div>
                            </div>
                          
                            <div class="col s2">
                              <div class="card card-gra red accent-4 waves-effect waves-light input-category" data-category="community">
                                <img src="<?php echo base_url('assets/images/icons/community_big.png');?>" style="width:100%;height:100%;">
                              </div>
                            </div>

                        </div>
                      </div>

                       <div class="row">
                        <br>
                        <div class="col s3"> Please select your sub category</div>
                        <div class="input-field col s8">
                          <div class="select-category-first red-text">
                            Please Select your category First
                          </div>
                            <?php $data = $this->Subcategory_model->getDetails();?>

                              

                              <?php foreach ($data->result() as $row):?>

                                
                            <div class="sub-category <?= $row->cat_name?>">
                              <input class="with-gap" name="<?= $row->cat_name?>" type="radio" id="<?= $row->subcat_name?>" value="<?= $row->subcat_name?>">
                              <label for="<?= $row->subcat_name?>"><span class="color-text"><?= $row->subcat_name?></span></label>          
                            </div>
                          
                          <?php endforeach;?>

                            <!-- <div class="sub-category"  id="classifieds">
                              <input class="with-gap" name="classifieds" type="radio"  id="test5" value="test5">
                              <label for="test5"><span class="color-text">classifieds Category</span></label>
                              <input class="with-gap" name="classifieds" type="radio" id="test6" value="test6">
                              <label for="test6"><span class="color-text">car</span></label>
                            </div>

                            <div class="sub-category"  id="p_rent">
                              <input class="with-gap" name="p_rent" type="radio" id="test7" value="test7">
                              <label for="test7"><span class="color-text">rent Category</span></label>
                              <input class="with-gap" name="p_rent" type="radio" id="test8" value="test8">
                              <label for="test8"><span class="color-text">car</span></label>
                            </div>

                            <div class="sub-category"  id="p_sale">
                              <input class="with-gap" name="p_sale" type="radio" id="test9" value="test9">
                              <label for="test9"><span class="color-text">sale Category</span></label>
                              <input class="with-gap" name="p_sale" type="radio" id="test10" value="test10">
                              <label for="test10"><span class="color-text">car</span></label>
                            </div>

                            <div class="sub-category"  id="jobs">
                              <input class="with-gap" name="jobs" type="radio" id="test11" value="test11">
                              <label for="test11"><span class="color-text">jobs Category</span></label>
                              <input class="with-gap" name="jobs" type="radio" id="test12" value="test12">
                              <label for="test12"><span class="color-text">car</span></label>
                            </div>

                            <div class="sub-category"  id="community">
                              <input class="with-gap" name="community" type="radio" id="test13" value="test13">
                              <label for="test13"><span class="color-text">community Category</span></label>
                              <input class="with-gap" name="community" type="radio" id="test14" value="test14">
                              <label for="test14"><span class="color-text">car</span></label>
                            </div> -->
                        </div>
                      </div>

                      <div class="row">
                        <div class="col offset-s3">
                      <div class="btn btn-small waves-effect waves-light color center proceed_step01" style="padding-bottom: 10px;">Click here to Proceed <i class="mdi-action-trending-neutral"></i></div>
                    </div>
                  </div>




                    </div>
                    <div id="step2" class="col s12 color-text">
                       <section class="plans-container" id="plans">
                          <article class="col s12 m6 l4">
                            <div class="card z-depth-1">
                              <div class="card-image light-blue waves-effect">
                                <div class="card-title">BASIC</div>
                                <div class="price"><sup>INR</sup>0<sub>/7 days</sub></div>
                                <div class="price-desc">Free Ad</div>
                              </div>
                              <div class="card-content">
                                <ul class="collection">
                                  <li class="collection-item">7 Days Validity</li>
                                  <li class="collection-item">Max 3 Photos</li>
                                  <li class="collection-item">Very Low search Priority</li>
                                  <li class="collection-item">NO Feature Ad</li>
                                  <li class="collection-item">No Client Support</li>
                                  <li class="collection-item ultra-small">No Mail & SMS on view of any user</li>
                                </ul>
                              </div>
                              <div class="card-action center-align">                      
                                <button class="waves-effect waves-light light-blue btn-basic btn">Select Plan</button>
                              </div>
                            </div>
                          </article>

                            <article class="col s12 m6 l4 ">
                              <div class="card z-depth-2">
                                <div class="card-image light-blue darken-1 waves-effect">
                                  <div class="card-title">PROFESSIONAL</div>
                                  <div class="price"><sup>INR</sup>99<sub>/30 days</sub></div>
                                  <div class="price-desc">Most Popular</div>
                                </div>
                                <div class="card-content">
                                  <ul class="collection">
                                    <li class="collection-item">30 Days Validity</li>
                                    <li class="collection-item">Max 10 Photos</li>
                                    <li class="collection-item">High search Priority</li>
                                    <li class="collection-item">NO Feature Ad</li>
                                    <li class="collection-item">Good Client Support</li>
                                    <li class="collection-item">Mail & SMS on view of any user</li>
                                  </ul>
                                </div>
                                <div class="card-action center-align">                      
                                  <button class="waves-effect waves-light light-blue btn btn-professional">Select Plan</button>
                                </div>
                              </div>
                            </article>

                            <article class="col s12 m6 l4">
                              <div class="card z-depth-3">
                                <div class="card-image light-blue darken-2 waves-effect">
                                  <div class="card-title">PREMIUM</div>
                                  <div class="price"><sup>INR</sup>299<sub>/90 days</sub></div>
                                  <div class="price-desc">Most Valuable</div>
                                </div>
                                <div class="card-content">
                                  <ul class="collection">
                                    <li class="collection-item">90 Days Validity</li>
                                    <li class="collection-item">Unlimited Photos</li>
                                    <li class="collection-item">Extreme High search Priority</li>
                                    <li class="collection-item">Feature Ad</li>
                                    <li class="collection-item">Extreme Client Support</li>
                                    <li class="collection-item">Mail & SMS on view of any user</li>
                                  </ul>
                                </div>
                                <div class="card-action center-align">                      
                                  <button class="waves-effect waves-light light-blue btn btn-premium">Select Plan</button>
                                </div>
                              </div>
                            </article>
              </section>
                    </div>
                    <div id="step3" class="col s12  red lighten-4">
                      <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies
                        mi vitae est. Mauris placerat eleifend leo.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <script type="text/javascript">
            $(document).ready(function(){
                $(".sub-category").hide();
                var temp_id = '';
                var category_input = 'motor';
                $(".input-category").click(function(){

                  //Hide Please select your category first message
                  $('.select-category-first').hide();

                  //getting data of the category on Click
                   category_input = $(this).data('category');

                  //All Subcategories and categories reinitiation
                  $(".sub-category").hide();
                  $(".input-category").css('border','0px white solid');
                  
                  //Adding CSS to the selected category
                  $(this).css('border','3px white solid');

                  //Display subcategory of the selected Category
                  $("."+category_input).show();

                });

                function validate_details(adName,adPrice,adDesc,adCat,adSubcat){

                  if(adName != '' && adPrice != '' && adDesc != '' && adCat != ''){
                    if(adSubcat)
                    {
                       $("#step2").removeClass("disabled"), $("ul.tabs").tabs(), $("ul.tabs").tabs("select_tab", "step2");
                       var str = "adname="+adName+"&desc="+adDesc + "&price=" + adPrice + "&cat=" + adCat + "&subcat="+adSubcat;
                       $.post('<?php echo base_url("index.php/advts/add/");?>',str,function(msg){
                        if(msg.status == 'success'){
                          temp_id = msg.tempid;
                          Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
                          }else{
                            Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
                          }
                       }

                        );
                    }
                    else
                    {
                      Materialize.toast('<span class="white-text">Something went wrong, Please try again.</span>', 5e3, "red");
                    }
                  }else{
                      Materialize.toast('<span class="white-text">Something went wrong, Please try again.</span>', 5e3, "red");

                  }

                }

                $('.proceed_step01').click(function(){

                  var adname = $("#adname").val();
                  var price = $("#price").val();
                  var desc = $("#desc").val();
                  var cat = category_input;
                  var sub_cat = $("input[name="+category_input+"]:checked").val();
                   var str = "adname="+adname+"&desc="+desc + "&price=" + price + "&cat=" + cat + "&subcat="+sub_cat;
                      
                  validate_details(adname,price,desc,cat,sub_cat);
                });

                $('.btn-basic').click(function (){
                  location.href= '<?php echo base_url('index.php/advts/payment/free/');?>'+temp_id;
                });

                $('.btn-professional').click(function (){
                  location.href= '<?php echo base_url('index.php/advts/payment/professional/');?>'+temp_id;
                })

                $('.btn-premium').click(function (){
                  location.href= '<?php echo base_url('index.php/advts/payment/premium/');?>'+temp_id;
                })

              });
          </script>
          