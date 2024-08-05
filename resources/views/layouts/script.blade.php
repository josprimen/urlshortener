<script>



    function toggleDarkMode(){
        // document.querySelector('body').classList.toggle('dark-mode');//Solo el body
        // Obtener la referencia del elemento HTML <html>
        var htmlElement = document.querySelector('html');

        // Alternar entre agregar y quitar el atributo data-bs-theme="dark"
        htmlElement.hasAttribute("data-bs-theme") ?
            htmlElement.removeAttribute("data-bs-theme") :
            htmlElement.setAttribute("data-bs-theme", "dark");
    }


</script>
<!-- jQuery (CDN) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS (CDN) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@yield('scripts')
