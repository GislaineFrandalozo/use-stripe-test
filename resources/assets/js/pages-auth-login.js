import { Auth } from "./Services/Auth";

/**
 * User Login
 */

'use strict';


const formLogin = document.getElementById("formUserCreate");

formLogin.addEventListener('click', Auth.login);

