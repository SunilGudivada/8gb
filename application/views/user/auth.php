       <link href="<?php echo base_url('assets/css/layouts/page-center.css');?>" type="text/css" rel="stylesheet" media="screen,projection">
 <div id="login-page" class="row" style="border:2px solid #042438;border-radius:10px;">
    <div class="col s12 z-depth-4 card-gra signin-card" style="border:2px solid #042438;border-radius:13px;">
      <form class="login-form" >
        <div class="row center">
          <div class="input-field col s12">
            <a href="<?= base_url() ?>" ><img src=<?php echo base_url('assets/images/icon.png');?> alt="8GB Logo" class="circle z-depth-2 responsive-img valign profile-image-login "></a>
            <p class="center login-form-text "><b>Authentication</b></p>
          </div>
        </div>
        <div class="row margin id">
          <div class="input-field col s12 center">
            <input id="username" type="text" class="center" name="sia" required placeholder="Email  ID  ">
          </div>
        </div>

         <div class="row margin password">
          <div class="input-field col s12 center">
            <input id="password" type="password"class="center" name="sib" required placeholder="*** ***" style="font-size:25px;">
          </div>
        </div>
         <div class="row">
          <div class="input-field col s12 ">
            <a class="btn-submit waves-effect waves-light col s12  btn color" id="login-but">submit</a>
          </div>

          </div>
          <div class="center"><i class="mdi-notification-vpn-lock small"></i></div>
          <div class="row">
                        <div class="input-field col s12 ">
                            <div class="waves-effect waves-light col s12  btn google g-signin"> SignIn with Google </div>
                        </div>
                        <div class="input-field col s12 ">
                            <div class="waves-effect waves-light  btn  col s12 facebook f-signin"> SignIn with Facebook</div>
                        </div>
                    </div>
          <div class="row">
            <p class="center">Create Account ? <a href="javascript:void(0);" class="signintoshow"> Click Here.</a></p>
        </div>
      </form>


    </div>


    <div class="col s12 z-depth-4 card-gra signup-card" style="border:2px solid #042438;border-radius:13px;">
      <form class="signup-form" >
        
        <div class="row center">
          <div class="input-field col s12 m6 l6">
            <a href="<?= base_url() ?>" ><img src=<?php echo base_url('assets/images/icon.png');?> alt="8GB Logo" class="circle z-depth-2 responsive-img valign profile-image-login "></a>
            <p class="center login-form-text "><b>Create Account</b></p>
          </div>
        </div>
        <div class="col s12 m6 l6">
        <div class="row margin id">
          <div class="input-field col s12 center">
            <input type="text" class="center" name="uname" required placeholder="Username">
          </div>
        </div>

        <div class="row margin id">
          <div class="input-field col s12 center">
            <input type="text" class="center" name="cemail" required placeholder="Email ID">
          </div>
        </div>

        <div class="row margin id">
          <div class="input-field col s12 center">
            <input type="password" class="center" name="password" required placeholder="*******" style="font-size:25px;">
          </div>
        </div>

         <div class="row margin password">
          <div class="input-field col s12 center">
            <input type="password"class="center" name="cpassword" required placeholder="*******" style="font-size:25px;">
          </div>
        </div>
         <div class="row">
          <div class="input-field col s12 ">
            <a class="waves-effect waves-light col s12  btn color" id="btn-signup">submit</a>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l6">
        <div class="center"><i class="mdi-action-info-outline small"></i><div class="login-form-text">Rules</div>
        <p class="center">Username should be unique.<br>
          <span class="red-text"><b>Ex:</b> ostella95</span> <br>
          Password must contain alphabets and numbers<br>
          <span class="red-text"><b>Ex:</b> 123456a</span> <br>
        </p></div><br>
        <div class="center"><i class="mdi-notification-vpn-lock small"></i><div class="login-form-text">SOcial Login</div></div>
          <div class="row">
              <div class="input-field col s12 ">
                  <div class="waves-effect waves-light col s12  btn google g-signup"> SignUp with Google </div>
              </div>
              <div class="input-field col s12 ">
                  <div class="waves-effect waves-light  btn  col s12 facebook f-signup"> SignUp with Facebook</div>
              </div>
          </div>
        <div class="row">
        <p class="center">Account exist ?<a href="javascript:void(0);" class="logintoshow"> Click Here.</a></p>
      </div>
    </div>
              </form>
    </div>


  </div>

<script>
  $(document).ready(function(){
    $('body').css('background-image',"url('<?= base_url('assets/images/background.PNG') ?>')");
    $('.signup-card').hide();

    $('.logintoshow').click(function(){
      $('.signup-card').hide();
      $('.signin-card').show();
    });

    $('.signintoshow').click(function(){
      $('.signup-card').show();
      $('.signin-card').hide();
    });


    $('.btn-submit').click(function(){
      var data = $('.login-form').serialize();
      $.post('<?= base_url('index.php/auth/signin/') ?>',data,function(msg){
        if(msg.status == 'success'){
           Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
           location.reload();
        }else{
           Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
        }
      });
    });

    $('#btn-signup').click(function(){
      var data = $('.signup-form').serialize();
      $.post('<?= base_url('index.php/auth/signup/') ?>',data,function(msg){
        if(msg.status == 'success'){
           Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
           location.reload();
        }else{
           Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
        }
      });
    });

    $('.g-signin').click(function(){
        location.href="<?= base_url('index.php/hauth/signin/Google') ?>";
    });

    $('.f-signin').click(function(){
        location.href="<?= base_url('index.php/hauth/signin/Facebook') ?>";
    });

    $('.g-signup').click(function(){
        location.href="<?= base_url('index.php/hauth/signup/Google') ?>";
    });

    $('.f-signup').click(function(){
        location.href="<?= base_url('index.php/hauth/signup/Facebook') ?>";
    });

  });


</script>

