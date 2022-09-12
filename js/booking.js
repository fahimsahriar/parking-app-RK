console.log("Hello");
selectElement = document.getElementById('drop');
q = selectElement.value;

function qf(){
    selectElement = document.getElementById('drop');
    q = selectElement.value;
    console.log(q);
}
console.log(q);
let day = 0;
let price1;
function update_price(x){
    let price = 0;
    price = price + Number(x)*10;
    if(price!=0)
    {
        document.getElementById('pricew').innerHTML = price*Number(q);
        console.log(price);
        price1 = price;
    }
    else{

    }
 }
document.getElementById('day').addEventListener('input', function(n) {
    let t_hour = 0;
    day = n.target.value;
    t_hour = Number(t_hour) + Number(24*day);
    document.getElementById('day-c').innerHTML = day;
    update_price(t_hour);
});


document.getElementById('hour').addEventListener('input', function(n) {
    let hour = 0;
    hour = n.target.value;
    document.getElementById('hour-c').innerHTML = hour;
    let y;
    y = document.getElementById('hour-c').innerHTML;
    console.log(y+' old data');
    hour = Number(hour);
    update_price_two(hour);
    
});
function update_price_two(x){
    if(price1==0 || price1==null){
        price = Number(x)*10;
    }else{
        price = price1 + Number(x)*10;
    }
    document.getElementById('pricew').innerHTML = price*Number(q);
    if(price!=0){
        //document.getElementById('pricew').innerHTML = price;
    }
 }



