<div class="container">

            <div class="row  hide-on-med-and-down" style="margin:0;" >

                <div class="col s12 m6 l6" style="padding:0px;">
                <div class="card small" style="max-width: 100%;max-height:100%">
                    <div class="card-image center waves-effect waves-light" style="max-height:100%;">
                      <div href="#" data-position="right" data-delay="50" data-tooltip=" Premium ClassyAd"class="btn-floating btn-small tooltipped flow-text but_type_list left green waves-effect waves-light ">
                       <i class="mdi-action-stars"></i>
                        </div>
                        <div class="currentStatus">

                            <div style="display: inline-block;">
                                <img src="<?php echo base_url("assets/images/gallary/1.jpg");?>">
                            </div>
                            <div>
                                <img src="<?php echo base_url("assets/images/gallary/2.jpg");?>">
                            </div>
                            <div>
                                <img src="<?php echo base_url("assets/images/gallary/3.jpg");?>">
                            </div>
                        </div>
                        
                    </div>
                </div>
              </div>

              <div class="col s12 m6 l6" style="padding:0px;">
                <div class="card small" style="max-width: 100%;max-height:100%">
                    <div class="card-image center waves-effect waves-light" style="max-height:100%;">
                      <div href="#" data-position="right" data-delay="50" data-tooltip=" Premium ClassyAd"class="btn-floating btn-small tooltipped flow-text but_type_list left amber darken-3 waves-effect waves-light ">
                       <i class="mdi-action-stars"></i>
                        </div>
                        <div class="slider">
                            <div style="display: inline-block;">
                                <img src="<?php echo base_url("assets/images/gallary/3.jpg");?>">
                            </div>
                            <div>
                                <img src="<?php echo base_url("assets/images/gallary/1.jpg");?>">
                            </div>
                            <div>
                                <img src="<?php echo base_url("assets/images/gallary/2.jpg");?>">
                            </div>
                        </div>
                        
                    </div>
                </div>
                </div>
            </div>

<script type="text/javascript">
  $(document).ready(function(){
var currentIndex = 0,
  items = $('.currentStatus div'),
  itemAmt = items.length;

function cycleItems() {
  var item = $('.currentStatus div').eq(currentIndex);
  items.hide();
  item.css('display','inline-block');
}

var autoSlide = setInterval(function() {
  currentIndex += 1;
  if (currentIndex > itemAmt - 1) {
    currentIndex = 0;
  }
  cycleItems();
}, 3000);

var currentIndex1 = 0,
  items1 = $('.slider div'),
  itemAmt1 = items.length;

function cycleItems1() {
  var item1 = $('.slider div').eq(currentIndex1);
  items1.hide();
  item1.css('display','inline-block');
}

var autoSlide1 = setInterval(function() {
  currentIndex1 += 1;
  if (currentIndex1 > itemAmt1 - 1) {
    currentIndex1 = 0;
  }
  cycleItems1();
}, 3000);

});
  </script>