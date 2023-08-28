let labels = [];
let data = [];
let done = [];
let notDone = [];


for(let i in arrayData){
  let array = arrayData[i];
  for (const key in array) {
    labels.push(array[key].name)
    data.push(array[key].count);
    done.push(array[key].done);
    notDone.push(array[key].notDone);
  }
}


let myChart = {
    // Tipo de Grafica
    type:"bar", 
    // Le pasamos la data
    data:{
      labels: labels,
      datasets:[{
        label: 'News',
        data,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
        ],
        borderWidth: 1
      }],
    },
    options:{
      responsive:true,
    }
}
// Seleccionamos el Canvas
var myGraficNovedades = document.getElementById('myGraficNovedades');
// Le pasamos el grafico y la data para representarlo
window.pie = new Chart(myGraficNovedades,myChart);

/*GRAFICA PARA LAS NOVEDADES RESULTAS*/ 

let myChartDone = {
    // Tipo de Grafica
    type:"bar", 
    // Le pasamos la data
    data:{
      labels: labels,
      datasets:[{
        label: 'Solved',
        data : done,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
        ],
        borderWidth: 1
      }],
    },
    options:{
      responsive:true,
    }
}
// Seleccionamos el Canvas
var myGraficDone = document.getElementById('myGraficDone');
// Le pasamos el grafico y la data para representarlo
window.pie = new Chart(myGraficDone,myChartDone);

let myChartNotDone = {
  // Tipo de Grafica
  type:"bar", 
  // Le pasamos la data
  data:{
    labels: labels,
    datasets:[{
      label: 'Pending',
      data : notDone,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
      ],
      borderColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
      ],
      borderWidth: 1
    }],
  },
  options:{
    responsive:true,
  }
}
// Seleccionamos el Canvas
var myGraficDone = document.getElementById('myGraficNotDone');
// Le pasamos el grafico y la data para representarlo
window.pie = new Chart(myGraficNotDone,myChartNotDone);