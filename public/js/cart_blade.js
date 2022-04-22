// prekės skaičiaus padidinimas ir galutinės kainos apskaičiavimai
const increments = document.querySelectorAll('#increment')
const decrements = document.querySelectorAll('#decrement')
const quantitys = document.querySelectorAll('#quantity')
const discountPrices = document.querySelectorAll('#discountPrice')
const oldPrices = document.querySelectorAll('#oldPrice')
const finalPrice = document.getElementById('finalPrice')
const youSave = document.getElementById('youSave')

const itemsQuantity = document.querySelectorAll('#items-quantity')
const orderForm = document.getElementById('order')


updateFinalPrice()

for (let i = 0; i < quantitys.length; i++) 
{
    updateProductsPrice(i)

    // jei kaina neturi akcijos, kainą paslėpti
    if (oldPrices[i].dataset.oldPrice == discountPrices[i].dataset.discountPrice)
    {
        oldPrices[i].style.display = 'none'
    }

    increments[i].addEventListener('click', () => {
        if (quantitys[i].innerText < 10)
        {
            // vienetų skaičiaus nustatymas
            quantitys[i].innerText = (parseInt(quantitys[i].innerText) + 1) + ''
            updateProductsPrice(i)
            
            updateFinalPrice()
        }
        
        // ajax'as neveikia naujausiose laravel 8 versijose, gaunu error 500, kodėl taip yra mano galva nebeišneša, 
        // bandžiau begalę dalykų problemą išspręsti, bet dėja nepavyko
        // pisausi jau 3 dienas, mano protas tokio dalyko nebegali pavežti, esu pasiekęs tokia stadiją 
        // kur man reikia dievo pagalbos arba varyti į Amsterdamą grybus uostyt
        // $.ajax({
        //     url: "increment",
        //     type: 'GET',
        //     data: {itemId: quantitys[i].dataset.itemId},
        //     success: function(result){
        //         $('item-' + quantitys[i].dataset.itemId).html(result)
        //     },
        // })
    })

    decrements[i].addEventListener('click', () => {
        if (quantitys[i].innerText > 1 )
        {
            quantitys[i].innerText = (parseInt(quantitys[i].innerText) - 1) + ''
            updateProductsPrice(i)
            
            updateFinalPrice()
        }
    })
}

orderForm.addEventListener('click', () => addQuantitysToInputs())

// atnaujina galutinę viso krepšelio kainą
function updateFinalPrice()
{
    finalPrice.innerText = 0
    youSave.innerText = 0
    for (let i = 0; i < quantitys.length; i++) 
    {
        finalPrice.innerText = parseInt(finalPrice.innerText) + 
            parseInt(discountPrices[i].dataset.discountPrice) * quantitys[i].innerText

        youSave.innerText = parseInt(youSave.innerText) + 
            parseInt(oldPrices[i].dataset.oldPrice) * quantitys[i].innerText
    }
    youSave.innerText = youSave.innerText - finalPrice.innerText
}

// atnaujina prekės kainą
function updateProductsPrice(i)
{
    // kaina po nuolaidos
    discountPrices[i].innerText = parseInt(discountPrices[i].dataset.discountPrice) * parseInt(quantitys[i].innerText)
    // kaina prieš nuolaidą
    oldPrices[i].innerText = parseInt(oldPrices[i].dataset.oldPrice) * parseInt(quantitys[i].innerText)
}

// sudeda prekių skaičių į paslėptą inputą
function addQuantitysToInputs()
{
    for (let i = 0; i < quantitys.length; i++)
    {
        itemsQuantity[i].value = quantitys[i].innerText
    }
}