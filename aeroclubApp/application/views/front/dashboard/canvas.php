https://cdnjs.com/libraries/pdf.js
<script>
	// Fetch the PDF file URL using PHP (replace with your URL or file path)
	var pdfUrl = "<?php echo base_url(); ?>assets/menu/print_menu_2023.pdf";

	// Load the PDF using PDF.js
	pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
		pdf.getPage(2).then(function(page) {
			var scale = 0.6;
			var viewport = page.getViewport({ scale: scale });
			var canvas = document.createElement('canvas');
			var context = canvas.getContext('2d');
			canvas.height = viewport.height;
			canvas.width = viewport.width;

			var renderContext = {
				canvasContext: context,
				viewport: viewport
			};
			page.render(renderContext);
			document.getElementById('pdf-container').appendChild(canvas);
		});
	});
</script>
<script>
        // Fetch the PDF file URL using PHP (replace with your URL or file path)
        var pdfUrl = "<?php echo 'path/to/your/example.pdf'; ?>";

        // Load the PDF using PDF.js
        pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
            var numPages = pdf.numPages;
            var pdfContainer = document.getElementById('pdf-container');

            // Iterate through each page of the PDF
            for (var pageNumber = 1; pageNumber <= numPages; pageNumber++) {
                pdf.getPage(pageNumber).then(function(page) {
                    var scale = 1.5;
                    var viewport = page.getViewport({ scale: scale });
                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext);
                    pdfContainer.appendChild(canvas);
                });
            }
        });
    </script>