<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script>
    // Back to top button
    var backToTopButton = document.getElementById("top-button");
    var scrollDistance = 100; // Vzdálenost, po které se button zobrazí (v pixelech)

    window.addEventListener("scroll", function () {
        if (window.pageYOffset > scrollDistance) {
            backToTopButton.classList.add("show");
        } else {
            backToTopButton.classList.remove("show");
        }
    });

    backToTopButton.addEventListener("click", function (event) {
        event.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
</script>