<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvg/1.4/rgbcolor.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/canvg@2.0.0-beta.1/dist/browser/canvg.min.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script type="text/javascript">
  $('#buttonExportPDF').on('click', ()=> {
      var container = document.getElementById('container');
      // Recorrer el container
      var iterador = 0;
      while (container.children[iterador]) {
        var table = container.children[iterador].children[1].children[0];
        var divsvg = container.children[iterador].children[1].children[1];
        if(divsvg.children.length > 0){
          var svg = divsvg.children[0].innerHTML;
          if (svg)
            svg = svg.replace(/\r?\n|\r/g, '').trim();
            var canvas = document.createElement('canvas');
            canvg(canvas, svg);
            var imgData = canvas.toDataURL('image/png');
            // Generate PDF
            var doc = new jsPDF('p', 'pt', 'a4');
            doc.addImage(imgData, 'PNG', 40, 40, 500, 500);
        }
        console.log(table);
        iterador++
      }
      doc.save('test.pdf');
  });
// //Add event listener
// document.getElementById("getPdf").addEventListener("click", getPdf);
//
// function getPdf() {
//   //Get svg markup as string
//   var svg = document.getElementById('svg-container').innerHTML;
//
//   if (svg)
//     svg = svg.replace(/\r?\n|\r/g, '').trim();
//
//   var canvas = document.createElement('canvas');
//   var context = canvas.getContext('2d');
//
//
//   context.clearRect(0, 0, canvas.width, canvas.height);
//   canvg(canvas, svg);
//
//
//   var imgData = canvas.toDataURL('image/png');
//
//   // Generate PDF
//   var doc = new jsPDF('p', 'pt', 'a4');
//   doc.addImage(imgData, 'PNG', 40, 40, 75, 75);
//   doc.save('test.pdf');
//
// }
//
//   // $('#iframe').hide();
//   function exportPDF(){
//     $('#iframe').attr('src', 'exportPDF.php?html='+$('#container').html());
//     // $.ajax({
//     //   url: "exportPDF.php",
//     //   type: 'POST',
//     //   async: true,
//     //   data: 'html='+$('#container').html(),
//     //   error: (error) => {
//     //       alert(error);
//     //   },
//     //   success: (result) => {
//     //       // var binaryData = [];
//     //       // binaryData.push(result);
//     //       // var obj = window.URL.createObjectURL(new Blob(binaryData, { type: "application/pdf;base64" }));
//     //       // console.log(result);
//     //       // $('#previewpdf').attr('src', obj);
//     //       $('#previewpdf').show();
//     //   }
//     // });
//   }
</script>
</body>
</html>
