// function guidGenerator(){
//     var S4 = function() {
//         return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
//      };
//      return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
// }

// var Product = {
//     name: null,
//     price: null,
//     description: null,
//     variantTypes: {},
//     variantGrouping: []
// }

// var VariantEngine = function(){
//     var ve = this;

//     ve.addNewOptionBtn = document.getElementById("addVariantOption");
//     ve.listOfVariantOptionsContainer = document.querySelector(".variantsList");
//     ve.addOptionSet = document.getElementById("addOptionSet");
//     ve.optionSetContainer = document.getElementById("optionSetContainer");
//     ve.productName = document.getElementById("productName");
//     ve.productPrice = document.getElementById("productPrice");
//     ve.productDesc = document.getElementById("productDesc");
//     ve.productJSON = document.getElementById("productJSON");
//     ve.saveBtn = document.getElementById("saveBtn");
//     ve.load = document.getElementById("load");


//     ve.init = function(){

//     }

//     ve.redrawOptionGroups = function(){
//         ve.listOfVariantOptionsContainer.innerHTML = "";
        

//         for(randomIDKey in Product.variantTypes)
//         {
//             var whichGroup = Product.variantTypes[randomIDKey];
//             var optionString = Product.variantTypes[randomIDKey].options.toString();

//             var element = document.createElement("div");

//             element.innerHTML = `
//                 <div class="option" id="${randomIDKey}">
//                     <input type="radio">
//                     <div class="variant-handle">
//                         <input type="text" value="${Product.variantTypes[randomIDKey].name}" class="optionName" placeholder="Variant Name" name="variantOptionName">
//                         <input type="text" value="${optionString}" class="variantOptionValues" placeholder="Enter" name="variantOptionValues">
//                         <a href="#" data-id="${randomIDKey}">Delete</a>
//                     </div>
//                 </div>`;

//             ve.listOfVariantOptionsContainer.appendChild(element); 

//             //when you click on the "delete" button... do this.... 
//             element.querySelector("a").addEventListener("click", function(e){
//                 e.preventDefault(); 

//                 var whichID = this.getAttribute("data-id"); //find the specific group you want to delete using the data-id
//                 var whichOptionDiv = document.getElementById(whichID); // find it on the doc and assign this group to variable whichOptionDiv
//                 whichOptionDiv.parentElement.removeChild(whichOptionDiv); // remove element

//             })

//             //take the input field where you add variant (ie color, size, etc) and do this on keyup....
//             element.querySelector(".optionName").addEventListener("keyup", function(e){
//                 Product.variantTypes[randomIDKey].name = this.value; //for this product with this ID, assign the value to the name
//                 console.log(Product);
//             })

//             //take the input field where you add the variant types (ie red, green, small, large etc) and do this on keyup
//             element.querySelector(".variantOptionValues").addEventListener("keyup", function(e){
//                 var optionsValuesArray = this.value.split(",");
//                 Product.variantTypes[randomIDKey].options = optionsValuesArray;
//                 console.log(Product);
//             })

//         }
//     }

//     ve.redrawOptionMatrix = function(){

//         var element = document.createElement("div");
//         var html = "";

//         //for each variant type in the object "product" refer to as property and.... 
//         for(var property in Product.variantTypes)//this is how to loop with an object 
//         {
//             var theObject = Product.variantTypes[property]; 
//             var name = theObject.name; //take the name of the property and assign it to variable 
//             var setOptions = theObject.options;

//             html += `
//                 <select>
//                     <option>${name}</option>`;

//                 setOptions.forEach(option => {
//                     html += `
//                     <option>${option}</option>`;
//                 })
//                 html += `
//                 </select>`;
                
//         } 

//         html += `</select><input type="text" placeholder="Qty"/>`;

//         element.innerHTML = html;
//         ve.optionSetContainer.appendChild(element);

//     }

//     ve.load.addEventListener("click", function(){
//         console.log(ve.productJSON.value);

//         Product = JSON.parse(ve.productJSON.value); //we assign the JSON data to the Product value 

//         ve.redrawOptionMatrix();
//         ve.redrawOptionGroups();
//     })

//     ve.saveBtn.addEventListener("click", function(){
//         ve.productJSON.value = JSON.stringify(Product); //converts a JavaScript object or value to a JSON string
//     })

//     //input field where you name the product 
//     ve.productName.addEventListener("keyup", function(){
//         Product.name = this.value;
//     })

//     ve.productPrice.addEventListener("keyup", function(){
//         Product.price = this.value;
//     })

//     ve.productDesc.addEventListener("keyup", function(){
//         Product.description = this.value;
//     })

//     //button to add a variant group
//     //when you add a new variabt group, refresh the matrix 
//     ve.addOptionSet.addEventListener("click", function(e){
//         e.preventDefault();
//         ve.redrawOptionMatrix();
//     })

//     //button that adds a new variant 
//     ve.addNewOptionBtn.addEventListener("click", function(e){
//         e.preventDefault();
//         var randID = guidGenerator();

//         Product.variantTypes[randID] = {name: "", options: []}
//         ve.redrawOptionGroups();
//     })

//     ve.init();

// }

// new VariantEngine();