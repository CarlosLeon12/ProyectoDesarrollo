document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll(".background-image");
    let index = 0;

    function changeBackground() {
        images[index].classList.remove("active");
        index = (index + 1) % images.length;
        images[index].classList.add("active");
    }

    changeBackground();

    setInterval(changeBackground, 4000);
});
