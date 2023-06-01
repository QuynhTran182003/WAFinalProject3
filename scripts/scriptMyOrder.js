// import { Item } from './scriptOrderPg.js';
// import { products } from './scriptOrderPg.js';
import { products} from "./scriptOrderPg.js";
import { Item } from "./scriptOrderPg.js";
import { Cart } from "./scriptOrderPg.js";
import { myCart } from "./scriptOrderPg.js";


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
                        
                    </th>
                    <td class="align-middle">
                        <span>${id}</span>
                    </td>
                    <td class="align-middle">
                        <span>${name}</span>
                    </td>
                    
                    <td class="align-middle">${price},- Kč</td>
                    <td class="align-middle">
                        <input type="number" name="Quantity" id="inputQuantity${id}" class="w-75 px-2 bg-dark text-white border border-dark rounded" value="${quantity}" min="1">
                    </td>
                    <td class="text-end align-middle" id="subtotal${id}">${subtotal},- Kč</td>
                </tr>`;
                
    
                $(`#inputQuantity${id}`).on("change", function(){
                    let temp = $(`#inputQuantity${id}`).val() * price; // dynamically calculate every change on certain input
                    $(`#subtotal${id}`).html(`${temp},- Kč`);
                        
                    totalItems = UpdateTotalItems();
                    $("#totalItemsValue").html(`${totalItems},- Kč`);

                    $("#totalValue").html(`${UpdateSummary()},- Kč`); 
                });
    
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
        localStorage.setItem("myCart", JSON.stringify(cartItems));
    }
    
    function UpdateTotalItems(){
        let table = $("#myTable tbody");
        //reset total for sure
        totalItems = 0;
    
        table.find('tr').each(function () {
            let $tds = $(this).find('td');
            let subtotalField = parseInt($tds.eq(4).text());
    
            totalItems += (subtotalField);
        });
        return totalItems;
    }
    
    function UpdateSummary(){
        return total = UpdateTotalItems() + shipping;
    }
    
    //show all items to screen by getting from localStorage
    let cartItems = JSON.parse(localStorage.getItem("myCart"));
    let total=0;
    let totalItems=0;
    let shipping;

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
            $(document).load("#myTable");
        });

        //Apply changes on click
        $("#btnAppChange").click(function(){
            //if there exists any items
            if($("#myTable .orderItems").length > 0){
                let cartTemp = new Cart();
                $('#myTable .orderItems').each(function() {

                    let id = $(this).find('td:nth-child(2)').text();
                    // let name = $(this).find('td:nth-child(3)').text();
                    // let price = $(this).find('td:nth-child(4)').text();
                    let quantity = $(this).find('td:nth-child(5) input').val();
                    // let subtotal = $(this).find('td:nth-child(6)').text();
                    
                    let product = products.find(obj => {
                        return obj.id == id;
                    });

                    let item = new Item(product, quantity);
                    // console.log(item);
                    cartTemp.AddToCart(item);
                });
                myCart.cartItems = cartTemp.cartItems;
            }
            localStorage.setItem("myCart", JSON.stringify(myCart.cartItems));
            location.reload();

        });

})