document.addEventListener("DOMContentLoaded",function(){
    
    
    request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    ajaxUrl = baseurl+'/Carrito/contents';
    
    request.open("GET",ajaxUrl,true);
    request.send();

     
    request.onreadystatechange =function(){
        var htmlcatalogos='';
        var htmltotal='';
        
        if(request.readyState == 4 && request.status==200){
            //console.log(request.responseText);
            request.onload = function(){
            var objdata=JSON.parse(request.responseText);

    

            objdata.forEach(element => {
                htmlcatalogos += `
                <div class="item"><span class="price">${element["price"]} Bs</span>
                    <p class="item-name">${element["name"]}</p>
                    <p class="item-description">Talla: ${element["size"]}</p>
                    <p class="item-description">${element["qty"]} unidad</p>
                </div>
            
                `;
         
            });



            htmltotal=`<div class="total"><span>Total</span><span class="price">450 Bs</span></div>`;
            document.querySelector('.listproducts').innerHTML = htmlcatalogos;
            
            }
            
        }
    }

    calculototal();
    
    paypal.Buttons({
        style:{
            label:'pay'
        },
        createOrder: (data, actions) => {
            // pass in any options from the v2 orders create call:
            // https://developer.paypal.com/api/orders/v2/#orders-create-request-body
            const createOrderPayload = {
                purchase_units: [
                    {
                        amount: {
                            value: "88.44"
                        }
                    }
                ]
            };

            return actions.order.create(createOrderPayload);
        },
        onCancel: (data, actions) =>{
            swal("Cancelado","Pago Cacelado","error");
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
              // Successful capture! For dev/demo purposes:
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              const transaction = orderData.purchase_units[0].payments.captures[0];
              alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
              // When ready to go live, remove the alert and show a success message within this page. For example:
              // const element = document.getElementById('paypal-button-container');
              // element.innerHTML = '<h3>Thank you for your payment!</h3>';
              // Or go to another URL:  actions.redirect('thank_you.html');
            });
          }
    }).render('#paypal-btn-container');

   
});

function calculototal(){
    requestt = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    ajaxUrlt = baseurl+'/Carrito/total';
    
    requestt.open("GET",ajaxUrlt,true);
    requestt.send();
    requestt.onreadystatechange =function(){
        if(requestt.readyState == 4 && requestt.status==200){
            var objdata=JSON.parse(requestt.responseText);
         
            document.querySelector('.montototalpay').innerHTML = round( objdata) +" Bs.";
            
        }
    }
}


function round(num) {
    var m = Number((Math.abs(num) * 100).toPrecision(15));
    return Math.round(m) / 100 * Math.sign(num);
}

