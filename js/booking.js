console.log("Hello");
let num;
document.getElementById('day').addEventListener('input', function(n) {
    num = n.target.value;
    document.getElementById('current-price').innerHTML = num;
});