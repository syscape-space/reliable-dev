<style>
/*
* Bootstrap v5.x
*/


/* *** Global ***/

a,
a:hover {
    text-decoration: none;
}
 {
    text-align: "right";
    direction: rtl;
    font-family: "din-next";
    color: #363848;
}



@font-face {
    font-family: "ameria";
    src: url("../fonts/ArbFONTS-Almarai-Regular.ttf");
    font-weight: normal;
}

@font-face {
    font-family: "ameria";
    src: url("../fonts/ArbFONTS-Almarai-Bold.ttf");
    font-weight: bold;
}
@font-face {
    font-family: "din-next";
    src: url("../fonts/din-next-lt-w23-light-1.ttf");
    font-weight: 300;
  }
  .f-300 {
    font-weight: 300;
  }
  @font-face {
    font-family: "din-next";
    src: url("../fonts/din-next-lt-w23-regular.ttf");
    font-weight: normal;
  }
  @font-face {
    font-family: "din-next";
    src: url("../fonts/din-next-lt-w23-bold-1.ttf");
    font-weight: bold;
  }

/*======== scroll =======*/
::-webkit-scrollbar {
    width: 3px;
    height: 3px;
}

button:focus,
.btn:focus,
.btn:focus,
input:focus,
select:focus {
    outline: none !important;
    box-shadow: none !important;
}

.btn:hover,
.btn:hover,
select:hover {
    cursor: pointer;
}


/* ------------------------------------------------------------------------------------------------
-------------------------------------- header -----------------------------------------------------
------------------------------------------------------------------------------------------------ */

.navbar-expand-xl .navbar-nav .nav-link {
    color: #707070;
    font-size: 14px;
    margin: 5px;
}

.navbar-expand-xl .navbar-nav .active .nav-link,
.navbar-expand-xl .navbar-nav .nav-link:hover {
    color: #048e81;
}

.navbar-expand-xl .navbar-nav .btn-1 {
    background-color: #0995eb;
    color: #fff !important;
    border-radius: 6px;
    padding-right: 11px;
    padding-left: 11px;
    min-width: 80px;
    text-align: center;
    margin-left: 10px;
    font-size: 14px;
}

.navbar-expand-xl .navbar-nav .btn-2 {
    background-color: #048e81;
    color: #fff !important;
    border-radius: 6px;
    padding-right: 11px;
    padding-left: 11px;
    min-width: 80px;
    text-align: center;
    font-size: 14px;
}

.title {
    font-size: 40px;
}


/* ------------------------------------------------------------------------------------------------
------------------ End Header ----------------------------------------------------------------------
------------------------------------------------------------------------------------------------ */


/* ------------------------------------------------------------------------------------------------
------------------  [ Footer ] --------------------------------------------------------------------
------------------------------------------------------------------------------------------------ */

.bg-light-color {
    background-color: #1387a2;
}

.last-footer {
    background-color: #1387a2;
    color: #fff;
    padding: 8px 15px;
    display: flex;
    justify-content: space-between;
    margin-bottom: -2px;
}

.search-btn {
    border: 0;
    background-color: #0995eb;
    color: #fff;
    padding: 10px 20px;
    border-radius: 9px;
    min-width: 80%;
    transition: 0.2s all ease-in-out;
}

.search-btn:hover {
    background-color: #32a8f1;
}

.mwth-form {
    margin-top: -39px;
    box-shadow: 1px 1px 1px #e9e9e9;
    border-radius: 10px;
    position: relative;
    z-index: 2;
}

.number {
    display: inline-flex;
    max-width: 47px !important;
    height: 50px;
    background-color: #d8f0ff;
    font-size: 20px;
    align-items: center;
    justify-content: center;
    color: #0995eb;
    font-weight: bold;
    border-radius: 10px;
    text-align: center;
    width: 100%;
}

.add-order-gr {
    color: #048e81;
}

