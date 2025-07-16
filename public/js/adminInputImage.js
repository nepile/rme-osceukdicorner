document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll(".toggle-image-checkbox");

    checkboxes.forEach(function (checkbox) {
        const container =
            checkbox.closest(".form-check").previousElementSibling;
        const inputFile = container.querySelector(".subquestion-image");

        function toggleImageInput() {
            if (checkbox.checked) {
                container.style.display = "block";
                inputFile.setAttribute("required", "required");
            } else {
                container.style.display = "none";
                inputFile.removeAttribute("required");
            }
        }

        toggleImageInput();
        checkbox.addEventListener("change", toggleImageInput);
    });
});
