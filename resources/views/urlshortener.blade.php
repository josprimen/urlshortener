@extends('layouts.app')

@section('css')
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #0d1b2a !important; /* Dark Blue for space theme */
            background-image: url('https://www.transparenttextures.com/patterns/stardust.png'); /* Background pattern */
            font-family: 'Fredoka', sans-serif !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            min-height: 100vh !important;
            margin: 0 !important;
        }
        .card {
            border: none !important;
            border-radius: 10px !important;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1) !important;
            position: relative;
            overflow: hidden;
            width: 100% !important; /* Ensure the card takes full width of the column */
        }
        .card-header {
            background-color: #3a506b !important; /* Medium Blue */
            color: #ffffff !important;
            border-bottom: none !important;
            font-weight: 500 !important;
            text-align: center !important;
            position: relative;
            z-index: 1;
        }
        .card-body {
            background-color: #1c2541 !important; /* Dark Blue */
            color: #ffffff !important;
            text-align: center !important;
            position: relative;
            z-index: 1;
        }
        .btn-primary {
            background-color: #5bc0be !important; /* Light Blue */
            border-color: #5bc0be !important;
            color: #ffffff !important;
        }
        .btn-secondary {
            background-color: #f26419 !important; /* Orange */
            border-color: #f26419 !important;
            color: #ffffff !important;
        }
        .input-group .form-control {
            border: 1px solid #e0e0e0 !important;
            border-radius: 5px !important;
            background-color: #0d1b2a !important;
            color: #ffffff !important;
        }
        #shortenedUrlInput {
            background-color: #1c2541 !important; /* Dark Blue */
            color: #ffffff !important;
        }
        .rocket {
            position: absolute;
            width: 150px;
            height: 150px;
            z-index: 3; /* In front of the background */
            opacity: 1;
        }
        .rocket1 {
            top: 20px;
            left: 20px;
        }
        .rocket2 {
            bottom: 20px;
            right: 20px;
        }
        /* Modal and spinning moon styles */
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }
        .spinner {
            margin: 100px auto;
            width: 100px;
            height: 100px;
            background: url({{asset('moon.png')}}) no-repeat center center; /* URL of the moon image */
            background-size: contain;
            animation: spin 2s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
@endsection

@section('content')
    <div class="rocket rocket1">
        <img src="{{ asset('rocketship.png') }}" alt="Rocket" width="150" height="150">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crea tu URL aquí</div>
                    <div class="card-body">
                        <p>Introduce la URL que deseas acortar:</p>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="urlInput" placeholder="Introduce la URL">
                            <button class="btn btn-primary" type="button" id="shortenBtn" onclick="showLoadingModal()">Acortar</button>
                        </div>
                        <p id="shortenedUrlExplanation" style="display:none;">Aquí estará tu URL acortada:</p>
                        <div class="input-group mb-3" id="shortenedUrlDiv" style="display:none;">
                            <input type="text" class="form-control" id="shortenedUrlInput" readonly>
                            <button class="btn btn-secondary" type="button" id="copyBtn" onclick="copyToClipboard()">Copiar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rocket rocket2">
        <img src="{{ asset('rocketship.png') }}" alt="Rocket" width="150" height="150">
    </div>

    <!-- Loading Modal -->
    <div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background: transparent; border: none;">
                <div class="spinner"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

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
    </script>
@endsection
