class Product {
    constructor(CurrentPrices, ItemsQuantity)
    {
        this.CurrentPrice = CurrentPrices
        this.ItemsQuantity = ItemsQuantity
        // nuo CurrentPrice po 7 parents yra pasiekimas order div
        this.orderId = CurrentPrices.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.dataset.orderId
    }


}
const OrderTotals = document.querySelectorAll('#order-total')
const ItemsQuantity = document.querySelectorAll('#item-quantity')
const CurrentPrices = document.querySelectorAll('#currentPrice')

// sukurti Product objektus
const Products = []
for (let i = 0; i < CurrentPrices.length; i++) 
{
    Products.push(new Product(CurrentPrices[i], ItemsQuantity[i]))   
}

//susomuoti produktu kaina i atitinkanti uzsakyma
let orderId = Products[0].orderId
let j = 0
let orderPrice = 0
for (let i = 0; i < Products.length; i++) 
{

    let productsPrice = parseInt(Products[i].CurrentPrice.innerText) * parseInt(Products[i].ItemsQuantity.innerText)
    orderPrice += productsPrice

    // kai prieina prie paskutines prekes
    if (Products[i + 1] == undefined)
    {
        OrderTotals[j].innerText = orderPrice
        break
    }
    //kai pasikeičia order id (prieina prie naujo order, ir tam order priskiria galutine kaina)
    if (orderId != Products[i + 1].orderId) 
    {
        orderId = Products[i].orderId
        OrderTotals[j].innerText = orderPrice
        orderPrice = 0
        j++
    }
}