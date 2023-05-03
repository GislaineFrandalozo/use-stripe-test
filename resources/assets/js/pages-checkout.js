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
  
        const cardVerified = await form_card.validateCard()
        
        Plan.sub(cardVerified);

    } catch (error) {
        cardButton.disable = false
    }
}