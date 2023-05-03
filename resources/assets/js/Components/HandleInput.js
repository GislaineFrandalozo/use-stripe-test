import { FeedbackInput } from "./FeedbackInput";

export class HandleInput {
    constructor(input_name) {
        this.input_name = input_name;
    }

    feedbackError(message) {
        const div_name = document.querySelector('#div-' + this.input_name);
        const input_name = document.querySelector('#' + this.input_name);
        const feedback = new FeedbackInput('error', message).createHtml();
        div_name.insertBefore(feedback, input_name.nextSibling);
    }

    feedbackSucess(message) {
        const div_name = document.querySelector('#div-' + this.input_name);
        const input_name = document.querySelector('#' + this.input_name);
        const feedback = new FeedbackInput('success', message).createHtml();
        div_name.insertBefore(feedback, input_name.nextSibling);
    }
}