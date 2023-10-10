<h1 class="text-center">CÔNG CỤ QUẢN TRỊ WEBSITE</h1>
<div class="container mt-5">
    <div class="row mb-5 d-flex gap-5">
        <div class="card col p-0">
            <div class="card-header">
                10 sản phẩm mới nhất
            </div>
            <table class="table">
                <tr>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Hình</th>
                    <th>Giá</th>
                    <th>Lượt xem</th>
                    <th>Danh mục</th>
                </tr>
                <?php
                $listspTop10new = list_sanpham_top10new();
                foreach ($listspTop10new as $sp) :
                ?>
                    <tr>
                        <td><?= $sp['id'] ?></td>
                        <td><?= $sp['name'] ?></td>
                        <td><?= $sp['price'] ?></td>
                        <td><img width="35px" height="35px" class="me-3 border border-dark rounded" src="../admin/image/<?= $sp['img'] ?>" alt=""></td>
                        <td><?= $sp['luotxem'] ?></td>
                        <td><?= danhmuc_name($sp['id_dm']) ?></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </table>
        </div>
        <div class="card col p-0">
            <div class="card-header">
                Top 10 sản phẩm xem nhiều nhất
            </div>
            <table class="table">
                <tr>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Hình</th>
                    <th>Giá</th>
                    <th>Lượt xem</th>
                    <th>Danh mục</th>
                </tr>
                <?php
                $listspTop10 = list_sanpham_top10();
                foreach ($listspTop10 as $sp) :
                ?>
                    <tr>
                        <td><?= $sp['id'] ?></td>
                        <td><?= $sp['name'] ?></td>
                        <td><img width="35px" height="35px" class="me-3 border border-dark rounded" src="../admin/image/<?= $sp['img'] ?>" alt=""></td>
                        <td><?= $sp['price'] ?></td>
                        <td><?= $sp['luotxem'] ?></td>
                        <td><?= danhmuc_name($sp['id_dm']) ?></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </table>
        </div>
    </div>
    <div class="row mb-5 d-flex gap-5">
        <div class="card col p-0">
            <div class="card-header">
                Top 10 bình luận mới nhất
            </div>
            <table class="table">
                <tr>
                    <th>Mã</th>
                    <th>Nội dung</th>
                    <th>Người bình luận</th>
                    <th>Sản phẩm</th>
                    <th>Ngày bình luận</th>
                </tr>
                <?php
                $listblTop10 = list_binhluan_top10();
                foreach ($listblTop10 as $bl) :
                ?>
                    <tr>
                        <td><?= $bl['id'] ?></td>
                        <td><?= $bl['noidung'] ?></td>
                        <td><?= taikhoan_name($bl['iduser']) ?></td>
                        <td><?= sanpham_name($bl['idpro']) ?></td>
                        <td><?= $bl['ngaybinhluan'] ?></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </table>
        </div>
        <div class="card col p-0">
            <div class="card-header">
                Top 10 đơn hàng mới nhất
            </div>
            <table class="table">
                <tr>
                    <th>Mã</th>
                    <th>Người đặt</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đặt</th>
                    <th>SĐT</th>
                    <th>Tổng tiền</th>
                </tr>
                <?php
                $listbill = list_bill();
                foreach ($listbill as $bill) :
                ?>
                    <tr>
                        <td><?= $bill['id'] ?></td>
                        <td><?= $bill['bill_name'] ?></td>
                        <td><?= $bill['bill_address'] ?></td>
                        <td><?= $bill['ngaydathang'] ?></td>
                        <td><?= $bill['bill_tel'] ?></td>
                        <td><?= $bill['total'] ?></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Biểu đồ thống kê sản phẩm theo danh mục
    </div>
    <div id="piechart" class="d-flex justify-content-center"></div>
    <?php
    $listtk = list_thongke();
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tên danh mục', 'Số lượng'],
                <?php
                foreach ($listtk as $tk) :
                    extract($tk);
                    echo "['$namedm', $sosp],";
                endforeach;
                ?>
            ]);

            var options = {
                'title': 'Biểu đồ thống kê sản phẩm theo danh mục',
                'width': 800,
                'height': 700
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</div>