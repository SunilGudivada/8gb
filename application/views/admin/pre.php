<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="8GB">
    <meta name="keywords" content="Events" />
    <title>8GB</title>
    <meta name="msapplication-TileColor" content="#d50000">

    <link href="<?php echo base_url('assets/css/materialize.min.css');?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url('assets/css/style.min.css');?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url('assets/css/custom/custom.min.css');?>" type="text/css" rel="stylesheet" media="screen,projection">

    <link href="<?php echo base_url('assets/js/plugins/prism/prism.css');?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css');?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url('assets/js/plugins/dropify/css/dropify.min.css');?>" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url('assets/js/plugins/ion.rangeSlider/css/normalize.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/js/plugins/ion.rangeSlider/css/ion.rangeSlider.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/js/plugins/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css');?>" rel="stylesheet">
    
    <style type="text/css">
    .category:hover{
        border-color: white;
        border:3px white solid;
    }
    .card-gra{
     background: linear-gradient(to bottom right, #d50000, #042438);
  color: white;
    }
    input::placeholder{
        color:red;
    }
    textarea::placeholder{
        color:red;
    }
    </style>


    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.2.min.js');?>"></script>
    

    <script>
        $(document).ready(function(){
            $('.header-search-input').focus(function(){
                $('.mdi-action-search').addClass('white-text');
            });
        })
    </script>

</head>
