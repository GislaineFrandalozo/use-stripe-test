export class FormCard {
    constructor() {
        this.elements = stripe.elements();
        this.cardElement = this.elements.create('card');
        this.clientFullName = cardButton.dataset.fullname;
        this.clientSecret = cardButton.dataset.secret;
        this.data = {};
    }

    mountElement() {
        this.cardElement.mount('#card-element');
    }

    static async validateCard(clientSecret , clienConfig) {
        const { setupIntent, error } = await stripe.confirmCardSetup(clientSecret, clienConfig)
        if(error){
            throw new Error('stripe confirmCardSetup error');
        }else{
            return setupIntent;
        }
       
    }

}