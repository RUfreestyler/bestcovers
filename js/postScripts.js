function $_GET(key) {
    var p = window.location.search;
    p = p.match(new RegExp(key + '=([^&=]+)'));
    return p ? p[1] : false;
}

function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

document.getElementById('button-like').onclick = async (event) =>
{
    event.preventDefault();

    if(getCookie('client') === undefined)
    {
        return;
    }

    let button = document.getElementById('button-like');
    let formData = new FormData();
    formData.append("postId", $_GET('id'));

    if(button.classList.contains("button-liked"))
    {
        button.classList.remove('button-liked');
        formData.append("action", "dec");
    }
    else
    {
        button.classList.add('button-liked');
        formData.append("action", "inc");
    }

    let response = await fetch("handlers/likePostHandler.php",
    {
        method: "POST",
        body: formData
    });

    if(response.ok)
    {
        let result = await response.json();

        document.getElementById('num-likes').innerHTML = result.numLikes;    
    }
};