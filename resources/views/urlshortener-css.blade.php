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
    #qrcode {
        width: 160px;
        height: 160px;
        margin: 15px auto; /* Center the QR code */
        cursor: pointer; /* Indicate that the QR code is clickable */
    }
    .copy-instruction {
        color: #ffffff;
        margin-top: 10px;
    }
</style>
