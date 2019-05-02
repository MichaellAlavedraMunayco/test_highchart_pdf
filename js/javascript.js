$('#buttonExportPDF').on('click', () => {
  var doc = new jsPDF('p', 'pt', 'a4');
  var arrayBlockSize = $('#block').children().length;
  //Recorrer del contenedor de gráficas y tablas
  for (var i = 0; i < arrayBlockSize; i++) {
    // Agregar tabla al PDF
    var table = $('#table_' + (i + 1));
    doc.autoTable({
      html: table.get(0)
    });
    // Agregar gráfica al PDF
    var chartSvg = $('#chart_' + (i + 1)).children().get(0).innerHTML;
    // Conversion de Highchart svg a imagen
    var svg = chartSvg.replace(/\r?\n|\r/g, '').trim();
    var canvas = document.createElement('canvas');
    canvg(canvas, svg);
    var imgData = canvas.toDataURL('image/JPEG');
    // Definicion de variables de posicionamiento y dimensionamiento
    var canvasX = 40;
    var canvasY = table.innerHeight();
    var pdfWidth = doc.internal.pageSize.getWidth();
    var pdfHeight = doc.internal.pageSize.getHeight();
    var canvasWidth = pdfWidth - 80;
    var canvasHeight = canvas.height - canvas.height * .2;
    // Añadir imagen al PDF
    doc.addImage(imgData, 'JPEG', canvasX, canvasY, canvasWidth, canvasHeight);
    // Añadir nueva página
    if (i < (arrayBlockSize - 1)) {
      doc.addPage();
    }
  }
  doc.output('dataurlnewwindow', 'test.pdf');
});