document.addEventListener('DOMContentLoaded', function () {
    createPageLoader();
    attachLoaderToLongForms();
});

function createPageLoader() {
    var overlay = document.createElement('div');
    overlay.id = 'page-loader-overlay';
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100%';
    overlay.style.height = '100%';
    overlay.style.backgroundColor = 'rgba(0,0,0,0.4)';
    overlay.style.display = 'none';
    overlay.style.zIndex = '9999';

    var spinner = document.createElement('div');
    spinner.style.position = 'absolute';
    spinner.style.top = '50%';
    spinner.style.left = '50%';
    spinner.style.transform = 'translate(-50%, -50%)';
    spinner.style.padding = '20px';
    spinner.style.backgroundColor = '#fff';
    spinner.style.borderRadius = '4px';
    spinner.style.boxShadow = '0 0 10px rgba(0,0,0,0.3)';
    spinner.style.fontFamily = 'sans-serif';
    spinner.style.textAlign = 'center';
    spinner.textContent = 'Processing...';

    overlay.appendChild(spinner);
    document.body.appendChild(overlay);
}

function showPageLoader() {
    var overlay = document.getElementById('page-loader-overlay');
    if (overlay) {
        overlay.style.display = 'block';
    }
}

function hidePageLoader() {
    var overlay = document.getElementById('page-loader-overlay');
    if (overlay) {
        overlay.style.display = 'none';
    }
}

/**
 * Attach loader ONLY to:
 * - Add Machine form
 * - Edit Machine form
 */
function attachLoaderToLongForms() {
    var forms = [];

    var addForm = document.querySelector('form[action="phpp/process_add_machine.php"]');
    if (addForm) forms.push(addForm);

    var editForm = document.querySelector('form[action="phpp/edit_process.php"]');
    if (editForm) forms.push(editForm);

    Array.prototype.forEach.call(forms, function (form) {
        form.addEventListener('submit', function (e) {
            if (e.defaultPrevented) {
                return;
            }
            showPageLoader();
        });
    });
}
