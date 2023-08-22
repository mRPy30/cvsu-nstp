<?php
$con = mysqli_connect("localhost","root","","nstp_db");
if(!$con){
    echo "Problem in database connection..." .mysqli_error();
}else{
    $sql = "SELECT * FROM tbl_course";
    $result = mysqli_query($con,$sql);
    $chart_data = "";
    while($row = mysqli_fetch_array($result)){
        $num_enrolees[] = $row['courseName'];
        $course[] = $row['enrollees'];
    }
  
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Coordinator</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="row">
    <div class="col-md-8" style="margin-left: 154px;">
      <div class="card" style="border-radius: 5px; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)); width:667px;">
      <div class="card-header bg" style="width:667px; height:40px;">
        <h5 style="font: normal 600 14px/normal 'Poppins';">Number of Enrollees</h5>
      </div>
          <div class="card-body">
          <canvas id="chartjs_bar" style="width: 10px; height: 5px;"></canvas>
          </div>
      </div>
    </div>
  </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
        
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
      var myChart = new Chart(ctx,{
          type: 'bar',
          data: {
            labels:<?php echo json_encode($num_enrolees); ?>,
            datasets: [{
                backgroundColor: [
                    '#5969ff',
                    '#6FBB76'
                ],
                label: 'Most Enrolled Training Program',
                data: <?php echo json_encode($course);?>
            }]
          },
          options:{
              legend: {
                  display:true,
                  position:'bottom',
                  labels: {
                      fontColor: '#000000',
                      fontFamily: 'poppins',
                      fontSize: 14,
                  }
              },
          }
      });
    </script>
</body>
</html>