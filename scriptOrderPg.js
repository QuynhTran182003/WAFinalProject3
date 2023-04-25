//objects
class Product{
    constructor(id, productName, price, descb, category){
        this.id = id;
        this.productName = productName;
        this.price = price;
        this.descb = descb;
        this.category = category;
    }
}

class Item{
    constructor(product, quantity){
        this.product = product;
        this.quantity = quantity;
    }
}

class Cart{
    constructor(){
        this.cartItems = cartItems;
    }

    AddToCart(item){
        this.cartItems.push(item);
    }
}

let products = [];
let cartItems = [];
let myCart = new Cart();


function RenderProducts(products){
    for(let i = 0; i < products.length; i++){
        var divCard = $(".myCardContainer").append(`
        <div class="p-0 col-xl-3 col-lg-4 col-md-6 ">
            <!-- card item -->
            <div class="card bg-black my-5 mx-3 border-warning-subtle" id="${products[i].id}" >
                <img src="media/background.jpg" class="card-img-top" alt="..." id="${products[i].id}">
                <div class="card-body" id=${products[i].id}>
                    <div class="card-info d-flex justify-content-between text-white">
                        <h6 class="card-title m-0   ">${products[i].id}. ${products[i].productName}</h6>
                        <h6 class="card-title m-0   ">${products[i].price},- Kč</h6>
                    </div>
                    
                </div>
                <div class="p-0 card-footer d-flex justify-content-center">
                    <button class="m-2 btn btn-warning d-flex align-items-center btnAddToCart" id="${products[i].id}">
                        <img src="media/shopping-cart16.png" alt="">   <span class="px-1">Add To Cart</span>
                    </button>
                </div>
            </div>
        </div>
        `);
    }
}
function subtotal(price){
    const subtotal = $('#inputQuantity').val() * price; 
    $(".subtotal").html(`Subtotal: ${subtotal},- Kč`);
}
function ShowSuccessMsg(id, quantity){
    let msgDiv;
    if(quantity > 1){
        msgDiv = `<div class="msgDiv alert alert-success mx-3 mt-3">
        <strong>Success! ${quantity} x product no. ${id} has been added to your cart</strong> .
        </div>`;
    } else if(quantity == 1){
        msgDiv = `<div class="msgDiv alert alert-success mx-3 mt-3">
        <strong>Success! Product no. ${id} has been added to your cart</strong> .
        </div>`;
    }
    
    $("main").prepend(msgDiv);
    $(".msgDiv").delay(3000).fadeOut(1500);
}

//interaction
$(document).ready(function(){
    $(".containerHeader, .containerCollapsed").addClass(`animated fadeInDown`);
    $("nav").addClass(`animated fadeInLeft`);
    $(".myCardContainer").addClass(`animated fadeInUp`);

    $.ajax({
        type:"GET",
        url:"http://localhost:3000/Menu",
        success: function(data){
            for(let i = 0;i < data.length; i++){
                let product = new Product(data[i].Id, data[i].Product, data[i].Price, data[i].Description, data[i].Category);
                products.push(product);
            }
            console.log(products);

            RenderProducts(products);
            $(".btnAddToCart").click(function(){
                let product = products.find(obj => {
                    return obj.id == this.id;
                });
                ShowSuccessMsg(this.id, 1);
                let item = new Item(product, 1);
                myCart.AddToCart(item);
            }),
            $(".card-body, .card-img-top").on({
                mouseenter: function(){
                    $(this).css("cursor","pointer");
                },
                click: function(){
                    //vrati produkt, ktery ma id stejne jako kliknuty produkt
                    let product = products.find(obj => {
                        return obj.id == this.id;
                    });

                    //modal html to add
                    let html = `
                    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg ">
                            <div class="modal-content text-white bg-black shadow-lg ">
                                <div class="modal-header">
                                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex flex-wrap justify-content-center">
                                    <img src="media/background.jpg" class="" alt="..." style="height:16rem">
                                    <div class="description px-3">
                                        <div class="category">
                                            <h4>${product.id}. ${product.productName}</h4>
                                            <p class="item-descrb">${product.descb}</p>
                                            <h6 class="item-price">Price: ${product.price},- Kč</h6>
                                        </div>

                                        <div class="quantityDiv d-flex">
                                            <input type="number" class="form-control w-25 bg-black text-white border border-dark" id="inputQuantity" placeholder="Quan."  min="0" value="0">
                                            <button class="btn btn-warning d-flex align-items-center mx-3" id="btnAddInModal">
                                                <img src="media/shopping-cart16.png" alt="">   
                                                <span class="px-1">Add</span>
                                            </button>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <p class="subtotal">Subtotal: 0,- Kč</p>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    
                    $(".myModalDiv").html(html);
                    $("#myModal").modal('show');
                    
                    //automatically calculate subtotal of item 
                    $('#inputQuantity').on("change", () => {subtotal(product.price)});
                    
                    $("#btnAddInModal").click(function(){
                        if($('#inputQuantity').val()<=0){
                            return;
                        }else{
                            //todo
                            ShowSuccessMsg(product.id, $('#inputQuantity').val());
                            let item = new Item(product, $('#inputQuantity').val());
                            myCart.AddToCart(item);
                        }
                    })
                }
                
            })
        }
    })

    $(".list-group-item").on({
        mouseenter: function(){
            $(this).removeClass("text-light");
            $(this).addClass("text-warning");
        },  
        mouseleave: function(){
            $(this).removeClass("text-warning");
            $(this).addClass("text-light");
        }, 
        click: function(){
            $(this).addClass("text-warning");
            alert(`You clicked on ${this.id}` );
        }  
    }),
    $(".sidebar-item").on({
        mouseenter: function(){
            $(this).addClass('bg-dark');
        },
        mouseleave: function(){
            $(this).removeClass('bg-dark');
        }
    })
})