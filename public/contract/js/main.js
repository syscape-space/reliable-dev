// Element
let createUl = document.querySelector(".create ul"),
    stageOne = document.querySelector(".stage-one"),
    sOneInputs = document.querySelectorAll(".stage-one input"),
    stageTwo = document.querySelector(".stage-two"),
    stageThree = document.querySelector(".stage-three"),
    inpModel = document.querySelectorAll(".model .box input"),
    inpLang = document.querySelectorAll(".lang .box input"),
    inpDate = document.querySelectorAll(".date .box input"),
    inpModelHidd = document.querySelector("#model"),
    inpLangHidd = document.querySelector("#lang"),
    clickZoom = document.querySelector(".stage-two .box .zoom"),
    boxTwo = document.querySelector(".stage-two .box-two "),
    inpDateHidd = document.querySelector("#date"),
    textArea = document.querySelector(
        ".stage-two .box-form .items-inp textarea"
    ),
    sTwoItems = document.querySelectorAll(".stage-two .box-form .items"),
    sTwoItemsClose = document.querySelectorAll(
        ".stage-two .box-form .items-inp  .close"
    ),
    sTwoItemsCloseASave = document.querySelectorAll(
        ".stage-two .box-form .items-inp  .close-and-save"
    ),
    sTwoItemsInp = document.querySelectorAll(".stage-two .box-form .items-inp"),
    btnSub = document.querySelector("form .submit"),
    btnBack = document.querySelector("form .back"),
    btnAddNew = document.querySelector(
        ".stage-two .box-form .items-inp .add-new"
    ),
    closeCard = document.querySelectorAll(".stage-two .box .card-box h6 .char"),
    btnNex = document.querySelector("form .next"),
    btnNextTwo = "";

//function Remove Closed Button
function closedButtn(inputs, btn) {
    let done = [];
    inputs.forEach(function (e) {
        if (e.checked) {
            done.push(true);
        }
    });
    if (done.length >= 3) {
        btn.classList.remove("closed");
    }
}
//Remove Closed Button
sOneInputs.forEach(function (e) {
    e.addEventListener("click", () => closedButtn(sOneInputs, btnSub));
});
//function Save Data stage one
function checkInput(inp, inpHidd) {
    let newInp = "";
    inp.forEach(function (e) {
        if (e.checked) {
            newInp = e;
        }
    });
    inpHidd.value = newInp.value;
}