.d-sec {
    background-color: #e6fffd;
    padding: 18px;
    border-radius: 10px;
    max-width: 350px;
}

.online-icon {
    color: #30c736;
    font-size: 10px;
    position: absolute;
    z-index: 5;
    bottom: 0;
    left: 0;
    border: 3px solid #fff;
    border-radius: 100px;
    display: inline-block;
}

.orng-c {
    color: #ff8412;
}

.order-btn {
    color: #fff;
    border: 0;
    padding: 5px 10px;
    border-radius: 100px;
    font-size: 13px;
    color: #0995eb;
    border: 1px solid #0995eb;
    background-color: transparent;
}

.order-btn.active {
    color: #fff;
    background-color: #2ca2ee;
}

.user-ab:hover .order-btn {
    color: #fff;
    background-color: #2ca2ee;
}

.owl-theme .owl-dots {
    display: none;
}

.offer-btn {
    border: 1px #ddd;
    padding: 8px 34px;
    border-radius: 100px;
    font-size: 13px;
    margin-top: 10px;
    color: #0995eb;
    background-color: #f0eeff;
    transition: 0.2s all ease-in-out;
}

.jobs:hover .offer-btn {
    color: #fff;
    background-color: #0995eb;
}

@media (max-width: 575.98px) {

    .last-footer {
        display: block;
        text-align: center;
    }
    .last-footer div {
        margin-bottom: 10px;
    }
}

.sev-top {
    margin-top: -31px;
}

.our-sev {
    color: #404040;
    min-width: 130px;
    min-height: 34px;
    border: 1px solid #ddd;
    display: inline-flex;
    align-items: center;
    padding: 10px;
    border-radius: 7px;
    transition: 0.2s all ease-in-out;
    margin: 10px;
    margin-top: 20px;
    margin-bottom: 0;
}

.our-sev.active,
.our-sev:hover {
    background-color: #048e81 !important;
    color: #fff;
}

.our-sev:hover img,
.our-sev.active img {
    filter: invert(1);
}

.our-sev img {
    margin-left: 10px;
}

.gr-c {
    color: #048e81;
}

.bl-c {
    color: #0995eb;
}

.f-12 {
    font-size: 12px;
}

.accordion-button:not(.collapsed) {
    color: #20998d;
    background-color: #ffffff;
    border-bottom: 0;
}

.accordion-button::after {
    flex-shrink: 0;
    width: 1.25rem;
    height: 1.25rem;
    margin-right: auto;
    margin-left: 0;
    content: "";
    background-image: url("../images/up-aa.svg");
    background-repeat: no-repeat;
    background-size: 1.25rem;
    transition: transform 0.2s ease-in-out;
}

.accordion-button:not(.collapsed)::after {
    background-image: url("../images/up-aa.svg");
}

button:not(.collapsed)::after {
    background-image: url("../images/down-aa.svg");
    transform: rotate(180deg);
}

.accordion-item {
    margin-bottom: 20px;
    background-color: #fff;
}

.accordion-body,
.accordion-button {
    border-top: 0;
}

.accordion-item {
    border: 1px solid rgba(0, 0, 0, 0.125);
}

.user-ab {
    min-width: 250px;
    background-color: #fff;
    padding: 10px;
    border-radius: 8px;
}

.images-slider-ss:hover img {
    filter: grayscale(0);
}

footer {
    background-color: #17302d;
}

#slider3.owl-carousel .owl-nav button.owl-next,
#slider3.owl-carousel .owl-nav button.owl-prev {
    width: 26px;
    height: 26px;
    border: 1px solid #048e81;
    border-radius: 50%;
    background-color: transparent !important;
}

#slider.owl-carousel .owl-nav button.owl-next,
#slider.owl-carousel .owl-nav button.owl-prev {
    color: #048e81;
    font-size: 20px;
    background-color: transparent !important;
}

#slider .owl-nav button,
#slider3 .owl-nav button {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
}

select {
    color: #363848;
}

