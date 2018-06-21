 $(document).ready(function() {
     var url = "http://localhost/deepak/sunil/";
     function as_buss(a) {
         var on_id = $(a).attr('data-bussid');
         var on_type = $(a).attr('data-type');
         if (on_type != 'watch') {
             $.post(url + "admin/inc/bus_action.php", {
                 ad_on_id: on_id,
                 ad_on_type: on_type
             }, function(e) {
                 console.log(e), "c" == e.a && "c" == e.b ? Materialize.toast('<span class="white-text">Please login and continue</span>', 5e3, "red") : "f" == e.a && "c" == e.b ? Materialize.toast('<span class="white-text">Something went wrong, Please try again.</span>', 5e3, "red") : "f" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">successfully Edited</span>', 5e3, "green"),
                     setTimeout(function() {
                         $.get(url + 'admin/bus_list/get_disp_data.php', {
                             bid: on_id
                         }, function(e) {
                             $('#card_' + on_id).html(e);
                             $(a).attr('data-tooltip', on_type);
                             $(a).tooltip();
                             $('.tooltipped').tooltip({
                                 delay: 50
                             });

                         })

                     }, 1e3))
             })
         } else {
             window.open(url + '../bus_profile/?bid=' + on_id, '_blank');
         }
     }

     function open_buss_profile(a) {
         var on_id = $(a).attr('data-bussid');
         window.open(url + 'bus_profile/?bid=' + on_id, '_blank');
     }

     $(".biginput").keypress(function() {
         var dataList = document.getElementById('json-datalist');
         $("#json-datalist").html('');
         var input = document.getElementById('autocomplete');
         var request = new XMLHttpRequest();
         request.onreadystatechange = function(response) {
             if (request.readyState === 4) {
                 if (request.status === 200) {
                     var jsonOptions = JSON.parse(request.responseText);
                     jsonOptions.forEach(function(item) {
                         var option = document.createElement('option');
                         option.value = item;
                         dataList.appendChild(option);
                     });
                     input.placeholder = "what are you looking for....";
                 } else {
                     input.placeholder = "Couldn't load datalist options :(";
                 }
             }
         };
         input.placeholder = "Loading options...";
         request.open('GET', url + 'inc/ajax/auto_data.php?ty=hs&sio=' + $(".biginput").val(), true);
         request.send();
     });

     $("#cou_drp").change(function() {
         $('#ste_drp').prop("disabled", false);
         $('select').material_select();
     });
     $("#ste_drp").change(function() {
         $('#cty_drp').prop("disabled", false);
         $('select').material_select();
     });

     $(".grid_butt").click(function() {
         $(".grid").toggleClass("hide");
         $(".list").toggleClass("hide");
     });
     $(".list_butt").click(function() {
         $(".grid").toggleClass("hide");
         $(".list").toggleClass("hide");
     });

     $(document).on("click", '.ad_bus_dec', function(event) {
         as_buss(this);
     });

     $(document).on("click", '.bus_card_pro', function(event) {
         open_buss_profile(this);
     });
     $("#subu").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         }), $("#signupformValidate").validate({
             rules: {
                 uname: {
                     required: !0,
                     minlength: 5
                 },
                 cemail: {
                     required: !0,
                     email: !0
                 },
                 password: {
                     required: !0,
                     minlength: 5
                 },
                 cpassword: {
                     required: !0,
                     minlength: 5,
                     equalTo: "#password"
                 }
             },
             messages: {
                 uname: {
                     required: "Enter a username",
                     minlength: "Enter at least 5 characters"
                 }
             },
             errorElement: "div",
             errorPlacement: function(e, a) {
                 var t = $(a).data("error");
                 t ? $(t).append(e) : e.insertAfter(a)
             },
             success: "valid",
             submitHandler: function() {
                 $("#subu_loader").removeClass('hide');
                 $("#subu").addClass('hide');
                 $.post(url + "inc/signup.php", $("#signupformValidate").serialize(), function(e) {
                     console.log(e), "c" == e.a && "f" == e.b ? Materialize.toast('<span class="black-text">Please check your password</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="white-text">Something went wrong, Please try again.</span>', 5e3, "red") : "c" == e.a && "d" == e.b ? Materialize.toast('<span class="white-text">emailid already registered</span>', 5e3, "red") : "e" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">signup succesful</span>', 5e3, "green"), setTimeout(function() {
                         window.location.href = url
                     }, 1e3))
                 });
             }
         })
     }), $("#sibu").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         }), $("#signinformValidate").validate({
             rules: {
                 sia: {
                     required: !0,
                     email: !0
                 },
                 sib: {
                     required: !0,
                     minlength: 5
                 }
             },
             messages: {
                 sia: {
                     required: "Enter your email"
                 }
             },
             errorElement: "div",
             errorPlacement: function(e, a) {
                 var t = $(a).data("error");
                 t ? $(t).append(e) : e.insertAfter(a)
             },
             success: "valid",
             submitHandler: function() {
                 $("#sibu_loader").removeClass('hide');
                 $("#sibu").addClass('hide');
                 $.post(url + "inc/signin.php", $("#signinformValidate").serialize(), function(e) {
                     console.log(e), "c" == e.a && "f" == e.b ? Materialize.toast('<span class="black-text">Please check your password</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="white-text">Something went wrong, Please try again.</span>', 5e3, "red") : "d" == e.a && "c" == e.b ? Materialize.toast('<span class="white-text">Please verify your email</span>', 5e3, "red") : "e" == e.a && "f" == e.b && (Materialize.toast('<span class="white-text">Login succesful</span>', 5e3, "green"), setTimeout(function() {
                         window.location.reload();
                     }, 1e3))
                 });
                 $("#sibu_loader").addClass('hide');
                 $("#sibu").removeClass('hide');
             }
         })
     });
     var t = window.location.hash.substr(1);
     "AjT29Vx6haLuUmAuuLYu" == t ? Materialize.toast('<span class="white-text">signup succesful</span>', 5e3, "green") : "AjT29ArtGHsd987LYu" == t ? Materialize.toast('<span class="white-text">succesfully added ownership</span>', 5e3, "green") : "AjT29Vx6haLuUmAuuLYu" == t ? Materialize.toast('<span class="white-text">signup succesful</span>', 5e3, "green") : "pzkv23oqhg" == t && Materialize.toast('<span class="white-text">Email already Registered.</span>', 5e3, "red"), $("#ownfb1").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#onf1").validate({
         rules: {
             owa: {
                 required: !0
             },
             owb: {
                 required: !0,
                 email: !0
             },
             owc: {
                 required: !0,
                 number: !0,
                 minlength: 10
             },
             owd: {
                 required: !0,
                 number: !0,
                 minlength: 10
             }
         },
         messages: {
             owa: {
                 required: "Please Enter the Ownership"
             },
             owb: {
                 required: "Please provide us Your Email"
             },
             owc: {
                 required: "Please enter your phone number"
             },
             owd: {
                 required: "Please enter your alternate Phone number"
             }
         },
         errorElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {
             $("#owntad").removeClass("disabled"), $("ul.tabs").tabs(), $("ul.tabs").tabs("select_tab", "ownad")
         }
     }), $("#ownfb2").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#onf2").validate({
         rules: {
             owg: {
                 required: !0
             },
             owh: {
                 required: !0
             },
             owi: {
                 required: !0
             },
             owj: {
                 required: !0
             },
             owk: {
                 required: !0
             },
             owl: {
                 required: !0
             }
         },
         messages: {
             owg: {
                 required: "Please enter the Street"
             },
             owh: {
                 required: "Please enter the locality"
             },
             owi: {
                 required: "Please enter the city near by you"
             },
             owj: {
                 required: "Please enter the state"
             },
             owk: {
                 required: "Please enter the country"
             },
             owl: {
                 required: "Please enter the pincode"
             }
         },
         errorElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {
             $("#ownfb2_loader").removeClass('hide');
             $("#ownfb2").addClass('hide');
             $.get(url + "inc/on.php?ty=emp", $("#onf1").serialize() + "&" + $("#onf2").serialize(), function(e) {
                 console.log(e);
                 $("#ownfb2_loader").addClass('hide');
                 $("#ownfb2").removeClass('hide');
                 "c" == e.a && "f" == e.b ? Materialize.toast('<span class="black-text">Something went wrong!..</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="black-text">Please login and Continue</span>', 5e3, "red") : "f" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">succesfully added </span>', 5e3, "green"), setTimeout(function() {
                     window.location.href = url + "employee/owner/view"
                 }, 1e3))
             })
         }
     });
     $("#ownfa").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#ownfa").validate({
         rules: {
             ownia: {
                 required: !0
             }
         },
         messages: {
             ownia: {
                 required: "Please enter the Ownership"
             }
         },
         errorElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {

                 $("#ownfa_loader").removeClass('hide');
                 $(".btn-flat").addClass('hide');
                 alert($("#ownfa").serialize());
             $.post(url + "inc/ce.php?G6Y=ownfa&?ty=emp", $("#ownfa").serialize(), function(e) {
                console.log(e);
                 "c" == e.a && "e" == e.b ? Materialize.toast('<span class="black-text">Something went wrong!..</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="black-text">Please login and Continue</span>', 5e3, "red") : "f" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">succesfully Edited </span>', 5e3, "green"), setTimeout(function() {
                     window.location.reload()
                 }, 1e3));
             });
             $("#ownfa_loader").addClass('hide');
                 $(".btn-flat").removeClass('hide');
         }
     });

     $("#ownfb").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#ownfb").validate({
         rules: {
             ownib: {
                 required: !0
             }
         },
         messages: {
             ownib: {
                 required: "Please enter the Email",
                 email: !0
             }
         },
         errorElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {
             $.post(url + "inc/ce.php?G6Y=ownfb", $("#ownfb").serialize(), function(e) {
                 $("#ownfb_loader").removeClass('hide');
                 $(".btn-flat").addClass('hide');
                 "c" == e.a && "e" == e.b ? Materialize.toast('<span class="black-text">Something went wrong!..</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="black-text">Please login and Continue</span>', 5e3, "red") : "f" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">succesfully Edited </span>', 5e3, "green"), setTimeout(function() {
                     window.location.reload()
                 }, 1e3));
             })
         }
     });

     $("#ownfc").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#ownfc").validate({
         rules: {
             ownic: {
                 required: !0
             }
         },
         messages: {
             ownic: {
                 required: "Please enter the Phone number"
             }
         },
         errorElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {
             $.post(url + "inc/ce.php?G6Y=ownfc", $("#ownfc").serialize(), function(e) {
                 $("#ownfc_loader").removeClass('hide');
                 $(".btn-flat").addClass('hide');
                 "c" == e.a && "e" == e.b ? Materialize.toast('<span class="black-text">Something went wrong!..</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="black-text">Please login and Continue</span>', 5e3, "red") : "f" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">succesfully Edited </span>', 5e3, "green"), setTimeout(function() {
                     window.location.reload()
                 }, 1e3));
             })
         }
     });
     $("#ownfd").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#ownfd").validate({
         rules: {
             ownid: {
                 required: !0
             }
         },
         messages: {
             ownid: {
                 required: "Please enter Alternate Number"
             }
         },
         errorElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {
             $.post(url + "inc/ce.php?G6Y=ownfd", $("#ownfd").serialize(), function(e) {
                 $("#ownfd_loader").removeClass('hide');
                 $(".btn-flat").addClass('hide');
                 "c" == e.a && "e" == e.b ? Materialize.toast('<span class="black-text">Something went wrong!..</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="black-text">Please login and Continue</span>', 5e3, "red") : "f" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">succesfully Edited </span>', 5e3, "green"), setTimeout(function() {
                     window.location.reload()
                 }, 1e3));
             })
         }
     });
     $("#ownfe").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#ownfe").validate({
         rules: {
             ownie: {
                 required: !0
             }
         },
         messages: {
             ownie: {
                 required: "Please enter Landline"
             }
         },
         errorElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {
             $.post(url + "inc/ce.php?G6Y=ownfe", $("#ownfe").serialize(), function(e) {
                 $("#ownfe_loader").removeClass('hide');
                 $(".btn-flat").addClass('hide');
                 "c" == e.a && "e" == e.b ? Materialize.toast('<span class="black-text">Something went wrong!..</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="black-text">Please login and Continue</span>', 5e3, "red") : "f" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">succesfully Edited </span>', 5e3, "green"), setTimeout(function() {
                     window.location.reload()
                 }, 1e3));
             })
         }
     });
     $("#ownff").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#ownff").validate({
         rules: {
             ownif: {
                 required: !0
             }
         },
         messages: {
             ownif: {
                 required: "Please enter Street"
             }
         },
         errorElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {
             $.post(url + "inc/ce.php?G6Y=ownff", $("#ownff").serialize(), function(e) {
                console.log(e);
                 $("#ownff_loader").removeClass('hide');
                 $(".btn-flat").addClass('hide');
                 "c" == e.a && "e" == e.b ? Materialize.toast('<span class="black-text">Something went wrong!..</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="black-text">Please login and Continue</span>', 5e3, "red") : "f" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">succesfully Edited </span>', 5e3, "green"), setTimeout(function() {
                     window.location.reload()
                 }, 1e3));
             })
         }
     });
     $("#ownfg").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#ownfg").validate({
         rules: {
             ownig: {
                 required: !0
             }
         },
         messages: {
             ownig: {
                 required: "Please enter locality"
             }
         },
         errorElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {
             $.post(url + "inc/ce.php?G6Y=ownfg", $("#ownfg").serialize(), function(e) {
                 $("#ownfg_loader").removeClass('hide');
                 $(".btn-flat").addClass('hide');
                 "c" == e.a && "e" == e.b ? Materialize.toast('<span class="black-text">Something went wrong!..</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="black-text">Please login and Continue</span>', 5e3, "red") : "f" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">succesfully Edited </span>', 5e3, "green"), setTimeout(function() {
                     window.location.reload()
                 }, 1e3));
             })
         }
     });
     $("#ownfh").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#ownfh").validate({
         rules: {
             ownih: {
                 required: !0
             }
         },
         messages: {
             ownih: {
                 required: "Please enter city"
             }
         },
         errorElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {
             $.post(url + "inc/ce.php?G6Y=ownfh", $("#ownfh").serialize(), function(e) {
                 console.log(e);
                 $("#ownfh_loader").removeClass('hide');
                 $(".btn-flat").addClass('hide');
                 "c" == e.a && "e" == e.b ? Materialize.toast('<span class="black-text">Something went wrong!..</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="black-text">Please login and Continue</span>', 5e3, "red") : "f" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">succesfully Edited </span>', 5e3, "green"), setTimeout(function() {
                     window.location.reload()
                 }, 1e3));
             })
         }
     });
     $("#ownfi").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#ownfi").validate({
         rules: {
             ownii: {
                 required: !0
             }
         },
         messages: {
             ownii: {
                 required: "Please enter state"
             }
         },
         errorElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {
             $.post(url + "inc/ce.php?G6Y=ownfi", $("#ownfi").serialize(), function(e) {
                 $("#ownfi_loader").removeClass('hide');
                 $(".btn-flat").addClass('hide');
                 "c" == e.a && "e" == e.b ? Materialize.toast('<span class="black-text">Something went wrong!..</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="black-text">Please login and Continue</span>', 5e3, "red") : "f" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">succesfully Edited </span>', 5e3, "green"), setTimeout(function() {
                     window.location.reload()
                 }, 1e3));
             })
         }
     });
     $("#ownfj").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#ownfj").validate({
         rules: {
             ownij: {
                 required: !0
             }
         },
         messages: {
             ownij: {
                 required: "Please enter country"
             }
         },
         errorElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {
             $.post(url + "inc/ce.php?G6Y=ownfj", $("#ownfj").serialize(), function(e) {
                 $("#ownfj_loader").removeClass('hide');
                 $(".btn-flat").addClass('hide');
                 "c" == e.a && "e" == e.b ? Materialize.toast('<span class="black-text">Something went wrong!..</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="black-text">Please login and Continue</span>', 5e3, "red") : "f" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">succesfully Edited </span>', 5e3, "green"), setTimeout(function() {
                     window.location.reload()
                 }, 1e3));
             })
         }
     });
     $("#ownfk").click(function() {
             $.validator.setDefaults({
                 errorClass: "invalid",
                 validClass: "valid",
                 errorPlacement: function(e, a) {
                     $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
                 },
                 submitHandler: function(e) {
                     console.log("form ok")
                 }
             })
         }), $("#ownfk").validate({
             rules: {
                 ownik: {
                     required: !0
                 }
             },
             messages: {
                 ownik: {
                     required: "Please enter pincode"
                 }
             },
             errorElement: "div",
             errorPlacement: function(e, a) {
                 var t = $(a).data("error");
                 t ? $(t).append(e) : e.insertAfter(a)
             },
             success: "valid",
             submitHandler: function() {
                 $.post(url + "inc/ce.php?G6Y=ownfk", $("#ownfk").serialize(), function(e) {
                     $("#ownfk_loader").removeClass('hide');
                     $(".btn-flat").addClass('hide');
                     "c" == e.a && "e" == e.b ? Materialize.toast('<span class="black-text">Something went wrong!..</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="black-text">Please login and Continue</span>', 5e3, "red") : "f" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">succesfully Edited </span>', 5e3, "green"), setTimeout(function() {
                         window.location.reload()
                     }, 1e3));
                 })
             }
         }),
         $("#bdfm").click(function() {
             $.validator.setDefaults({
                 errorClass: "invalid",
                 validClass: "valid",
                 errorPlacement: function(e, a) {
                     $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
                 },
                 submitHandler: function(e) {
                     console.log("form ok")
                 }
             })
         }), $("#busdetfm").validate({
             onsubmit: true,
             rules: {
                 bna: {
                     required: !0
                 },
                 byr: {
                     required: !0
                 }
             },
             messages: {

             },
             errorElement: "div",
             errorPlacement: function(e, a) {
                 var t = $(a).data("error");
                 t ? $(t).append(e) : e.insertAfter(a)
             },
             success: "valid",
             submitHandler: function() {
                 if ($("#bddd1").val() == null || $("#bddd2").val() == null || $("#bddd3").val() == null) {
                     if ($("#bddd1").val() == null) {
                         $(".bder1").html("This field is required");
                     }
                     if ($("#bddd4").val() == null) {
                         $(".bder4").html("This field is required");
                     }
                     if ($("#bddd5").val() == null) {
                         $(".bder5").html("This field is required");
                     }
                 } else {
                     $(".bder1").html("");
                     $(".bder4").html("");
                     $(".bder5").html("");
                     $("#tablibussloc").removeClass("disabled"), $("ul.tabs").tabs(), $("ul.tabs").tabs("select_tab", "bussloc");
                 }
             }
         }),
         $("#cdfm").click(function() {
             $.validator.setDefaults({
                 errorClass: "invalid",
                 validClass: "valid",
                 errorPlacement: function(e, a) {
                     $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
                 },
                 submitHandler: function(e) {
                     console.log("form ok")
                 }
             })
         }), $("#buscdfm").validate({
             onsubmit: true,
             rules: {
                 bst: {
                     required: !0
                 },
                 bly: {
                     required: !0
                 },
                 bst: {
                     required: !0
                 },
                 bcy: {
                     required: !0
                 },
                 bse: {
                     required: !0
                 },
                 bcny: {
                     required: !0
                 },
                 bel: {
                     required: !0,
                     email: !0
                 },
                 bpe: {
                     required: !0
                 },
                 bpm: {
                     required: !0
                 },
                 bam: {
                     required: !0
                 }
             },
             messages: {
                 bst: {
                     required: "Enter your street",
                 },
                 bly: {
                     required: " Enter your locality",
                 },
                 bcy: {
                     required: "Enter your city",
                 },
                 bse: {
                     required: "Enter your state",
                 },
                 bcny: {
                     required: "Enter your country",
                 },
                 bel: {
                     required: "Enter your Email",
                 },
                 bpe: {
                     required: "Enter your pincode",
                 },
                 bpm: {
                     required: "Enter your mobile number",
                 },
                 bam: {
                     required: "Enter your alternate number"
                 }
             },
             errorElement: "div",
             errorPlacement: function(e, a) {
                 var t = $(a).data("error");
                 t ? $(t).append(e) : e.insertAfter(a)
             },
             success: "valid",
             submitHandler: function() {
                 $("#tablibusstimpay").removeClass("disabled"), $("ul.tabs").tabs(), $("ul.tabs").tabs("select_tab", "busstimpay");
             }
         });
     $("#timfm").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#bustimfm").validate({
         onsubmit: true,
         errorElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {
             if ($("#monl").prop('checked') == false && $("#tuel").prop('checked') == false && $("#wedl").prop('checked') == false && $("#thrl").prop('checked') == false && $("#fril").prop('checked') == false && $("#satl").prop('checked') == false && $("#sunl").prop('checked') == false) {
                 Materialize.toast('<span class="white-text">invalid Timings</span>', 5e3, "red")
             } else {
                 $("#tablibussplansel").removeClass("disabled"), $("ul.tabs").tabs(), $("ul.tabs").tabs("select_tab", "bussplansel");
             }
         }
     });

     $("#plnfm").click(function() {
         $.validator.setDefaults({
             errorClass: "invalid",
             validClass: "valid",
             errorPlacement: function(e, a) {
                 $(a).closest("form").find("label[for='" + a.attr("id") + "']").attr("data-error", e.text())
             },
             submitHandler: function(e) {
                 console.log("form ok")
             }
         })
     }), $("#busplnfm").validate({
         onsubmit: true,
         orElement: "div",
         errorPlacement: function(e, a) {
             var t = $(a).data("error");
             t ? $(t).append(e) : e.insertAfter(a)
         },
         success: "valid",
         submitHandler: function() {
             if ($("#cash").prop('checked') == false && $("#dbcard").prop('checked') == false && $("#cdcard").prop('checked') == false && $("#nbank").prop('checked') == false && $("#ddraft").prop('checked') == false && $("#coth").prop('checked') == false) {
                 Materialize.toast('<span class="white-text">Select your payment mode</span>', 5e3, "red")
             } else {
                 var busdetdata = $("#busdetfm").serialize() + "&msub=" + $("#bddd3").val() + "&";
                 var buscddata = $("#buscdfm").serialize() + "&";
                 var bustimdata = "monval=" + $("#monl").prop('checked') + "&tueval=" + $("#tuel").prop('checked') + "&wedval=" + $("#wedl").prop('checked') + "&thrval=" + $("#thrl").prop('checked') + "&frival=" + $("#fril").prop('checked') + "&satval=" + $("#satl").prop('checked') + "&sunval=" + $("#sunl").prop('checked') + "&";
                 bustimdata = bustimdata + "monf=" + monfrom + "&mont=" + monto + "&tuef=" + tuefrom + "&tuet=" + tueto + "&wedf=" + wedfrom + "&wedt=" + wedto + "&thrf=" + thrfrom + "&thrt=" + thrto + "&frif=" + frifrom + "&frit=" + frito + "&satf=" + satfrom + "&satt=" + satto + "&sunf=" + sunfrom + "&sunt=" + sunto + "&";
                 var busplndata = "cash=" + $("#cash").prop('checked') + "&ddraft=" + $("#ddraft").prop('checked') + "&dbcard=" + $("#dbcard").prop('checked') + "&nbank=" + $("#nbank").prop('checked') + "&coth=" + $("#coth").prop('checked') + "&cdcard=" + $("#cdcard").prop('checked');
                 var busdata = busdetdata + buscddata + bustimdata + busplndata;
                 $.post(url + "bus_profile/inc/bus_a.php", busdata, function(e) {
                     console.log(e);
                     "c" == e.a && "e" == e.b ? Materialize.toast('<span class="black-text">Something went wrong!..</span>', 5e3, "red") : "c" == e.a && "c" == e.b ? Materialize.toast('<span class="black-text">something went wrong</span>', 5e3, "red") : "e" == e.a && "e" == e.b && (Materialize.toast('<span class="white-text">succesfully added </span>', 5e3, "green"), setTimeout(function() {
                         window.location.href = url + "bus_profile/?bid=" + $("#bid").val();
                     }, 1e3));
                 })
             }
         }
     });
     $("#sbtn").click(function() {
         window.location = url + "search/?io=" + $("#autocomplete").val();
     });

     $('#autocomplete').keyup(function(e) {
         if (e.keyCode == 13) {
             window.location = url + "search/?io=" + $("#autocomplete").val();
         }
     });

 });