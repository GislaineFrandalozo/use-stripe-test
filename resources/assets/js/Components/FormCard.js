export class FormCard {
    constructor() {
        this.elements = stripe.elements();
        this.clientFullName = cardButton.dataset.fullname;
        this.clientSecret = cardButton.dataset.secret;
        this.cardElement = this.elements.create('card');
        this.billingDetails = { address: {} };
    }

    mountElement() {

        this.cardElement.mount('#card-element');

        const addressElement = this.elements.create('address', {
            mode: "billing",
            defaultValues: {
                name: this.clientFullName,
            },
        });

        this.cardElement.mount('#card-element');
        addressElement.mount('#address-element')

        addressElement.on('change', (event) => {
            if (event.complete) {

                const address = event.value.address;

                this.billingDetails = { address };
            }
        })
    }

    async validateCard() {
        const config = {
            payment_method: {
                card: this.cardElement,
                billing_details: this.billingDetails,
            }
        }

        const { setupIntent, error } = await stripe.confirmCardSetup(this.clientSecret, config)

        if (error) {
            console.log(error)
            throw new Error('stripe confirmCardSetup error');
        } else {
            return setupIntent;
        }

    }

}