//Click next stage one
btnNex.addEventListener("click", function (evt) {
    if (btnNex.classList.contains("next")) {
        evt.preventDefault();
    }
    // Save Data Input
    checkInput(inpModel, inpModelHidd);
    checkInput(inpLang, inpLangHidd);
    checkInput(inpDate, inpDateHidd);
    // Remove Satge One And Add Satage Two And construction line coloring And Closed btn
    stageOne.style.display = "none";
    stageTwo.style.display = "block";
    createUl.classList.add("active-50");
    btnSub.classList.remove("next");
    btnSub.classList.add("next-two");
    clickNextTwo();
});
// Clickc  back
btnBack.addEventListener("click", function () {
    window.location.reload();
});
//function Save Data stage Two
function checkInfo(inf, inpHidd) {
    inpHidd.value = inf.textContent;
}
function checkInp(inf, inpHidd) {
    inpHidd.value = inf.value;
}
//Click next stage two
function clickNextTwo() {
    btnNextTwo = document.querySelector("form .next-two");
    btnNextTwo.addEventListener("click", function (evt) {
        if (btnNextTwo.classList.contains("next-two")) {
            evt.preventDefault();
        }
        //Save Data
        let cName = document.querySelector(".customer-name"),
            cNameHidd = document.querySelector("#customer-name"),
            cMobile = document.querySelector(".customer-mobile"),
            cMobileHidd = document.querySelector("#customer-mobile"),
            cId = document.querySelector(".customer-id"),
            cIdHidd = document.querySelector("#customer-id"),
            cNumber = document.querySelector(".customer-number"),
            cNumberHidd = document.querySelector("#customer-number"),
            cSection = document.querySelector(".customer-section"),
            cSectionHidd = document.querySelector("#customer-section"),
            cAddress = document.querySelector(".customer-address"),
            cAddressHidd = document.querySelector("#customer-address");
        checkInfo(cName, cNameHidd);
        checkInfo(cMobile, cMobileHidd);
        checkInfo(cId, cIdHidd);
        checkInfo(cNumber, cNumberHidd);
        checkInfo(cSection, cSectionHidd);
        checkInfo(cAddress, cAddressHidd);
        let pName = document.querySelector(".presenter-name"),
            pNameHidd = document.querySelector("#presenter-name"),
            pRecord = document.querySelector(".presenter-record"),
            pRecordHidd = document.querySelector("#presenter-record"),
            pLicense = document.querySelector(".presenter-license"),
            pLicenseHidd = document.querySelector("#presenter-license"),
            pMobile = document.querySelector(".presenter-mobile"),
            pMobileHidd = document.querySelector("#presenter-mobile"),
            pId = document.querySelector(".presenter-id"),
            pIdHidd = document.querySelector("#presenter-id"),
            pNumber = document.querySelector(".presenter-number"),
            pNumberHidd = document.querySelector("#presenter-number"),
            pSection = document.querySelector(".presenter-section"),
            pSectionHidd = document.querySelector("#presenter-section"),
            pAddress = document.querySelector(".presenter-address"),
            pAddressHidd = document.querySelector("#presenter-address");
        checkInfo(pName, pNameHidd);
        checkInfo(pRecord, pRecordHidd);
        checkInfo(pLicense, pLicenseHidd);
        checkInfo(pMobile, pMobileHidd);
        checkInfo(pId, pIdHidd);
        checkInfo(pNumber, pNumberHidd);
        checkInfo(pSection, pSectionHidd);
        checkInfo(pAddress, pAddressHidd);
        let aName = document.querySelector(".arbitrator-name"),
            aNameHidd = document.querySelector("#arbitrator-name"),
            aMobile = document.querySelector(".arbitrator-mobile"),
            aMobileHidd = document.querySelector("#arbitrator-mobile"),
            aId = document.querySelector(".arbitrator-id"),
            aIdHidd = document.querySelector("#arbitrator-id"),
            aNumber = document.querySelector(".arbitrator-number"),
            aNumberHidd = document.querySelector("#arbitrator-number"),
            aSection = document.querySelector(".arbitrator-section"),
            aSectionHidd = document.querySelector("#arbitrator-section"),
            aAddress = document.querySelector(".arbitrator-address"),
            aAddressHidd = document.querySelector("#arbitrator-address");
        checkInfo(aName, aNameHidd);
        checkInfo(aMobile, aMobileHidd);
        checkInfo(aId, aIdHidd);
        checkInfo(aNumber, aNumberHidd);
        checkInfo(aSection, aSectionHidd);
        checkInfo(aAddress, aAddressHidd);
        let dC = document.querySelector("#duration"),
            dCHidd = document.querySelector("#duration-contract"),
            amount = document.querySelector("#salary"),
            amountHidd = document.querySelector("#amount");

        checkInp(dC, dCHidd);
        checkInp(amount, amountHidd);
        stageTwo.style.display = "none";
        stageThree.style.display = "block";
        btnSub.remove();
        document.querySelector(".new-submit").style.display = "inline-block";
        createUl.classList.add("active");
    });
}

//Cick Items stage two
sTwoItems.forEach((e) =>
    e.addEventListener("click", () =>
        sTwoItemsInp.forEach((inp) =>
            inp.getAttribute("data-name") == e.getAttribute("data-name-item")
                ? (inp.style.display = "block")
                : ""
        )
    )
);
sTwoItemsClose.forEach(function (cls) {
    cls.addEventListener("click", () =>
        sTwoItemsInp.forEach((inp) => (inp.style.display = "none"))
    );
});
sTwoItemsCloseASave.forEach(function (cls) {
    cls.addEventListener("click", () =>
        sTwoItemsInp.forEach((inp) => (inp.style.display = "none"))
    );
});

// Click zoom stage two
clickZoom.addEventListener("click", function () {
    boxTwo.classList.toggle("click-zoom");
});
// Click Close Card
closeCard.forEach(function (e) {
    let tog = false;
    e.addEventListener("click", function (evt) {
        if (tog == false) {
            tog = true;
        } else {
            tog = false;
        }
        if (tog == true) {
            evt.target.parentElement.parentElement.style.height = "77px";
            e.textContent = "+";
            e.style.fontSize = "25px";
        } else {
            if (
                evt.target.parentElement.parentElement.parentElement.classList.contains(
                    "box-two"
                )
            ) {
                evt.target.parentElement.parentElement.style.height = "100vh";
                e.textContent = "-";
                e.style.fontSize = "35px";
            } else {
                evt.target.parentElement.parentElement.style.height = "auto";
                e.textContent = "-";
                e.style.fontSize = "35px";
            }
        }
    });
});

// Date stage three
//Element
let elmDate = document.querySelectorAll(".stage-three .text .date");
//var Date
let now = new Date(),
    year = now.getFullYear(),
    month = now.getMonth() + 1,
    day = now.getDate();
elmDate.forEach((e) => (e.textContent = `${year}/${month}/${day}`));

//Edit value input stage three
let sThreeInp = document.querySelectorAll(".stage-three .text input");
sThreeInp.forEach((e) => (e.value = `approved in ${year}/${month}/${day}`));
