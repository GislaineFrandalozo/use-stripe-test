/**
 * User Login
 */

'use strict';


document.getElementById("formUserCreate").addEventListener('click', (e) => {
    e.preventDefault();

    const email = document.querySelector('#email').value;
    const password = document.querySelector('#password').value;

    const formData = {
        email,
        password
    };

    $.ajax({
        url: '/auth',
        type: 'POST',
        data: formData,
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        },
        success: function (response) {
            window.location.reload()
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});