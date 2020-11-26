var deletes = document.getElementsByClassName("deleteBtn");
for(var i=0; i<deletes.length; i++)
{
    deletes[i].addEventListener("click", function(event){
        var shouldWeDelete = confirm("Are you sure you want to delete this item?");
        if(!shouldWeDelete)
        {
            event.preventDefault();
        }
    })
}