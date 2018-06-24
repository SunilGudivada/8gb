<body>
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
                       
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><img src="<?php echo base_url('assets/images/icons/motor.PNG');?>"></a>
                        </li>

                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><img src="<?php echo base_url('assets/images/icons/classifieds.PNG');?>"></a>
                        </li>

                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><img src="<?php echo base_url('assets/images/icons/p_rent.PNG');?>"></a>
                        </li>

                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><img src="<?php echo base_url('assets/images/icons/p_sale.PNG');?>"></a>
                        </li>

                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><img src="<?php echo base_url('assets/images/icons/jobs.PNG');?>"></a>
                        </li>

                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><img src="<?php echo base_url('assets/images/icons/community.PNG');?>"></a>
                        </li>
                        <?php if($this->session->type != 'user'):?>
                            <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><img src="<?php echo    base_url('assets/images/icons/auth.PNG');?>"></a>
                            </li>
                        <?php endif;?>

                        <?php if($this->session->type == 'user'):?>
                            

                            <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="more-dropdown">More</a>

                            </li>
                            <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button color white-text" data-activates="auth-dropdown"><?php echo substr($this->session->email,0,1);?></a>
                            </li>
                        <?php endif;?>
                         
                    </ul>

                    <ul id="auth-dropdown" class="dropdown-content ultra-small">
                      <li>
                        <a href="#!"><span class="">My Profile</span></a>
                      </li>
                      <li>
                        <a href="#!"><span class="">Notifications</span></a>
                      </li>
                      <li>
                        <a href="#!"><span class="">Logout</span></a>
                      </li>
                      
                    </ul>

                     <ul id="more-dropdown" class="dropdown-content ultra-small">
                      <li>
                        <a href="<?php echo base_url('index.php/advertise');?>"><span class="">Advertise</span></a>
                      </li>
                      <li>
                        <a href="#!"><span class="">24 * 7 Customer Care</span></a>
                      </li>
                      <li>
                        <a href="#!"><span class="">Membership Plans</span></a>
                      </li>
                      
                    </ul>
                            <!-- <a class="waves-effect waves-light btn right color sesstatus modal-trigger" data-target="signinmodal">SignIn</a>
                            <a class="waves-effect waves-light btn right color sesstatus modal-trigger" data-target="signupmodal">SignUp</a> -->

                            
                    </div>

                </nav>
            </div>
        </header>

        <div id="signupmodal" class="modal color-text modalsignup">
    <div class="modal-content " >
        <div class="row p-row">
            <div class="col s12 m4 l6">
                <form class="signupformValidate" id="signupformValidate" method="post" action="" novalidate="novalidate">
                    <div class="">
                        <br>

                        <div class="input-field col s12 p-row">
                            <label for="uname">Username *</label>
                            <input id="uname" name="uname" type="text" data-error=".errorTxt1" required="" aria-required="true">
                            <div class="errorTxt1 ultra-small red-text text-accent-4"></div>
                        </div>
                        <div class="input-field col s12 p-row">
                            <label for="cemail">E-Mail *</label>
                            <input id="cemail" type="email" name="cemail" data-error=".errorTxt2" required="" aria-required="true">
                            <div class="errorTxt2 ultra-small red-text text-accent-4"></div>
                        </div>
                        <div class="input-field col s12 p-row">
                            <label for="password">Password *</label>
                            <input id="password" type="password" name="password" data-error=".errorTxt3" required="" aria-required="true">
                            <div class="errorTxt3 ultra-small red-text text-accent-4"></div>
                        </div>
                        <div class="input-field col s12 p-row">
                            <label for="cpassword">Confirm Password *</label>
                            <input id="cpassword" type="password" name="cpassword" data-error=".errorTxt4" required="" aria-required="true">
                            <div class="errorTxt4 ultra-small red-text text-accent-4"></div>
                        </div>
                      </div>
                </form>
                <button class="btn waves-effect waves-light color right" type="submit" id="subu">SignUp
                    <i class="mdi-content-send right"></i>
                </button>
                <div class="preloader-wrapper small active hide" id="subu_loader">
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
                <div class="col s12 ">
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col s11 offset-s1">
                            <a class='login' href="">
                                <div class="waves-effect waves-light  btn  google" id="my-signin2"> SignUp with Google </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  facebook"><a class='login' href="<?php echo  " # "  ; ?>"> SignUp with Facebook</a></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  linkedin"> SignUp with Linkedin</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  twitter"> SignUp with Twitter</div>
                        </div>
                    </div>

                    <div class=" row color-text ultra-small"> Already have account ? Click here to login </div>

                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  red ascent-4 signup8gb"> Login Here</div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
  </div>





<div id="signinmodal" class="modal">
    <div class="modal-content ">
        <div class="row">
            <div class="col s12 m4 l6" id="signinform">
                <div class="">
                    <br>
                    <br>
                    <br>
                    <form class="signinformValidate" id="signinformValidate" method="post" action="" novalidate="novalidate">
                        <div class="input-field col s12">
                            <label for="sia">E-Mail *</label>
                            <input id="sia" type="email" name="sia" data-error=".ein1">
                            <div class="ein1"></div>
                        </div>
                        <div class="input-field col s12">
                            <label for="sib">Password *</label>
                            <input id="sib" type="password" name="sib" data-error=".ein2">
                            <div class="ein2"></div>
                        </div>
                        <button class="waves-effect waves-light btn color sesstatus right" type="submit" id="sibu">SignIn
                            <i class="mdi-content-send right"></i>

                        </button>
                        <div class="preloader-wrapper small active hide right" id="sibu_loader">
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
                    </form>
                </div>
            </div>

            <div class="center abs-center " id="signupbutton">
                <div class="col s12 ">
                    <br>
                    <br>
                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  google"> SignIn with Google</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  facebook"> SignIn with Facebook</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  linkedin"> SignIn with Linkedin</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  twitter"> SignIn with Twitter</div>
                        </div>
                    </div>

                    <div class=" row color-text ultra-small"> Not yet registered ? Click here to register </div>

                    <div class="row">
                        <div class="col s11 offset-s1">
                            <div class="waves-effect waves-light  btn  red ascent-4 signin8gb"> SignUp Here</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $(".signin").click(function() {
            $("#signinmodal").openModal();
        });

        $('.modal-content').css('height','auto');
        $(".signup").click(function() {
            $("#signupmodal").openModal();
        });

        $(".signup8gb").click(function() {
            $("#signinmodal").openModal();
            $("#signupmodal").closeModal();
        });

        $(".signin8gb").click(function() {
            $("#signinmodal").closeModal();
            $("#signupmodal").openModal();
        });

    })
</script>