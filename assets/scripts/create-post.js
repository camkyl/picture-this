"use strict";

// Script previewing image before uploading it
document.querySelector(".jsfiles").onchange = function() {
  let reader = new FileReader();

  reader.onload = function(e) {
    // Get loaded data and render thumbnail.
    document.querySelector(".jsimage").src = e.target.result;
  };

  // Read the image file as a data URL.
  reader.readAsDataURL(this.files[0]);
};
 