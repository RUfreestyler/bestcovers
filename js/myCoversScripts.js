document.getElementById('button-deletePost').onclick = (event) =>
{
    if(!confirm("Вы уверены что хотите удалить пост?"))
    {
        event.preventDefault();
    }
};