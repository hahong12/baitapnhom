
<?php
        include 'config.php';
         $sql = "SELECT * FROM sanpham";
         $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0) {
?>
         <table>
         <?php
         while($row =mysqli_fetch_assoc($result)){
             ?>
            <tr>   
                <td><center><?php echo $row["TenSP"]?></td>
                <td><center><?php echo $row["DonGia"]?></td>
                <td><center><img width="400" height="400" src="img/product/<?php echo $row["HinhAnh"]?> "></td>            
            </tr>        
         <?php
         }
         ?>  
         </table> <br>
         <a href="main.php">Về trang chủ</a>
         <?php
          }
         else {
        echo "0 results";
         }
        mysqli_close($conn);
       
?>
