$(document).ready(function(){
    $('#updateStudentModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const studentId = button.data('student-id');
        const studentLastName = button.data('last-name');
        const studentFirstName = button.data('first-name');
        const prelim = button.data('prelim');
        const midterm = button.data('midterm');
        const finals = button.data('finals');

        const modal = $(this);
        modal.find('#student-id').val(studentId);
        modal.find('#last-name').val(studentLastName);
        modal.find('#first-name').val(studentFirstName);
        modal.find('#prelim').val(prelim);
        modal.find('#midterm').val(midterm);
        modal.find('#finals').val(finals);

    });

    $('#deleteStudentModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget); // Button that triggered the modal
        const studentId = button.data('student-id');
        const studentLastName = button.data('last-name');
        const studentFirstName = button.data('first-name');

        const modal = $(this);
        modal.find('#student-id').val(studentId);
        modal.find('#last-name').val(studentId);
        modal.find('#first-name').val(studentId);
        modal.find('#delete-message').text(`Are you sure you want to delete this student named "${studentFirstName} ${studentLastName}"? This cannot be undone.`); // Add this line
    });

    $(document).ready(function(){
        $("#searchStudent").on("keyup", function() {
            var search = $(this).val();
            $.ajax({
                url: '', // Leave the URL empty to send the request to the same page
                type: 'POST',
                data: {searchStudent: search},
                success: function(data) {
                    // Update the table with the search results
                    $("#user-container").html(data);

                    applyRandomColor();
                }
            });

        });
    });

    document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.key === 'p' ||
            event.ctrlKey && event.key === 's' ||
            event.key === 'F1' || event.key === 'F6' ||
            event.key === 'F7' || event.key === 'F10') {
            event.preventDefault();
        }
    });
});

function generateRandomColor() {
    var red = Math.floor(Math.random() * 156);
    var green = Math.floor(Math.random() * 156);
    var blue = Math.floor(Math.random() * 156);
    return 'rgb(' + red + ', ' + green + ', ' + blue + ')';
}

document.addEventListener('DOMContentLoaded', function() {
    var profileIcons = document.getElementsByClassName('profile-icon');

    for (var i = 0; i < profileIcons.length; i++) {
        profileIcons[i].style.backgroundColor = generateRandomColor();
    }
});

function applyRandomColor() {
    var profileIcons = document.getElementsByClassName('profile-icon');

    for (var i = 0; i < profileIcons.length; i++) {
        // Apply a random color to the background of the current element
        profileIcons[i].style.backgroundColor = generateRandomColor();
    }
}