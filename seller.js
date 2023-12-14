// script.js
document.addEventListener("DOMContentLoaded", function () {
    const propertyForm = document.getElementById("propertyForm");

    propertyForm.addEventListener("submit", function (event) {
        event.preventDefault();
        const formData = new FormData(propertyForm);
        // You can now send formData to your server for processing
        console.log(formData);
    });
});
