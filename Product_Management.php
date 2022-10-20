 
 <!-- Bootstrap -->
    <?php
if (isset($_SESSION['us']) == false) {
    echo "<script>alert('You need to login')</script>";
    echo '<meta http-equiv="refresh" content="0;URL=?page=login"/>';
} else {
    if (isset($_SESSION["state"]) && $_SESSION["state"] != 1) {
        echo "<script>alert('You are not administrator')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
    } else {
?>
    <script>
        function deleteConfirm() {
            if (confirm("Are you sure to delete!")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <?php
    include_once("connection.php");
    if (isset($_GET["function"]) == "del") {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $result = pg_query($Connect,"SELECT Pro_image from product where Product_ID='$id'");
            $image = pg_fetch_array($result);
            pg_query($Connect, "DELETE from product where Product_ID='$id'");
        }
    }    
    ?>
    <form name="frm" method="post" action="">
        <h1>Product Management</h1>
        <p>
            <a href="?page=add_product">
            <img src="img/add.png" alt="Add" width="16" height="16" border="0"/> Add new</a>
        </p>
        <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Product ID</strong></th>
                    <th><strong>Product Name</strong></th>
                    <th><strong>Price</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Category ID</strong></th>
                    <th><strong>Image</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once("connection.php");
                $No = 1;
                $result = pg_query($Connect, "SELECT Product_ID, Product_Name, Price, Pro_qty, Pro_image, Cat_Name
                    FROM product a, category b
                    WHERE a.Cat_ID = b.Cat_ID
                    ORDER BY ProDate DESC");
                while ($row = pg_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $No; ?></td>
                        <td><?php echo $row["Product_ID"]; ?></td>
                        <td><?php echo $row["Product_Name"]; ?></td>
                        <td><?php echo $row["Price"]; ?></td>
                        <td><?php echo $row["Pro_qty"]; ?></td>
                        <td><?php echo $row["Cat_Name"]; ?></td>
                        <td align='center'>
                            <img src='imgProduct/<?php echo $row["Pro_image"] ?>' border='0' width="50" height="50" />
                        </td>
                        <td align='center'>
                            <a href="?page=update_product&&id=<?php echo $row['Product_ID']; ?>"> 
                                <img src="img/settings.png" width="16" height="16" border='0' />
                            </a>
                        </td>
                            <td align='center'>
                                <a href="?page=product_management&&function=del&&id=<?php echo $row["Product_ID"]; ?>" onclick="return deleteConfirm()">
                                    <img src="img/delete.png" border='0' width="16" height="16" /></a>
                            </td>
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