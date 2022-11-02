
<?php
              include 'config.php';
         $sql = "SELECT * FROM sanpham";
         $result = mysqli_query($conn, $sql);
         if (mysqli_num_rows($result) > 0) {
?>
<!DOCTYPE html>
<html>
<h1>THÔNG TIN VỀ CÁC SẢN PHẨM ĐIỆN THOẠI </h1>
<body>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse:collapse;
}
    </style>
</body>
         <table>
         <?php
         while($row =mysqli_fetch_assoc($result)){
             ?>
            <tr>   
                <td>
                <?php
                    echo "MaLSP: "." ".$row["MaLSP"]."<br>";
                    echo "TenSP: "." ".$row["TenSP"]."<br>";
                    echo "Dongia: "." ".$row["DonGia"]."<br>";
                    echo "Soluong: "." ".$row["SoLuong"]."<br>";
                    echo "HinhAnh: "." ".$row["HinhAnh"]."<br>";
                    echo "HDH: "." ".$row["HDH"]."<br>";
                    echo "CamSau: "." ".$row["CamSau"]."<br>";
                    echo "CamTruoc: "." ".$row["CamTruoc"]."<br>";
                    echo "CPU: "." ".$row["CPU"]."<br>"."<br>"."<br>";
                ?></td>
                <td><center><img width="150" height="150" src="img/product/<?php echo $row["HinhAnh"];?>"></td>  
            </tr>      
         <?php
         }
         ?>  
         </table> <br>
         <a href="main2.php">Về trang chủ</a>
         <?php
          }
         else {
        echo "0 results";
         }
        mysqli_close($conn);
       
?>
</html>
