"use strict";
function removeUl() {
  const ulReviewList = document.querySelector(".review-list-adm");
  if (ulReviewList.childElementCount < 1) {
    ulReviewList.remove();
  }
}
removeUl();
