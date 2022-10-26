<?php
if (isset($_SESSION['us']) == false) {
    echo "<script>alert('You need to login')</script>";
    echo '<meta http-equiv="refresh" content="0;URL=?page=login"/>';
} else {
    if (isset($_SESSION["admin"]) && $_SESSION["admin"] != 1) {
        echo "<script>alert('You are not administrator')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
    } else {
?>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script>
        function deleteConfirm()
        {
            if(confirm("Are you sure to delete"))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    </script>
    <?php
            include_once("connection.php");
                if(isset($_GET["function"])=="del")
                {
                    if(isset($_GET["id"]))
                    {
                        $id = $_GET["id"];
                        pg_query($Connect, "DELETE FROM category WHERE cat_id = '$id'");
                    }
                }
    ?>
    <form name="frm" method="post" action="">
        <h1>Product Category</h1>
        <p>
            <img src="img/add.png" alt="Add new" width="16" height="16" border="0" /> <a href="?page=add_category"> Add Category</a>
        </p>
        <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Category Name</strong></th>
                    <th><strong>Desscription</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $No = 1;
                $result = pg_query($Connect, "SELECT * FROM category");
                while ($row = pg_fetch_array($result)) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $No; ?></td>
                        <td><?php echo $row["cat_name"]; ?></td>
                        <td><?php echo $row["cat_des"]; ?></td>
                        <td style='text-align:center'>
                            <a href="?page=update_category&&id=<?php echo $row["cat_id"]; ?>">
                                <img src='img/settings.png' width="16" height="16" border='0'/>
                            </a>
                        </td>
                        <td style='text-align:center'>
                            <a href="?page=category_management&&function=del&&id=<?php echo $row["cat_id"]; ?>" onclick=" return deleteConfirm()">
                            <img src='img/delete.png' width="16" height="16" border="0" /></a></td>
                    </tr>
                <?php
                    $No++;
                }
                ?>
            </tbody>
        </table>
</form>
<?php
        }
    }
?>
