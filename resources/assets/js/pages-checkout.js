/**
 * User checkout
 */

'use strict';


const elements = stripe.elements();
const cardElement = elements.create('card');
const cardButton = document.getElementById('card-button');
const clientSecret = cardButton.dataset.secret;
const clientFullName = cardButton.dataset.fullName;

cardElement.mount('#card-element');

cardButton.addEventListener('click', async (e) => {

    cardButton.disabled = true
    const { setupIntent, error } = await stripe.confirmCardSetup(
        clientSecret, {
        payment_method: {
            card: cardElement,
            billing_details: { name: clientFullName }
        },
    }
    );

    if (error) {
        // Display "error.message" to the user...
        cardButton.disable = false
        console.log(error)
    } else {
        // The card has been verified successfully...
        $.ajax({
            url: '/checkout',
            type: 'POST',
            data: setupIntent,
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
    }
});
