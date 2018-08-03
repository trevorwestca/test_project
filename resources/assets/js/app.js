
require('./bootstrap');

(function () {

    var form = document.querySelector('#save-profile'),
        submitButton = document.querySelector('#save-profile button'),
        errorList = document.querySelector('#form-errors'),
        op = XMLHttpRequest.prototype.open;

    //set token
    XMLHttpRequest.prototype.open = function() {
        var resp = op.apply(this, arguments);
        this.setRequestHeader('X-CSRF-Token', $('meta[name=csrf-token]').attr('content'));
        return resp;
    };

    console.log(submitButton);

    var req = new XMLHttpRequest();

    //handle results
    req.onreadystatechange = function() {
        if (req.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
            submitButton.disabled = false;
            if (req.status == 200) {
                alert('Profile saved.');
            }
            else if (req.status == 422) {

                var errors = JSON.parse(req.response);

                var ulHtml = '';
                for (var i = 0; i < errors.length; i++){
                    ulHtml += '<li class="error">'+errors[i]+'</li>';
                }

                errorList.innerHTML = ulHtml;

                alert('You have validation errors.');
            }
            else {
                alert('Something went wrong.');
            }
        }
    };

    //submit form
    form.onsubmit = function(e) {
        e.preventDefault();
        submitButton.disabled = true;

        var formData = JSON.stringify({
            first_name: document.querySelector('#first_name').value,
            last_name: document.querySelector('#last_name').value,
            email: document.querySelector('#email').value
        });

        req.open("POST", "/profile/save", true);
        req.setRequestHeader("Content-Type", "application/json");
        req.send(formData);
    };
})();