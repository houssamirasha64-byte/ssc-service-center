document.addEventListener('DOMContentLoaded', function () {
    setupDeleteConfirmation();
});

function setupDeleteConfirmation() {
    var deleteForms = document.querySelectorAll('form[action="phpp/delete.php"]');
    if (!deleteForms) return;

    Array.prototype.forEach.call(deleteForms, function (form) {
        form.addEventListener('submit', function (e) {
            var ok = confirm('Are you sure you want to permanently delete this machine?');
            if (!ok) {
                e.preventDefault();
            }
        });
    });
}
