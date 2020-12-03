let cloneID= 100;
    function addrow(id){
        var clone=id+1;
        // jQuery("#"+id+"").clone().prop("id", clone).appendTo("body");
        div=document.createElement("div");
        input=document.createElement("input");
        button1=document.createElement("button");
        span=document.createElement("span");
        br = document.createElement("br");
        button1.innerHTML="Add";
        button1.setAttribute("id", "Add_"+clone);
        div.setAttribute("id",clone);
        document.getElementById("Add_"+id).innerHTML="Remove";
        document.getElementById("Add_"+id).setAttribute("id","Remove_"+id);
        span.append(button1);
        document.getElementById("Remove_"+id).setAttribute('onclick', 'removeRow( "'+id+'" )');
        button1.addEventListener("click",addrow2, false);
        button1.myParam = clone;
        div.append(input,span);
        
        // document.body.append(div,br);
        document.getElementById("form").append(div);
    }

    function addrow2(evt){
        var id= evt.currentTarget.myParam;
        addrow(id);
        
    }

    function removeRow(id){
        alert(id);
        jQuery("#" + id).css("display", "none");
        
    }