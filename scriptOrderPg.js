class Item{
    constructor(id, productName, price, descb, category){
        this.id = id;
        this.productName = productName;
        this.price = price;
        this.descb = descb;
        this.category = category;
    }
}
let items = [];
function RenderItems(items){
    for(let i = 0; i < items.length; i++){
        var divCard = $(".myCardContainer").append(`
        <div class="p-0 col-xl-3 col-lg-4 col-md-6 ">
            <!-- card item -->
            <div class="card bg-black my-5 mx-3 border-warning-subtle" id="${items[i].id}" >
                <img src="media/background.jpg" class="card-img-top" alt="..." id="${items[i].id}">
                <div class="card-body" id=${items[i].id}>
                    <div class="card-info d-flex justify-content-between text-white">
                        <h6 class="card-title m-0   ">${items[i].id}. ${items[i].productName}</h6>
                        <h6 class="card-title m-0   ">${items[i].price},- Kč</h6>
                    </div>
                    
                </div>
                <div class="p-0 card-footer d-flex justify-content-center">
                    <button class="m-2 btn btn-warning d-flex align-items-center btnAddToCart">
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

$(document).ready(function(){
    $(".containerHeader, .containerCollapsed").addClass(`animated fadeInDown`);
    $("nav").addClass(`animated fadeInLeft`);
    $(".myCardContainer").addClass(`animated fadeInUp`);

    $.ajax({
        type:"GET",
        url:"http://localhost:3000/Menu",
        success: function(data){
            for(let i = 0;i < data.length; i++){
                let item = new Item(data[i].Id, data[i].Product, data[i].Price, data[i].Description, data[i].Category);
                items.push(item);
                console.log(items);
            }
            RenderItems(items);
            $(".btnAddToCart").click(function(){
                //todo
                alert("Item has been successfully added to cart.");
            }),
            $(".card-body, .card-img-top").on({
                mouseenter: function(){
                    $(this).css("cursor","pointer");
                },
                click: function(){
                    //vrati objekt, ktery se splnuje condition
                    let item = items.find(obj => {
                        return obj.id == `${this.id}`
                      });
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
                                            <h4>${item.id}. ${item.productName}</h4>
                                            <p class="item-descrb">${item.descb}</p>
                                            <h6 class="item-price">Price: ${item.price},- Kč</h6>
                                        </div>

                                        <div class="quantityDiv d-flex">
                                            <input type="number" class="form-control w-25 bg-black text-white border border-dark" id="inputQuantity" placeholder="Quan."  min="0" value="0">
                                            <button class="btn btn-warning d-flex align-items-center mx-3">
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
                    $('#inputQuantity').on("change", () => {subtotal(item.price)});
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