document.addEventListener("DOMContentLoaded", function() {
    var submitButton = document.getElementById("submitBtn");
    submitButton.addEventListener("click", function(event) {
        event.preventDefault();

        var nameInput = document.getElementById("name").value;
        var gradeInput = document.getElementById("grade").value;
        var classroomInput = document.getElementById("classroom").value;

        if (nameInput !== "" && gradeInput !== "" && classroomInput !== "") {
            var message = "Data submitted successfully!\n";
            message += "Name: " + nameInput + "\n";
            message += "Grade: " + gradeInput + "\n";
            message += "Classroom: " + classroomInput;
            alert(message);
        } else {
            alert("Please fill in all the fields.");
        }
    });
});
