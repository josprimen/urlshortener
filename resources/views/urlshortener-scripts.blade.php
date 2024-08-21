<!-- Cargar la librería qrcode.js desde una CDN -->
<script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

<script>
    $(document).ready(function() {
        console.log('funciona el jquery');
    });

    function showLoadingModal() {
        $('#loadingModal').modal('show');
        setTimeout(acortarUrl, 3000); // Wait for 3 seconds before calling the URL shortening function
    }

    function acortarUrl(){
        $.ajax({
            url: '{{ route('urlshortener.acortar-url') }}',
            data: {
                "url_original": $('#urlInput').val(),
                '_token': "{{ Session::token() }}"
            },
            type: 'post',
            success: function (data) {
                $('#shortenedUrlInput').val(data);
                $('#shortenedUrlExplanation').show();
                $('#shortenedUrlDiv').show();
                $('#loadingModal').modal('hide');

                // Mostrar y generar el QR
                $('#qrcode').show();
                $('#copyQRInstruction').show();
                generateQRCode(data);
            },
            error: function () {
                alert("Se ha producido un error");
                $('#loadingModal').modal('hide');
            }
        });
    }

    function copyToClipboard() {
        var copyText = document.getElementById("shortenedUrlInput");
        copyText.select();
        document.execCommand("copy");
        alert("URL copiada al portapapeles: " + copyText.value);
    }

    function generateQRCode(url) {
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: url,
            width: 160,
            height: 160,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    }

    function downloadQRCode() {
        var canvas = document.querySelector('#qrcode canvas');
        if (canvas) {
            // Crear un enlace temporal para descargar la imagen
            var link = document.createElement('a');
            link.href = canvas.toDataURL("image/png");
            link.download = 'qrcode.png';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        } else {
            alert("No se pudo descargar el QR.");
        }
    }
</script>