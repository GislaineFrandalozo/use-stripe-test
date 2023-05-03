<script src="https://js.stripe.com/v3/"></script>
 
<script>
  function cardButtonExist () {
    if(!cardButton){
      cardButton = {
        dataset: {
          stripe: "xxxx", 
          user: "not_sub"
        }
      };
    }
  }
  let cardButton = document.getElementById('card-button');
  cardButtonExist();
  
  const STRIPE_KEY = cardButton.dataset.stripe;
 
  const stripe = Stripe(STRIPE_KEY);
  
</script>