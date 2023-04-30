/**
 * Account Settings - Account
 */

'use strict';

document.getElementById("formUserCreate").addEventListener('click', (e) => {
    e.preventDefault();
 
    const name = document.querySelector('#name').value;
    const last_name = document.querySelector('#last_name').value;
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#password').value;
   
    const formData = {
        name,
        last_name,
        email,
        password
    };
   
    console.log(formData);
    $.ajax({
        url: '/user',
        type: 'POST',
        data: formData,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
        },
        success: function(response) {
            window.location = '/checkout'
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});