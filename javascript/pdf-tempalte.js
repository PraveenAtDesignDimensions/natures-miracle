window.addEventListener("load", function () {

    //recipe_name
    let recipe_name = document.getElementsByClassName("title-post")[0].innerText;
    document.getElementById("tempalte_name").value = recipe_name;

    // recipe_img
    let recipe_img = document.getElementsByClassName("recipe-image")[0].src;
    document.getElementById("tempalte_img").value = recipe_img;

    // recipe_data
    let recipe_data = document.getElementsByClassName("post")[0].innerHTML;
    document.getElementById("tempalte").value = recipe_data;

    //console.log(recipe_name)
    //console.log(recipe_img)
    //console.log(recipe_data)
    //console.log("Page Loded")
    
})