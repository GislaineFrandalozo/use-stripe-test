import { FormCard } from "./Components/FormCard";
import { Auth } from "./Services/Auth";
import { Plan } from "./Services/Plan";
import { Profile } from "./Services/Profile";
/**
 * Account Settings - Account
 */

'use strict';



const user_update = document.querySelector('#user_update');
const user_logout = document.querySelector('#logout');


user_update.addEventListener('click', Profile.edit)

user_logout.addEventListener('click', Auth.logout)

if (cardButton.dataset.user !== "not_sub") {

  const form_card = new FormCard();
  form_card.mountElement();

  cardButton.addEventListener('click', checkout)


  async function checkout(event) {
    try {

      cardButton.disabled = true

      const cardVerified = await FormCard.validateCard(form_card.clientSecret, {
        payment_method: {
          card: form_card.cardElement,
          billing_details: { name: form_card.clientFullName }
        },
      })

      Plan.updateCard(cardVerified);

    } catch (error) {
      cardButton.disable = false
    }
  }

}