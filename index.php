<!DOCTYPE html>
<html>
<head>
    <title>Passing Rates Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 80%; margin: auto;">
        <canvas id="lineChart"></canvas>
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
                        label: 'Passing Rates',
                        data: passingRates,
                        borderColor: 'blue',
                        backgroundColor: 'rgba(0, 0, 255, 0.2)',
                        borderWidth: 1
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
