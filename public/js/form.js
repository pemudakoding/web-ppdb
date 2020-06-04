/**
 * Dynamic Form
 */
const kelurahanInput = document.getElementsByName('kelurahan')[0];
const statusSekolahInput = document.getElementsByName('status_sekolah')[0];
const agama = document.getElementsByName('agama')[0];

kelurahanInput.onchange = (element) => {
    if (element.target.value == 'Lainnya') {
        const parentKelurahan = element.target.parentElement.parentElement.parentElement;
        const newInput = `<div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="kelurahan_lainnya">
                                    Kelurahan
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200  text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                                    type="text"
                                    name="kelurahan_lainnya"
                                    id="kelurahan_lainnya">
                            </div>`;
        parentKelurahan.insertAdjacentHTML('beforeend', newInput);
    } else {
        const nomorBtq = document.getElementById('kelurahan_lainnya');
        if (nomorBtq != undefined) {
            nomorBtq.parentNode.remove();
        }
    }
}

statusSekolahInput.onchange = (element) => {
    if (element.target.value == 'Negeri' && agama.value == "Islam") {
        const parentKelurahan = element.target.parentElement.parentElement.parentElement;
        const newInput = `<div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="nomor_btq">
                                    Nomor Sertifikat BTQ
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200  text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                                    type="text"
                                    name="nomor_btq"
                                    id="nomor_btq">
                            </div>`;
        parentKelurahan.insertAdjacentHTML('beforeend', newInput);
    } else {
        const nomorBtq = document.getElementById('nomor_btq');
        if (nomorBtq != undefined) {
            nomorBtq.parentNode.remove();
        }
    }
}

/**
 * VALIDATION FORM
 */
const submitBtn = document.querySelector('button');

submitBtn.onclick = (element) => {

    const input = document.querySelectorAll('input');
    const select = document.querySelectorAll('select');

    input.forEach(input => {
        if (input.value == '') {
            element.preventDefault();

            input.classList.add('border');
            input.classList.add('border-red-400');
            console.log(input);

            input.onclick = (e) => {
                input.classList.remove('border');
                input.classList.remove('border-red-400');
            }
        }
    });

    select.forEach(select => {
        if (select.value == '') {
            element.preventDefault();

            select.classList.add('border');
            select.classList.add('border-red-400');

            select.onclick = (e) => {
                select.classList.remove('border');
                select.classList.remove('border-red-400');
            }
        }
    });
}
