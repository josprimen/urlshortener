@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crea tu URL aquí</div>

                    <div class="card-body">
                        <p>Introduce la URL que deseas acortar:</p>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="urlInput" placeholder="Introduce la URL">
                            <button class="btn btn-outline-secondary" type="button" id="shortenBtn" onclick="acortarUrl()">Acortar</button>
                        </div>
                        <p id="shortenedUrlExplanation">Aquí estará tu URL acortada:</p>
                        <div class="input-group mb-3" id="shortenedUrlDiv">
                            <input type="text" class="form-control" id="shortenedUrlInput" readonly>
                            <button class="btn btn-outline-secondary" type="button" id="copyBtn" onclick="copyToClipboard()">Copiar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="module">

        $(document).ready(function() {
            console.log('funciona el jquery');
        });
    </script>

    <script>
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
                },
                error: function () {
                    alert("se ha producido un error")
                }
            });

        }

        function copyToClipboard() {
            var copyText = document.getElementById("shortenedUrlInput");
            copyText.select();
            document.execCommand("copy");
            alert("URL copiada al portapapeles: " + copyText.value);
        }
    </script>
@endsection
