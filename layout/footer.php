<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script>
        function loadPage(page) {
    fetch(page)
        .then(response => response.text())
        .then(data => {
            document.getElementById("main-content").innerHTML = data;
        })
        .catch(error => console.error("Error loading page:", error));
}

    </script>
</body>

</html>