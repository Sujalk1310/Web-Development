function Add(){
    var M = parseInt(document.getElementById('Qty').value);
    var T = parseInt(document.getElementById("Display").value);
    if (T<M){    
        T += 1;
        document.getElementById("Display").value = T;
        document.getElementById("QQ").value = T;
        var RI = M - T;
        document.getElementById('FSum').value = RI;
    }
}
function Sub(){
    var M = parseInt(document.getElementById('FSum').value);
    var T = parseInt(document.getElementById("Display").value);
    if (T != 0) {
        T -= 1;
        document.getElementById("Display").value = T;
        document.getElementById("QQ").value = T;
        var RI = M + 1;
        document.getElementById('FSum').value = RI;
    }
}
 
