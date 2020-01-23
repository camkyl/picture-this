const commentButtons = document.querySelectorAll(".comment-buttons");

commentButtons.forEach(button => {
    button.addEventListener("click", () => {
        console.log("hello");
    });
});
