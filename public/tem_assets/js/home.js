$(function () {
    $(document).on("click", ".share-btns", function () {
        $(".btns-icons-ff").toggleClass("auto-cc");
    });
});
/*Scroll support*/
//element
let section = document.querySelector("section"),
    scrllSupp = document.querySelector(".scrll-supp");
window.addEventListener("scroll", function () {
    if (this.window.scrollY >= section.offsetTop + 500) {
        scrllSupp.style.display = "block";
    } else {
        scrllSupp.style.display = "none";
    }
});
