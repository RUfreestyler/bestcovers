document.getElementById('button-createPost').onclick = async (event) =>
{
    event.preventDefault();
    let addPostForm = document.getElementById('addPostForm');

    let errorSpans = document.getElementsByClassName('error');

    for(const e of errorSpans)
    {
        e.innerHTML = "";
    }

    let response = await fetch('/handlers/addPostHandler.php',
    {
        method: "POST",
        body: new FormData(addPostForm)
    });

    if(response.ok)
    {
        let result = await response.text();

        if(result == "")
        {
            window.location.href = "my-covers.php";
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