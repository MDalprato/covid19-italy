$(function () {


  // Grafico 1
  $.getJSON('createDataForChar.php?type=regioni-ultimo-giorno').done( function (results) {  

    var labels = [];

    var labels = results.map(function (item) {
        return item.denominazione_regione;
    });

    var ricoverati_con_sintomi = results.map(function (item) {
      return item.ricoverati_con_sintomi;
    });

    var deceduti = results.map(function (item) {
      return item.deceduti;
    });

    var nuovi_attualmente_positivi = results.map(function (item) {
      return item.nuovi_attualmente_positivi;
    });


  


  var andamentoRegioneCompleto = {

    labels  : labels,
    datasets: [
      {
        label               : 'Ricoverati',
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false,
        backgroundColor     :  '#006400',
        borderColor         :  '#006400',
        pointRadius          : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    :  '#006400',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: '#006400',
        data                : ricoverati_con_sintomi
      },{
        label               : 'Deceduti',
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false,
        backgroundColor     : '#FF4500',
        borderColor         : '#FF4500',
        pointRadius         : false,
        pointColor          : '#FF4500',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: '#FF4500',
        data                : deceduti
      }


    ]
  }


  var andamentoChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: true,
      fontColor: '#A9A9A9'
    },
    scales: {
      xAxes: [{
        ticks : {
          fontColor: '#A9A9A9',
        },
        gridLines : {
          display : false,
          color: '#A9A9A9',
          drawBorder: false,
        }
      }],
      yAxes: [{
        ticks : {
          stepSize: 5000,
          fontColor: '#A9A9A9',
        },
        gridLines : {
          display : true,
          color: '#efefef',
          drawBorder: false,
        }
      }]
    }
  }

  

  var andamentoRegioneCompletoChart = $('#bar-chart-regione-completo').get(0).getContext('2d');
 
  // This will get the first returned node in the jQuery collection.
  var andamentoNazionaleChart = new Chart(andamentoRegioneCompletoChart, { 
      type: 'bar', 
      data: andamentoRegioneCompleto, 
      options: andamentoChartOptions
    }
  )


  })




})

