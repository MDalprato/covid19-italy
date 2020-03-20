$(function () {


  // Grafico 1
  $.getJSON('createDataForChar.php?type=andamento-nazionale').done( function (results) {  

    var labels = [];

    var labels = results.map(function (item) {

      //2020-03-11


      var parts =item.data.split('-'); //2020-03-11

      // Please pay attention to the month (parts[1]); JavaScript counts months from 0:
      // January - 0, February - 1, etc.
      var mydate = new Date(parts[0], parts[1], parts[2]); 

        //var dataOut = new Date(item.data); 
        return mydate.getDate() + "/" +  mydate.getMonth()
        // return mydate.getMonth();



    });

    var ricoverati_con_sintomi = results.map(function (item) {
        return item.ricoverati_con_sintomi;
    });

    var terapia_intensiva = results.map(function (item) {
      return item.terapia_intensiva;
    });

    var totale_ospedalizzati = results.map(function (item) {
    return item.totale_ospedalizzati;
    });

    var isolamento_domiciliare = results.map(function (item) {
    return item.isolamento_domiciliare;
    });

    var totale_attualmente_positivi = results.map(function (item) {
    return item.totale_attualmente_positivi;
    });

    var nuovi_attualmente_positivi = results.map(function (item) {
    return item.nuovi_attualmente_positivi;
    });

    var dimessi_guariti = results.map(function (item) {
    return item.dimessi_guariti;
    });

    var deceduti = results.map(function (item) {
    return item.deceduti;
    });

    var totale_casi = results.map(function (item) {
    return item.totale_casi;
    });

    var tamponi = results.map(function (item) {
    return item.tamponi;
    });



  var andamentoNazionaleCompleto = {

    labels  : labels,
    datasets: [
      {
        label               : 'Ricoverati',
        fill                : false,
        borderWidth         : 1,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#ff0000',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#ff0000',
        pointBackgroundColor: '#ff0000',
        data                : ricoverati_con_sintomi,
       
      },

      {
        label               : 'Terapia intensiva',
        fill                : false,
        borderWidth         : 1,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#ffbf00',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#ffbf00',
        pointBackgroundColor: '#ffbf00',
        data                : terapia_intensiva
      },

      {
        label               : 'Totale ospedalizzati',
        fill                : false,
        borderWidth         : 1,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#bfff00',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#bfff00',
        pointBackgroundColor: '#bfff00',
        data                : totale_ospedalizzati
      }, 
      {
        label               : 'In isolamento domiciliare',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#FF7F50',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#FF7F50',
        pointBackgroundColor: '#FF7F50',
        data                : isolamento_domiciliare
      },
      {
        label               : 'Totale attualmente positivi',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#40ff00',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#40ff00',
        pointBackgroundColor: '#40ff00',
        data                : totale_attualmente_positivi
      },
      {
        label               : 'Dimessi guariti',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#00bfff',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#00bfff',
        pointBackgroundColor: '#00bfff',
        data                : dimessi_guariti
      },
      {
        label               : 'Deceduti',
        fill                : true,
        borderWidth         : 1,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#4000ff',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#4000ff',
        pointBackgroundColor: '#4000ff',
        data                : deceduti
      },
      {
        label               : 'Totale casi',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#ff0080',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#ff0080',
        pointBackgroundColor: '#ff0080',
        data                : totale_casi,
        
      }

      

    ]
  }


  var andamentoNazionaleChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: true,
      fontColor: '#A9A9A9'
    },
    title: {
      display: true,
      text: 'Grafico andamento complessivo della situazione nazionale'
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

  

  var decedutiChartCanvas = $('#line-chart-andamento-nazionale-completo').get(0).getContext('2d');
 
  // This will get the first returned node in the jQuery collection.
  var andamentoNazionaleChart = new Chart(decedutiChartCanvas, { 
      type: 'line', 
      data: andamentoNazionaleCompleto, 
      options: andamentoNazionaleChartOptions
    }
  )


  })




})
