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

if(document.getElementById('button-sendComment') !== null)
{
    document.getElementById('button-sendComment').onclick = async (event) =>
    {
        event.preventDefault();
    
        let sendCommentForm = document.getElementById('sendCommentForm');
        let formData = new FormData(sendCommentForm);
        formData.append("postId", $_GET('id'));
    
        let errorSpans = document.getElementsByClassName('error');
    
        for(const e of errorSpans)
        {
            e.innerHTML = "";
        }
    
        let response = await fetch("handlers/sendCommentHandler.php",
        {
            method: "POST",
            body: formData
        });
    
        if(response.ok)
        {
            let result = await response.json();
    
            if(result.commentErr)
            {
                for (const key in result) 
                {
                    document.getElementById(key).innerHTML = result[key];
                }  
            }
            else
            {
                let comment = document.createElement('div');
                comment.classList.add('post_comment');
                comment.innerHTML = "<div class=\"comment_author\">" + result.comment_author +"</div>" +
                                    + "<div class=\"comment_text\">" + result.comment_text + "</div>" +
                                    + "<div class=\"comment_date\">" + result.comment_date + "</div>";
                document.getElementById('post_comments').prepend(comment);
            }
        }
    };
}