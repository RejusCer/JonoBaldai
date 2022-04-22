const currentPrice = document.querySelectorAll('#currentPrice')
const oldPrice = document.querySelectorAll('.old-price')

for (let i = 0; i < currentPrice.length; i++) 
{
    if (currentPrice[i].innerText == oldPrice[i].innerText)
    {
        oldPrice[i].classList.add('hidden')
    }
}