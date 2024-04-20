<!DOCTYPE html>
<html lang="en">
<head>
<title> Your Profile </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>


<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>

<div class="content">
<div class="anim">
<h2> Profile </h2>
</div>
<div class="anim"> 
    <div class="profilebox">
    <?php foreach($data['admin'] as $admin) : ?>
        <tr> 
        <td>  </td>
        <td> <?php echo $admin->name; ?> </td>
        <td> <?php echo $admin->address; ?> </td>
        <td> <?php echo $admin->phone; ?> </td>
        <td> <?php echo $admin->email; ?> </td>
        
        <div class="profilecard">
            <div class="card-body">
                <table>
                        <tr>
                        <div class="anim"> 
                            <td> <p  class="profdetails"> Administrator Name </p> </td> 
                            <td>:</td>
                            <td> <?php echo $data['admin']->name; ?> </td>           
                        </tr>
                      
                        <tr>
                            <td> <p  class="profdetails">  Administrator Address</p> </td>
                            <td>:</td>
                            <td> <?php echo $data['admin']->address; ?> </td>
                        </tr>
                        <tr>
                            <td> <p  class="profdetails"> Contact No </td>
                            <td>:</td>
                            <td> <?php echo $data['admin']->contact; ?> </td>
                            
                        </tr>
                        <tr>
                            <td> <p  class="profdetails">Email</td>
                            <td>:</td>
                            <td><?php echo $data['admin']->email; ?></td>
                            <td> <button class="addBtn"> Change </button> </td>
                        </tr>
                        <tr>
                            <td> <p  class="profdetails"> Password </td>
                            <td> : </td>
                            <td> *********</td>
                            <td> <button class="addBtn"> Change </button> </td>
                        </tr>
                       
                </table>
            </div>
        </div>
</div>

</div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

</body>
</html>

