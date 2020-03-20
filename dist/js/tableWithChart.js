


function createTable(a,b) {

  /*

  Punti di ingresso:

  - regioni-ultimo-giorno
  - provincie-regione-ultimo-giorno (necessita di id regione)

  */


  var comando = arguments[0];
  var idRegione = arguments[1];

  console.log(comando);
  console.log(idRegione);

  var string = 'createDataForChar.php?type='+ comando + '&Idregione=' + idRegione;

  console.log(string);

  
  // Grafico 1
  $.getJSON(string).done( function (results) {  

    var labels = [];

    var dates = results.map(function (item) {

      //2020-03-11


      var parts =item.data.split('-'); //2020-03-11

      // Please pay attention to the month (parts[1]); JavaScript counts months from 0:
      // January - 0, February - 1, etc.
      var mydate = new Date(parts[0], parts[1], parts[2]); 

        //var dataOut = new Date(item.data); 
        return mydate.getDate() + "/" +  mydate.getMonth()
        // return mydate.getMonth();



    });

    var labels = results.map(function (item) {

      //2020-03-11


      return item.denominazione_regione;

    });

    if(comando == "provincie-ultimo-giorno"){

    var labels = results.map(function (item) {

      //2020-03-11


      return item.denominazione_provincia;

    });


  }

  if(comando == "andamento-nazionale"){

    var labels = results.map(function (item) {

      //2020-03-11


      return item.data;

    });


  }

 


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

    var tamponi = results.map(function (item) {
    return item.tamponi;
    });


    var totale_casi = results.map(function (item) {
      return item.totale_casi;
      });
      

      
    


      var andamentoNazionale = {

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
            hidden: false,
            data                : tamponi,
            
          }
          
    
        ]
      }



      var andamentoProvincialeUltimoGiorno = {

        labels  : labels,
        datasets: [
        

          {
            label               : 'Totale casi',
        
    
            backgroundColor: '#ff0080',
            borderColor    : '#ff0080',
    
            data                : totale_casi,
            
          }
    
          
    
        ]
      }



  var andamentoRegionaleUltimoGiorno = {

    labels  : labels,
    datasets: [
      {
        label               : 'Ricoverati',
      

        backgroundColor: '#ff0000',
        borderColor    : '#ff0000',

        data                : ricoverati_con_sintomi,
       
      },

      
      {
        label               : 'Terapia intensiva',
        backgroundColor: '#ffbf00',
        borderColor    : '#ffbf00',

        data                : terapia_intensiva
      },

      {
        label               : 'Totale ospedalizzati',
      
        backgroundColor: '#bfff00',
        borderColor    : '#bfff00',
        data                : totale_ospedalizzati
      }, 
      {
        label               : 'In isolamento domiciliare',
      
        backgroundColor: '#FF7F50',
        borderColor    : '#FF7F50',
        data                : isolamento_domiciliare
      },
      {
        label               : 'Totale attualmente positivi',
    
        backgroundColor: '#40ff00',
        borderColor    : '#40ff00',
        data                : totale_attualmente_positivi
      },
      {
        label               : 'Dimessi guariti',
     

        backgroundColor: '#00bfff',
        borderColor    : '#00bfff',
        data                : dimessi_guariti
      },
      {
        label               : 'Deceduti',
        backgroundColor: '#007bff',
        borderColor    : '#007bff',
        data                : deceduti
      },
      {
        label               : 'Totale casi',
    

        backgroundColor: '#ff0080',
        borderColor    : '#ff0080',

        data                : totale_casi,
        
      }

      

    ]
  }


  var situazioneProvincialeOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: true,
      fontColor: '#A9A9A9'
    },
    title: {
      display: true,
      text: 'Grafico andamento complessivo della situazione provinciale'
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

  

  var situazioneRegionaleOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: true,
      fontColor: '#A9A9A9'
    },
    title: {
      display: true,
      text: 'Grafico andamento complessivo della situazione regionale'
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



  var situazioneNazionaleOptions = {
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
 

  if(comando == "provincie-ultimo-giorno"){

            // This will get the first returned node in the jQuery collection.
        var andamentoNazionaleChart = new Chart(decedutiChartCanvas, { 

          type: 'bar', 
          data: andamentoProvincialeUltimoGiorno, 
          options: situazioneProvincialeOptions

          
        })

  }

  if(comando == "regioni-ultimo-giorno"){

    // regionale
        // This will get the first returned node in the jQuery collection.
      var andamentoNazionaleChart = new Chart(decedutiChartCanvas, { 

      type: 'bar', 
      data: andamentoRegionaleUltimoGiorno, 
      options: situazioneRegionaleOptions

      
    })

  }



  if(comando == "andamento-nazionale"){

    // regionale
        // This will get the first returned node in the jQuery collection.
      var andamentoNazionaleChart = new Chart(decedutiChartCanvas, { 

      type: 'line', 
      data: andamentoNazionale, 
      options: situazioneNazionaleOptions

      
    })

  }



  })




}
