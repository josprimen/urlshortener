@extends('layouts.app')

@section('css')
    @include('urlshortener-css')
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
                        <p id="shortenedUrlExplanation" style="display:none;">Aquí está tu URL acortada:</p>
                        <div class="input-group mb-3" id="shortenedUrlDiv" style="display:none;">
                            <input type="text" class="form-control" id="shortenedUrlInput" readonly>
                            <button class="btn btn-secondary" type="button" id="copyBtn" onclick="copyToClipboard()">Copiar</button>
                        </div>
                        <div id="qrcode" style="display:none;" onclick="downloadQRCode()"></div> <!-- Contenedor del código QR -->
                        <p id="copyQRInstruction" class="copy-instruction" style="display:none;">Haz clic en el código QR para descargar la imagen.</p>
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
   @include('urlshortener-scripts')
@endsection
