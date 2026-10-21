document.addEventListener('DOMContentLoaded', function () {
    setupLoginValidation();
    setupAddMachineValidation();
    setupEditMachineValidation();
});

/**
 * System Login page validation
 */
function setupLoginValidation() {
    if (document.title.indexOf('System Login') === -1) {
        return;
    }
    var form = document.querySelector('form');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        var username = form.querySelector('input[name="username"]');
        var password = form.querySelector('input[name="password"]');
        var errors = [];

        if (username && username.value.trim() === '') {
            errors.push('Username is required.');
        }
        if (password && password.value.trim() === '') {
            errors.push('Password is required.');
        }

        if (errors.length > 0) {
            e.preventDefault();
            alert(errors.join('\\n'));
        }
    });
}

/**
 * Add Machine page validation
 */
function setupAddMachineValidation() {
    var form = document.querySelector('form[action="phpp/process_add_machine.php"]');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        var customerName = form.querySelector('input[name="customer_name"]');
        var serialNumber = form.querySelector('input[name="serial_number"]');
        var faultDescription = form.querySelector('input[name="fault_description"]');
        var errors = [];

        if (customerName && customerName.value.trim() === '') {
            errors.push('Customer name is required.');
        }
        if (serialNumber && serialNumber.value.trim() === '') {
            errors.push('Serial number is required.');
        }
        if (faultDescription && faultDescription.value.trim() === '') {
            errors.push('Fault description is required.');
        }

        if (errors.length > 0) {
            e.preventDefault();
            alert(errors.join('\\n'));
        }
    });
}

/**
 * Edit Machine page validation
 */
function setupEditMachineValidation() {
    var form = document.querySelector('form[action="phpp/edit_process.php"]');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        var customerName = form.querySelector('input[name="customer_name"]');
        var serialNumber = form.querySelector('input[name="serial_number"]');
        var errors = [];

        if (customerName && customerName.value.trim() === '') {
            errors.push('Customer name is required.');
        }
        if (serialNumber && serialNumber.value.trim() === '') {
            errors.push('Serial number is required.');
        }

        if (errors.length > 0) {
            e.preventDefault();
            alert(errors.join('\\n'));
        }
    });
}
