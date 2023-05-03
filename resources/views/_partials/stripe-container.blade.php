 <script>
  function checkCardButtonExist () {
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
  checkCardButtonExist();
  
  const STRIPE_KEY = cardButton.dataset.stripe;
 
  const stripe = Stripe(STRIPE_KEY);
  
</script>