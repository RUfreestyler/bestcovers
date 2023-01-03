let signUpForm = document.getElementById('signupForm');
let signInForm = document.getElementById('signinForm');
signUpForm.hidden = true;

let signInSwitcher = document.getElementById('signinSwitcher');
let signUpSwitcher = document.getElementById('signupSwitcher');
signInSwitcher.style.color = "#ef5627";
signUpSwitcher.style.color = "#9d919a";

signInSwitcher.onclick = function(){
    signInForm.hidden = false;
    signUpForm.hidden = true;
    signInSwitcher.style.color = "#ef5627";
    signUpSwitcher.style.color = "#9d919a";
};

signUpSwitcher.onclick = function(){
    signInForm.hidden = true;
    signUpForm.hidden = false;
    signInSwitcher.style.color = "#9d919a";
    signUpSwitcher.style.color = "#ef5627";
};


