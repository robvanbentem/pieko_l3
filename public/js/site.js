$(document).ready(function () {
    var groceries = new Groceries();
    new GroceryView({groceries: groceries});
});

var Groceries = function() {};

Groceries.prototype.add = function(options){
    $.ajax({
        url: '/ajax/groceries/add',
        type: 'POST',
        dataType: 'json',
        data: options.data,
        success: options.success
    });
};

var GroceryView = function(options) {
    this.groceries = options.groceries;

    var add = $.proxy(this.add, this);
    $('.form-add-product').submit(add);
};

GroceryView.prototype.add = function(e) {
    e.preventDefault();

    this.groceries.add({
        data: {
            shop_id: $('#gl_shop_id').val(),
            amount: $('#gl_amount').val(),
            product: $('#gl_product').val()
        },
        success: function(data) {
            console.log(data);
        }
    });
};