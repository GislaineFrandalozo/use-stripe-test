import { RequestServices } from "./RequestServices";

export class Profile {
  static edit(event) {
    event.preventDefault();

    const user_id = this.dataset.indexnumber;
    const email = document.querySelector('#email').value;
    const first_name = document.querySelector('#name').value;
    const last_name = document.querySelector('#last_name').value;

    const formData = {
      'name': first_name,
      last_name,
      email,
    };
    const request = new RequestServices('/user/' + user_id);
    request.put(formData);
  }
}