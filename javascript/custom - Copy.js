    var State_Name = [];

    for (var i = 0; i < Store_Data.length; i++) {
        // push to arry
        State_Name.push(Store_Data[i].State);
    }
    let unique_State = [...new Set(State_Name)];
    for (var i = 0; i < unique_State.length; i++) {
        var State_option = document.createElement("option");    
        State_option.innerHTML = unique_State[i];
        State_option.value = unique_State[i];
        document.getElementById("citychacker").appendChild(State_option);
    }
  
    function citychack(){
        let City_Name = [];
        $(document).ready(function(){
              $(".Cities").remove();
          });
        for (var i = 0; i < Store_Data.length; i++) {
            if(document.getElementById("citychacker").value == Store_Data[i].State){
            City_Name.push(Store_Data[i].City);
            }
        }
        let unique_City = [...new Set(City_Name)];
        for(var i = 0; i < unique_City.length; i++){
        var City_option = document.createElement("option");    
        City_option.innerHTML = unique_City[i];
        City_option.value = unique_City[i];
        City_option.classList.add("Cities");
        document.getElementById("storechacker").appendChild(City_option);
        }                        	
    }

    function storechack(){
        $(document).ready(function(){
              $(".Stores").remove();
          });
        for (var i = 0; i < Store_Data.length; i++) {
        if(document.getElementById("storechacker").value == Store_Data[i].City){
        var Store_option = document.createElement("option");    
        Store_option.innerHTML = Store_Data[i].Store;
        Store_option.value = Store_Data[i].Id;
        Store_option.classList.add("Stores");
        document.getElementById("stores").appendChild(Store_option);
        }
    }
}

function Get_store(){
    
    var Key = document.getElementById("stores").value;
    document.getElementById("add").src = Store_Data[Key].Map;
    
    setTimeout(function(){ 
    document.getElementById("store-name").innerHTML = Store_Data[Key].Store;
    document.getElementById("store-address").innerHTML = Store_Data[Key].Address;
     }, 1000);
}

/// --- --- email check --- --- /// --- ---  email check --- --- ///


