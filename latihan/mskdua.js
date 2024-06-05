function tambahRoll() {
    // Ambil nilai dari input form
    const noRoll = document.getElementById('no_roll').value;
    const qtyMasuk = document.getElementById('qty_masuk').value;
    const kodeMasuk = document.getElementById('kode_masuk').value;

    if (noRoll && qtyMasuk) {
        // Buat baris baru di tabel
        const table = document.getElementById('detailTable');
        const newRow = table.insertRow();

        // Buat sel dan tambahkan nilai input
        const cell1 = newRow.insertCell(0);
        const cell2 = newRow.insertCell(1);
        const cell3 = newRow.insertCell(2);

        cell1.innerHTML = kodeMasuk;
        cell2.innerHTML = noRoll;
        cell3.innerHTML = qtyMasuk;
    

        // Tambahkan input hidden ke form
        const detailForm = document.getElementById('detailForm');
        const inputKodeMasuk = document.createElement('input');
        inputQtyMasuk.type = 'hidden';
        inputQtyMasuk.name = 'kode_masuk[]';
        inputQtyMasuk.value = kodeMasuk;
        detailForm.appendChild(inputQtyMasuk);

        const inputNoRoll = document.createElement('input');
        inputNoRoll.type = 'hidden';
        inputNoRoll.name = 'no_roll[]';
        inputNoRoll.value = noRoll;
        detailForm.appendChild(inputNoRoll);

        const inputQtyMasuk = document.createElement('input');
        inputQtyMasuk.type = 'hidden';
        inputQtyMasuk.name = 'qty_masuk[]';
        inputQtyMasuk.value = qtyMasuk;
        detailForm.appendChild(inputQtyMasuk);

        

        // Reset input form
        document.getElementById('no_roll').value = '';
        document.getElementById('qty_masuk').value = '';
        document.getElementById('kode_masuk').value = '';
    }
}

document.addEventListener("DOMContentLoaded", function(event) {
   
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    // show navbar
    nav.classList.toggle('show')
    // change icon
    toggle.classList.toggle('bx-x')
    // add padding to body
    bodypd.classList.toggle('body-pd')
    // add padding to header
    headerpd.classList.toggle('body-pd')
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
     // Your code to run since DOM is loaded and ready
});