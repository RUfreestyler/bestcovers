document.getElementById('button-save').onclick = async (event) =>
{
    event.preventDefault();

    let changeDataForm = document.getElementById('changeDataForm');

    let errorSpans = document.getElementsByClassName('error');
    
    for(const e of errorSpans)
    {
        e.innerHTML = "";
    }

    let response = await fetch("handlers/updateUser.php",
    {
        method: "POST",
        body: new FormData(changeDataForm)
    });

    if(response.ok)
    {
        let result = await response.text();

        if(result != "")
        {
            let resultJSON = JSON.parse(result);

            for (const key in resultJSON) 
            {
                document.getElementById(key).innerHTML = resultJSON[key];
            }  
            return;
        }

        alert("Ваши данные изменены.");
    }
    else
    {
        alert("Произошла какая-то ошибка");
    }
};