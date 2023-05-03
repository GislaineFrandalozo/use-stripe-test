import axios from "axios";
import { HandleForms } from "../Components/HandleForms";


export class RequestServices {
    constructor(url) {
        this.url = url;
        this.service = axios;
    }

    post(data) {
        this.clearFeedbacks();

        this.service.post(this.url, data, { 
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content') } 
        })
            .then(this.handleSucess)
            .catch(this.handleErrors);

    }

    put(data) {
        this.clearFeedbacks();

        this.service.put(this.url, data, { 
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content') } 
        })
            .then(this.handleSucess)
            .catch(this.handleErrors);
    }

    handleSucess(response) {
        window.location.reload()
    }


    handleErrors(error) {
        const response = error.response;
        if (response.status == 422 && response.data?.errors) {
            const errors = response.data.errors;
            HandleForms.printErrors(errors);
        }
    }


    clearFeedbacks() {
        const elements = document.getElementsByClassName('feedback');

        while (elements.length > 0) {
            elements[0].parentNode.removeChild(elements[0]);
        }
    }

}