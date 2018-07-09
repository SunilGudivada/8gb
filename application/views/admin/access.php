       <link href="<?php echo base_url('assets/css/layouts/page-center.css');?>" type="text/css" rel="stylesheet" media="screen,projection">
 <div id="login-page" class="row" style="border:2px solid #042438;border-radius:10px;">
    <div class="col s12 z-depth-4 card-gra" style="border:2px solid #042438;border-radius:13px;">
      <form class="login-form" >
        <div class="row center">
          <div class="input-field col s12">
            <img src=<?php echo base_url('assets/images/icon.png');?> alt="8GB Logo" class="circle z-depth-2 responsive-img valign profile-image-login ">
            <p class="center login-form-text "><b>Auhtentication</b></p>
          </div>
        </div>
        <div class="row margin id">
          <div class="input-field col s12 center">
            <input id="username" type="text" class="center" name="userid" required placeholder="8GB  ID  ">
          </div>
        </div>

         <div class="row margin password">
          <div class="input-field col s12 center">
            <input id="password" type="password"class="center" name="pass" required placeholder="*** ***" style="font-size:25px;">
          </div>
        </div>
         <div class="row">
          <div class="input-field col s12 ">
            <a class="btn-submit waves-effect waves-light col s12  btn color" id="login-but">submit</a>
          </div>
        </div>
      </form>
    </div>
  </div>

<script>
  $(document).ready(function(){
    $('body').css('background-image',"url('<?= base_url('assets/images/background.PNG') ?>')");

    $('.btn-submit').click(function(){
      var data = $('.login-form').serialize();
      $.post('<?= base_url('index.php/auth/accessCheck/') ?>',data,function(msg){
        if(msg.status == 'success'){
           Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
           location.href="<?= base_url('index.php/Dashboard'); ?>"
        }else{
           Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
        }
      });
    });

  });


</script>

