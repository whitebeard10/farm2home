window.addEventListener('DOMContentLoaded', ()=>{
    const shopBtn = document.querySelector('.shopBtn')
    const cartBtn = document.querySelector('.cartBtn')
    const itemContainer = document.querySelector('.item-container')
    const tbody = document.querySelector('.tbody')
    const checkoutBtn = document.querySelector('.checkout-btn')
    const shopSec = document.querySelector('.shop')
    const cartSec = document.querySelector('.cart')
    
    shopBtn.addEventListener('click', ()=>{
        cartSec.style.display="none"
        shopSec.style.display="block"
    })
    
    cartBtn.addEventListener('click', ()=>{
        shopSec.style.display="none"
        cartSec.style.display="block"
    })

    fetch('http://localhost:8080/backend/myserver.php', {
        method:'GET',
        header:{
            'Content-Type':'application/json',
            'Accept':'application/json'
        }
    }).then(res=>res.json())
    .then(data => {
        data.forEach(product=>{
            const div = document.createElement('div')
            div.classList.add('item')
            div.setAttribute('item-id', product.id)
            div.innerHTML = `
                          <img src="./images/${product.image}">
                          <h3>${product.title}</h3>
                          <span class="price">$${product.price/100}/kg</span>
                          <button class="btn add-btn">Add To Cart</button>
            `
            itemContainer.appendChild(div)
        })
    })    
    
    let observer = new MutationObserver(mutations=>{
        mutations.forEach(mutation=>{
          if(!mutation.addedNodes.length == 1) return 
          if(mutation.target.classList.contains('item-container')){
              mutation.addedNodes[0].children[3].addEventListener('click', addCartElm)
          }
          if(mutation.target.classList.contains('tbody')){
              mutation.addedNodes[0].lastElementChild.addEventListener('click',rmCartElm)
              const quantity = mutation.addedNodes[0].children[3]
              quantity.addEventListener('change', quantityChange)
          }
        })
    })
    observer.observe(itemContainer, {childList:true})
    observer.observe(tbody, {childList:true})


    function addCartElm(){
       const tr = document.createElement('tr')
       tr.classList.add('item-row')
       tr.setAttribute('item-id', this.parentElement.getAttribute('item-id'))
       tr.innerHTML = `
       <td class="item-img"> <img src="${this.parentElement.children[0].src}"> </td>
       <td> ${this.parentElement.children[1].innerText}</td>
       <td>${this.parentElement.children[2].innerText}</td>
       <td><input type="number" value="1"></td>
       <td><button class="rm-btn">Remove</td>
       `
       tbody.insertBefore(tr, tbody.lastElementChild)
       updateTotal()
    }
    
    function rmCartElm(){
        this.parentElement.remove()
        updateTotal()
    }

    function quantityChange(e){
        if(e.target.value == '' || e.target.value.startsWith('-') || e.target.value == '0' )
        e.target.value == '1'
        updateTotal()
    }

    function updateTotal(){
        total = 0
      const rows = document.querySelectorAll('.item-row')  
      rows.forEach(row=>{
        const ary = Array.from(row.children)
        const elm = ary.find(x => x.firstElementChild instanceof HTMLInputElement)
        let quantity = parseInt(elm.firstElementChild.value)
        let price = (ary[2].innerText).replace('$', '')
        price = price.replace( new RegExp('/.*'), ''  )
        price = parseFloat(price)
        total += quantity*price
        total = Math.round(total*100)/100
      })
      const totalRow = document.querySelector('.totalRow>td')
      totalRow.innerText = `Total: $${total}`
      if(total > 0) document.querySelector('.checkout-btn').disabled=false
      else document.querySelector('.checkout-btn').disabled=true
     }

     checkoutBtn.addEventListener('click', ()=>{
         let itemsToBuy =[]
         const itemRows = document.querySelectorAll('.item-row')
            itemRows.forEach(row=>{
                let obj ={
                id : row.getAttribute('item-id'),
                quantity : row.children[3].firstElementChild.value
                }
                itemsToBuy.push(obj)
            })
        fetch('http://localhost:8080/backend/myserver.php', {
            method:'POST',
            headers:{
                'Content-Type' : 'application/json',
                'Accept' :  'appliication/json'
            },
            body: JSON.stringify(itemsToBuy)
        }).then(res=>res.json()) 
        .then(data=>{
            stripe = Stripe('INSERT_YOUR_OWN_STRIPE_PUBLIC_KEY_HERE')
            stripe.redirectToCheckout({sessionId:data.id})
        })   
     })

})

