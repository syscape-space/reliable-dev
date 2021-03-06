@extends('front.layout.index')
@push('page_styles')
<style>
    /* Start Global Rules */
    @font-face {
        font-family: "arabic";
        src: url("../fonts/din-next-lt-w23-regular.ttf");
    }

    :root {
        --green-color: #028e80;
        --green-color-two: #048e81;
        --dark-green-color: #2b7b74;
        --dark-green-three: #428e57;
        --light-green-color: #ecf8ff;
        --light-green-two: #e5f5ff;
        --yellow-color: #ffbe26;
        --grey-color: #808285;
        --dark-grey-color: #4e6978;
        --grey-color-srction: #f6f6f6;
        --green-new: #4ac272;
        --light-blue-color: #0491e8;
        --light-blue-two: #0cbb9d;
        --color-mix-grren: linear-gradient(
            0deg,
            rgb(4, 144, 214),
            rgb(4, 142, 140)
        );

        --h-color: #314450;
        --red-color: #ff584d;
        --red-color-two: #ff5757;
        --dark-red-color: #e53535;
        --color-red-mix: transparent
            linear-gradient(270deg, #df2929 0%, #ff6d6d 100%) 0% 0% no-repeat
            padding-box;
        --prog-color: #c5c5c5;
        --gold-color: #e3ab00;
        --color-info: #363848;
        --color-text: #0d1920;
        --main-transition: 300ms;
        --color-green-bg: #dffffc;
        --bg-blue: #cde5f3;
    }
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }
    body {
        font-family: "arabic";
    }
    ul {
        padding: 0;
        margin: 0;
        list-style: none;
    }
    a {
        text-decoration: none;
    }
    select {
        appearance: none;
    }
    input,
    select,
    textarea {
        border: 1px solid #73737d8f;
        outline: none;
        padding: 0 10px;
        border-radius: 10px;
    }
    input:focus,
    select:focus,
    textarea:focus {
        border: 1px solid var(--light-blue-color);
        color: var(--light-blue-color);
        position: relative;
    }
    .select .arrow {
        position: absolute;
        overflow: visible !important;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--light-blue-color);
    }
    .select {
        position: relative;
        color: #bbb;
    }
    .box-readonly {
        position: relative;
    }
    .box-readonly input {
        position: relative;
        color: var(--dark-red-color);
    }
    .box-readonly input:focus {
        color: var(--dark-red-color) !important;
        border: 1px solid #73737d8f !important;
    }
    .box-readonly input:focus {
        color: var(--dark-red-color) !important;
        border: 1px solid #73737d8f !important;
    }
    .a-inp {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;
        text-decoration: underline;
        color: var(--light-blue-color);
    }
    @media (max-width: 991.98px) {
        .a-inp {
            position: absolute;
            left: 10px;
            top: 100%;
            transform: translateY(0);
        }
    }

    textarea {
        min-height: 120px;
        width: 100%;
    }
    .inp-sub {
        background-color: var(--light-blue-color);
        color: white;
        font-size: 18px;
        min-height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        min-width: 200px;
    }
    .inp-file {
        position: relative;
    }
    input[type="file"]:focus {
        color: transparent !important;
    }
    input[type="file"] {
        color: transparent;
    }
    input[type="file"]::-webkit-file-upload-button {
        visibility: hidden;
    }
    input[type="file"]::before {
        content: "";
        display: inline-block;
        padding: 5px 8px;
        outline: none;
        width: 95%;
        height: 95%;
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        -webkit-user-select: none;
        background-color: white;
        align-items: center;
        color: #757575;
        padding: 0 5px;
        cursor: pointer;
        z-index: -1;
    }
    input[type="file"]::after {
        content: "";
        display: inline-block;
        padding: 5px 8px;
        outline: none;
        width: 95%;
        height: 95%;
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        -webkit-user-select: none;
        background-color: transparent;
        align-items: center;
        color: #757575;
        padding: 0 5px;
        cursor: pointer;
        z-index: 3;
    }
    .inp-file .one {
        display: inline-block;
        border-radius: 3px;
        padding: 5px 8px;
        outline: none;
        width: 90%;
        display: flex;
        height: 95%;
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        -webkit-user-select: none;
        text-shadow: 1px 1px #fff;
        background-color: white;
        align-items: center;
        color: #757575;
        padding: 0 5px;
        overflow: hidden;
        max-height: 50px;
        cursor: pointer;
    }

    .inp-file .two {
        font-family: "Font Awesome 6 Free";
        content: "\f0c6" !important;
        font-weight: 900;
        top: 50%;
        width: 10%;
        height: 95%;
        background: var(--color-mix-grren);
        width: 24px;
        height: 24px;
        border-radius: 50%;
        z-index: 2;

        position: absolute;
        display: flex;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        transform: translateY(-55%);
        left: 10px;
        color: white;
    }
    .inp-file .two svg {
        font-size: 14px;
    }
    input[type="file"]::selection::after {
        color: #0d1920;
    }
    /*End Global Rules */
    /* Start Components */
    .back h4 {
        font-weight: 600;

        margin-bottom: 0;
        color: var(--h-color);
    }
    .back .icon-back {
        background-color: #b8b8b8;
        width: 57px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50px;
    }
    .back .icon-back {
        color: black;
        font-size: 15px;
    }
    .table-resp {
        padding: 25px;
        background-color: var(--light-green-color);

        overflow: auto;
    }
    table {
        overflow: hidden;
        text-align: center;
        width: 100%;
        border-radius: 8px;
    }
    table th {
        color: var(--light-blue-color);
    }
    table th,
    table td {
        font-weight: 600;
        font-size: 18px;
        padding: 15px;
    }
    .support {
        box-shadow: 15px 15px 20px #0000001a;
        width: 178px;
        display: flex;
        justify-content: center;
        gap: 10px;
        padding: 14.5px 5px;
        align-items: center;
        margin: auto;
        background-color: white;
        font-size: 22px;
        color: var(--green-color-two);
        text-align: center;
        border-radius: 25px;
    }
    .support svg {
        color: var(--light-blue-color);
        font-size: 31px;
    }
    .scrll-supp {
        position: fixed;
        display: none;
        bottom: 20px;
        right: 20px;
    }
    .back div {
        padding: 0 !important;
    }
    .tol-tip {
        position: relative;
        width: 17px;
        height: 17px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: var(--color-mix-grren);
    }
    .tol-tip:hover .text {
        display: block;
        opacity: 1;
    }
    .tol-tip .text {
        position: absolute;
        right: -170px;
        transform: translateX(-50%);
        bottom: calc(100% + 10px);
        min-width: 250px;
        box-shadow: #777 0 0 2px 0;
        background-color: #f2faff;
        border-radius: 8px;
        font-size: 14px;
        padding: 20px 10px;
        display: none;

        z-index: 999;
        opacity: 0;
        transition: var(--main-transition);
    }
    .tol-tip .text::before {
        content: "";
        position: absolute;
        border-color: #f2faff transparent transparent transparent;
        border-width: 10px;
        border-style: solid;
        top: 100%;
        right: 47px;
    }
    .tol-tip .icon {
        color: white !important;
        font-size: 12px;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
            "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    }
    @media (max-width: 575.98px) {
        .tol-tip .text {
            right: -124px;
        }
        .tol-tip .text::before {
            content: "";
            position: absolute;
            border-color: #f2faff transparent transparent transparent;
            border-width: 10px;
            border-style: solid;
            top: 100%;
            right: 0px;
        }
    }

    /* End Components */
    /* Start Header */
    header {
        padding-top: 15px;
        padding-bottom: 15px;
        background-color: var(--grey-color-srction);
    }
    header .logo {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    header .logo img {
        width: 38.6px;
        height: 44.72px;
    }
    header .logo h6 {
        font-size: 18px;
        margin: 0;
        font-weight: bolder;
        color: var(--green-color);
    }
    header .logo p {
        font-size: 11px;

        margin: 0;
        color: var(--grey-color);
    }
    header .icon-notice {
        position: relative;
    }

    header .icon-notice svg {
        color: var(--dark-green-color);
        font-size: 20px;
    }
    header .icon-notice .notice {
        position: absolute;
        background-color: var(--red-color);
        width: 8px;
        height: 8px;
        right: 0;
        top: 0;
        border-radius: 50%;
        box-shadow: 0px 0px 6px var(--red-color);
    }
    header form {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    header .search {
        max-width: 352px;
    }
    header .search input[type="search"] {
        border: none;
        outline: none;

        border-radius: 7px;
        width: 100%;
        padding: 9px 30px;
    }
    header form ::placeholder {
        font-size: 18px;
        color: #404040;
        font-weight: 500;
    }
    .i-search {
        cursor: pointer;
    }
    .i-search svg {
        font-size: 17px;
        color: #404040;
    }
    header .search .i-search {
        position: absolute;
        right: 7px;
        top: 55%;
        transform: translateY(-50%);
    }
    header .search .i-search svg {
        font-size: 17px;
        color: #404040;
    }
    header .search .i-filter {
        position: absolute;

        left: 7px;
        top: 55%;

        transform: translateY(-50%);
    }
    header .search .i-filter svg {
        font-size: 17px;

        color: #0995eb;
    }

    header .icon-mssg {
        margin-bottom: -5px;
    }
    header .icon-mssg svg {
        color: #0995eb;
        font-size: 20px;
    }
    header .icon-mssg .mssg {
        position: absolute;
        background-color: var(--red-color);
        width: 8px;
        height: 8px;
        right: 0;
        top: 0;
        border-radius: 50%;
        box-shadow: 0px 0px 6px var(--red-color);
    }

    header form .inpts {
        display: flex;
        gap: 15px;
        align-items: center;
    }
    header.togg-s form .inpts {
        display: none;

        gap: 15px;
        align-items: center;
    }
    header form input#sub {
        background: var(--dark-green-color);
        border: none;
        outline: none;
        color: white;
        border-radius: 7px;

        padding: 9px 41.4px;
    }

    .show-s {
        display: flex !important;
    }
    header .drop-d {
        width: fit-content;
        margin-right: auto;
    }
    header .drop-d button {
        background-color: white !important;
        border: none !important;
        box-shadow: 5px 5px 15px #0000000f !important;
        border-radius: 7px !important;
        max-width: 353px !important;
        display: flex;
        align-items: center;
        gap: 50px;
        justify-content: space-between;
        margin-right: auto;
        font-size: 18px !important;
        text-align: right;
        padding: 5px 12px !important;
        outline: none !important;
        color: var(--green-color-two) !important;
    }
    header .drop-d button .photo {
        overflow: hidden;
        width: 33px;
        height: 33px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    header .drop-d button .photo img {
        width: 100%;
    }
    header .drop-d button::after {
        color: transparent !important;
        font-size: 0 !important;
    }
    header .drop-d button::before {
        font-family: "Font Awesome 6 Free";
        content: "\f107" !important;
        font-weight: 900;
        color: #3b3b3b !important;
        font-size: 20px !important;
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
    }
    header .drop-d ul {
        width: 100% !important;
        inset: unset !important;
        transform: unset !important;
        top: 95% !important;
        max-width: 353px !important;
        box-shadow: 12px 12px 15px #0000000f !important;
        border-radius: 0px 0px 7px 7px !important;
        left: 0 !important;
        position: absolute !important;
        border: none !important;
    }
    header .drop-d ul a {
        text-align: center;
        margin: 15px 0;
        padding: 10px !important;
        font-size: 18px;
        color: #333333;
    }
    header .new-order {
        width: 120px;
        height: 43px;
        border: 0.5px solid var(--light-blue-color);
        border-radius: 7px;
        color: var(--light-blue-color);
        display: flex;
        gap: 3px;
        align-items: center;
        justify-content: center;
        background-color: var(--light-green-two);
    }

    header .new-order:hover {
        color: var(--light-blue-color);
    }
    /* End Header */
    /* Start Section Home */

    @media (min-width: 1200px) {
        .r-bar {
            margin-top: -3.7rem;
        }
    }
    .parent-boxes .box {
        background-color: var(--light-green-color);
        text-align: center;
        padding: 20px 15px;
        border-radius: 8px;
    }
    .box-info .photo {
        overflow: hidden;
        width: 102px;
        height: 102px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;

        background-color: white;
        justify-content: center;
    }
    .box-info .photo img {
        width: 100%;
    }
    .box-info h4 {
        font-size: 22px;
        color: var(--light-blue-color);
        font-weight: normal;
        margin: 15px auto;
    }
    .box-info p {
        font-size: 16px;
        font-weight: 700;
        margin: 25px auto 19px;
    }
    .box-info > img {
        color: var(--green-color);
        width: 28.2px;
    }
    .parent-boxes .box-welcome h6 {
        color: var(--light-blue-color);
        font-size: 14px;
        font-weight: bolder;
        margin-bottom: 15px;
    }
    .parent-boxes .box-welcome p {
        font-size: 14px;
        font-weight: bold;
    }
    .parent-boxes .box-welcome p span {
        margin-right: 5px;
    }
    .parent-boxes .box-welcome .prog {
        border-radius: 4px !important;
        height: 8px;
        background-color: var(--prog-color) !important;
    }
    .parent-boxes .box-welcome .prog-bar {
        background-color: var(--green-color-two) !important;
    }
    .parent-boxes .box-welcome .btn {
        color: white !important;
        background-color: var(--light-blue-color) !important;
        display: block !important;
        max-width: 142px !important;
        text-align: center !important;
        border-radius: 18px !important;
        padding: 7.5px 5px;
        font-size: 12px !important;
        margin: 25px auto 0;
    }
    .parent-boxes .box-welcome .btn:hover {
        color: white !important;
    }
    .parent-boxes .box-package {
        position: relative;
    }
    .parent-boxes .box-package svg {
        position: absolute;
        right: 15px;
        width: 23px;
        color: var(--light-blue-color);
        height: 32px;
        top: -15px;
    }

    .parent-boxes .box-package h6 {
        color: var(--light-blue-color);
        font-size: 14px;
        font-weight: bolder;
        margin-bottom: 15px;
    }
    .parent-boxes .box-package p {
        font-size: 14px;
    }
    .parent-boxes .box-package p:first-of-type {
        font-size: 14px;
        margin-bottom: 50px;

        font-weight: bold;
    }
    .parent-boxes .box-package p:nth-of-type(2) {
        font-size: 14px;
        margin-bottom: 15px;
        font-weight: 600;
    }
    .parent-boxes .box-package p:nth-of-type(3) {
        font-size: 14px;
        color: var(--dark-red-color);
        text-align: right;
        margin-bottom: 15px;
        font-weight: 600;
    }
    .parent-boxes .box-package .prog {
        border-radius: 4px !important;
        height: 8px;
        background-color: var(--prog-color) !important;
        margin-bottom: 25px;
    }
    .parent-boxes .box-package .prog-bar {
        background-color: var(--dark-red-color) !important;
    }
    .parent-boxes .box-package .btn {
        color: white !important;
        background-color: var(--light-blue-color) !important;
        display: block !important;
        max-width: 142px !important;
        text-align: center !important;
        border-radius: 18px !important;
        padding: 7.5px 5px;
        font-size: 12px !important;
        margin: 15px auto 0;
    }

    .packages-available h6 {
        font-size: 18px;
        color: var(--h-color);
        font-weight: 600;
        margin-bottom: 1.5rem;
    }
    .packages-available .box {
        background-color: var(--light-green-color);
        text-align: center;
        padding: 25px 20px;
        border-radius: 8px;
    }
    .packages-available .box h4 {
        color: var(--h-color);
        font-size: 24px;
        margin-bottom: 30px;
    }
    .packages-available .box .price {
        color: var(--green-color-two);
        font-size: 26px;
        margin-bottom: 50px;
        font-weight: 600;
    }
    .packages-available .btn {
        max-width: 168px;
        width: 100%;
        color: white;
        outline: none;
        font-size: 20px;
        padding: 10.9px 5px;

        box-shadow: none;
        border: none;
        border-radius: 5px;
        background-color: var(--light-blue-color);
    }
    .packages-available .icon {
        width: 49.5px;
        height: 85px;
        overflow: hidden;
        display: flex;
        align-items: center;
        margin-right: 5px;
        justify-content: center;
        background-color: var(--light-green-color);
    }
    .packages-available .icon img {
        width: 100%;
    }

    .subscriptions h6 {
        font-size: 18px;
        color: var(--h-color);
        font-weight: 600;
        margin-bottom: 1.5rem;
    }
    /* End Section home*/
    /* Satrt Section Order */
    section.orders .back .box {
        background-color: var(--light-green-color);
        padding: 5px 10px !important;
        border: 0.5px solid #0491e8;
        display: flex;
        border-radius: 7px;
        align-items: center;
        justify-content: space-between;
        font-size: 17px;
        cursor: pointer;
        min-width: 200px;
    }
    section.orders .back .box.check {
        color: var(--light-blue-color);
    }
    section.orders .back .box svg {
        color: var(--light-blue-color);
    }
    @media (max-width: 767.98px) {
        section.orders .back .box {
            min-width: 100px;
        }
    }
    section.orders .box-order {
        border-radius: 19px;
        background-color: var(--light-green-color);
        display: flex;
        padding: 20px;
        gap: 50px;
    }
    @media (max-width: 1199.98px) {
        section.orders .box-order {
            flex-direction: column;
            position: relative;
        }
    }
    section.orders .box-order .info {
        text-align: center;
        min-width: 150px;
        position: relative;
    }
    section.orders .box-order .info::before {
        content: "";
        position: absolute;
        width: 2px;
        background-color: var(--light-blue-color);
        height: 75%;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
    }
    @media (max-width: 1199.98px) {
        section.orders .box-order .info::before {
            content: "";
            position: absolute;
            width: 75%;
            background-color: var(--light-blue-color);
            height: 2px;
            left: 50%;
            top: unset;
            bottom: -25px;
            transform: translateX(-50%);
        }
    }
    section.orders .box-order .info .photo {
        overflow: hidden;
        width: 74px;
        height: 74px;
        background-color: white;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    section.orders .box-order .stars {
        margin-bottom: 10px;
    }
    section.orders .box-order .stars svg {
        font-size: 14px;
        color: var(--gold-color);
    }
    section.orders .box-order .name {
        color: var(--color-info);
        font-size: 18px;
        margin-bottom: 3px;
        font-weight: 600;
    }
    section.orders .box-order .job {
        color: var(--dark-green-color);
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 0;
    }
    section.orders .box-order .text {
        flex: 1;
    }
    section.orders .box-order .data {
        font-size: 14px;
        color: var(--color-info);
        margin-bottom: 1rem;
        position: relative;
    }
    section.orders .box-order .data .order-num {
        font-weight: bold;
    }

    section.orders .box-order .data .order-num .count {
        color: var(--light-blue-color);
    }
    section.orders .box-order .data svg {
        color: var(--light-blue-color);
        font-size: 16px;
        margin-left: 2px;
    }
    section.orders .box-order .duration {
        border: 0.5px solid var(--light-blue-color);
        color: var(--light-blue-color);
        display: flex;
        background-color: var(--light-green-two);
        padding: 5px 9px;
        border-radius: 5px;
        margin-left: 1.5rem;
        margin-right: 10px;
        align-items: center;
        gap: 2px;
    }
    @media (min-width: 1400px) {
        section.orders .box-order .duration {
            margin-right: 25px;
        }
    }
    section.orders .box-order .setting {
        left: 0;
        top: 20px;
        position: absolute;
    }

    section.orders .box-order .setting > svg {
        font-size: 20px;
        color: var(--color-info);
    }
    section.orders .box-order .setting > .report {
        border-radius: 3px;
        background-color: #eee;
        font-size: 14px;
        display: flex;
        align-items: center;
        position: absolute;
        right: -21px;
        min-width: 135px;
        box-shadow: #777 0 0 5px 0;
        bottom: calc(100% + 13px);
        color: var(--color-text);
        gap: 7px;
        transition: var(--main-transition);
        justify-content: center;
        transform: translateX(-30px);
        opacity: 0;
        pointer-events: none;
        padding: 5px 7px;
    }
    section.orders .box-order .setting:hover .report {
        transform: translateX(0);
        opacity: 1;
        pointer-events: unset;
    }
    section.orders .box-order .setting > .report::before {
        content: "";
        position: absolute;
        border-width: 10px;
        width: 0;
        height: 0;
        right: 12px;
        top: calc(100%);
        border-style: solid;
        border-color: #eee transparent transparent transparent;
    }
    section.orders .box-order .setting > .report > svg {
        color: var(--dark-red-color);
    }
    @media (max-width: 1199.98px) {
        section.orders .box-order .setting {
            left: 20px;
            top: 20px;
        }
        section.orders .box-order .data {
            position: unset;
        }
        section.orders .box-order .setting > .report {
            left: -21px;
            right: unset;
        }
        section.orders .box-order .setting > .report::before {
            left: 15px;
            right: unset;
        }
    }
    section.orders .box-order .title {
        font-weight: bold;
        color: var(--light-blue-color);
    }
    section.orders .box-order .content {
        max-width: 65%;
        font-size: 16px;
        line-height: 28px;
        margin-bottom: 0;
        color: var(--color-text);
    }
    @media (max-width: 991.98px) {
        section.orders .box-order .content {
            max-width: 100%;
            margin-bottom: 1rem;
        }
    }

    section.orders .box-order .group-btn .btn {
        border-radius: 5px;

        color: white;
        text-align: center;
        min-width: 170px;
        font-size: 16px;
        outline: none;
        font-weight: normal;
        border: none;
        padding: 11px;
    }
    section.orders .box-order .group-btn .btn.new {
        background-color: var(--green-new);
    }
    section.orders .box-order .group-btn .btn.negotiate {
        background-color: var(--light-blue-color);
    }
    section.orders .box-order .group-btn .btn.under-review {
        background-color: var(--yellow-color);
    }
    section.orders .box-order .group-btn .btn.finished {
        background-color: var(--red-color-two);
    }
    section.orders .box-order .group-btn .btn.offered-orders {
        background-color: var(--dark-grey-color);
    }
    section.orders .box-order .group-btn .btn.underway {
        background-color: var(--dark-green-three);
    }
    /* End Section Order */
    /* Start Section Settings */
    @media (min-width: 1200px) {
        section.settings .r-bar {
            margin-top: -6.5rem;
        }
    }
    section.settings .back .status {
        background: var(--color-red-mix);
        flex: 1;
        color: white;
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 51px;
        border-radius: 8px;
        min-width: 250px;
    }
    section.settings .back .update {
        background: var(--light-blue-color);
        color: white;
        font-size: 16px;
        display: flex;
        min-width: 150px;
        align-items: center;
        justify-content: center;
        min-height: 51px;
        border-radius: 8px;
    }
    section.settings .box {
        min-width: 250px;
    }
    @media (max-width: 767.98px) {
        section.settings .box {
            flex: 1;
            margin: 0 5px;
        }
    }

    section.settings .box-info {
        background-color: transparent;
        padding-bottom: 0;
    }
    section.settings .box-info h4 {
        margin-bottom: 0;
    }
    section.settings .box-info p {
        margin: 10px auto 0;
    }
    section.settings .box-data .data p {
        margin: 0;
    }
    section.settings .box-data {
        gap: 2rem;
    }
    section.settings .box-data .data .title {
        font-size: 20px;
        color: var(--light-blue-color);
    }
    section.settings .box-data .data .content {
        font-size: 18px;
    }
    section.settings .box-data .status {
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 20px;
    }
    section.settings .box-data .status.active {
        color: var(--light-blue-two);
    }
    section.settings .box-data .status.dn-active {
        color: var(--dark-red-color);
    }
    section.settings .box-data .status.active .icon {
        width: 23px;
        justify-content: center;
        height: 23px;
        display: flex;
        align-items: center;
        background-color: #b0ef8f;
        border-radius: 50%;
    }
    section.settings .box-data .status.active .icon svg {
        color: #009045;
    }
    section.settings .box-data .status.dn-active .icon {
        width: 23px;
        justify-content: center;
        height: 23px;
        display: flex;
        align-items: center;
        background-color: #ff4a4a;
        border-radius: 50%;
    }
    section.settings .box-data .status.dn-active .icon svg {
        color: white;
    }

    section.settings .box-data .status.waiting {
        color: #73737d;
    }
    section.settings .box-data .status.waiting .icon {
        width: 23px;
        justify-content: center;
        height: 23px;
        display: flex;
        align-items: center;
        background-color: transparent;
        border-radius: 50%;
    }
    section.settings .box-data .status.waiting .icon svg {
        color: #73737d;
        font-size: 20px;
    }
    @media (max-width: 1399.98px) {
        section.settings .box-data .data .title {
            font-size: 16px;
        }
        section.settings .box-data .data .content {
            font-size: 16px;
            line-break: anywhere;
        }
        section.settings .box-data .status {
            font-size: 14px;
        }
    }
    section.settings .box-data .box-child {
        gap: 1rem;
    }
    section.settings .box-data .dont-sub {
        background: var(--color-red-mix);
        min-height: 50px;
        color: white;
        min-width: 100px;
        border-radius: 8px;

        display: flex;
        align-items: center;
        justify-content: center;
    }
    section.settings form .box {
        width: 45%;
    }
    section.settings form .box .lable {
        font-size: 18px;
        margin-bottom: 5px;
    }
    section.settings form .box .lable span {
        color: var(--dark-red-color);
    }
    section.settings form .box input,
    section.settings form .box select {
        width: 100%;
        min-height: 50px;
        border: 1px solid #73737d8f;
        outline: none;
        padding: 0 10px;
        border-radius: 10px;
    }
    section.settings form .box input:focus,
    section.settings form .box select:focus {
        border: 1px solid var(--light-blue-color);
        color: var(--light-blue-color);
    }

    /* End Section Settings */

    /* Start Section Tickets */
    section.tickets .count-tickets {
        display: flex;
        align-items: center;
        padding: 10px 35px;
        max-width: 370px;
        gap: 40px;
        background-color: var(--light-green-color);
        border-radius: 12px;
    }
    section.tickets .count-tickets .logo {
        display: flex;
        flex-direction: column;
        gap: 5px;
        align-items: center;
    }
    section.tickets .count-tickets .logo img {
        width: 33.79px;
    }
    section.tickets .count-tickets .logo h6 {
        font-size: 16px;
        text-align: center;
        margin-bottom: 0px;
        color: var(--green-color);
        font-weight: normal;
    }
    section.tickets .count-tickets .logo p {
        font-size: 10px;
        color: var(--grey-color);
        margin-bottom: 0;

        text-align: center;
    }
    section.tickets .count-tickets .count {
        font: normal normal normal 28px/42px;
        letter-spacing: 0px;
        color: #0491e8;
    }
    @media (max-width: 575.98px) {
        section.tickets .count-tickets .count {
            font: normal normal normal 22px;
            letter-spacing: 0px;
            color: #0491e8;
        }
        section.tickets .count-tickets {
            display: flex;
            align-items: center;
            padding: 15px;
            max-width: 370px;
            gap: 40px;
            background-color: var(--light-green-color);
            border-radius: 12px;
        }
    }
    section.tickets .new-ticket {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 202px;
        height: 55px;
        color: white;
        background: #0995eb 0% 0% no-repeat padding-box;
        border-radius: 12px;
    }
    section.tickets .all-tickets {
        margin-top: 5rem;
    }
    section.tickets .all-tickets .ticket {
        background-color: var(--light-green-color);
        display: flex;
        padding: 11px 20px;
        align-items: center;
        border-radius: 12px;
    }

    section.tickets .all-tickets .ticket .date {
        display: flex;
        align-items: center;
        padding: 14.1px 25px;
        font-size: 18px;
        letter-spacing: 0px;
        position: relative;
        color: var(--color-info);
    }
    section.tickets .all-tickets .ticket .date::before {
        content: "";
        position: absolute;
        background-color: var(--light-blue-color);
        height: 100%;
        width: 4px;
        left: 0;
        border-radius: 50px;
        top: 0;
    }
    section.tickets .all-tickets .ticket .date svg {
        color: var(--light-blue-color);
        margin-left: 20px;
    }
    section.tickets .all-tickets .ticket .text {
        margin: 0 30px 0 0;
        font-size: 18px;
        color: var(--color-info);
    }
    section.tickets .all-tickets .ticket .status {
        font-size: 20px;
        letter-spacing: 0px;
        margin-right: auto;
    }
    section.tickets .all-tickets .ticket .status.open {
        color: #0491e8;
    }
    section.tickets .all-tickets .ticket .status.close {
        color: #e53535;
    }
    @media (max-width: 1199.98px) {
        section.tickets .all-tickets .ticket {
            flex-direction: column;
        }
        section.tickets .all-tickets .ticket .date {
            padding: 15px;
        }
        section.tickets .all-tickets .ticket .date::before {
            height: 4px;
            width: 100%;
            left: 0;
            top: 100%;
        }
        section.tickets .all-tickets .ticket .text {
            margin: 30px 0 70px 0;
        }
    }

    /* End Section Tickets */

    /* Start Section Offers */
    section.offers .back .icon-back {
        color: black;
        min-width: 252px;
        font-size: 15px;
        color: white;
        font-size: 18px;
        background-color: var(--red-color);
    }
    section.offers .level-and-status {
        border: 1px solid #b0e1fc;
        border-radius: 11px;
        margin-bottom: 3rem;
        padding: 10px;
    }
    section.offers .status-parent {
        font-size: 18px;
        position: relative;
        color: var(--color-info);
        display: flex;
        margin-right: -65px;

        flex-direction: column;
        align-items: center;
    }
    section.offers .status-parent::before {
        font-size: 18px;
        content: "";
        height: 100%;
        width: 2px;
        left: 0;
        background-color: var(--light-blue-color);
        top: 0;
        position: absolute;
        color: var(--color-info);
    }
    section.offers .status-parent .status-child {
        margin-bottom: 1.5rem;
    }
    section.offers .status-parent .status {
        font-size: 12px;
        height: 26px;
        border-radius: 4px;
        display: inline-flex;
        align-items: center;
        line-height: 4;
        justify-content: center;
        color: white;
        margin-right: 5px;
        width: 83px;
        background-color: var(--light-blue-color);
    }
    section.offers .status-parent .status.open {
        background-color: var(--dark-green-color);
    }

    section.offers .status-parent .order-number span {
        color: var(--light-blue-color);
        margin-right: 5px;
    }
    @media (max-width: 1199.98px) {
        section.offers .status-parent {
            margin-right: 0;
        }
        section.offers .status-parent::before {
            font-size: 18px;
            content: "";
            width: 100%;
            height: 2px;
            left: 0;
            background-color: var(--light-blue-color);
            bottom: 0;
            top: unset;
            position: absolute;
            color: var(--color-info);
        }
    }
    section.offers ul.level {
        display: flex;
        position: relative;
        justify-content: space-between;
        height: 100%;
        align-items: center;
        text-align: center;
        width: 800px;
        min-height: 119px;
        margin: auto;
    }
    section.offers ul.level li:first-child .icon:before {
        position: absolute;
        content: "";
        right: 0;
        top: 50%;
        z-index: -1;
        transform: translateY(-50%);
        width: 326px;
        border-bottom: 2px solid var(--light-blue-color);
    }
    section.offers ul.level li:nth-child(2) .icon:before {
        position: absolute;
        content: "";
        right: 0;
        top: 50%;
        z-index: -1;
        transform: translateY(-50%);
        width: 326px;
        border-bottom: 2px dotted #8f8f8f;
    }

    section.offers ul.level.level2 li:first-child .icon:before {
        position: absolute;
        content: "";
        right: 0;
        top: 50%;
        z-index: -1;
        transform: translateY(-50%);
        width: 210px;
        border-bottom: 2px solid var(--light-blue-color);
    }
    section.offers ul.level.level2 li:nth-child(2) .icon:before {
        position: absolute;
        content: "";
        right: 0;
        top: 50%;
        z-index: -1;
        transform: translateY(-50%);
        width: 183px;
        border-bottom: 2px dotted #8f8f8f;
    }
    section.offers ul.level.level2 li:nth-child(3) .icon:before {
        position: absolute;
        content: "";
        right: 0;
        top: 50%;
        z-index: -1;
        transform: translateY(-50%);
        width: 162px;
        border-bottom: 2px dotted #8f8f8f;
    }
    section.offers ul.level.level2 li:nth-child(4) .icon:before {
        position: absolute;
        content: "";
        right: 0;
        top: 50%;
        z-index: -1;
        transform: translateY(-50%);
        width: 162px;
        border-bottom: 2px dotted #8f8f8f;
    }
    @media (max-width: 991.98px) {
        section.offers ul.level.level2 {
            width: 595px;
        }

        section.offers ul.level.level2 li:first-child .icon:before {
            width: 164px;
        }
        section.offers ul.level.level2 li:nth-child(2) .icon:before {
            width: 130px;
        }
        section.offers ul.level.level2 li:nth-child(3) .icon:before {
            width: 130px;
        }
        section.offers ul.level.level2 li:nth-child(4) .icon:before {
            width: 130px;
        }
    }

    section.offers ul.level li {
        color: #8f8f8f;
        font-size: 16px;
    }
    section.offers ul.level li.active {
        color: var(--light-blue-color);
    }
    section.offers ul.level .icon {
        height: 41px;
        position: relative;

        display: flex;
        align-items: center;
        justify-content: center;
        width: 41px;
        background-color: white;
        border-radius: 50%;
        margin: auto;
        margin-bottom: 15px;
        border: 3px solid #dbdbdb;
    }
    section.offers ul.level .icon svg {
        color: #dbdbdb;
    }
    section.offers ul.level .active .icon {
        border: 3px solid var(--light-blue-color);
    }
    section.offers ul.level .active .icon svg {
        color: var(--light-blue-color);
    }
    section.offers .box-order {
        border-radius: 19px;
        background-color: var(--light-green-color);
        display: flex;
        padding: 20px;
        gap: 50px;
    }
    @media (max-width: 767.98px) {
        section.offers ul.level {
            width: 250px;
        }
        section.offers ul.level li {
            font-size: 12px !important;
            padding: 1.5px;
        }
        section.offers ul.level li:first-child .icon:before {
            position: absolute;
            content: "";
            right: 0;
            top: 50%;
            z-index: -1;
            transform: translateY(-50%);
            width: 110px;
            border-bottom: 2px solid var(--light-blue-color);
        }
        section.offers ul.level li:nth-child(2) .icon:before {
            position: absolute;
            content: "";
            right: 0;
            top: 50%;
            z-index: -1;
            transform: translateY(-50%);
            width: 110px;
            border-bottom: 2px dotted #8f8f8f;
        }
    }

    section.offers .box-order .duration {
        border: 0.5px solid var(--green-color-two) !important;
        color: var(--green-color-two) !important;
        display: flex;
        background-color: var(--color-green-bg) !important;
        padding: 5px 9px;
        border-radius: 5px;
        margin-right: 0 !important;
        align-items: center;
        gap: 2px;
    }
    section.offers .box-order .duration svg {
        color: var(--green-color-two) !important;
    }

    section.offers .box-order .setting {
        left: 0 !important;
        transform: translateY(-50%);
        top: 50% !important;
    }
    @media (max-width: 1199.98px) {
        section.offers .box-order .setting {
            left: 15px !important;
            transform: translateY(0);
            top: 15px !important;
        }
    }

    section.offers .box-order .info {
        text-align: center;
        margin-top: 86px;
        min-width: unset !important;
        position: unset !important;
    }
    @media (max-width: 1199.98px) {
        section.offers .box-order .info {
            margin-top: 0 !important;
        }
    }
    section.offers .text .file-parent p {
        font-size: 18px;
        font-weight: bolder;
        margin-bottom: 0;
    }

    section.offers .text .file-child {
        background: var(--color-green-bg);
        border: 0.5px solid var(--green-color-two);
        border-radius: 7px;
        padding: 10px;
        margin-top: 7px;
        display: block;
        max-width: fit-content;
        color: var(--green-color-two);
    }

    section.offers .box-order .title {
        margin-bottom: 1rem;
    }
    @media (max-width: 1199.98px) {
        section.offers .box-order {
            flex-direction: column;
            position: relative;
        }
    }

    section.offers .box-order .info .photo {
        overflow: hidden;
        width: 74px;
        height: 74px;
        background-color: white;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    section.offers .box-order .stars {
        margin-bottom: 10px;
    }
    section.offers .box-order .stars svg {
        font-size: 14px;
        color: var(--gold-color);
    }
    section.offers .box-order .name {
        color: var(--color-info);
        font-size: 18px;
        margin-bottom: 3px;
        font-weight: 600;
    }
    section.offers .box-order .job {
        color: var(--dark-green-color);
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 0;
    }
    section.offers .box-order .text {
        flex: 1;
    }
    section.offers .box-order .data {
        font-size: 14px;
        color: var(--color-info);
        margin-bottom: 1rem;
        position: relative;
    }
    section.offers .box-order .data .order-num {
        font-weight: bold;
    }

    section.offers .box-order .data .order-num .count {
        color: var(--light-blue-color);
    }
    section.offers .box-order .data svg {
        color: var(--light-blue-color);
        font-size: 16px;
        margin-left: 2px;
    }
    section.offers .box-order .duration {
        border: 0.5px solid var(--light-blue-color);
        color: var(--light-blue-color);
        display: flex;
        background-color: var(--light-green-two);
        padding: 5px 9px;
        border-radius: 5px;
        margin-left: 1.5rem;
        margin-right: 10px;
        align-items: center;
        gap: 2px;
    }
    @media (min-width: 1400px) {
        section.offers .box-order .duration {
            margin-right: 25px;
        }
    }
    section.offers .box-order .setting {
        left: 0;
        top: 20px;
        position: absolute;
    }

    section.offers .box-order .setting > svg {
        font-size: 20px;
        color: var(--color-info);
    }
    section.offers .box-order .setting > .report {
        border-radius: 3px;
        background-color: #eee;
        font-size: 14px;
        display: flex;
        align-items: center;
        position: absolute;
        right: -21px;
        min-width: 135px;
        box-shadow: #777 0 0 5px 0;
        bottom: calc(100% + 13px);
        color: var(--color-text);
        gap: 7px;
        transition: var(--main-transition);
        justify-content: center;
        transform: translateX(-30px);
        opacity: 0;
        pointer-events: none;
        padding: 5px 7px;
    }
    section.offers .box-order .setting:hover .report {
        transform: translateX(0);
        opacity: 1;
        pointer-events: unset;
    }
    section.offers .box-order .setting > .report::before {
        content: "";
        position: absolute;
        border-width: 10px;
        width: 0;
        height: 0;
        right: 12px;
        top: calc(100%);
        border-style: solid;
        border-color: #eee transparent transparent transparent;
    }
    section.offers .box-order .setting > .report > svg {
        color: var(--dark-red-color);
    }
    @media (max-width: 1199.98px) {
        section.offers .box-order .setting {
            left: 20px;
            top: 20px;
        }
        section.offers .box-order .data {
            position: unset;
        }
        section.offers .box-order .setting > .report {
            left: -21px;
            right: unset;
        }
        section.offers .box-order .setting > .report::before {
            left: 15px;
            right: unset;
        }
    }
    section.offers .box-order .title {
        font-weight: bold;
        color: var(--light-blue-color);
    }
    section.offers .box-order .content {
        max-width: 65%;
        font-size: 14px;
        line-height: 28px;
        margin-bottom: 0;
        color: var(--color-text);
    }
    @media (max-width: 991.98px) {
        section.offers .box-order .content {
            max-width: 100%;
            margin-bottom: 1rem;
        }
    }

    section.offers .box-order .group-btn .btn {
        border-radius: 5px;

        color: white;
        text-align: center;
        min-width: 170px;
        font-size: 16px;
        outline: none;
        font-weight: normal;
        border: none;
        padding: 11px;
    }
    section.offers .box-order .group-btn .btn.new {
        background-color: var(--green-new);
    }
    section.offers .box-order .group-btn .btn.negotiate {
        background-color: var(--light-blue-color);
    }
    section.offers .box-order .group-btn .btn.under-review {
        background-color: var(--yellow-color);
    }
    section.offers .box-order .group-btn .btn.finished {
        background-color: var(--red-color-two);
    }
    section.offers .box-order .group-btn .btn.offered-orders {
        background-color: var(--dark-grey-color);
    }
    section.offers .box-order .group-btn .btn.underway {
        background-color: var(--dark-green-three);
    }
    section.offers .box-search {
        margin-bottom: 5rem;
    }
    section.offers .box-search .titl-search {
        font-size: 18px;
    }
    section.offers .box-search .box-inpt input {
        width: 100%;
        border: 0.5px solid #a5a5a5;
        border-radius: 12px;
        padding: 20px;
    }
    section.offers .box-search .box-inpt svg {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 20px;
        font-size: 20px;
        color: var(--light-blue-color);
    }
    section.offers .btns .btn {
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 109px;
        font-size: 16px;
        color: white;
        height: 50px;
    }
    section.offers .btns .btn.new {
        background-color: #0995eb;
    }
    section.offers .btns .btn.old {
        background-color: #d2d2d2;
        color: black;
    }
    section.offers .btns .btn.favorite {
        background-color: #ffc107;
    }
    section.offers .boxes-offers {
        column-gap: 100px;
        row-gap: 50px;
    }
    section.offers .boxes-offers .box-offer {
        width: calc(100% / 3 - 67px);
        min-width: 100px;
        position: relative;
        border: 1px solid #0491e8;
        padding: 15px;
        border-radius: 18px;
    }
    @media (max-width: 1199.98px) {
        section.offers .boxes-offers .box-offer {
            width: 100%;
        }
    }
    section.offers .boxes-offers .box-offer .star-box {
        position: absolute;
        font-size: 27px;
        left: -11px;
        top: -15px;
        color: var(--yellow-color);
    }
    section.offers .boxes-offers .box-offer .name {
        font-size: 16px;
        color: var(--light-blue-color);
        font-weight: bold;
        text-align: center;
    }
    section.offers .boxes-offers .box-offer .photo {
        text-align: center;
    }
    section.offers .boxes-offers .box-offer .photo .img-cont {
        position: relative;
        border-radius: 11px;
        margin: auto;
        margin-bottom: 16px;
        max-width: 100px;
    }
    section.offers .boxes-offers .box-offer .photo .img-cont .active {
        position: absolute;
        border-radius: 50%;
        width: 15px;
        height: 15px;
        background-color: #50c950;
        right: -5px;
        border: 1px solid white;
        top: -5px;
    }
    section.offers .boxes-offers .box-offer .photo .img-cont img {
        border-radius: 11px;
    }
    section.offers .boxes-offers .box-offer .photo .star {
        margin-bottom: 0px;
    }
    section.offers .boxes-offers .box-offer .photo .star svg {
        color: var(--yellow-color);
    }
    section.offers .boxes-offers .box-offer .photo .profile {
        text-decoration: underline;
        color: var(--color-info);
    }
    @media (max-width: 1399.98px) {
        section.offers .boxes-offers .box-offer .photo .profile {
            font-size: 13px;
            text-decoration: underline;
            color: var(--color-info);
        }
    }
    section.offers .boxes-offers .box-offer .info p:not(.name) {
        color: var(--color-info);
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 5px;
    }
    section.offers .boxes-offers .box-offer .info p .color {
        color: var(--light-blue-color);
    }
    section.offers .boxes-offers .box-offer .info .duration {
        color: #346842 !important;
    }
    section.offers .boxes-offers .box-offer .info .price {
        color: #ff4b4b !important;
    }
    section.offers .boxes-offers .box-offer .info .price {
        color: #ff4b4b !important;
    }
    section.offers .boxes-offers .box-offer .controll {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 1.5rem;
        gap: 1rem;
    }
    section.offers .boxes-offers .box-offer .controll .btn {
        border-radius: 5px;
        position: relative;
        width: calc(100% / 2 - 1rem);
        height: 40px;
        padding: 5px 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    section.offers .boxes-offers .box-offer .controll .btn .noti {
        position: absolute;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 3;
        left: -15px;
        top: -15px;
        color: white;
        border-radius: 50%;
        background-color: #ff5a5a;
    }
    section.offers .boxes-offers .box-offer .controll .btn.view {
        border: 0.5px solid #a5ddff;
        color: #0491e8;
        background-color: #b9e6ff;
    }
    section.offers .boxes-offers .box-offer .controll .btn.negotiable {
        border: 0.5px solid #90d8d1;
        color: #048e81;
        background-color: #e9fffd;
    }
    section.offers .boxes-offers .box-offer .controll .btn.non-negotiable {
        border: 0.5px solid #ffd18b;
        color: #ff9900;
        background-color: #ffeacb;
    }
    section.offers .boxes-offers .box-offer .controll .btn.inquiries {
        border: 0.5px solid #46cec1;
        color: #048e81;
        background-color: #defcf9;
    }
    /* End Section Offers */
    /* Start Section Select */
    section.select {
        background-color: var(--bg-blue);
    }

    header.fix {
        padding: 0;
    }
    header.fix.sc {
        padding: 0;
        background-color: var(--bg-blue);
        position: fixed;
        left: 0;
        width: 100%;
        top: 0;
        z-index: 1;
    }
    header.fix.hid {
        opacity: 0;
        z-index: -1000;
    }
    header.fix .box-search {
        padding-bottom: 2rem;
        padding-top: 2rem;
        background-color: var(--bg-blue);
    }
    header.fix .box-search .titl-search {
        font-size: 18px;
    }
    header.fix .box-search .box-inpt {
        width: 100%;
    }
    header.fix .box-search .box-inpt input {
        width: 100%;
        border: 0.5px solid #a5a5a5;
        border-radius: 12px;
        padding: 15px;
    }
    header.fix .box-search .box-inpt svg {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 20px;
        font-size: 20px;
        color: var(--light-blue-color);
    }
    header.fix .box-search .select-search {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex: 1;
        background-color: #e4ffe5;
        border: 0.5px solid #46954b;

        border-radius: 7px;
        color: #46954b;
        padding: 12.4px 15px;
        font-size: 18px;
    }
    header.fix .box-search .select-search .text {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    header.fix .box-search .select-search .text > .icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 29px;
        cursor: pointer;
        height: 29px;
        border-radius: 50%;
        border: 3px solid #46954b;
    }

    header.fix .box-search .select-search .text > .icon.all-select {
        color: white;
        background-color: #46954b;
    }
    header.fix .box-search .select-search > .icon {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;

        width: 29px;
        height: 29px;
        border-radius: 50%;
        color: white;
        line-height: 33px;
        font-weight: bold;
        font-family: cursive;

        font-size: 20px;
        background-color: #0491e8;
    }
    header.fix .box-search .select-search > .icon > .tol-t {
        padding: 5px;
        font-size: 15px;
        background: #f2faff;
        line-height: 1.5;
        font-weight: normal;
        color: black;
        min-width: 220px;
        box-shadow: #777 0 0 3px 0;
        position: absolute;
        display: none;

        top: calc(100% + 20px);
        left: 0;
    }
    header.fix .box-search .select-search > .icon:hover .tol-t {
        display: block;
    }
    header.fix .box-search .select-search > .icon > .tol-t::before {
        content: "";
        left: 3px;
        bottom: 100%;
        border-color: transparent transparent #f2faff transparent;
        border-width: 10px;
        border-style: solid;
        position: absolute;
    }
    section.select .boxes-offers {
        row-gap: 80px;
        column-gap: 30px;
    }
    section.select .boxes-offers .box-offer {
        width: calc(100% / 3 - 20px);
        min-width: 100px;
    }
    @media (max-width: 1199.98px) {
        section.select .boxes-offers .box-offer {
            width: 100%;
        }
    }
    section.select .boxes-offers .box-offer .check {
        position: absolute;
        font-size: 27px;
        right: -3px;
        top: -5px;
        border-radius: 50%;
        width: 15px;
        height: 15px;
        color: var(--yellow-color);
    }
    section.select .boxes-offers .box-offer .check::before {
        position: absolute;
        content: "";

        left: -5px;
        top: -5px;

        border-radius: 50%;
        cursor: pointer;
        width: 25px;
        height: 25px;
        background-color: #7f7f7f;
    }
    section.select .boxes-offers .box-offer .check::after {
        position: absolute;
        content: "";

        left: -5px;
        top: -5px;
        display: flex;
        align-items: center;
        font-family: "Font Awesome 6 Free";
        content: "\f00c";
        font-weight: 900;
        justify-content: center;
        cursor: pointer;
        border-radius: 50%;
        opacity: 0;
        width: 25px;
        height: 25px;
        color: #009045;
        background-color: #b0ef8f;
    }
    section.select .boxes-offers .box-offer .check:checked::after {
        opacity: 1;
    }
    section.select .boxes-offers .box-offer .box-child {
        position: relative;
        border: 1px solid #0491e8;
        margin-bottom: 20px;

        padding: 15px;
        border-radius: 18px;
        background-color: white;
    }
    section.select .boxes-offers .box-offer .box-child .photo .img-cont {
        width: 108px;
        height: 108px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fcfcfc;
        margin-bottom: 1rem;
        overflow: hidden;
        max-height: 123px;
    }
    section.select .boxes-offers .box-offer .box-child .info {
        min-width: 165px;
    }
    section.select .boxes-offers .box-offer .box-child .info .name {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
        color: var(--light-blue-color) !important;
        margin-bottom: 15px;
    }
    section.select .boxes-offers .box-offer .box-child .info p {
        font-size: 18px;
        color: var(--color-info);
        margin-bottom: 5px;
    }
    section.select .boxes-offers .box-offer .box-child .info p:last-of-type {
        margin-bottom: 0px;
    }
    section.select .boxes-offers .box-offer .photo .star {
        color: #333 !important;
        font-size: 18px;
    }
    section.select .boxes-offers .box-offer .photo .star svg {
        color: var(--yellow-color);
    }
    section.select .boxes-offers .box-offer .profile {
        font-size: 18px;
        text-align: center;
        display: block;
        text-decoration: underline;
        color: var(--color-info);
    }
    section.select .box-sub {
        padding: 2rem 0;
        background-color: var(--bg-blue);
    }
    section.select .inp-sub {
        background-color: #0491e8;
        font-size: 18px;
        color: white;
    }

    /* End Section Select */
    /* Start Section add-ticket */
    section.add-ticket input:focus,
    section.add-ticket textarea:focus,
    section.add-ticket select:focus {
        border-color: var(--light-blue-color);
    }
    section.add-ticket input,
    section.add-ticket select {
        height: 53px;
        border-color: transparent;
        padding: 10px;
    }
    section.add-ticket input,
    section.add-ticket textarea {
        color: black;
        border-color: transparent;
        background-color: #eeeeee;
    }
    section.add-ticket select {
        appearance: auto;
        color: black;
        background-color: #eeeeee;
    }

    section.add-ticket textarea {
        padding: 10px;

        min-height: 200px;
    }
    section.add-ticket input[type="file"] {
        align-items: center;
    }
    section.add-ticket input[type="file"]::after {
        content: none;
    }
    section.add-ticket input[type="file"]::before {
        content: none;
    }
    section.add-ticket input[type="submit"] {
        color: white;
        background-color: var(--dark-green-color);
        display: block;
        margin: auto;
        padding: 10px 20px;
    }
    /* End Section add-ticket */
    /* Starat Section balance */
    section.balance .balance-info .balance-card {
        border-radius: 8px;
        background-color: var(--light-green-color);
        padding: 15px;
    }

    section.balance .balance-info .balance-card h3 {
        font-size: 16px;
        margin-bottom: 2rem;
        color: var(--color-info);
        font-weight: bold;
    }
    section.balance .balance-info .balance-card p {
        font-size: 20px;
        margin: 0;
        color: var(--light-blue-color);
        font-weight: bold;
    }
    section.balance .balance-info .balance-card svg {
        color: var(--light-blue-color);
        margin-right: auto;
        display: block;
        font-size: 25px;
    }
    section.balance .all-tickets {
        margin-top: 3rem;
    }
    section.balance .all-tickets > .title > h4 {
        font-weight: 600;
        margin-bottom: 0;
        color: var(--h-color);
    }
    section.balance .all-tickets > .title > a {
        font-size: 16px;
        color: var(--light-blue-color);
        font-weight: bold;
        text-decoration: underline;
    }
    section.balance .all-tickets > .ticket {
        border-radius: 8px;
        gap: 2rem;
    }
    section.balance .all-tickets > .ticket > .count {
        color: white;
        background-color: #0491e8;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        padding: 0.5rem 1rem;
    }
    section.balance .all-tickets > .ticket > p {
        margin-bottom: 0;
        font-size: 16px;
        color: var(--color-info);
    }
    section.balance .group-btn .btn {
        border-radius: 4px;
        font-size: 18px;
        width: 230px;
        height: 50px;
        color: white;
        margin-top: auto;
        border: none;
        outline: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    section.balance .group-btn .withdrawal {
        background: #2b7b74;
    }
    section.balance .group-btn .recharge {
        background: #0995eb;
    }
    /* End Section balance */
    /* Start section account-type */
    section.account-type {
        background-color: var(--light-green-color);
        color: var(--color-info);
    }
    section.account-type .box {
        padding: 1.5rem 1.5rem;
        min-height: 100vh;
    }
    section.account-type .box img {
        width: 150px;
        margin-bottom: 1rem;
        filter: grayscale(1);
    }
    section.account-type .box.active img {
        width: 150px;
        margin-bottom: 1rem;
        filter: grayscale(0);
    }
    section.account-type .box p {
        font-size: 18px;
        margin-bottom: 3rem;
    }
    section.account-type .box label {
        font-size: 18px;
        display: flex;
        align-items: center;
        margin-bottom: 2rem;
        flex-direction: column;
        gap: 0.5rem;
    }
    section.account-type .box label > input {
        width: 5px;
        height: 5px;
        position: relative;
    }
    section.account-type .box label > input::before {
        position: absolute;
        content: "";
        cursor: pointer;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 1px solid #e2e2e2;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
    }
    section.account-type .box label > input::after {
        position: absolute;
        content: "";
        cursor: pointer;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: none;

        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        background-color: #048e81;
    }
    section.account-type .box label > input:checked:after {
        display: block;
    }
    section.account-type .box .inp-radio {
        margin: auto;
        margin-bottom: 3rem;
        position: relative;
        display: block;
    }
    section.account-type .box .inp-radio::before {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        background-color: #e2e2e2;
        color: black;
        cursor: pointer;
        width: 250px;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        height: 50px;
        border-radius: 50px;
    }
    section.account-type .box .inp-radio:nth-of-type(1):before {
        content: "??????????";
    }
    section.account-type .box .inp-radio:nth-of-type(2):before {
        content: "????????";
    }
    section.account-type .box .inp-radio:nth-of-type(3):before {
        content: "?????? ????????????";
    }
    section.account-type .box .inp-radio::after {
        position: absolute;
        content: "";
        background-color: white;
        cursor: pointer;
        width: 12px;
        height: 12px;
        right: -100px;
        top: 50%;
        display: none;
        transform: translateY(-50%);
        border-radius: 50%;
    }
    section.account-type .box .inp-radio:checked:before {
        background-color: #0491e8;
        color: white;
    }
    section.account-type .box .inp-radio:checked::after {
        display: block;
    }
    /* End Section account-type */
    /* Start Section Web */

    @media (min-width: 1200px) {
        section.web .r-bar {
            margin-top: -8.5rem;
        }
    }
    section.web .back .btn {
        color: white;
        background: transparent linear-gradient(148deg, #048e81 0%, #0491e8 100%) 0%
            0% no-repeat padding-box;
        border-radius: 9px;
        width: 170px;
        height: 47px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    section.web .back img {
        width: 225px;
    }

    section.web .parent-boxes .info .photo .container-img {
        width: 100px;
        height: 100px;
        border: 3px solid #0491e8;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background-color: white;
    }
    section.web .parent-boxes .info .photo .container-img > img {
        width: 100%;
    }
    section.web .parent-boxes .info .photo .icon {
        width: 25px;
        margin: 0.5rem 0 0;
    }
    section.web .parent-boxes .info .name {
        color: #0491e8;
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 10px;
    }
    section.web .parent-boxes .info .job {
        color: #048e81;
        font-weight: bold;
        font-size: 15px;
        margin-bottom: 10px;
    }
    section.web .parent-boxes .info .city {
        color: var(--color-info);
        font-weight: bold;
        font-size: 15px;
        margin-bottom: 10px;
    }
    section.web .parent-boxes .info .last-seen {
        color: var(--color-info);
        font-weight: bold;
        position: relative;
        font-size: 13px;
        margin-bottom: 0px;
    }
    section.web .parent-boxes .info .last-seen::before {
        position: absolute;
        content: "";
        background-color: #ff5050;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        left: calc(100% + 5px);
        top: 50%;
        transform: translateY(-50%);
    }
    section.web .parent-boxes .sidebar {
        background-color: #f5f5f5;
        padding: 20px 0;
        border-radius: 8px;
    }
    @media (min-width: 1400px) {
        section.web .parent-boxes .sidebar {
            width: 70%;
        }
    }

    section.web .parent-boxes .sidebar a {
        color: #6c7981;
        font-weight: bold;
        display: block;
        padding: 10px 55px 10px 0;
        margin: 20px 0;
        position: relative;
        transition: var(--main-transition);
    }
    section.web .parent-boxes .sidebar a::before {
        content: "";
        position: absolute;
        background-color: #0491e8;
        height: 100%;
        border-top-left-radius: 50px;
        border-bottom-left-radius: 50px;
        visibility: hidden;

        right: 0;
        top: 0;
        width: 6px;
    }
    section.web .parent-boxes .sidebar a:not(a.active):hover {
        color: #0491e8;
    }
    section.web .parent-boxes .sidebar .active a::before {
        visibility: visible;
    }
    section.web .parent-boxes .sidebar .active a {
        color: #0d1920;
    }

    section.web .about-me {
        display: none;
    }
    section.web .licenses {
        display: none;
    }
    section.web .executed-contracts {
        display: none;
    }
    section.web .audio-consulting {
        display: none;
    }
    section.web .qualifications {
        display: none;
    }
    section.web .specialization {
        display: none;
    }
    section.web .my-articles {
        display: none;
    }
    section.web .performance-stats {
        color: var(--color-info);
        font-weight: bold;
    }
    section.web .main-content > .title {
        font-size: 20px;
        font-weight: bold;
        color: var(--color-info);
    }
    section.web .main-content > p {
        line-height: 2;
        font-size: 14px;
        color: var(--color-info);
    }
    section.web .main-content > .photo {
        width: 250px;
        border-radius: 10px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        background-color: #eee;
    }
    section.web .main-content > .photo > img {
        width: 100%;
    }

    section.web .performance-stats .stars svg {
        color: var(--gold-color);
    }
    section.web .performance-stats .progress {
        width: 160px;
        background-color: #dfdfdf !important;
        height: 39px;
    }
    section.web .performance-stats .execution-rate .progress-bar {
        background-color: #188278;
        font-size: 18px;
    }
    section.web .performance-stats .response-speed .progress-bar {
        background-color: #0491e8;
        font-size: 18px;
    }
    section.web .performance-stats .num-contracts {
        color: #048e81;
    }
    /* End Section Web */
    /* Start execution-client  */
    section.execution-client .back .icon-back {
        min-width: 252px;
        color: white;
        font-size: 18px;
        min-height: 51px;
        display: flex;
        align-items: center;
        border-radius: 8px;

        justify-content: center;
        background-color: var(--red-color);
    }
    section.execution-client .back .remaining-time {
        color: white;
        min-height: 51px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        position: relative;
        font-size: 18px;
        flex: 1;
        padding: 0 15px !important;
        column-gap: 3rem;
        flex-wrap: wrap;
        background-color: var(--light-yellow);
    }
    section.execution-client .back .remaining-time .icon {
        display: flex;
        align-items: center;
        text-align: center;
        gap: 10px;
        position: absolute;
        left: 10px;
        font-size: 16px;
        top: 50%;
        transform: translateY(-50%);
    }
    section.execution-client .back .remaining-time .icon .hour {
        font-size: 14px;
    }
    section.execution-client .back .remaining-time .icon .hour > div {
        font-size: 20px;
        margin-bottom: -10px;
    }
    @media (max-width: 1199.98px) {
        section.execution-client .back .remaining-time .icon {
            display: flex;
            align-items: center;
            text-align: center;
            gap: 10px;
            position: unset;
            left: 20px;
            font-size: 16px;
            top: 50%;
            transform: translateY(0);
        }
    }

    section.execution-client .level-and-status {
        border: 1px solid #b0e1fc;
        border-radius: 11px;
        margin-bottom: 3rem;
        padding: 10px;
    }
    section.execution-client .status-parent {
        font-size: 18px;
        position: relative;
        color: var(--color-info);
        display: flex;
        margin-right: -65px;

        flex-direction: column;
        align-items: center;
    }
    section.execution-client .status-parent::before {
        font-size: 18px;
        content: "";
        height: 100%;
        width: 2px;
        left: 0;
        background-color: var(--light-blue-color);
        top: 0;
        position: absolute;
        color: var(--color-info);
    }
    section.execution-client .status-parent .status-child {
        margin-bottom: 1.5rem;
    }
    section.execution-client .status-parent .status {
        font-size: 12px;
        height: 26px;
        border-radius: 4px;
        display: inline-flex;
        align-items: center;
        line-height: 4;
        justify-content: center;
        color: white;
        margin-right: 5px;
        width: 83px;
        background-color: var(--light-blue-color);
    }
    section.execution-client .status-parent .status.open {
        background-color: var(--dark-green-color);
    }

    section.execution-client .status-parent .order-number span {
        color: var(--light-blue-color);
        margin-right: 5px;
    }
    @media (max-width: 1199.98px) {
        section.execution-client .status-parent {
            margin-right: 0;
        }
        section.execution-client .status-parent::before {
            font-size: 18px;
            content: "";
            width: 100%;
            height: 2px;
            left: 0;
            background-color: var(--light-blue-color);
            bottom: 0;
            top: unset;
            position: absolute;
            color: var(--color-info);
        }
    }
    section.execution-client ul.level {
        display: flex;
        position: relative;
        justify-content: space-between;
        height: 100%;
        align-items: center;
        text-align: center;

        width: 600px;
        min-height: 119px;
        margin: auto;
    }

    section.execution-client ul.level::before {
        content: "";
        position: absolute;
        transform: translateX(-50%);
        left: 50%;
        top: 22%;
        width: 80%;
        border-bottom-width: 3px;
        border-bottom-style: solid;
        border-image: linear-gradient(
                to left,
                var(--light-blue-color) 21%,
                transparent 21%
            )
            1;
    }
    section.execution-client ul.level::after {
        content: "";
        position: absolute;
        transform: translateX(-50%);
        left: 50%;
        top: 22%;
        width: 80%;
        border-bottom-width: 3px;
        border-bottom-style: dotted;
        z-index: -1;
        color: #8f8f8f;
    }
    section.execution-client ul.level li {
        color: #8f8f8f;
        font-size: 18px;
        height: 105px;
        width: 140px !important;
    }
    section.execution-client ul.level li.active {
        color: var(--light-blue-color);
    }
    section.execution-client ul.level .icon {
        height: 41px;
        position: relative;

        display: flex;
        align-items: center;
        justify-content: center;
        width: 41px;
        background-color: white;
        border-radius: 50%;
        margin: auto;
        margin-bottom: 15px;
        border: 3px solid #8f8f8f;
    }
    section.execution-client ul.level .icon svg {
        color: #8f8f8f;
    }
    section.execution-client ul.level .active .icon {
        border: 3px solid var(--light-blue-color);
    }
    section.execution-client ul.level .active .icon svg {
        color: var(--light-blue-color);
    }

    @media (max-width: 767.98px) {
        section.execution-client ul.level {
            width: 250px;
        }
        section.execution-client ul.level li {
            font-size: 12px !important;
            padding: 2px !important;
            width: 80px !important;
        }
        section.execution-client ul.level .icon {
            height: 25px;
            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;
            width: 25px;
            background-color: white;
            border-radius: 50%;
            margin: auto;
            margin-bottom: 15px;
            border: 3px solid #8f8f8f;
        }
        section.execution-client ul.level::before {
            top: 17% !important;
            width: 75% !important;
        }
        section.execution-client ul.level::after {
            top: 17% !important;
            width: 75% !important;
        }
    }
    section.execution-client .box-order {
        border-radius: 19px;
        background-color: var(--light-green-color);
        display: flex;
        padding: 20px;
        gap: 50px;
    }

    section.execution-client .box-order .duration {
        border: 0.5px solid var(--green-color-two) !important;
        color: var(--green-color-two) !important;
        display: flex;
        background-color: var(--color-green-bg) !important;
        padding: 5px 9px;
        border-radius: 5px;
        margin-right: 0 !important;
        align-items: center;
        gap: 2px;
    }
    section.execution-client .box-order .duration svg {
        color: var(--green-color-two) !important;
    }

    section.execution-client .box-order .setting {
        left: 0 !important;
        transform: translateY(-50%);
        top: 50% !important;
    }
    @media (max-width: 1199.98px) {
        section.execution-client .box-order .setting {
            left: 15px !important;
            transform: translateY(0);
            top: 15px !important;
        }
    }

    section.execution-client .box-order .info {
        text-align: center;
        margin-top: 86px;
        min-width: unset !important;
        position: unset !important;
    }
    @media (max-width: 1199.98px) {
        section.execution-client .box-order .info {
            margin-top: 0 !important;
        }
    }
    section.execution-client .text .file-parent p {
        font-size: 18px;
        font-weight: bolder;
        margin-bottom: 0;
    }

    section.execution-client .text .file-child {
        background: var(--color-green-bg);
        border: 0.5px solid var(--green-color-two);
        border-radius: 7px;
        padding: 10px;
        margin-top: 7px;
        display: block;
        max-width: fit-content;
        color: var(--green-color-two);
    }

    section.execution-client .box-order .title {
        margin-bottom: 1rem;
    }
    @media (max-width: 1199.98px) {
        section.execution-client .box-order {
            flex-direction: column;
            position: relative;
        }
    }

    section.execution-client .box-order .info .photo {
        overflow: hidden;
        width: 74px;
        height: 74px;
        background-color: white;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    section.execution-client .box-order .stars {
        margin-bottom: 10px;
    }
    section.execution-client .box-order .stars svg {
        font-size: 14px;
        color: var(--gold-color);
    }
    section.execution-client .box-order .name {
        color: var(--color-info);
        font-size: 18px;
        margin-bottom: 3px;
        font-weight: 600;
    }
    section.execution-client .box-order .job {
        color: var(--dark-green-color);
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 0;
    }
    section.execution-client .box-order .text {
        flex: 1;
    }
    section.execution-client .box-order .data {
        font-size: 14px;
        color: var(--color-info);
        margin-bottom: 1rem;
        position: relative;
    }
    section.execution-client .box-order .data .order-num {
        font-weight: bold;
    }

    section.execution-client .box-order .data .order-num .count {
        color: var(--light-blue-color);
    }
    section.execution-client .box-order .data svg {
        color: var(--light-blue-color);
        font-size: 16px;
        margin-left: 2px;
    }
    section.execution-client .box-order .duration {
        border: 0.5px solid var(--light-blue-color);
        color: var(--light-blue-color);
        display: flex;
        background-color: var(--light-green-two);
        padding: 5px 9px;
        border-radius: 5px;
        margin-left: 1.5rem;
        margin-right: 10px;
        align-items: center;
        gap: 2px;
    }
    @media (min-width: 1400px) {
        section.execution-client .box-order .duration {
            margin-right: 25px;
        }
    }
    section.execution-client .box-order .setting {
        left: 0;
        top: 20px;
        position: absolute;
    }

    section.execution-client .box-order .setting > svg {
        font-size: 20px;
        color: var(--color-info);
    }
    section.execution-client .box-order .setting > .report {
        border-radius: 3px;
        background-color: #eee;
        font-size: 14px;
        display: flex;
        align-items: center;
        position: absolute;
        right: -21px;
        min-width: 135px;
        box-shadow: #777 0 0 5px 0;
        bottom: calc(100% + 13px);
        color: var(--color-text);
        gap: 7px;
        transition: var(--main-transition);
        justify-content: center;
        transform: translateX(-30px);
        opacity: 0;
        pointer-events: none;
        padding: 5px 7px;
    }
    section.execution-client .box-order .setting:hover .report {
        transform: translateX(0);
        opacity: 1;
        pointer-events: unset;
    }
    section.execution-client .box-order .setting > .report::before {
        content: "";
        position: absolute;
        border-width: 10px;
        width: 0;
        height: 0;
        right: 12px;
        top: calc(100%);
        border-style: solid;
        border-color: #eee transparent transparent transparent;
    }
    section.execution-client .box-order .setting > .report > svg {
        color: var(--dark-red-color);
    }
    @media (max-width: 1199.98px) {
        section.execution-client .box-order .setting {
            left: 20px;
            top: 20px;
        }
        section.execution-client .box-order .data {
            position: unset;
        }
        section.execution-client .box-order .setting > .report {
            left: -21px;
            right: unset;
        }
        section.execution-client .box-order .setting > .report::before {
            left: 15px;
            right: unset;
        }
    }
    section.execution-client .box-order .title {
        font-weight: bold;
        color: var(--light-blue-color);
    }
    section.execution-client .box-order .content {
        max-width: 95%;
        font-size: 16px;
        line-height: 28px;
        margin-bottom: 0;
        color: var(--color-text);
    }
    @media (max-width: 991.98px) {
        section.execution-client .box-order .content {
            max-width: 100%;
            margin-bottom: 1rem;
        }
    }

    section.execution-client .box-order .group-btn .btn {
        border-radius: 5px;

        color: white;
        text-align: center;
        min-width: 170px;
        font-size: 16px;
        outline: none;
        font-weight: normal;
        border: none;
        padding: 11px;
    }
    section.execution-client .box-order .group-btn .btn.new {
        background-color: var(--green-new);
    }
    section.execution-client .box-order .group-btn .btn.negotiate {
        background-color: var(--light-blue-color);
    }
    section.execution-client .box-order .group-btn .btn.under-review {
        background-color: var(--yellow-color);
    }
    section.execution-client .box-order .group-btn .btn.finished {
        background-color: var(--red-color-two);
    }
    section.execution-client .box-order .group-btn .btn.offered-orders {
        background-color: var(--dark-grey-color);
    }
    section.execution-client .box-order .group-btn .btn.underway {
        background-color: var(--dark-green-three);
    }

    section.execution-client .options a {
        border: 1px solid #0491e8;
        border-radius: 18px;
        font-size: 18px;
        display: flex;
        justify-content: center;
        text-align: center;
        align-items: center;
        width: 100%;
        height: 118px;
        background-color: var(--light-green-color);
    }
    @media (max-width: 1199.98px) {
        section.execution-client .options a {
            width: 200px;
        }
    }
    section.execution-client .box-reply > .title {
        font-size: 18px;
        font-weight: bolder;
    }
    section.execution-client .box-reply > .box-order {
        background-color: var(--green-color-box);
    }
    section.execution-client .box-reply > .box-order .info {
        position: relative !important;
        padding-left: 50px;
        margin-top: 0;
    }
    section.execution-client .box-reply > .box-order .info::after {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;
        border-radius: 5px;
        background-color: #d8d8d8;
    }
    section.execution-client .box-reply > .box-order .text .data .deta {
        font-weight: bold;
        color: var(--green-color-two);
    }

    section.execution-client .box-reply > .box-order .text .content {
        max-width: 95%;
    }
    section.execution-client .box-send {
        border: 0.5px solid #0491e8;
        border-radius: 8px;
        padding: 25px 35px;
        display: flex;
        align-items: center;
        background-color: var(--light-green-color);
    }
    section.execution-client .box-send svg {
        color: #878787;
    }
    section.execution-client .box-send .icon-file {
        margin-left: 15px;
        cursor: pointer;
    }
    section.execution-client .box-send .icon-voice {
        margin-left: 25px;

        cursor: pointer;
    }
    section.execution-client .box-send form {
        flex: 1;
        display: flex;
        align-items: center;
    }
    section.execution-client .box-send input[type="text"] {
        background-color: transparent;
        padding: 0 10px;
        color: black;
        flex: 1;
        border: none;
        font-size: 18px;
    }
    section.execution-client .box-send input[type="text"] {
        background-color: transparent;
        padding: 0 10px;
        color: black;
        flex: 1;
        border: none;
        font-size: 18px;
    }
    section.execution-client .box-send .icon-bar {
        margin-left: 30px;

        cursor: pointer;
        font-size: 20px;
    }
    section.execution-client .box-send .send {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        font-size: 16px;
        position: relative;
        background-color: #0995eb;
        overflow: hidden;
        z-index: 1;

        color: white;
    }
    section.execution-client .box-send .send input {
        width: 100%;
        height: 100%;
        background-color: transparent;
        outline: none;
        border: none;
    }
    section.execution-client .box-send .send svg {
        position: absolute;
        left: 50%;
        color: white;
        font-size: 20px;
        z-index: -1;
        top: 50%;
        transform: translate(-50%, -50%);
    }
    section.execution-client .box-talks > .title {
        font-size: 18px;
        font-weight: bolder;
    }
    section.execution-client .box-talks > .box-order {
        background-color: var(--light-green-color);
        margin-bottom: 15px;
    }
    section.execution-client .box-talks > .box-order .info {
        position: relative !important;
        padding-left: 50px;
        margin-top: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    section.execution-client .box-talks > .box-order .info::after {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 4px;
        border-radius: 5px;
        background-color: #d8d8d8;
    }
    section.execution-client .box-talks > .box-order .text .data .deta {
        font-weight: bold;
        color: var(--light-blue-color);
    }

    section.execution-client .box-talks > .box-order .text .content {
        max-width: 95%;
    }
    section.execution-client .box-talks > .box-order.service-provider {
        background-color: var(--green-color-box);
    }
    section.execution-client
        .box-talks
        > .box-order.service-provider
        .text
        .data
        .deta {
        font-weight: bold;
        color: var(--green-color-two);
    }
    section.execution-client .box-talks > .box-order .text .files {
        display: flex;
        align-items: center;
        margin-top: 15px;
    }
    section.execution-client .box-talks > .box-order .text .files .file {
        background-color: white;
        border: 0.5px solid #0491e8;
        font-size: 12px;
        color: #0491e8;
        border-radius: 7px;
        padding: 7px 5px;
    }
    section.execution-client .box-talks > .box-order .text .files .file svg {
        color: #0491e8;
        font-size: 20px;
        margin-left: 5px;
    }
    section.execution-client .box-talks > .box-order .text .files .file:last-child {
        transform: translateX(40px);
    }
    /* End execution-client  */
    /* Start view-order */
    section.view-order ul.level::before {
        content: "";
        position: absolute;
        transform: translateX(-50%);
        left: 50%;
        top: 22%;
        width: 80%;
        border-bottom-width: 3px;
        border-bottom-style: solid;
        border-image: linear-gradient(
                to left,
                var(--light-blue-color) 50%,
                transparent 50%
            )
            1;
    }
    section.view-order .back .choose {
        background-color: #0491e8;
    }
    section.view-order .back .close {
        background-color: var(--red-color);
    }
    section.view-order .back .choose,
    section.view-order .back .close {
        min-width: 250px !important;
    }
    section.view-order .group-btn {
        gap: 1rem;
    }
    @media (min-width: 1200px) {
        section.view-order .group-btn {
            gap: 5rem;
        }
    }

    section.view-order .group-btn .btn {
        background: #0491e8;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        width: 180px;
        height: 50px;
    }
    section.view-order .group-btn .btn.btn-two {
        background-color: #048e81;
    }

    section.view-order .box-offer .add-offer {
        transform: translateX(100%);
        transition: 500ms;
    }

    section.view-order .box-offer .add-offer input[type="text"] {
        background-color: #f3f3f3;
        height: 50px;
        border-radius: 8px;
        outline: none;
        border-color: transparent;
    }
    section.view-order .box-offer .add-offer input[type="text"]:focus {
        border-color: var(--light-blue-color);
    }
    section.view-order .box-offer .add-offer textarea {
        background-color: #f3f3f3;
        height: 150px;
        padding: 15px;
        border-radius: 8px;
        border-color: transparent;
    }
    section.view-order .box-offer .add-offer textarea:focus {
        border-color: var(--light-blue-color);
    }
    section.view-order .box-offer .add-offer .add-file {
        position: relative;
    }
    section.view-order .box-offer .add-offer .add-file input {
        position: relative;
        border: none;
        width: 190px;
        height: 50px;
    }
    section.view-order .box-offer .add-offer .add-file .content-inp-file {
        position: absolute;
        width: 100%;
        left: 0;
        top: 0;
        height: 100%;
        background: #ecfffd 0% 0% no-repeat padding-box;
        border: 0.5px solid #048e81;
        border-radius: 12px;
        display: flex;
        padding: 0 15px;
        color: #048e81;
        align-items: center;
        justify-content: space-between;
    }

    section.view-order .box-offer .add-offer .add-file .content-inp-file svg {
        font-size: 20px;
    }
    section.view-order .box-offer .add-offer .parent-lable {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #707070;
    }
    section.view-order .box-offer .add-offer .parent-lable input {
        width: 5px;
        height: 5px;
        position: relative;
    }
    section.view-order .box-offer .add-offer .parent-lable input::before {
        content: "";
        position: absolute;
        width: 17px;
        height: 17px;
        left: 50%;
        background-color: white;
        cursor: pointer;
        top: 50%;
        transform: translate(-50%, -50%);
        border: 1px solid #707070;
    }
    section.view-order .box-offer .add-offer .parent-lable input::after {
        content: "\f00c";
        font-weight: 900;
        font-family: "Font Awesome 6 Free";
        position: absolute;
        color: #0491e8;
        font-size: 14px;
        left: 50%;
        cursor: pointer;
        visibility: hidden;
        top: 50%;
        transform: translate(-50%, -50%);
    }
    section.view-order .box-offer .add-offer .parent-lable input:checked::before {
        border: 1px solid #0491e8;
    }
    section.view-order .box-offer .add-offer .parent-lable input:checked:after {
        visibility: visible;
    }
    section.view-order .box-offer .add-offer .btn {
        background: #0491e8 0% 0% no-repeat padding-box;
        border-radius: 5px;
        color: white;
        width: 180px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    section.view-order .box-talks .box-order {
        padding-top: 5px;
        padding-bottom: 5px;
    }
    section.view-order .box-talks .box-order .info .job {
        color: var(--light-blue-color);
    }
    section.view-order .box-talks .box-order.service-provider {
        background-color: #e2f4ff;
    }
    section.view-order .box-talks .box-order.service-provider-2 {
        background-color: #e4f2f1;
    }
    section.view-order .box-talks .box-order.service-provider .info .job {
        color: var(--dark-green-color);
    }
    section.view-order .box-talks .box-order .text .data .item {
        font-size: 12px;
        background: #dffffc 0% 0% no-repeat padding-box;
        border: 0.5px solid #2b7b74;
        color: var(--dark-green-color);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 6px 9px;
        gap: 0.2rem;
        border-radius: 5px;
    }
    section.view-order .box-talks .box-order .text .data .item.price {
        background: #e3f5ff 0% 0% no-repeat padding-box;
        border: 0.5px solid #0995eb;
        color: var(--light-blue-color);
        border-radius: 5px;
    }

    @media (min-width: 1400px) {
        section.view-order .box-talks .box-order .text .content {
            max-width: 75%;
        }
    }
    section.view-order .box-talks .box-order .text .btns .btn {
        background: #0491e8 0% 0% no-repeat padding-box;
        border-radius: 5px;
        color: white;
        min-width: 115px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 33px;
    }
    section.view-order .box-talks .box-order .text .btns .btn.negotiate {
        background: #048e81 0% 0% no-repeat padding-box;
        border-radius: 5px;
    }
    section.view-order .box-talks .box-order .text .files {
        gap: 0.75rem;
    }
    section.view-order .box-talks .box-order .text .files .file:last-of-type {
        transform: translateX(0);
    }
    section.view-order .box-talks .box-order .text .btn.querie {
        background: #dffffc 0% 0% no-repeat padding-box;
        border: 0.5px solid #2b7b74;
        border-radius: 5px;
        color: #048e81;
        font-size: 14px;
        height: 35px;
        width: 100px;
    }

    /* End view-order */

    progress section.offers .back .icon-back-yellow {
        background-color: #ffc107;
    }

    .brd-l-w {
        border-left: 3px solid #ddd;
    }
    @media (max-width: 575.98px) {
        .brd-l-w {
            border-left: 0;
        }
        section.offers ul.level.level2 {
            width: 327px;
            align-items: start;
            margin-top: 20px;
            white-space: nowrap;
        }
        section.offers ul.level.level2 li {
            font-size: 10px !important;
        }
        section.offers ul.level.level2 li:first-child .icon:before {
            width: 80px;
        }
        section.offers ul.level.level2 li:nth-child(2) .icon:before {
            width: 60px;
        }
        section.offers ul.level.level2 li:nth-child(3) .icon:before {
            width: 60px;
        }
        section.offers ul.level.level2 li:nth-child(4) .icon:before {
            width: 60px;
        }
    }
    .on-hour {
        background-image: url("../img/one-hour.png");
        padding: 6px;
        background-size: contain;
        text-align: center;
        display: inline-block;
        margin-top: 5px;
        margin-bottom: -5px;
        font-size: 12px;
        background-repeat: no-repeat;
    }

    .bx-rr {
        color: #0995eb;
        text-align: center;
        border: 1px solid #0491e8;
        border-radius: 14px;
        padding: 17px 10px;
        background-color: #f4fbff;
        min-height: 78px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    section.offers .box-order .title {
        font-size: 18px;
    }
    .f-12 {
        font-size: 12px;
    }
    .f-13 {
        font-size: 13px;
    }
    .f-14 {
        font-size: 14px;
    }
    .f-16 {
        font-size: 16px;
    }

    .bl-f {
        border: 0.5px solid #0491e8 !important;
        color: #0491e8 !important;
        display: flex;
        background-color: #e5f5ff !important;
    }
    .red-f {
        border: 0.5px solid #ff3e3e !important;
        color: #ff3e3e !important;
        background-color: #ffd2d2 !important;
    }
    .text-black {
        color: #000 !important;
    }
    .line-bb {
        height: 2px;
        background-color: #0491e8;
        width: 100%;
        margin-top: -20px;
    }

    .trk > button {
        padding: 7px 57px 11px;

        font-size: 14px;
        border-radius: 7px;
        color: #fff !important;
        margin: 3px 10px;
    }
    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 880px;
            margin: 1.75rem auto;
        }
    }
    .liner-grd {
        background-image: linear-gradient(#048e81, #0491e8);
    }
    .meeting-btn {
        padding: 15px 35px;
        border-radius: 7px;
    }

</style>
@endpush
@section('title')
Profile
@endsection
@section('content')

<section class="web py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 back my-5 d-flex align-items-center justify-content-xl-end justify-content-center">
                <div class="row w-100 justify-content-end">
                    <div
                        class="col-xl-8 d-flex align-items-center justify-content-xl-end justify-content-center gap-4 flex-wrap"
                    >
                        <a href="{{route('front.orders.create')}}" class="btn">?????????? ??????</a>
                        <img src="{{asset('assets')}}/img/Group-logo.png" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-xl-4 r-bar text-center text-xl-end ps-xl-5">
                <div class="row parent-boxes">
                    <div class="col-xl-12 mb-5">
                        <div class="info text-center">
                            <div
                                class="d-flex justify-content-center align-items-center"
                            >
                            <div class="photo">
                            <div class="container-img">
                                <img
                                    src="{{asset('cloud/')}}/{{ $user->photo_profile }}"
                                    alt=""
                                />
                            </div>
                            <img
                                class="icon"
                                src="{{asset('assets')}}/img/done.svg"
                                alt=""
                            />
                        </div>
                        <div class="text">
                            <p class="name">{{ $user->name }}</p>
                            <p class="job">{{ optional($user->mainDepartment)->department_name_ar }} - {{ optional($user->subDepartment)->department_name_ar }}</p>
                            <p class="city">{{ optional($user->city)->name }}</p>
                            <p class="last-seen">
                                ?????? ??????????: {{date('Y-m-d', strtotime($user->last_seen))}} ????????????:
                                {{ date('h:i A', strtotime($user->last_seen)) }}
                            </p>
                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="sidebar">
                            <ul>
                                <li data-content="about-me" >
                                    <a href="">???????? ??????</a>
                                </li>
                                <li data-content="licenses">
                                    <a href="">????????????????</a>
                                </li>
                                <li data-content="executed-contracts">
                                    <a href="">???????? ??????????</a>
                                </li>
                                <li data-content="audio-consulting">
                                    <a href="">???????????????????? ??????????????</a>
                                </li>
                                <li data-content="qualifications">
                                    <a href=""
                                        >???????????????? ???????????????? ??????????????????</a
                                    >
                                </li>
                                <li data-content="specialization">
                                    <a href="">????????????</a>
                                </li>
                                <li data-content="my-articles">
                                    <a href="">??????????????</a>
                                </li>
                                <li
                                    class="active"
                                    data-content="performance-stats"
                                >
                                    <a href="">???????????????? ????????????</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Start about-me -->
                <div class="about-me main-content pt-5">
                    <h1 class="title mb-4">???????? ??????</h1>
                    <p>
                        {{ $user->bio }}
                    </p>
                    {{-- <div class="photo">
                        <img src="{{asset('cloud/')}}/{{ $user->photo_profile }}" alt="" />
                    </div> --}}
                </div>
                <!-- End about-me -->
                <!-- Start licenses -->
                <div class="licenses main-content pt-5">
                    <h1 class="title mb-4">????????????????</h1>
                    <p>
                        {{-- @foreach ($user->licenses as $userlicenses) --}}

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12">
                                    <b>{{trans('admin.id')}} :</b> {{$user->license_submitted->id}}
                                </div>
                                <div class="clearfix"></div>
                                
                    
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <b>{{trans('admin.license_name')}} :</b>
                                    {!! $user->license_submitted->license_name !!}
                                </div>
                    
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <b>{{trans('admin.comment')}} :</b>
                                    {!! $user->license_submitted->comment !!}
                                </div>
                    
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <b>{{trans('admin.license_file')}} :</b>
                                    @include("admin.show_image",["image"=>$user->license_submitted->license_file])
                                </div>
                                <!-- /.row -->
                            </div>
                        {{-- @endforeach --}}
                    </p>
                    <h1 class="title mb-4">?????????????? ????????????????</h1>
                    <p>
                        {{-- @foreach ($user->comericals as $usercommercials) --}}
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12">
                                    <b>{{trans('admin.id')}} :</b> {{$user->commercial_submitted->id}}
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <b>{{trans('admin.commercial_id')}} :</b>
                                    {!! $user->commercial_submitted->commercial_id !!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <b>{{trans('admin.commercial_end_at')}} :</b>
                                    {!! $user->commercial_submitted->commercial_end_at !!}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <b>{{trans('admin.comment')}} :</b>
                                    {!! $user->commercial_submitted->comment !!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <b>{{trans('admin.commercial_file')}} :</b>
                                    <a href="{{ it()->url($user->commercial_submitted->commercial_file) }}" target="_blank"><i class="fa fa-file-pdf"></i></a>
                                </div>
 
                                <!-- /.row -->
                            </div>
                        {{-- @endforeach --}}

                        
                    </p>
                    
                </div>
                <!-- End licenses -->
                <!-- Start executed-contracts -->
                <div class="executed-contracts main-content pt-5">
                    <h1 class="title mb-4">?????? ??????????</h1>
                    <p>
                        ???? ???????? ???????? ?????????? ??????
                    </p>
                    
                </div>
                <!-- End executed-contracts -->
                <!-- Start audio-consulting -->
                <div class="audio-consulting main-content pt-5">
                    <h1 class="title mb-4">???????????????????? ??????????????</h1>
                    <p>
                        ???? ???????? ???????????????? ?????????? ??????
                    </p>
                    
                </div>
                <!-- End audio-consulting -->
                <!-- Start qualifications -->
                <div class="qualifications main-content pt-5">
                    <h1 class="title mb-4">
                        ???????????????? ???????????????? ??????????????????
                    </h1>
                    <p>
                        @foreach ($user->occupations as $userexperiences)
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12">
                                    <b>{{trans('admin.id')}} :</b> {{$userexperiences->id}}
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <b>{{trans('admin.experience_name')}} :</b>
                                    {!! $userexperiences->experience_name !!}
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <b>{{trans('admin.comment')}} :</b>
                                    {!! $userexperiences->comment !!}
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <b>{{trans('admin.experience_file')}} :</b>
                    
                                    <a href="{{ it()->url($userexperiences->experience_file) }}" target="_blank"><i class="fa fa-file-pdf"></i></a>
                    
                                </div>
                               
                                <!-- /.row -->
                            </div>
                        @endforeach
                    </p>
                    
                </div>
                <!-- End qualifications -->
                <!-- Start specialization -->
                <div class="specialization main-content pt-5">
                    <h1 class="title mb-4">????????????</h1>
                    <p>
                        @foreach ($user->third_departments as $specialty)
                            <span>
                                {{ $specialty->department_name_ar }}
                            </span>
                        @endforeach
                    </p>
                    
                </div>
                <!-- End specialization -->
                <!-- Start my-articles -->
                <div class="my-articles main-content pt-5">
                    <h1 class="title mb-4">??????????????</h1>
                    <p>
                        ???? ???????? ???????????? ??????
                    </p>
                    
                </div>
                <!-- End my-articles -->
                <!-- Start performance stats -->
                <div class="performance-stats main-content pt-5">
                    <h1 class="title mb-5">???????????????? ????????????</h1>
                    <div class="mb-5">
                        <p class="mb-2">?????????????? ????????????</p>
                        <div class="d-flex align-items-center gap-2">
                            <div class="stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            (5)
                        </div>
                    </div>
                    <div class="mb-5">
                        <p class="mb-2">???????? ?????????? ????????????</p>
                        <div class="execution-rate progress" dir="ltr">
                            <div
                                class="progress-bar fw-normal"
                                role="progressbar"
                                style="width: 90%"
                                aria-valuenow="90"
                                aria-valuemin="0"
                                aria-valuemax="100"
                            >
                                90%
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <p class="mb-2">?????????? ???????? ????????</p>
                        <div class="response-speed progress" dir="ltr">
                            <div
                                class="progress-bar fw-normal"
                                role="progressbar"
                                style="width: 100%"
                                aria-valuenow="100"
                                aria-valuemin="0"
                                aria-valuemax="100"
                            >
                                5 ??????????
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <p class="mb-2">?????? ????????????</p>
                        <p class="num-contracts">(25) ?????? ????????</p>
                    </div>
                </div>
                <!-- End performance stats -->
            </div>
        </div>
    </div>
</section>

@endsection

@push('page_scripts')



    <script src="{{asset('assets')}}/js/all.min.js"></script>
    <script src="{{asset('assets')}}/js/web.js"></script>
    <script src="{{asset('assets')}}/js/bootstrap.bundle.min.js"></script>

    
@endpush

