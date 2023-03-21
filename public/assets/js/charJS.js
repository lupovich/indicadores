/* globals Chart:false, feather:false */

var desde;
var hasta;

$('#reportForm').on('submit', function(e) 
    {
        e.preventDefault(); 
        desde = document.getElementById("desde").value;
        hasta = document.getElementById("hasta").value;
        
        //console.log(desde + ' | ' + hasta)

        reporte(desde, hasta);
    }
);

function reporte(desde, hasta){
  $.ajax({
    url: '././reporte/' + desde +'/'+ hasta,
    type: 'GET',
    dataType: 'json',
    headers: {'X-Requested-With': 'XMLHttpRequest'},
    success: function(data) 
    {
      //console.log(data);
      cargarGrafico(data);
    },
      error: function(xhr, status, error) {
          console.log(xhr.responseText);
      }
  });
}

function cargarGrafico(data) {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  const canvas = document.getElementById('indicadorChart')
  const ctx = canvas.getContext('2d')

  var labels = [];
  
  for (var i = 0; i < data.length; i++) {
    labels.push(data[i].codigoIndicador)
  }

  // eslint-disable-next-line no-unused-vars
  const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: "Valor Máximo",
        data: data.map(d => d.totalValorIndicador),
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 1,
        pointBackgroundColor: '#007bff'
      }]
    },
    options:{
      indexAxis:'y',
      scales:{
        x:{
            type:'linear',
            beginAtZero:true
        },
        y:{
          type:'category', 
        }
     },
       plugins:{
           legend:{
               display:true
           }
     }
  }
})
}
