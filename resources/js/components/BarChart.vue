<template>
      <canvas></canvas>
</template>

<script>
import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);


console.log('here');
export default {
    props:['values' , 'labels'],
    mounted(){
        let data = {
            labels: this.labels,
            datasets: [{
            label: '# of Votes',
            data: this.values,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            fill: true
            }]
         };
         const options = {
                scales: {
                yAxes: [{
                    ticks: {
                    beginAtZero: true
                    }
                }]
                },
                legend: {
                display: false
                },
                elements: {
                point: {
                    radius: 0
                }
                }

         };
         const barChartCanvas = this.$el.getContext("2d");
         const barChart = new Chart(barChartCanvas, {
                                type: 'bar',
                                data: data,
                                options: options
                            });
    }
}
</script>

<style>

</style>