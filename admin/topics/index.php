<?php include('../../path.php'); ?>
<?php include(ROOT_PATH . "/app/controllers/topics.php");
adminOnly();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
     <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/faa1fe5a90.js" crossorigin="anonymous"></script>
    
    <!-- Custom Styling -->
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
    <title>Admin Section - Manage Topics</title>
</head>

<body>
    
    <?php include(ROOT_PATH . '/app/includes/adminHeader.php'); ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">
        
        <!-- Left Sidebar -->
        
        <?php include(ROOT_PATH . '/app/includes/adminSidebar.php'); ?> 
        
        <!-- //Left Sidebar -->
        
        <!-- Admin Content -->
        
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Add Topic</a>
                <a href="index.php" class="btn btn-big">Manage Topics</a>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Topics</h2>
                
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <table>
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($topics as $key => $topic ): ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $topic['name']; ?></td>
                                <td><a href = "edit.php?id=<?php echo $topic['id']; ?>" class="edit">Edit</td>
                                <td><a href = "index.php?del_id=<?php echo  $topic['id']; ?>" class="delete">Delete </td>
                            </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>

        <!-- //Admin Content -->


    </div>
    <!-- //Page Wrapper -->

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CKEditor 5 (For Blog Writing) -->
    <script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>

    <script src="../../assets/js/scripts.js"></script>
    <!-- <script src="../../js/scripts.js"></script> -->
</body>
</html>