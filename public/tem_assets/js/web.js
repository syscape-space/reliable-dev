// Click Sidebar
let listsSidebar = document.querySelectorAll(".sidebar ul li "),
    mainContent = document.querySelectorAll(".main-content ");

listsSidebar.forEach((e) =>
    e.addEventListener("click", function (evt) {
        evt.preventDefault();
        listsSidebar.forEach((e) => e.classList.remove("active"));
        this.classList.add("active");
        mainContent.forEach(function (c) {
            if (c.classList.contains(e.getAttribute("data-content"))) {
                mainContent.forEach((c) => (c.style.display = "none"));
                c.style.display = "block";
            }
        });
    })
);
