/*Click Search*/
//element
let toggSearch = document.querySelectorAll("form .togg-search"),
    search = document.querySelector("header form .inpts");

// Add Event

toggSearch.forEach(function (e) {
    e.addEventListener("click", function () {
        search.classList.toggle("show-s");
        if (search.classList.contains("show-s")) {
            toggSearch[0].style.display = "none";
        } else {
            toggSearch[0].style.display = "block";
        }
    });
});

/*Scroll support*/
//element
let ordersSection = document.querySelector(".orders"),
    scrllSupp = document.querySelector(".scrll-supp");
window.addEventListener("scroll", function () {
    if (this.window.scrollY >= ordersSection.offsetTop + 500) {
        scrllSupp.style.display = "block";
    } else {
        scrllSupp.style.display = "none";
    }
});
