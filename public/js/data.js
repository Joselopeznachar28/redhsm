let labels = [];
let data = [];
let done = [];
let notDone = [];

let labelsAll = [];
let dataAll = [];


for(let i in arrayData){
  let array = arrayData[i];
  for (const key in array) {
    labels.push(array[key].name)
    data.push(array[key].count);
    done.push(array[key].done);
    notDone.push(array[key].notDone);
  }
}

for (let i in arrayDataAll) {
  labelsAll.push(arrayDataAll[i].name);
  dataAll.push(arrayDataAll[i].count);
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

let myChartDataGeneral = {
  // Tipo de Grafica
  type:"line", 
  // Le pasamos la data
  data:{
    labels: labelsAll,
    datasets:[{
      label: 'General Data',
      data : dataAll,
      borderColor: 'rgb(75, 192, 192)',
      tension: 1,
    }],
  },
  options:{
    responsive:true,
    animations: {
      tension: {
        duration: 1000,
        easing: 'linear',
        from: 1,
        to: 0,
        loop: true
      }
    },
    scales: {
      y: { // defining min and max so hiding the dataset does not change scale range
        min: 0,
      }
    }
  }
}
// Seleccionamos el Canvas
var myGraficData = document.getElementById('myGraficData');
// Le pasamos el grafico y la data para representarlo
window.pie = new Chart(myGraficData,myChartDataGeneral);