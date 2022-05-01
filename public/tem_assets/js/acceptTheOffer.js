/*Click Search*/
//element
let toggSearch = document.querySelectorAll("form .togg-search"),
    search = document.querySelector("header form .inpts");

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

// Click Close Pop
//element
let closePop = document.querySelector(".pop .close"),
    pop = document.querySelector(".pop "),
    body = document.body;

closePop.addEventListener("click", function () {
    pop.style.display = "none";
    body.classList.remove("overflow-hidden");
});
