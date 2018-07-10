<body>
	<div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
	<header id="header" class="page-topbar ">
            <div class="navbar-fixed">
                <nav class="navbar-color red accent-4">
                    <div class="nav-wrapper">
                        <ul class="left">
                            <li>
                                <h1 class="logo-wrapper">
				                    <a href="<?php echo base_url('');?>" class="brand-logo darken-1">
				                    	8GB<!-- <img alt="8GB" style="height: 40px;width: 40px;max-width: 80px;max-height: 300px;" class=''> -->
				                    </a> 
                				</h1>
                            </li>
                        </ul>
                        <div class="header-search-wrapper hide-on-med-and-down"  id="searchfield" >
                        	<i class="mdi-action-search"></i>
                            <input type="text" name="Search" class="header-search-input z-depth-2 biginput" placeholder="What are you looking for .." style="padding-left:10%;width:93%;"/>
                        </div>
                        
                        <ul class="right hide-on-med-and-down">
                       
                       <?php if($this->session->userdata('type') != 'user' && $this->session->userdata('type') != 'admin'):?>

                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light signin">SignIn</a></li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light signup">SignUp</a></li>

                        <?php endif;?>

                        <?php if($this->session->userdata('type') == 'admin'):?>

                        <li><a href="<?php  echo base_url('index.php/Dashboard');?>" class="waves-effect waves-block waves-light">Dashboard</a></li>

                        <?php endif;?>

                        <li><a href="<?php echo base_url('index.php/advts');?>" class="waves-effect waves-block waves-light" >Advertise</a>
                        </li>

                        
                        

                        <?php if($this->session->type == 'user'):?>
                            <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button color white-text flow-text" data-activates="auth-dropdown"><span style="padding: 0 8px 0;"><?php echo ucfirst(substr($this->session->email,0,1));?></span></a>
                            </li>
                            
                        <?php endif;?>

                        <li><a href="#!" class="waves-effect waves-block waves-light translation-button" data-activates="more-dropdown">More</a>
                        </li>
                         
                    </ul>

                    <ul id="auth-dropdown" class="dropdown-content ultra-small">
                      <li>
                        <a href="<?php echo base_url('index.php/profile');?>"><span class="">My Profile</span></a>
                      </li>
                      <li>
                        <a href="<?php echo base_url('index.php/auth/logout');?>"><span class="">Logout</span></a>
                      </li>
                      
                    </ul>

                     <ul id="more-dropdown" class="dropdown-content ultra-small">
                      
                     
                      <li>
                        <a href="<?= base_url('index.php/contactus') ?>"><span class="">Contact Us</span></a>
                      </li> 
                      <li>
                        <a href="#!"><span class="">24 * 7 Customer Care</span></a>
                      </li>
                      
                    </ul>
                            <!-- <a class="waves-effect waves-light btn right color sesstatus modal-trigger" data-target="signinmodal">SignIn</a>
                            <a class="waves-effect waves-light btn right color sesstatus modal-trigger" data-target="signupmodal">SignUp</a> -->

                            
                    </div>

                </nav>
            </div>
        </header>

        <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav leftside-navigation color white-text">
            
            <li class="bold"><a href="<?= base_url('')?>" class="waves-effect waves-light white-text"><i class="mdi-action-home"></i> Home</a>
            </li>

            <?php if($this->session->userdata('type') != 'user' && $this->session->userdata('type') != 'admin'):?>

            <li><a href="<?= base_url('index.php/auth') ?>" class="waves-effect waves-block waves-light white-text"><i class="mdi-action-perm-identity"></i> SignIn / SignUp</a></li>

            <?php endif;?>

            <?php if($this->session->userdata('type') == 'user' && $this->session->userdata('type') != 'admin'):?>

            <li><a href="<?= base_url('index.php/profile')?>" class="waves-effect waves-block waves-light white-text"><i class="mdi-action-perm-identity"></i> Profile</a></li>

            <?php endif;?>
            <li class="bold"><a href="<?= base_url('index.php/advts')?>" class="waves-effect waves-cyan white-text"><i class="mdi-notification-play-install"></i> Advertise</a>
            </li>
            
            
            <li class="li-hover"><div class="divider"></div></li>
            <li class="bold white-text"><a href="<?= base_url('')?>" class="waves-effect waves-cyan white-text"><i class="mdi-action-verified-user"></i> About Us</a>
            </li>
            <li class="bold"><a href="<?= base_url('')?>" class="waves-effect waves-cyan white-text"><i class="mdi-image-grid-on"></i> Career</a>
            </li>
            <li class="bold"><a href="<?= base_url('index.php/contactus')?>" class="waves-effect waves-cyan white-text"><i class="mdi-communication-contacts"></i> contact Us</a>
            </li>
           
                        <li class="li-hover"><div class="divider"></div></li>
                         <li class="bold"><a href="<?= base_url('')?>" class="waves-effect waves-cyan white-text"><i class="mdi-notification-disc-full"></i> Disclaimer</a>
            </li>
            <li class="bold"><a href="<?= base_url('')?>" class="waves-effect waves-cyan white-text"><i class="mdi-communication-live-help"></i> Privacy</a>
            </li>
            <li class="bold"><a href="<?= base_url('')?>" class="waves-effect waves-cyan white-text"><i class="mdi-action-swap-vert-circle"></i> Terms of Use</a>
            </li> 
             <li class="bold"><a href="<?= base_url('')?>" class="waves-effect waves-cyan white-text"><i class="mdi-action-swap-vert-circle"></i> Listing Policy</a>
            </li> 
             <li class="bold"><a href="<?= base_url('')?>" class="waves-effect waves-cyan white-text"><i class="mdi-action-swap-vert-circle"></i> Refund</a>
            </li>                    
            
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only red accent-4"><i class="mdi-navigation-menu"></i></a>

    </aside>

        <div id="signupmodal" class="modal color-text modalsignup card-gra">
            <div class="center"><i class="mdi-social-person-add small"></i><div class="center login-form-text "><b>8GB : ClassyAd - SignUp</b></div>
        </div>
    <div class="modal-content" >
        <div class="row p-row">
            <div class="col s12 m4 l6">
                <form class="signupformValidate" id="signupformValidate" method="post" action="" novalidate="novalidate">
                    <div class="">
                        <div class="input-field col s12 p-row">
                            <label for="uname" class="white-text">Username *</label>
                            <input id="uname" name="uname" type="text" data-error=".errorTxt1" required="" aria-required="true">
                            <div class="errorTxt1 ultra-small red-text text-accent-4"></div>
                        </div>
                        <div class="input-field col s12 p-row">
                            <label for="cemail" class="white-text">E-Mail *</label>
                            <input id="cemail" type="email" name="cemail" data-error=".errorTxt2" required="" aria-required="true">
                            <div class="errorTxt2 ultra-small red-text text-accent-4"></div>
                        </div>
                        <div class="input-field col s12 p-row">
                            <label for="password" class="white-text">Password *</label>
                            <input id="password" type="password" name="password" data-error=".errorTxt3" required="" aria-required="true">
                            <div class="errorTxt3 ultra-small red-text text-accent-4"></div>
                        </div>
                        <div class="input-field col s12 p-row">
                            <label for="cpassword" class="white-text">Confirm Password *</label>
                            <input id="cpassword" type="password" name="cpassword" data-error=".errorTxt4" required="" aria-required="true">
                            <div class="errorTxt4 ultra-small red-text text-accent-4"></div>
                        </div>
                      </div>
                </form>
                <button class="btn waves-effect waves-light color right" id="subu">SignUp
                    <i class="mdi-content-send right"></i>
                </button>
                <div class="preloader-wrapper small active right" id="subu_loader">
                    <div class="spinner-layer spinner-red-only">
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
              </div>

            <div class="center abs-center " id="signupbutton">
                <div class="col s12">
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn google g-signup"> SignUp with Google </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  facebook f-signup"> SignUp with Facebook</div>
                        </div>
                    </div>

                    <div class=" row color-text ultra-small white-text"> Already have account ? Click here to login</div>

                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  red ascent-4 signup8gb"> Login Here</div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
    <div class="modal-footer" style="background-color:#042438;">
            <div class="white-text">
                <p class="ultra-small center">
                    <a href="#!" class="white-text">Conditions of Use</a>&ensp; | &ensp;
                    <a href="#!" class="white-text"> Privacy Policy</a>&ensp; | &ensp;
                    <a href="#!" class="white-text">  Help</a> 
                </p>
                <p class="ultra-small center">
                © 2016 - <?php echo date("Y");?> , DSPL - 8GB : ClassyAd
                </p>
            </div>
            </div>
  </div>





