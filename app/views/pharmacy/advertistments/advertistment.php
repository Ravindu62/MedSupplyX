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
    <div class="anim">
        <h2>Advertisements</h2>
    </div>
    <div class="anim">
        <p>Here are the newly advertisements</p>
    </div>

    <div class="advertisements-grid">
        <?php foreach($data['advertisement'] as $advertisement) : ?>
        <div class="ad-container">
            <img src="<?php echo URLROOT ?>/public/img/<?php echo $advertisement->adImage ?>" alt="advertisement">
            <div class="ad-layer-container">
                <div class="ad-text-content">
                    <div>
                        <p class="ad-heading"><?php echo $advertisement->heading ?></p>
                        <p class="ad-description"><?php echo $advertisement->description ?></p>
                    </div>
                    <a href="#" class="ad-a"><button class="ad-btn">Contact Supplier</button></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>


</body>
</html>
