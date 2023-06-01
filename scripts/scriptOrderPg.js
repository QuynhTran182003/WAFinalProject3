//objects
 class Product{
    constructor(id, productName, price, descb, category, image){
        this.id = id;
        this.productName = productName;
        this.price = price;
        this.descb = descb;
        this.category = category;
        this.image = image;
    }
}

export class Item{
    constructor(product, quantity){
        this.product = product;
        this.quantity = quantity;
    }

    // bufferItem(idProduct, productName, price, quantity){
    //     this.idProduct = idProduct;
    //     this.productName = productName;
    //     this.price = price;
    //     this.quantity = quantity;
    // }
}

export class Cart{
    constructor(){
        this.cartItems = [];
    }

    AddToCart(item){
        this.cartItems.push(item);
    }
    clear(){
        this.cartItems = [];
    }
}
// let cartItems = [];
//array save all products
export let products = [];

export let myCart = new Cart();

function RenderProducts(products){
    for(let i = 0; i < products.length; i++){
        $(".myCardContainer").append(`
        <div class="p-0 col-xl-3 col-lg-4 col-md-6 ">
            <!-- card item -->
            <div class="card bg-black my-5 mx-3 border-0" id="${products[i].id}" >
                <img src="${products[i].image}" class="card-img-top border-0" alt="..." id="${products[i].id}">
                <div class="card-body pb-1" id=${products[i].id}>
                    <div class="card-info d-flex justify-content-between text-white">
                        <h6 class="card-title m-0">${products[i].id}. ${products[i].productName}</h6>
                        <h6 class="card-title m-0">${products[i].price},- Kč</h6>
                    </div>
                    
                </div>
                <div class="card-footer d-flex justify-content-start">
                    <button class=" btn btn-warning d-flex align-items-center btnAddToCart" id="${products[i].id}">
                        <img src="..\\media\\shopping-cart16.png" alt="">   <span class="px-1">Add To Cart</span>
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
        <strong>Success! ${quantity} x products no. ${id} has been added to your cart</strong> .
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
    //animation
    $(".containerHeader, .containerCollapsed").addClass(`animated fadeInDown`);
    $("nav").addClass(`animated fadeInLeft`);
    $(".myCardContainer").addClass(`animated fadeInUp`);
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
            alert(`You clicked on ${this.id}` );
            $(this).addClass("text-warning");
        }
    });
    $(".sidebar-item").on({
        mouseenter: function(){
            $(this).addClass('bg-dark');
        },
        mouseleave: function(){
            $(this).removeClass('bg-dark');
        }
    });
    $("#logOutOpt, .logInOpt").on({
        mouseenter: function(){
            $(this).addClass('text-warning');
        },
        mouseleave: function(){
            $(this).removeClass('text-warning');
        }
    })
    
    //working with API
    $.ajax({
        type:"GET",
        url:"http://localhost:3000/Menu",
        success: function(data){
            //for eeach retrieved data, add to an array 'products'
            for(let i = 0;i < data.length; i++){
                let product = new Product(data[i].Id, data[i].Product, data[i].Price, data[i].Description, data[i].Category, data[i].Image);
                products.push(product);
            }
            //render it to screen
            RenderProducts(products);
            // Show msg when add button clicked and save it into 'myCart' variable
            $(".btnAddToCart").click(function(){
                //get clicked product by id
                let product = products.find(obj => {
                    return obj.id == this.id;
                });
                ShowSuccessMsg(this.id, 1);
                let newItem = new Item(product, 1);
                if (localStorage.getItem('myCart') !== null) {
                    // Variable exists in localStorage
                    myCart.cartItems = JSON.parse(localStorage.getItem('myCart'));
                }
                myCart.AddToCart(newItem);
                localStorage.setItem('myCart', JSON.stringify(myCart.cartItems));

            }),

            // show a modal of product by clicking, then dynamically change the subtotal when input is on change
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
                                    <img src="${product.image}" class="border-0" alt="..." style="height:16rem">
                                    <div class="description px-3">
                                        <div class="category">
                                            <h4>${product.id}. ${product.productName}</h4>
                                            <p class="item-descrb">${product.descb}</p>
                                            <h6 class="item-price">Price: ${product.price},- Kč</h6>
                                        </div>

                                        <div class="quantityDiv d-flex">
                                            <input type="number" class="form-control w-25 bg-black text-white border border-dark" id="inputQuantity" placeholder="Quan."  min="1" value="1">
                                            <button class="btn btn-warning d-flex align-items-center mx-3 btnAddToCart" id="btnAddInModal">
                                                <img src="..\\media\\shopping-cart16.png" alt="">   
                                                <span class="px-1">Add</span>
                                            </button>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <p class="subtotal">Subtotal: ${product.price},- Kč</p>
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
                        $("#myModal").modal('hide');
                        ShowSuccessMsg(product.id, $('#inputQuantity').val());
                        let newItem = new Item(product, $('#inputQuantity').val());
                        
                        if (localStorage.getItem('myCart') !== null) {
                            // Variable exists in localStorage
                            myCart.cartItems = JSON.parse(localStorage.getItem('myCart'));
                        }
                        myCart.AddToCart(newItem);
                        localStorage.setItem("myCart", JSON.stringify(myCart.cartItems));

                    })
                }
            })
        }
    })
})