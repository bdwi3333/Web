function cek(){
    if(form.kode.value == "" || form.banyak.value == ""){
        window.alert("Data tidak lengkap")
    }
}
function hitung(){
    cek();
    data = [
        {kode : '001', nama : 'Barang A', harga : 10000  },
        {kode : '002', nama : 'Barang B', harga : 20000  },
        {kode : '003', nama : 'Barang C', harga : 30000  }
    ];
    a = form.kode.value;
    b = form.banyak.value;
    for(i=0; i < data.length; i++){
        if(data[i].kode == a){
            c = data[i].harga*b;
            window.alert("Total pembayaran : " + c)
            d = window.prompt("Masukan uang user : ")
            window.alert("Kembalian : "+(d-c))
        }
    }
}