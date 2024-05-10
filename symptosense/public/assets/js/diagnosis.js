$(document).ready(function () {
    // Open the modal when the "Lihat Hasil Gejala" button is clicked
    $("#lihatHasilModal").on("shown.bs.modal", function () {
        // Set focus on the first input field
        $("#gejala1").focus();
    });

    $("#submitForm").submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Get the form data
        var gejala1 = $("#gejala1").val();
        var gejala2 = $("#gejala2").val();
        var gejala3 = $("#gejala3").val();

        // Send AJAX request to Flask endpoint
        $.ajax({
            url: "/submit",
            type: "POST",
            data: { gejala1: gejala1, gejala2: gejala2, gejala3: gejala3 },
            success: function (result_text) {
                $("#result").html(result_text); // Put the result in the modal
                $("#lihatHasilModal").modal("show"); // Show the modal
            },
            error: function (error) {
                console.log("Error:", error);
            },
        });
    });
});
