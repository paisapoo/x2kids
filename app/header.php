
<head>
  <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title><?=!empty($meta_title)?$meta_title:$siteTitle?></title>
    <meta name="images" content=""> 
    <meta name="keywords" content="<?=$meta_keywords?>"> 
    <meta name="description" content="<?=$meta_descri?>"> 
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <!-- bootstrap -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

  <!-- google font  -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
  <!-- main.css -->
  <link rel="stylesheet" type="text/css" href="css/main.css?v=2.02">
  <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" type="text/css" href="<?php
if (file_exists(stream_resolve_include_path($alias . '.php'))) {echo 'css/' . $alias . '.css?v=2.02';}
?>">
  <meta property="og:url"           content="https://x2globalmedia.com<?=$_SERVER['REQUEST_URI']?>" />
  <meta property="og:type"          content="article" />
  <meta property="og:title"         content="<?=$news['title']?>" />
  <meta property="og:description"   content="<?=substr(preg_replace('/<(.*?)>/', '', $news['content']),0,200).'...'?>" />
  <meta property="og:image" content="<?=$news['full_img']?>" />
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
    $(window).load(function() {
    
      $(".se-pre-con").fadeOut("slow");
      $(".wrapper").css("display","block"); 
         
  });

</script>


</head>
