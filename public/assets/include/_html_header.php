<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="format-detection" content="telephone=no">
<?php if ($image_index!==0): ?><meta name="googlebot" content="noimageindex"><?php endif; ?>
<?php if ($search_index!==0): ?><meta name="robots" content="noindex,nofollow"><?php endif; ?>
<title><?php echo $title; ?></title>
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<link href="<?php echo HTTP; ?>/assets/img/favicon.ico" rel="shortcut icon">
<link href="<?php echo HTTP; ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon" type="image/png">
<?php // Facebook Open Graph ?>
<meta property="fb:app_id" content="123456789">
<meta property="og:url" content="<?php echo CURRENT_URL; ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $title; ?>">
<meta property="og:image" content="<?php echo HTTP; ?>/assets/img/og.jpg">
<meta property="og:description" content="<?php echo $description; ?>">
<meta property="og:site_name" content="<?php echo SITE_NAME; ?>">
<meta property="og:locale" content="ja_JP">
<meta property="article:author" content="">
<?php // Twitter Cards ?>
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@site_account">
<meta name="twitter:creator" content="@individual_account">
<meta name="twitter:url" content="<?php echo CURRENT_URL; ?>">
<meta name="twitter:title" content="<?php echo $title; ?>">
<meta name="twitter:description" content="<?php echo $description; ?>">
<meta name="twitter:image" content="<?php echo HTTP; ?>/assets/img/og.jpg">
<?php // Fonts ?>
<link href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css" rel="stylesheet">
<?php if( !is_local() ): ?>
<link href="<?php echo HTTP; ?>/assets/css/app.min.css" rel="stylesheet" media="all">
<?php else: ?>
<link href="<?php echo HTTP; ?>/assets/css/app.css" rel="stylesheet" media="all">
<?php endif; ?>
</head>
