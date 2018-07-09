<div id="main">
<div class="wrapper">
      <aside id="left-sidebar-nav ">
        <ul id="slide-out" class="side-nav fixed leftside-navigation color">
           <li class="bold"><a href="" class="waves-effect waves-cyan"><i class="mdi-communication-business white-text"></i> Dashboard</a>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold "><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-note-add"></i>Define</a>
                        <div class="collapsible-body">
                            <ul>
                                <li ><a href="<?php echo base_url('index.php/dashboard/subcategory') ; ?>" class="white-text">Sub Category</a></li>
                                <li ><a href="<?php echo base_url('index.php/auth/changePassKey') ; ?>" class="white-text">Change Passkey</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-image-timer-auto"></i>Users</a>
                        <div class="collapsible-body">
                            <ul>
                                <li ><a href="<?php echo base_url('index.php/dashboard/users/'); ?>" class="white-text ultra-small">Global users</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold "><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-store"></i>ClassyAd</a>
                        <div class="collapsible-body">
                            <ul>
                                <li ><a href="<?php echo base_url('index.php/dashboard/advts/') ; ?>" class="white-text">Advertisements</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold "><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-assignment"></i>Contact Form</a>
                        <div class="collapsible-body">
                            <ul>
                                <li ><a href="<?php echo base_url('index.php/dashboard/contactForm') ; ?>" class="white-text">Contact us</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold "><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-image-filter-hdr"></i>Membership Plans</a>
                        <div class="collapsible-body">
                            <ul>
                                <li ><a href="<?php echo base_url('index.php/dashboard/memplan') ; ?>" class="white-text">View Plans</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold "><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-payment"></i>Transactions</a>
                        <div class="collapsible-body">
                            <ul>
                                <li ><a href="<?php echo base_url('index.php/dashboard/transactionsPaid') ; ?>" class="white-text">Paid Payments</a></li>
                                <li ><a href="<?php echo base_url('index.php/dashboard/transactionsPending') ; ?>" class="white-text">Pending Payments</a></li>
                            </ul>
                        </div>
                    </li>
                    
                </ul>
                </li>
            </ul>
<a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium left waves-effect waves-light color"><i class="mdi-navigation-menu"></i></a>
        </aside>