
// paypal.Buttons({
//     style:{
//         color:'blue',
//         shape:'pill'
//     },
//     createOrder: function(data,actions){
//         return actions.order.create({
//             purchase_units:[{
//                 amount:{
//                     value:finalAmount
//                 }
//             }]
//         });
//     },
//     onApprove: function(data,actions){
//         return actions.order.capture().then(function(details){
//            console.log(details);
//             //window.location.replace("/Electro-Shop/index.php?success")
//         })
//     },
//     onCancel: function(data){
//         alert("Payment Cancel");
//         window.location.replace("/Electro-Shop/carte.php")
//     }
// }).render('#paypal-button-container')

// // paypal.Buttons({
// //     createOrder: function(data,actions){
// //         return actions.order.create({
// //             purchase_units:[{
// //                         amount:{
// //                             value:finalAmount.toString()
// //                         }
// //                     }]
// //                 });
// //     }
// // }).render('#paypal-button-container')


//         let amount = document.querySelector("#amount").value;
//         console.log(amount+"  "+typeof(amount));
//         let finalAmount = amount.toString();
//         console.log(finalAmount+"  "+typeof(finalAmount));
        