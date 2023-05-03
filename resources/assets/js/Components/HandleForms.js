import { HandleInput } from "./HandleInput";

export class HandleForms {
    static printErrors(errors) {
        const keys = Object.keys(errors);
        keys.forEach((key) => {
            const error = errors[key];
            const name = key;
            const message = error[0];
            const feedback = new HandleInput(name);
            feedback.feedbackError(message);
        })

        
    }

}