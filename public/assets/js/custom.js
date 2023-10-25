function addToCart(num) {
    var ary = JSON.parse(localStorage.getItem("items"));
    if(ary == null) {
        var itemAry = [num];
        localStorage.setItem("items", JSON.stringify(itemAry));
    } else {
        $con = ary.indexOf(num);
        if($con == -1) {
            ary.push(num);
            localStorage.setItem("items", JSON.stringify(ary));
        }
    }
    alert("Item Already Added To Cart");
    getCartItem();
    
}

function getCartItem() {
    let ary = JSON.parse(localStorage.getItem("items"));
    $("#badge").html(ary.length);
}

function clearCart() {
    localStorage.removeItem("items");
}

getCartItem();