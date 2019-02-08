export const planetChartData = {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'April', 'May', 'Jun', 'Jul', 'Aug', 'sept', 'oct', 'Nov', 'Dec'],
        datasets: [
            { // one line graph
                label: 'Student Paid',
                data: [0, 0, 1, 2, 67, 62, 27, 14],
                backgroundColor: [
                    'rgba(54,73,93,.5)', // Blue
                    'rgba(54,73,93,.5)',
                    'rgba(54,73,93,.5)',
                    'rgba(54,73,93,.5)',
                    'rgba(54,73,93,.5)',
                    'rgba(54,73,93,.5)',
                    'rgba(54,73,93,.5)',
                    'rgba(54,73,93,.5)'
                ],
                borderColor: [
                    '#36495d',
                    '#36495d',
                    '#36495d',
                    '#36495d',
                    '#36495d',
                    '#36495d',
                    '#36495d',
                    '#36495d',
                ],
                borderWidth: 3
            },
            { // another line graph
                label: 'Staff Salaries Paid',
                data: [4.8, 12.1, 12.7, 6.7, 139.8, 116.4, 50.7, 49.2],
                backgroundColor: [
                    'rgba(71, 183,132,.5)', // Green
                ],
                borderColor: [
                    '#47b784',
                ],
                borderWidth: 3
            }
        ]
    },
    options: {
        responsive: true,
        lineTension: 1,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    padding: 25,
                }
            }]
        }
    }
}
export const pieChartData = {
    type: 'pie',
    data: {
        labels: ["Analytic 1 ", "Analytic 2", "Analytic 3", "Analytic 4"],
        datasets: [
            {
                fill: true,
                backgroundColor: [
                    '#3490dc',
                    '#9561e2', '#f66D9b', '#38c172'],
                data: [5, 25, 40, 30],
                // Notice the borderColor 
                borderColor: ['#3490dc',
                    '#9561e2', '#f66D9b', '#38c172'],
                borderWidth: [2, 2]
            }
        ]
    },
    options: {
        responsive: true,
        lineTension: 1,
    }
}
export default { planetChartData, pieChartData }