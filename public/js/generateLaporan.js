const buttonGene = document.querySelector('#geneButton');
const filterdiv = document.querySelector('#filtering');

function none(){
    filterdiv.classList.remove('d-sm-flex');
    filterdiv.classList.add('d-none');
}


buttonGene.addEventListener('click', ()=>{
    none();
    window.print();
    reset();
})


function reset(){
    filterdiv.classList.add('d-sm-flex');
    filterdiv.classList.remove('d-none');
}

console.log(document);