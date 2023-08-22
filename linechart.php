<!DOCTYPE html>
<html>
<head>
    <title>Passing Rates Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style=" padding: 0px 0px 20px 0px; margin-left: 154px; border-radius: 5px; filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)); width:1010px;   background-color:#ffffff;">
        <h5 style="border-bottom: 1px solid #CCCCCC; border-radius: 5px 0px 0px 0px; padding: 10px 0px 10px 20px; background-color: #EEE; font: normal 600 14px/normal 'Poppins';">Passing Rates</h5>
        <canvas style="height: 50px;" id="lineChart"></canvas>
    </div>
    
    <script>
        async function fetchData() {
            const response = await fetch('get_data.php');
            const data = await response.json();
            return data;
        }

        async function createChart() {
            const data = await fetchData();
            
            const years = data.map(entry => entry.year);
            const passingRates = data.map(entry => entry.passing_rate);
            
            const ctx = document.getElementById('lineChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: years,
                    datasets: [{
                        label: 'Total Passing over the years',
                        data: passingRates,
                        borderColor: '#008A0E',
                        backgroundColor: '#008A0E',
                        borderWidth: 3
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        createChart();
    </script>
</body>
</html>
