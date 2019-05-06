<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Test highcharts pdf</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script type="text/javascript">
      function fillGraphic(id_container, title, subtitle, serie_name, serie_data) {
        var chart = Highcharts.chart(id_container, {
          title: {
            text: title
          },
          subtitle: {
            text: subtitle
          },
          yAxis: {
            title: {
              text: 'Number of Employees'
            }
          },
          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
          },
          plotOptions: {
            series: {
              animation: false,
              label: {
                connectorAllowed: false
              },
              pointStart: 2010
            }
          },
          series: [{
            name: serie_name,
            data: serie_data
          }],
          responsive: {
            rules: [{
              condition: {
                maxWidth: 500
              },
              chartOptions: {
                legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'bottom'
                }
              }
            }]
          },
          // responsive: {
          //   rules: [{
          //     condition: {
          //       maxWidth: 500
          //     },
          //     chartOptions: {
          //       legend: {
          //         enabled: false
          //       }
          //     }
          //   }]
          // },
          exporting: {
            enabled: false
          }
        });
      };
    </script>
    <style media="screen">
    .loading {
      animation: loading 1s ease infinite;
    }

    @keyframes loading {
      100% {
        transform: rotate(360deg);
      }
    }
    </style>
</head>
<body>
  <nav id="headerContent" class="navbar navbar-dark bg-dark">
    <div class="container">
      <a href="index.php" class="navbar-brand">Test highcharts pdf</a>
      <button id="btnModal" type="button" class="btn btn-primary col-offset-8 col-4"  data-toggle="modal" data-target="#exampleModal"
      disabled><i class="fas fa-spinner loading"></i></button>
    </div>
  </nav>
