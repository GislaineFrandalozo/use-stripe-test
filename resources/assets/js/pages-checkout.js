import { FormCard } from "./Components/FormCard";
import { Plan } from "./Services/Plan";

/**
 * User checkout
 */

'use strict';



const form_card = new FormCard();
form_card.mountElement();

cardButton.addEventListener('click', checkout);

async function checkout() {
    try {

        cardButton.disabled = true

        const cardVerified = await FormCard.validateCard(form_card.clientSecret, {
            payment_method: {
                card: form_card.cardElement,
                billing_details: { name: form_card.clientFullName }
            },
        })

        Plan.sub(cardVerified);

    } catch (error) {
        cardButton.disable = false
    }
}