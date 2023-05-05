$(document).ready(function(){
    //animation
    
    $(".containerHeader, .containerCollapsed").addClass(`animated fadeInDown`)
    $("nav").addClass(`animated fadeInLeft`)
    $(".content").addClass(`animated fadeInUp`)
    $(".infoOrder").addClass(`animated fadeInRight`)
    $(".sidebar-item").on({
        mouseenter: function(){
            $(this).addClass('bg-dark');
        },
        mouseleave: function(){
            $(this).removeClass('bg-dark');
        }
    })
    
    //show all items to screen by getting from localStorage
    let cartItems = JSON.parse(localStorage.getItem("myCart"));
    let total=0;
    let totalItems=0;
    let shipping;

    function RenderItems(itemArr){
        //check if itemArr is empty
        if(itemArr.length == 0){
            shipping = 0;
        } else{
            let html ='';
            shipping = 100;
            //show every item row
            for(let i = 0; i < itemArr.length; i++){
                let id = itemArr[i].product.id;
                let img = itemArr[i].product.image;
                let name = itemArr[i].product.productName;
                let price = itemArr[i].product.price;
                let quantity = itemArr[i].quantity;
                let subtotal = price*quantity;
                html += `
                <tr class="orderItems">
                    <th scope="row">
                        <button class="btn btn-danger btn-sm m-1 border-0 px-2 btnDelItem" id="${id}">X</button>
                        <img src="${img}" alt="" class="me-2" width="60">
                        <span>${id}. ${name}</span>
                    </th>
                    <td class="align-middle">${price},- Kč</td>
                    <td class="align-middle">
                        <input type="number" name="Quantity" id="inputQuantity${id}" class="w-75 px-2 bg-dark text-white border border-dark rounded" value="${quantity}" min="1">
                    </td>
                    <td class="text-end align-middle" id="subtotal${id}">${subtotal},- Kč</td>
                </tr>`;
                
                $(`#inputQuantity${id}`).on("change", ()=>{
                    let temp = $(`#inputQuantity${id}`).val() * price; // dynamically calculate every change on certain input
                    $(`#subtotal${id}`).html(`${temp},- Kč`);
                        
                    totalItems = UpdateTotalItems();
                    $("#totalItemsValue").html(`${totalItems},- Kč`);

                    $("#totalValue").html(`${UpdateSummary()},- Kč`); 
                 }
                 );

            } //konec for loop
            $("tbody").html(html);
            
            $(".btnApply").html(`
                <button type="button" class="btn btn-success" id="btnAppChange">Apply Changes</button>
            `);
            $("#totalItemsValue").html(`${UpdateTotalItems()},- Kč`);
    
            $("#shippingValue").html(`${shipping},- Kč`);
    
            $("#totalValue").html(`${UpdateSummary()},- Kc`);
        }
    }
    
    // function CalcInputQuantityChange(id){
    //     // dynamically calculate subtotal after each change of input 
    //     // console.log($(`#inputQuantity${s}`).val());
    //     let temp = $(`#inputQuantity${id}`).val() * parseInt($(`.price${id}`.id)); 
    //     $(`#subtotal${id}`).html(`${temp},- Kč`);
            
    //     totalItems = UpdateTotalItems();
    //     $("#totalItemsValue").html(`${totalItems},- Kč`);

    //     $("#totalValue").html(`${UpdateSummary()},- Kč`); 
    // }

    function DelItem(id){
        //get selected item by id
        let item = cartItems.find(obj => {
            return obj.product.id == id;
        });
        //get index of selected item
        let indexRemove = cartItems.indexOf(item); 
        //if exists that item
        if(indexRemove > -1){
            cartItems.splice(indexRemove, 1);
        }
        // totalItems -= parseInt($(`#subtotal${id}`));
        localStorage.setItem("myCart", JSON.stringify(cartItems));

    }

    function UpdateTotalItems(){
        let table = $("#myTable tbody");
        //reset total for sure
        totalItems = 0;

        table.find('tr').each(function () {
            let $tds = $(this).find('td');
            let subtotalField = parseInt($tds.eq(2).text());

            totalItems += (subtotalField);
        });
        return totalItems;
    }

    function UpdateSummary(){
        return total = UpdateTotalItems() + shipping;
    }
    
    RenderItems(cartItems);
    //after rendering items
        //animation when hover
        $(".orderItems").on({
            mouseenter: function(){
                $(this).removeClass("text-white");
                $(this).addClass("text-warning");
                $(this).css("cursor", "pointer");
            },  
            mouseleave: function(){
                $(this).removeClass("text-warning");
                $(this).addClass("text-white");
            }
        })
        //interaction when delete clicked
        
        $(".btnDelItem").click(function(){
            DelItem(this.id);
            RenderItems(cartItems);
        });

        // $("#btnAppChange").click(function(){
        //     cartItems = JSON.parse(localStorage.getItem("myCart"));
        // });

})