#slider .owl-nav button.owl-prev,
#slider3 .owl-nav button.owl-prev {
    right: 0;
    left: auto;
}

#slider .owl-nav button.owl-next,
#slider3 .owl-nav button.owl-next {
    right: auto;
    left: 0;
}

#slider .owl-stage-outer,
#slider3.owl-carousel .owl-stage-outer {
    max-width: 1180px;
    margin: auto;
}

.s_Ar {
    font-size: 14px;
    color: #048e81;
    display: inline-block;
}

.h1-it {
    position: absolute;
    right: 0;
    object-fit: cover;
    top: 0;
    max-width: 30%;
}

.h2-it {
    position: absolute;
    left: 0;
    object-fit: cover;
    top: 0;
    max-width: 30%;
}

.pos-rel,
.d-sec,
.user-ab,
.sev-top {
    z-index: 5;
    position: relative;
}


/* // Small devices (landscape phones, 576px and up) */

@media (min-width: 576px) and (max-width: 767.98px) {}

@media (max-width: 767.98px) {
    .search-section {
        border: 0 !important;
        border-bottom: 1px solid #ddd !important;
        margin-bottom: 10px;
        padding: 10px;
    }
    .d-sec {
        margin: auto;
    }
    .sev-top {
        margin-top: 0;
    }
    .our-sev {
        font-size: 13px;
    }
    .title {
        font-size: 27px;
    }
    header {
        min-height: 294px;
    }
}


/* // Medium devices (tablets, 768px and up) */

@media (min-width: 768px) and (max-width: 991.98px) {}


/* // Large devices (desktops, 992px and up) */

@media (min-width: 992px) and (max-width: 1199.98px) {}


/* // Extra large devices (large desktops, 1200px and up) */

@media (min-width: 1200px) {}

.col-md-4 {
    z-index: 2;
}


/* *** ********* AUTH * *** ** * * * * */

.login-page {
    background-image: url("../images/logoUpdate.png") !important;
    background-size: contain !important;
    background-repeat: no-repeat;
    max-height: 100vh !important;
    background-position: center center;
}
@media screen and (max-width:767px){
    .logoText{
        display: none !important;
    }
}

#pageLoginImage2 {
    background-image: url("../images/login.png") !important;
    background-size: cover;
    min-height: 100vh;
}

#pageLoginImage {
    background-image: url("../images/logoUpdate.png") !important;
    background-size: contain !important;
    background-repeat: no-repeat;
    max-height: 100vh !important;
    background-position: center;
}

.auth-login input {
    border-radius: 10px;
    background-color: #E9FFFD;
    border: 1px solid #048e8161;
    padding: 15px;
    font-size: 13px;
}

.img-lllo {
    top: 50%;
    transform: translateY(-50%);
}

.login-form {
    font-size: 14px;
}

.login-btn {
    border: 0;
    background-color: #048e81 !important;
    color: #fff;
    text-align: center;
    padding: 15px;
    border-radius: 8px;
    display: block;
    width: 100%;
    margin: 15px 0;
    transition: 0.2s all ease-in-out;
}

.login-btn:hover {
    background-color: #0fad9e !important;
}

.social-btn button {
    min-width: 45%;
    display: block;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    background-color: #048e81;
    color:white;
    font-size: 14px;
}

.social-btn img {
    margin-right: 8px;
}

.number-active>input {
    text-align: center;
    border-radius: 50%;
    background-color: #b1b1b1;
    width: 60px;
    height: 60px;
    padding: 15px;
    border: 0;
    color: #fff;
    font-weight: bold;
    font-size: 20px;
}

.number-active>input::placeholder {
    color: #fff;
}

.number-active>input.active {
    background-color: #b7f3ee;
    border: 1px solid #048e81;
    color: #2b7b74;
}

@media (max-width: 767.98px) {
    .number-active>input {
        width: 45px;
        height: 45px;
    }
    .login-page {
        min-height: 50vh;
    }
}

