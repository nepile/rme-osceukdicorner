document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll(".toggle-image-checkbox");

    checkboxes.forEach(function (checkbox) {
        const container =
            checkbox.closest(".form-check").previousElementSibling;

        function toggleImageInput() {
            if (checkbox.checked) {
                container.style.display = "block";
            } else {
                container.style.display = "none";
            }
        }

        // Panggil saat load pertama
        toggleImageInput();

        // Pasang event listener
        checkbox.addEventListener("change", toggleImageInput);
    });
});
