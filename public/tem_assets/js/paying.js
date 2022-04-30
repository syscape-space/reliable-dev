// function Save Data
// function saveDate(inp, inpHidd) {
//     inpHidd.value = inp.value;
// }
//
// function saveDateText(inp, inpHidd) {
//     inpHidd.value = inp;
// }
// Start Level One
//Click Submit
let subLevOne = document.querySelector(".level-one .sub"),
    errorLevOne = document.querySelector(".level-one .error"),
    inpConditions = document.querySelector(".level-one  .the-conditions input"),
    levelOne = document.querySelector(".level-one"),
    levelTwo = document.querySelector(".level-two"),
    inpConditionsHidd = document.querySelector("#conditions");

subLevOne.addEventListener("click", function (evt) {
    // evt.preventDefault();
    if (inpConditions.checked) {
        inpConditions.value = "done";
        // saveDate(inpConditions, inpConditionsHidd);
        levelOne.style.display = "none";
        levelTwo.style.display = "block";
    } else {
        errorLevOne.style.opacity = "1";
    }
});
// End Level One

// Start Level Two
//edit color list inputs
let listInp = document.querySelectorAll(".level-two .list-btn input");

listInp.forEach(function (e) {
    e.addEventListener("click", function () {
        if (e.checked) {
            listInp.forEach(
                (e) => (e.parentElement.style.color = "var(--color-text)")
            );
            e.parentElement.style.color = "var(--color-blue)";
        }
    });
});
// Pass single element
// const inpSelector = document.querySelector("#inp-selector");
// const choices = new Choices(inpSelector, {
//     position: "bottom",
//     searchEnabled: true,
//     searchChoices: true,

//     searchPlaceholderValue: "ابحث عن القسم الفرعي",
// });

//Click Submit
let subLevTwo = document.querySelector(".level-two .sub"),
    levelThree = document.querySelector(".level-three"),
    listInputs = document.querySelectorAll(".level-two  .list-btn input"),
    inpNumHidd = document.querySelector("#order-number"),
    iBackLevTwo = document.querySelector(".level-two .icon-back"),
    inpNum = document.querySelector(".level-two .order-number input"),
    inpServiceHidd = document.querySelector("#service"),
    inpTypeHidd = document.querySelector("#type");

subLevTwo.addEventListener("click", function (evt) {
    // evt.preventDefault();
    listInpNew = "";
    listInputs.forEach(function (e) {
        if (e.checked) {
            listInpNew = e.value;
        }
    });
    // saveDateText(listInpNew, inpServiceHidd);
    // saveDate(inpSelector, inpTypeHidd);
    // saveDate(inpNum, inpNumHidd);
    levelTwo.style.display = "none";
    levelThree.style.display = "block";

});
iBackLevTwo.addEventListener("click", function (evt) {
    // evt.preventDefault();

    levelTwo.style.display = "none";
    levelOne.style.display = "block";
});

// End Level Two

// Start Level Three
// Pass single element
const selectDuration = document.querySelector("#select-duration");
const choicesTwo = new Choices(selectDuration, {
    position: "bottom",
    searchEnabled: false,
    searchChoices: false,
});

//Click Submit And Back
let subLevThree = document.querySelector(".level-three .sub"),
    backLevThree = document.querySelector(".level-three .back"),
    iBackLevThree = document.querySelector(".level-three .icon-back"),
    levelFour = document.querySelector(".level-four"),
    requestAddress = document.querySelector(".level-three  .request-address"),
    requestAddressHidd = document.querySelector("#order-number"), //
    checkDuration = document.querySelector(".level-three #check-duration"),
    checkDurationHidd = document.querySelector("#value-check-duration"), //
    orderDetails = document.querySelector(".level-three .order-details"),
    orderDetailsHidd = document.querySelector("#order-details"), //
    inpFile = document.querySelector(".level-three .send-file input"),
    inpFileHidd = document.querySelector("#send-file"), //
    inpVoice = document.querySelector(".level-three .send-voice input"),
    inpVoiceHidd = document.querySelector("#send-voice"), //
    selectDurationHidd = document.querySelector("#duration"); ///

subLevThree.addEventListener("click", function (evt) {
    // evt.preventDefault();
    // saveDate(requestAddress, requestAddressHidd);
    // saveDate(orderDetails, orderDetailsHidd);
    // saveDate(selectDuration, selectDurationHidd);
    if (checkDuration.checked) {
        checkDuration.value = "done";
    }
    // saveDate(checkDuration, checkDurationHidd);
    // saveDate(inpFile, inpFileHidd);
    // saveDate(inpVoice, inpVoiceHidd);
    levelThree.style.display = "none";
    levelFour.style.display = "block";
});

backLevThree.addEventListener("click", function (evt) {
    levelThree.style.display = "none";
    levelTwo.style.display = "block";
});
iBackLevThree.addEventListener("click", function (evt) {
    // evt.preventDefault();

    levelThree.style.display = "none";
    levelTwo.style.display = "block";
});

// End Level Three

// Strat Level Four
// Pass single element
const selectCity = document.querySelector("#select-city");
const choicesThree = new Choices(selectCity, {
    position: "bottom",
    searchEnabled: false,
    searchChoices: false,
});

//Click Submit And Back
let subLevFour = document.querySelector(".level-four .sub"),
    backLevFour = document.querySelector(".level-four .back"),
    iBackLevFour = document.querySelector(".level-four .icon-back"),
    levelFive = document.querySelector(".level-five"),
    serviceProvider = document.querySelector(".level-four  .service-provider"),
    serviceProviderHiss = document.querySelector("#service-provider"), //
    selectCityHidd = document.querySelector("#city"); ///

subLevFour.addEventListener("click", function (evt) {
    // evt.preventDefault();
    // saveDate(selectCity, selectCityHidd);
    // saveDate(serviceProvider, serviceProviderHiss);
    levelFour.style.display = "none";
    levelFive.style.display = "block";
});

backLevFour.addEventListener("click", function (evt) {
    levelFour.style.display = "none";
    levelThree.style.display = "block";
});
iBackLevFour.addEventListener("click", function (evt) {
    // evt.preventDefault();

    levelFour.style.display = "none";
    levelThree.style.display = "block";
});

// End Level Four

// Start Level Five

//Click Back
let backLevFive = document.querySelector(".level-five .back"),
    iBackLevFive = document.querySelector(".level-five .icon-back");

backLevFive.addEventListener("click", function (evt) {
    levelFive.style.display = "none";
    levelFour.style.display = "block";
});
iBackLevFive.addEventListener("click", function (evt) {
    // evt.preventDefault();
    levelFive.style.display = "none";
    levelFour.style.display = "block";
});

// End Level Five
