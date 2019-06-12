<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$seo['title']?><?=title?></title>

    <meta name="Keywords" content="<?=$seo['keyword']?>">
    <meta name="description" content="<?=$seo['desc']?>">
    <meta name="author" content="<?=$seo['g_author']?>">
    <meta property="og:type" content= "website" />
    <meta property="og:url" content="<?=$seo['url']?>" />
    <meta property="og:site_name" content="<?=$seo['title']?>" />
    <meta property="og:image" itemprop="image primaryImageOfPage" content="images/logo.png" />
    <meta name="twitter:card" content="<?=$seo['url']?><?=$g_logo?>"/>
    <meta name="twitter:domain" content="<?=$seo['url']?>"/>
    <meta name="twitter:title" property="og:title" itemprop="name" content="<?=$seo['title']?>" />
    <meta name="twitter:description" property="og:description" itemprop="description" content="<?=$seo['desc']?>" />
    <?php
        if(!empty($g_css)){echo system_dosya_cagir($g_css, 'css');}
        if(!empty($g_js_head)){echo system_dosya_cagir($g_js_head, 'js');}
    ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>