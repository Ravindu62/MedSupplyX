<!DOCTYPE html>
<html lang="en">
<head>
<title> Advetistment </title>
<meta charset="utf-8">
<link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>


<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>


<!-- content -->
  <div class="content">

 <div class="anim"> <h2> Advertistments </h2> </div>
 <div class="anim"> <p> Here are the newly Addvertistments </p> </div>
 
 <?php foreach($data['advertisement'] as $advertisement) : ?>
 <div class="myCard">
        <div class="innerCard">
            <div class="frontSide">
                <img src="<?php echo URLROOT ?>/public/img/<?php echo $advertisement->fileName; ?>" alt="">
                <p class="title">Get 100 Panadol cards for just rs.100/= </p>
                
            </div>
            <div class="backSide">
                <p class="title2">You can now available in my shop , if you want some panadol from my shop you can buy it by clicking here.</p>
                
            </div>
        </div>
    </div>
    <?php endforeach; ?>

</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>


</body>
</html>
