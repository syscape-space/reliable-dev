let inpFile = document.querySelectorAll(".inp-file input");
inpFile.forEach(function (e) {
    e.addEventListener("input", function () {
        this.parentElement.firstElementChild.textContent = this.files[0].name;
    });
});
