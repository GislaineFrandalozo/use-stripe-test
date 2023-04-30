/**
 * Account Settings - Account
 */

'use strict';


const user_update = document.querySelector('#user_update');
const user_logout = document.querySelector('#logout');


const setHeader = function(xhr) {
  xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
};


const reloadPage = function(response) {
  window.location.reload()
};


user_update.addEventListener('click', (e) => {
  e.preventDefault();
  const email = document.querySelector('#email').value;
  const first_name = document.querySelector('#name').value;
  const last_name = document.querySelector('#last_name').value;
  
  const formData = {
      'name': first_name,
      last_name,
      email,
  };


  console.log(formData)
  $.ajax({
    url: '/user/' + user_update.dataset.indexNumber,
    type: 'PUT',
    data: formData,
    beforeSend: setHeader,
    success: reloadPage,
    error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
    }
  });

})


user_logout.addEventListener('click', (e) => {

  $.ajax({
    url: '/auth/logout',
    type: 'POST',
    beforeSend: setHeader,
    success: reloadPage,
    error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
    }
  });

})