<div id="signinmodal" class="modal card-gra">
    <div class="center"><i class="mdi-social-people-outline small"></i><div class="center login-form-text "><b>8GB : ClassyAd - SignIn</b></div></div>
    <div class="modal-content ">

        <div class="row">
            <div class="col s12 m4 l6" id="signinform">
                <div class="">
                    <br>
                    <form class="signinformValidate" id="signinformValidate" method="post" action="" novalidate="novalidate">
                        <div class="input-field col s12">
                            <label for="sia" class="white-text">E-Mail *</label>
                            <input id="sia" type="email" name="sia" data-error=".ein1">
                            <div class="ein1"></div>
                        </div>
                        <div class="input-field col s12">
                            <label for="sib" class="white-text">Password *</label>
                            <input id="sib" type="password" name="sib" data-error=".ein2">
                            <div class="ein2"></div>
                        </div>

                        <div class="row center">
                        <div class="waves-effect waves-light btn color sesstatus" id="sibu">Click here to SignIn
                            <i class="mdi-content-send right"></i>
                        </div>
                    </div>
                        
                        <div class="preloader-wrapper small active center" id="sibu_loader">
                            <div class="spinner-layer spinner-red-only">
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

                        <div class="row center">
                            <div class="ultra-small">Forgot Password ? <a href="#!" class="white-text"> <b> Click here </b></a> </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="center abs-center " id="signupbutton">
                <div class="col s12 ">
                    <br>
                    <br>
                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  google g-signin"> SignIn with Google</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  facebook f-signin"> SignIn with Facebook</div>
                        </div>
                    </div>

                    <div class=" row color-text ultra-small white-text"> Not yet registered ? Click here to register </div>

                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  red ascent-4 signin8gb"> SignUp Here</div>
                        </div>
                    </div>
                    
                </div>
            </div>



        </div>
    </div>
    <div class="modal-footer" style="background-color:#042438;">
            <div class="white-text">
                <p class="ultra-small center">
                    <a href="#!" class="white-text">Conditions of Use</a>&ensp; | &ensp;
                    <a href="#!" class="white-text"> Privacy Policy</a>&ensp; | &ensp;
                    <a href="#!" class="white-text">  Help</a> 
                </p>
                <p class="ultra-small center">
                © 2016 - <?php echo date("Y");?> , DSPL - 8GB : ClassyAd
                </p>
            </div>
            </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $(".signin").click(function() {
            $("#signinmodal").openModal();
            $("#sibu_loader").hide();
        });

        $('.modal-content').css('height','auto');
        $(".signup").click(function() {
            $("#signupmodal").openModal();
            $("#subu_loader").hide();

        });

        $(".signup8gb").click(function() {
            $("#signinmodal").openModal();
            $("#signupmodal").closeModal();
            $("#sibu_loader").hide();
        });

        $(".signin8gb").click(function() {
            $("#signinmodal").closeModal();
            $("#signupmodal").openModal();
            $("#subu_loader").hide();
        });

        $("#subu").click(function(){
            var data = $("#signupformValidate").serialize();
            console.log(data);
            $("#subu").hide();
            $("#subu_loader").show();
            
            $.post("<?php echo base_url('index.php/auth/signup');?>",data,function(msg){
                    if(msg.status == 'success'){
                        Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
                        location.reload();
                    }else if(msg.status == 'failure'){
                         Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
                        $("#subu").show();
                        $("#subu_loader").hide();
                    }
            });
        });

        $("#sibu").click(function(){
            var data = $("#signinformValidate").serialize();
            console.log(data);
            $("#sibu").hide();
            $("#sibu_loader").show();
            
            $.post("<?php echo base_url('index.php/auth/signin');?>",data,function(msg){
                    if(msg.status == 'success'){
                        Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
                        location.reload();
                    }else if(msg.status == 'failure'){
                         Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
                        $("#sibu").show();
                        $("#sibu_loader").hide();
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
            location.href="<?= base_url('index.php/hauth/signin/Google') ?>";
        });

        $('.f-signup').click(function(){
            location.href="<?= base_url('index.php/hauth/signin/Facebook') ?>";
        });

    })
</script>