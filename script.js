let cloneID= 100;
    function addrow(id){
       
        var clone=id+1;
        
        div=document.createElement("div");
        input=document.createElement("input");
        button1=document.createElement("button");
        span=document.createElement("span");
        br = document.createElement("br");
        button1.innerHTML="Add";
        button1.setAttribute("id", "Add_"+clone);
        button1.type = "button";
        div.setAttribute("id","div_"+clone);
        input.setAttribute("name","New_"+clone); 
        input.setAttribute("id",clone);
        document.getElementById("Add_"+id).innerHTML="Remove";
        document.getElementById("Add_"+id).classList.add("Removedata");
        document.getElementById("Add_"+id).setAttribute("id","Remove_"+id);
        document.getElementById("Remove_"+id).setAttribute('onclick', 'removeRow("'+id+'")');
        button1.addEventListener("click",addrow2, false);
        button1.myParam = clone;
        span.append(button1);
        div.append(input,span);
        document.getElementById("newData").append(div,br);
    }

    function addrow2(evt){
        var id= evt.currentTarget.myParam;
        addrow(id);
        
    }


    // jQuery('button.Removedata').click(function() { 
    //     var id = $(this).attr('id');
    //    console.log(id);
    //     return false; 
    // });
    function removeRow(id){
        
         jQuery("#div_" + id).css("display", "none");
        let name= jQuery("#" + id).attr('name');
        console.log(name);
        var array = name.split("_"); 
        console.log(array[1]);
        document.getElementById(id).setAttribute("name","Remove_"+array[1]);
        
    }