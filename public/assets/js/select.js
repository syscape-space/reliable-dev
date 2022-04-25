//Clicik Select All
//Element
let btnAllSlc = document.querySelector(" .sc .select-search .text  .icon"),
    boxesCheck = document.querySelectorAll(".boxes-offers .box-offer .check");
btnAllSlc.addEventListener("click", function () {
    btnAllSlc.classList.toggle("all-select");
    if (btnAllSlc.classList.contains("all-select")) {
        boxesCheck.forEach(function (e) {
            if (!e.checked) {
                e.click();
            }
        });
    } else {
        boxesCheck.forEach(function (e) {
            e.click();
        });
    }
});
