function cek(){
    if(form.angka1.value==""||form.angka2.value==""){
    alert("Angka Kosong");
    exit
    }
}

function penjumlahan(){
    cek();
    a = parseInt(form.angka1.value);
    b = parseInt(form.angka2.value);
    alert("Hasil Penjumlahan = " + (a+b))
}

