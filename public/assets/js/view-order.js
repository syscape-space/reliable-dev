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
// Click Btn Add Offer
//Element
let btnAddOffer = document.querySelector(".view-order .group-btn .btn-one"),
    btnNegotiation = document.querySelector(".view-order .group-btn .btn-two"),
    boxAddOffer = document.querySelector(".view-order .box-offer .add-offer"),
    boxNegotiation = document.querySelector(
        ".view-order .box-offer .negotiation"
    );

btnAddOffer.addEventListener("click", function (evt) {
    evt.preventDefault();
    boxNegotiation.style.transform = "translateX(100%) translateY(0) ";
    boxAddOffer.style.transform = "translateX(0)";
});

btnNegotiation.addEventListener("click", function (evt) {
    evt.preventDefault();
    boxAddOffer.style.transform = "translateX(100%)";
    boxNegotiation.style.transform = "translateX(0) translateY(-335px)";
});
