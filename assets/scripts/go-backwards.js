"use strict";

const back = document.querySelector(".go-backwards");

back.addEventListener("click", function() {
    history.back(-1);
});
