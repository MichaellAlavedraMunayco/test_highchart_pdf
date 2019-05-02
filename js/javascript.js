Highcharts.getSVG = function (charts) {
  var svgArr = [],
    top = 0,
    width = 0;

  Highcharts.each(charts, function (chart) {
    var svg = chart.getSVG(),
      svgWidth = +svg.match(/^<svg[^>]*width\s*=\s*\"?(\d+)\"?[^>]*>/)[1],
      svgHeight = +svg.match(/^<svg[^>]*height\s*=\s*\"?(\d+)\"?[^>]*>/)[1];
    svg = svg.replace(
      '<svg',
      '<g transform="translate(' + width + ', 0 ) rotate(270 300 300)" '
    );
    svg = svg.replace('</svg>', '</g>');
    width += svgHeight;
    top = Math.max(top, svgWidth);
    svgArr.push(svg);
  });

  return '<svg height="' + top + '" width="' + width +
    '" version="1.1" xmlns="http://www.w3.org/2000/svg">' +
    svgArr.join('') + '</svg>';
};

Highcharts.exportCharts = function (charts, options) {
  chart1.update({
    chart: {
      borderColor: 'red',
      borderWidth: 2
    }
  });
  chart2.update({
    chart: {
      borderColor: 'red',
      borderWidth: 2
    }
  });
  // Merge the options
  options = Highcharts.merge(Highcharts.getOptions().exporting, options);

  // Post to export server
  Highcharts.post(options.url, {
    filename: options.filename || 'chart',
    type: options.type,
    width: options.width,
    svg: Highcharts.getSVG(charts)
  });

  chart1.update({
    chart: {
      borderWidth: 0
    }
  });
  chart2.update({
    chart: {
      borderWidth: 0
    }
  });
};

var chart1 = Highcharts.chart('container1', {

  chart: {
    height: 200
  },

  title: {
    text: 'First Chart'
  },

  credits: {
    enabled: false
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
      'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ]
  },

  series: [{
    data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0,
      135.6, 148.5, 216.4, 194.1, 95.6, 54.4
    ],
    showInLegend: false
  }],

  exporting: {
    enabled: false // hide button
  }

});

var chart2 = Highcharts.chart('container2', {

  chart: {
    type: 'column',
    height: 200
  },

  title: {
    text: 'Second Chart'
  },

  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
      'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ]
  },

  series: [{
    data: [176.0, 135.6, 148.5, 216.4, 194.1, 95.6,
      54.4, 29.9, 71.5, 106.4, 129.2, 144.0
    ],
    colorByPoint: true,
    showInLegend: false
  }],

  exporting: {
    enabled: true, // hide button
    chartOptions: {
      chart: {
        borderWidth: 2,
        borderColor: 'red'
      }
    }
  }

});

$('#export-png').click(function () {
  Highcharts.exportCharts([chart1, chart2]);
});

$('#export-pdf').click(function () {
  Highcharts.exportCharts([chart1, chart2], {
    type: 'application/pdf'
  });
});