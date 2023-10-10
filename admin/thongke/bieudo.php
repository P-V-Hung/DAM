<h3 class="alert alert-success">BIỂU ĐỒ THỐNG KÊ</h3>
<div id="piechart" class="d-flex justify-content-center"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Tên danh mục', 'Số lượng'],
    <?php
        foreach($listtk as $tk):
            extract($tk);
            echo "['$namedm', $sosp],";
        endforeach;
    ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Biểu đồ thống kê sản phẩm theo danh mục', 'width':800, 'height':700};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>