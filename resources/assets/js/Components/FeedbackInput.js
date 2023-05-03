export class FeedbackInput{
    constructor(status, message) {
        this.STATUS_TYPE = {
            'error' : 'danger',
            'success' : 'success',
        }
        if (!Object.keys(this.STATUS_TYPE).includes(status)) {
            throw new Error('This status does not exist.');
          }
          this.status = this.STATUS_TYPE[status];
        this.message = message;
    }

    createHtml() {
        const feedback_html = document.createElement("p");
        const text = document.createTextNode(this.message);

        feedback_html.setAttribute("class", "feedback m-0 pt-1 px-3 order-3 text-" + this.status);
        feedback_html.appendChild(text);
        
        return feedback_html
    }
}