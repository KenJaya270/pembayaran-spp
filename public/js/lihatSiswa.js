const bulan = document.querySelectorAll('#bulan_bayar');

const dataBulan = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember"
]

bulan.forEach((el)=>{
    el.innerHTML = dataBulan[el.innerHTML - 1];
})

console.log(document);
