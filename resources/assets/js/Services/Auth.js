import { RequestServices } from "./RequestServices";

export class Auth {
    static login(event) {
        event.preventDefault();

        const email = document.querySelector('#email').value;
        const password = document.querySelector('#password').value;

        const formData = {
            email,
            password
        };

        const request = new RequestServices('/auth');
        request.post(formData);
    }


    static register(event) {
        event.preventDefault();

        const name = document.querySelector('#name').value;
        const last_name = document.querySelector('#last_name').value;
        const email = document.querySelector('#email').value;
        const password = document.querySelector('#password').value;

        const formData = {
            name,
            last_name,
            email,
            password
        };

        const request = new RequestServices('/user');
        request.post(formData);
    }


    static logout(event) {
        event.preventDefault();
        const request = new RequestServices('/auth/logout');
        request.post({});
    }
}