document.querySelectorAll(".btn-verif").forEach(function (button) {
    button.addEventListener("click", function () {
        var modal = bootstrap.Modal.getOrCreateInstance(
            document.getElementById("detail")
        );

        // Get the data from the current row
        var row = this.closest("tr");
        var namaPasien = row.querySelector("td:nth-child(2)").textContent;
        var idDiagnosis = row.querySelector("td:nth-child(3)").textContent;
        var hasilDiagnosis = row.querySelector("td:nth-child(4)").textContent;
        var diagnosisDokter = row.querySelector("td:nth-child(5)").textContent;
        var gejalaList = JSON.parse(
            row.querySelector("td:nth-child(5)").dataset.gejala
        );

        // Update the modal content with the data
        modal._element.querySelector("#nama").value = namaPasien;
        modal._element.querySelector("#id_diagnosis").value = idDiagnosis;
        modal._element.querySelector("#hasil_diagnosis").value = hasilDiagnosis;
        modal._element.querySelector("#diagnosis_dokter").value =
            diagnosisDokter;
        var complaintList = modal._element.querySelector(
            ".complaint-list .list-group"
        );
        complaintList.innerHTML = "";
        gejalaList.forEach(function (gejala) {
            var listItem = document.createElement("a");
            listItem.href = "#";
            listItem.classList.add("list-group-item");
            listItem.textContent = gejala;
            complaintList.appendChild(listItem);
        });

        modal.show();
    });
});
