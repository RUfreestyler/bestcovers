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

document.getElementById('button-signin').onclick = async (event) =>
{
    event.preventDefault();
    let signinForm = document.getElementById('signinForm');

    let errorSpans = document.getElementsByClassName('error');

    for(const e of errorSpans)
    {
        e.innerHTML = "";
    }

    let response = await fetch('/validation-form/auth.php',
    {
        method: "POST",
        body: new FormData(signinForm)
    });

    if(response.ok)
    {
        let result = await response.text();

        if(result == "")
        {
            window.location.href = "/";
        }
        else
        {
            let resultJSON = JSON.parse(result);

            for (const key in resultJSON) 
            {
                document.getElementById(key).innerHTML = resultJSON[key];
            }
        }
    }
};

document.getElementById('button-signup').onclick = async (event) =>
{
    event.preventDefault();
    let signupForm = document.getElementById('signupForm');

    let errorSpans = document.getElementsByClassName('error');

    for (const e of errorSpans) {
        e.innerHTML = "";
    }

    let response = await fetch('/validation-form/check.php', 
    {
        method: "POST",
        body: new FormData(signupForm)
    });

    if(response.ok)
    {
        let result = await response.text();

        if(result == "")
        {
            window.location.href = "/";
        }
        else
        {
            let resultJSON = JSON.parse(result);

            for(const key in resultJSON)
            {
                document.getElementById(key).innerHTML = resultJSON[key];
            }
        }
    } 
};