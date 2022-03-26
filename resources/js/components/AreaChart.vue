<template>
     <canvas></canvas>
</template>

<script>
export default {
props:['labels' , 'values'],

mounted(){

    var areaData = {
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
      fill: true, // 3: no fill
    }]
  };

  var areaOptions = {
    plugins: {
      filler: {
        propagate: true
      }
    }
  }

var areaCanvas = this.$el.getContext("2d");
var multiAreaChart = new Chart(areaCanvas, {
    type: 'line',
    data: areaData,
    options: areaOptions
});

}


}
</script>

<style>

</style>