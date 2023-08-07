<?php
include_once '../db.php';
$sql = "SELECT * FROM `loaihangs`";
// Truy vấn
$stmt = $conn->query($sql);
// Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC); //array

// Trả về dữ liệu
$rows = $stmt->fetchAll();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // echo '<pre>';
    // print_r ($_REQUEST);
    // die();
    $TENHANG = $_REQUEST['TENHANG'];
    $MACONGTY = $_REQUEST['MACONGTY'];
    $MALOAIHANG = $_REQUEST['MALOAIHANG'];
    $SOLUONG = $_REQUEST['SOLUONG'];
    $DONVITINH = $_REQUEST['DONVITINH'];
    $GIAHANG = $_REQUEST['GIAHANG'];

    $sql = "INSERT INTO `mat_hangs`
    ( `TENHANG`, `MACONGTY`, `MALOAIHANG`,`SOLUONG`,`DONVITINH`, `GIAHANG`)
    VALUES
    ('$TENHANG','$MACONGTY','$MALOAIHANG','$SOLUONG','DONVITINH','$GIAHANG')";
    //Thuc hien truy van
    $conn->exec($sql);

    // chuyen huong ve trang danh sach
    header("Location: index.php");

}

?>
      <?php
include '../include/header.php';
include '../include/sidebar.php';

?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                    <h2>THÊM MẶT HÀNG</h2>

                    <form action="" method="POST" >
                      <label for="fname">Tên hàng</label><br>
                      <input type="text"  name="TENHANG"><br>
                      <label for="lname">Mã Công ty</label><br>
                      <input type="number"  name="MACONGTY" ><br><br>
                      <label for="lname">Mã loại hàng</label><br>
                        <select name="MALOAIHANG">
                          <?php foreach ($rows as $row): ?>
                            <option value="<?php echo $row['MALOAIHANG']; ?>"><?php echo $row['TENLOAIHANG']; ?></option>
                          <?php endforeach;?>
                        </select><br><br>
                      <label for="lname">Số lượng</label><br>
                      <input type="number"  name="SOLUONG"><br><br>
                      <label for="lname">Đơn vị tính</label><br>
                      <input type="text"  name="DONVITINH"><br><br>
                      <label for="lname">Gía hàng</label><br>
                      <input type="number"  name="GIAHANG"><br><br>

                      <input type="submit" value="Submit">
                    </form>






            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           <?php
include '../include/footer.php';
?>
            <!-- End of Footer -->