.dash {
    position: fixed;
    z-index: 1000;
    height: 100vh;
    overflow: auto;
    background-color: #048e81;
}
/* width */
.dash::-webkit-scrollbar {
    width: 0px !important;
  }


.head-dash {
    width: 230px;
    padding-bottom: 30px;
}

.head-dash .mawtheq-head {
    align-items: center;
}

.head-dash .mawtheq-head p {
    background-color: #fff;
    width: 100px;
    margin: auto;
    font-size: 14px !important;
    padding: 5px;
    border-radius: 3px;
    color: #57dda5;
}

.dash-list li {
    margin-top: 21px;
    opacity: 0.7;
    transition: 0.2s all ease-in-out;
    border-right: 3px solid transparent;
}

.dash-list>li.active,
.dash-list>li:hover {
    opacity: 1;
    /* border-right: 3px solid #fff; */
}

.dash-list li a {
    text-decoration: none;
    color: #fff;
    font-size: 13px;
    width: 100px;
    text-align: right;
    display: inline-block;
}

.dash-list li a img {
    margin-left: 16px;
}

.top-header,
.content-body,
.requsts-sec,
.call,
.personal-section,
.acount-balance,
.ticket-confirmed?? {
    padding: 15px;
    width: calc(100vw - 230px);
    margin-right: auto;
    padding-right: 20px;
}

.contain {
    background-color: #2b7b74;
    background-image: url(../images/back-balanc.svg);
    width: 100%;
    height: 141px;
    border-radius: 7px;
}

.contain-2 {
    background-image: url(../images/back-balanc-2.svg);
}

.contain-3 {
    background-image: url(../images/back-balanc-3.svg);
}

.img-open-requst {
    background-color: #0995eb;
    width: 30px;
    height: 30px;
    border-radius: 50%;
}

.line {
    /* max-width: 130px; */
    height: 6px;
    background-color: #eee;
}

