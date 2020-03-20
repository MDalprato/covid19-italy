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



  var andamentoNazionaleChartData = {

    labels  : labels,
    datasets: [
    
      {
        label               : 'Nuovi positivi',
        fill                : false,
        borderWidth         : 1,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#20B2AA',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#20B2AA',
        pointBackgroundColor: '#20B2AA',
        data                : nuovi_attualmente_positivi,
       
      },
      {
        label               : 'Ricoverati',
        fill                : false,
        borderWidth         : 1,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#8A2BE2',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#8A2BE2',
        pointBackgroundColor: '#8A2BE2',
        data                : ricoverati_con_sintomi,
       
      },

      {
        label               : 'Terapia intensiva',
        fill                : false,
        borderWidth         : 1,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#A52A2A',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#A52A2A',
        pointBackgroundColor: '#A52A2A',
        data                : terapia_intensiva
      },

      {
        label               : 'Totale ospedalizzati',
        fill                : false,
        borderWidth         : 1,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#5F9EA0',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#5F9EA0',
        pointBackgroundColor: '#5F9EA0',
        data                : totale_ospedalizzati
      }, 
      {
        label               : 'In isolamento domiciliare',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#D2691E',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#D2691E',
        pointBackgroundColor: '#D2691E',
        data                : isolamento_domiciliare
      },
      {
        label               : 'Totale attualmente positivi',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#008B8B',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#008B8B',
        pointBackgroundColor: '#008B8B',
        data                : totale_attualmente_positivi
      },
      {
        label               : 'Dimessi guariti',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#008000',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#008000',
        pointBackgroundColor: '#008000',
        data                : dimessi_guariti
      },
      {
        label               : 'Deceduti',
        fill                : true,
        borderWidth         : 1,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#696969',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          :  '#696969',
        pointBackgroundColor:  '#696969',
        data                : deceduti
      },
      {
        label               : 'Totale casi',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#4B0082',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#4B0082',
        pointBackgroundColor: '#4B0082',
        data                : totale_casi,
        
      },{
        label               : 'Tamponi',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#8B4513',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#8B4513',
        pointBackgroundColor: '#8B4513',
        hidden: true,
        data                : tamponi,
        
      }
    ]
  }


  var decedutiChartData = {

    labels  : labels,
    datasets: [
       {
        label               : 'Deceduti',
        fill                : true,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#696969',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#696969',
        pointBackgroundColor: '#696969',
        data                : deceduti
      },   {
        label               : 'Terapia intensiva',
        fill                : false,
        borderWidth         : 1,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#A52A2A',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#A52A2A',
        pointBackgroundColor: '#A52A2A',
        data                : terapia_intensiva
      }
    ]
  }



  var isolamentoChartData = {

    labels  : labels,
    datasets: [
      {
        label               : 'Totale attualmente positivi',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#0000CD',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#0000CD',
        pointBackgroundColor: '#0000CD',
        data                : totale_attualmente_positivi
      }, {
        label               : 'Nuovi positivi',
        fill                : false,
        borderWidth         : 1,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#20B2AA',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#20B2AA',
        pointBackgroundColor: '#20B2AA',
        data                : nuovi_attualmente_positivi,
       
      },{
        label               : 'Tamponi',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#8B4513',
        pointRadius         : 2,
        pointHoverRadius    : 7,
        pointColor          : '#8B4513',
        pointBackgroundColor: '#8B4513',
        hidden: true,

        data                : tamponi,
        
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
      text: 'Grafico riferito alla situazione nazionale'
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




  var andamentoNazionaleDecedutiChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: true,
      fontColor: '#A9A9A9'
    },
    title: {
      display: true,
      text: 'Grafico dei deceduti/in terapia intensiva'
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




  var andamentoNazionaleIsolamentoChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: true,
      fontColor: '#A9A9A9'
    },
    title: {
      display: true,
      text: 'Grafico degli positivi/nuovi positvi/tamponi'
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



  var andamentoNazionaleChartCanvas = $('#line-chart-andamento-nazionale').get(0).getContext('2d');
 
  // This will get the first returned node in the jQuery collection.
  var andamentoNazionaleChart = new Chart(andamentoNazionaleChartCanvas, { 
      type: 'line', 
      data: andamentoNazionaleChartData, 
      options: andamentoNazionaleChartOptions
    }
  )


  

  var decedutiChartCanvas = $('#line-chart-deceduti').get(0).getContext('2d');
 
  // This will get the first returned node in the jQuery collection.
  var andamentoNazionaleChart = new Chart(decedutiChartCanvas, { 
      type: 'line', 
      data: decedutiChartData, 
      options: andamentoNazionaleDecedutiChartOptions
    }
  )



  var isolamentoChartCanvas = $('#line-chart-isolamento_domiciliare').get(0).getContext('2d');
 
  // This will get the first returned node in the jQuery collection.
  var andamentoNazionaleChart = new Chart(isolamentoChartCanvas, { 
      type: 'line', 
      data: isolamentoChartData, 
      options: andamentoNazionaleIsolamentoChartOptions
    }
  )



  $('#italy-map').vectorMap({
    map: 'world_mill',
    series: {
      regions: [{
        values: gdpData,
        scale: ['#C8EEFF', '#0071A4'],
        normalizeFunction: 'polynomial'
      }]
    },
    onRegionTipShow: function(e, el, code){
      el.html(el.html()+' (GDP - '+gdpData[code]+')');
    }
  });
});





$('#world-map').vectorMap();


})
