<?php

require_once "./config.php";
require_once "./openssl.php";

$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);

$private_secret_key = '1f4276388ad3214c873428dbef42243f' ; //some random hex characters


if ($result) {
    // Hàm `mysql_fetch_row()` sẽ chỉ fetch dữ liệu một record mỗi lần được gọi
    // do đó cần sử dụng vòng lặp While để lặp qua toàn bộ dữ liệu trên bảng
    while ($row=mysqli_fetch_row($result)) {
        printf ("UserName: %s, Password: %s, Email: %s<br>",
            decrypt($row[0]),
            $row[1],
            $row[2]
        );
    }

    // Máy tính sẽ lưu kết quả từ việc truy vấn dữ liệu bảng
    // Do đó chúng ta nên giải phóng bộ nhớ sau khi hoàn tất đọc dữ liệu
   
    mysqli_free_result($result);
}
