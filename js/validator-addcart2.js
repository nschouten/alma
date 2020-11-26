document.addEventListener("DOMContentLoaded", function() {   
    var Validator = function(){
        var validator = this;
        validator.element = document.getElementById("addProdFormU");

        validator.element.addEventListener("submit", function(event){

            var error = false;
            var fg = document.getElementsByClassName("need");

            for(var i=0; i<fg.length; i++)
            {
                if(error)
                {
                    event.preventDefault();
                }

                var field = fg[i].querySelector("input");
                console.log(field);

                var fieldValue = field.value; 

                if(fieldValue == "")
                {
                    fg[i].classList.add("error");
                    error = true;
                } else {

                    fg[i].classList.remove("error");
                }
            }
        })
    }

    new Validator();
});
