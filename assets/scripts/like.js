"use strict";

const likeButton = document.querySelector(".like-button");

//Toggles image source on click
likeButton.addEventListener("click", function() {
  // Variable storing image source
  let imgsrc = document.getElementById("heart").src;

  // Check if image is found. -1 means not found
  if (imgsrc.indexOf("/views/icons/heart.svg") != -1) {
    document.getElementById("heart").src = "/views/icons/liked.svg";
  } else {
    document.getElementById("heart").src = "/views/icons/heart.svg";
  }
});

// likeButton.addEventListener("click", function() {
//   const img1 = "/views/icons/heart.svg";
//   const img2 = "/views/icons/liked.svg";

//   let imgElement = document.getElementById("heart");

//   if (imgElement.src === img1) {
//     imgElement.src = img2;
//   } else {
//     imgElement.src = img1;
//   }
// });
