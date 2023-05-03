import { RequestServices } from "./RequestServices";

export class Plan {
    static sub(cardVerified) {
        const request = new RequestServices('/checkout');
        request.post(cardVerified);
    }

    static updateCard(cardVerified) {
        const request = new RequestServices('/checkout');
        request.put(cardVerified);
    }
}