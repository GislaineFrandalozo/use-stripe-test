import { Auth } from "./Services/Auth";

/**
 * User Register
 */

'use strict';

const formRegister = document.getElementById("formUserCreate")

formRegister.addEventListener('click', Auth.register);
