  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" charset="utf-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js"></script>
  <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" charset="utf-8"></script>
  <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js" charset="utf-8"></script>
  <script type="text/javascript">
    function printHtmlToPdf(html) {
      var opt = {
        margin: 0,
        filename: 'myfile.pdf',
        image: {
          type: 'jpeg',
          quality: 0.98
        },
        html2canvas: {
          scale: 2
        },
        jsPDF: {
          unit: 'in',
          format: 'letter',
          orientation: 'portrait'
        }
      };
      html2pdf().from(html).set(opt).outputPdf('dataurlstring')
      .then((pdf) => {
        $('#iframe').prop("src", pdf);
        $('#btnModal').prop("disabled", false);
        $('#btnModal').html("Exportar Tablas y Gráficos en formato PDF");
        $('#btnGuardar').prop("href", pdf);
      });
    }
    $(document).ready(function() {
      // var html = $('#block').html();
      var html = document.body.outerHTML;
      printHtmlToPdf(html);
    });
  </script>
</body>
</html>