.linear-line {
    /* max-width: 78px; */
    height: 6px;
    background-image: linear-gradient(to left, #0995eb, #048e81);
}

.percent-requst span {
    font-size: 13px;
}

.percent-requst {
    font-size: 13px;
}

.percent-requst>span {
    margin-bottom: 5px;
    display: inline-block;
}

.requsts {
    max-width: 200px;
}

.nooh-btn {
    border: 0;
    padding: 12px 10px;
    min-width: 200px;
    border-radius: 9px;
    background-image: linear-gradient(to left, #0995eb, #048e81);
    color: #fff;
    font-size: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.red-circle {
    display: inline-block;
    width: 10px;
    height: 10px;
    background-color: #ff584d;
    box-shadow: 1px 1px 7px #ff584d;
    border-radius: 50%;
    position: absolute;
    top: 0;
    right: -5px;
}

.personal .personal-info .input-personal {
    font-size: 12px;
    padding: 14px 24px;
    border: 0;
    background-color: #eee;
    border-radius: 5px;
}

.content-col {
    position: relative;
}

.content-col a {
    position: absolute;
    top: 40px;
    right: 5px;
}

.content-col a img {
    width: 14px;
}

.save-btn {
    background-color: #2b7b74;
    padding: 10px 20px;
    min-width: 150px;
    border: 0;
    font-size: 16px;
    color: #fff;
    border-radius: 6px;
}

.bl-btn {
    border: 0;
    background-color: #048e81;
    color: #fff;
    font-size: 14px;
    padding: 10px 40px;
    border-radius: 3px;
}

.btw-flex {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

.bl-money {
    background-color: #f5fbfe;
    border-radius: 10px;
}

.lf-bor {
    border-left: 3px solid;
    padding-left: 32px;
}

.inv-c {
    width: 50px;
    height: 41px;
    background-color: #048e81;
    padding: 10px;
    text-align: center;
    font-size: 14px;
    border-radius: 5px;
    display: inline-flex;
    justify-content: center;
    padding: 11px;
}

.btn-inn {
    background-color: #0a95eb;
    padding: 10px;
    font-size: 14px;
    border: 0;
    color: #fff;
    border-radius: 5px;
}

.btn-inn img {
    width: 18px;
    margin-left: 10px;
}

.uses-img {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    margin: auto;
}

.yellow {
    color: #e3ab00;
}

.btn-users {
    width: 100%;
    border-radius: 8px;
    border: 0;
    background-color: #048e81;
    color: #fff;
    padding: 8px;
}

.bg-users {
    background-image: linear-gradient(to bottom, #ff584d14, #802c2710);
    border-radius: 8px;
    background-color: #8f8f8f30;
    font-size: 14px;
}

.input-cc {
    height: 35px;
    margin-left: 5px;
}

.btn-cc {
    height: 35px;
    background-color: #0995eb;
    border: 0;
    color: #fff;
    width: 52px;
    border-radius: 4px;
}

.cir-prog {
    padding: 20px;
    border: 20px solid #aeaeae;
}

.cir-prog {
    padding: 20px;
    border: 9px solid #aeaeae;
    max-width: 100px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    margin: auto;
}

.o-num {
    color: #aeaeae;
    font-size: 27px;
}

.o-txt {
    font-size: 20px;
}

.o-txt-steps {
    font-size: 15px;
}

.g-color {
    color: #048e81;
}

.btn-offer {
    height: 35px;
    width: 90px;
    border: 0;
    padding: 8px;
    background-color: #d2d2d2;
    border-radius: 3px;
    font-size: 14px;
}

.o-box {
    background-color: #dffffc;
    padding: 7px;
    border-radius: 5px;
    display: inline-block;
    font-size: 12px;
    border: 1px solid #2b7b74;
}

.o-box2 {
    color: #0995eb;
    background-color: #e3f5ff;
    border: 1px solid #0995eb;
}

.f-14 {
    font-size: 14px;
}

.o_btn {
    border: 0;
    background-color: #048e81;
    color: #fff;
    font-size: 12px;
    padding: 0 40px;
}

.div-save {
    background-image: url("../images/o_ensure.svg");
    background-size: cover;
    background-repeat: no-repeat;
    border-radius: 8px;
}

.dash-list2 li>a {
    text-decoration: none;
    color: #fff;
    font-size: 13px;
    width: 129px;
    text-align: right;
    display: inline-block;
}

.profile {
    width: 200px;
}

.profile a {
    width: 190px;
    background-color: #f9faff;
    font-size: 14px;
    text-align: center;
    padding: 10px 5px;
    margin: 5px;
    border-radius: 6px;
}

.profile .logout {
    background-color: #ff584d;
    color: #fff;
}

.dropdown-menu.rri_o {
    right: 0 !important;
    left: auto !important;
    width: 350px;
    font-size: 14px;
}

.o_noti {
    background: #f9faff;
    padding: 10px;
    border-radius: 2px;
    font-size: 11px;
}

.o_input {
    background-color: #f3f3f3;
    border-color: #f3f3f3;
    font-size: 14px;
}

.o_input::placeholder {
    color: #363848;
}

.add-o-file {
    color: #048e81;
    width: 141px;
    background: #ecfffd;
    border: 1px solid #048e81;
    padding: 6px;
    border-radius: 3px;
    display: flex;
    align-items: center;
    justify-content: space-around;
}

.abs-file {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 38px;
    opacity: 0;
    cursor: pointer;
}

.header-top {
    padding: 15px;
}

.comments {
    background-color: #f2f2f269;
    padding: 50px;
    border-radius: 8px;
    margin: 25px 0;
}

.comments p {
    padding: 11px;
    background-color: #f1f1f159;
    max-width: 250px;
    border-radius: 8px 0 8px 8px;
    border: solid 1px #ddd;
    position: absolute;
    right: 18%;
    top: 36%;
    font-size: 12px;
}

.comments img {
    position: absolute;
    top: 10%;
}

.recive-report button {
    padding: 10px;
    width: 80px;
    color: #fff;
    font-size: 13px;
}

.recive-report button img {
    display: inline-block;
    margin-bottom: 5px;
}

.mohkam-btn {
    margin-top: 10px;
    width: 100%;
    padding: 13px;
    border-radius: 5px;
    border: 0;
    background-image: linear-gradient(to right, #048e81, #0995eb);
    color: #fff;
    font-size: 15px;
}

.count-ticket {
    border: solid 1px #048e81;
    border-radius: 7px;
    background-color: #f5fffe;
    padding: 7px 15px;
}

.your-tickets .your-ticket {
    margin: 1rem 0 !important;
}

.your-tickets .your-ticket span {
    font-size: 13px;
}

.requsts-sec .chat-clinet .chat-list {
    background-color: #FAFAFA;
    border-radius: 5px;
    padding: 15px;
    align-items: center;
}

.requsts-sec .chat-clinet ul li {
    font-size: 13px;
}

.item-chat li {
    background-color: #FAFAFA;
    font-size: 13px;
    padding: 2rem;
    text-align: left;
    margin: 1rem 0;
    border-radius: 7px;
}

.item-chat li div {
    justify-content: end;
    align-items: center;
}

.item-chat li>span {
    background-color: #fff;
    padding: 10px 15px 0px;
    border-radius: 2px 10px 10px 10px;
    margin-left: 2rem;
    display: inline-block;
}

.item-chat li.sec-list {
    text-align: right;
}

.item-chat li.sec-list div {
    justify-content: start;
}

.item-chat li.sec-list>span {
    background-color: #048e81;
    color: #fff;
    border-radius: 10px 2px 10px 10px;
    margin-right: 2rem;
    display: inline-block;
}

.green-circle {
    display: inline-block;
    width: 10px;
    height: 10px;
    background-color: #048E5A;
    box-shadow: 1px 1px 7px #048E5A;
    border-radius: 50%;
}

.badge-link {
    display: inline-flex;
    height: 54px;
    width: 54px;
    align-items: center;
    justify-content: center;
    background-color: #fff;
    border-radius: 5px;
}

.prof-mawthoq {
    font-size: 12px;
    background-color: #77c8f96e;
    text-align: center;
    height: 89px;
    width: 61px;
    color: #0995EB;
    font-weight: bold;
    padding: 5px;
    display: inline-flex;
    align-items: flex-end;
    padding-bottom: 9px;
    border-radius: 11px;
    margin: 5px;
}

.search-cc {
    background-color: #048e81;
    border-color: #048e81;
    color: #fff;
}

.search-cc::placeholder {
    color: #fff;
}

.page-link {
    color: #048e81;
}



  header > .container {
    background-image: url("../images/images/bg-header.svg");
  }


  .carousel-control-next-icon {
    background-image: url("../images/images/next-arro.svg") !important;
  }
  .carousel-control-prev-icon {
    background-image: url("../images/images/prev-arro.svg") !important;
  }

  body , * {
    text-align: right;
    direction: rtl;
    font-family: "din-next";
  }
  .sum-btn button {
    background-image: none;

  }
  .sum-btn button:hover {
    background-image: url("../images/links.svg");

  }
  header > .container,
  section > .container {
    background-image: url("../images/bg-header.svg");
  }

  .carousel-control-next-icon {
    background-image: url("../images/next-arro.svg");
  }
  .carousel-control-prev-icon {
    background-image: url("../images/prev-arro.svg");
  }

  @media (max-width: 575.98px) {
    .head-dash {
        width: 100%;
    }
    .dash {
        position: relative !important;
        width: 97%;
    margin: auto;
    }
    .top-header, .content-body, .requsts-sec, .call, .personal-section, .acount-balance, .ticket-confirmed?? {
        padding: 15px;
        width: 100% !important;
    }
}

</style>
