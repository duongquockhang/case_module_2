<?php
include_once '../db.php';

$sql = "SELECT mat_hangs.*, loaihangs.TENLOAIHANG
        FROM mat_hangs 
        INNER JOIN loaihangs  ON mat_hangs.MALOAIHANG = loaihangs.MALOAIHANG";
// Truy vấn
$stmt = $conn->query($sql);
// Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 

// Trả về dữ liệu
$rows = $stmt->fetchAll(); //[]

// echo '<pre>';
// print_r($rows);
// die();
?>

  <?php
      include '../include/header.php';
      include '../include/sidebar.php';

      ?>

  

<h2>Liệt kê mặt hàng</h2>
<a href="http://localhost/Modules2/crud/mat_hang/create.php">THÊMMMMMMMMMMMMMMMMMMMM</a> 
<table>
  <tr>
    <th>STT</th>
    <th>Tên Hàng</th>
    <th>Mã Công Ty</th>
    <th>Tên loại hàng</th>
    <th>Số lượng</th>
    <th>Đơn vị tính</th>
    <th>Gía hàng</th>
    <th>Hành động</th>

  </tr>

  <?php
        foreach($rows as $r) :
            // echo '<pre>';
            // print_r($r['TENHANG']);
            // die();  
        ?>   
    <tr>
        <td><?php echo $r['MAHANG'];?> </td>
        <td><?php echo $r['TENHANG'];?> </td>
        <td><?php echo $r['MACONGTY'];?> </td>
        <td><?php echo $r['TENLOAIHANG'];?> </td>
        <td><?php echo $r['SOLUONG'];?> </td>
        <td><?php echo $r['DONVITINH'];?> </td>
        <td><?php echo $r['GIAHANG'];?> </td>
        <td>
            <a href="edit.php?id=<?php echo $r['MAHANG'];?>">Sua</a> |  
            <a onclick=" return confirm('Are you sure ?'); " href="delete.php?id=<?php echo $r['MAHANG'];?>">Xoa</a> 
        </td>
    </tr>

    <!-- Kết thúc vòng lặp -->
    <?php endforeach; ?>
  
</table>

<?php 
                 include '../include/footer.php';
           ?>

