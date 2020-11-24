
const options = [
    '#option-cliente',
    '#option-servico',
    '#option-demanda',
    '#option-consultor',
];

function renderOption(option) {

    let name;
    
    name = option;

    const firstLetter = name.charCodeAt(0);

    if (firstLetter >= 0x60 && firstLetter <= 0x7a) {

        name = String.fromCharCode(firstLetter - 0x20) + name.substring(1);

    }


    return `<label class="btn btn-secondary" style="background-color:#464362!important">
            <input type="radio" name="options" id="option-${option}"> ${name}
            </label>`;
}

const operations = {
    '#drop-cadastrar': {
        'cliente': 'form-cad-cliente.php',
        'servico': 'form-cad-servico.php',
        'demanda': 'form-cad-demanda.php',
        'consultor': 'form-cad-consultor.php',
    },

    '#drop-consultar': {
        'cliente': 'form-cons-cliente.php',
        'servico': 'form-cons-servico.php',
        'demanda': 'form-cons-demanda.php',
        'consultor': 'form-cons-consultor.php',
    },

    '#drop-gerenciar': {
        'demanda': 'form-ger-demanda.php',
    },

    '#drop-agendar': {
        'servico': 'form-agen-sevico.php',
    },
    '#drop-gerar-rel': {
        'se': ''
    }

};


Object.keys(operations).forEach(operation => {
    document.querySelector(operation).addEventListener('click', () => onOperationChanged(operation));
});

let selectedOperation = null;

async function changeForm(form) {

    const url = `http://localhost/index.php/admin/form/${form}`;


    try {
        const result = await fetch(url);

        if (!result.ok) {
            console.error(result.status);
            return;
        }

        document.querySelector('#operation-outlet').innerHTML = await result.text();
    }
    catch (error) { console.error(error); }


}

async function onOptionChanged(option) {
    const form = operations[selectedOperation][option];
    await changeForm(form);
}


function onOperationChanged(id) {


    document.querySelector('#operation-outlet').innerHTML = '';

    if (id === '#drop-gerar-rel') {

        console.log('Relat');

        document.querySelector('#dropdownMenuButton').innerHTML = 'Gerar Relatório';

        document.querySelector('#option-root').innerHTML = '';


        changeForm('form-relatorio.php').then();
        return;
    }

    selectedOperation = id;


    let html = '';


    for (let option in operations[id]) {

        html += renderOption(option);
    }


    document.querySelector('#option-root').innerHTML = html;

    document.querySelector('#dropdownMenuButton').innerHTML = {
        '#drop-cadastrar': 'Cadastrar',
        '#drop-consultar': 'Consultar',
        '#drop-gerenciar': 'Gerenciar',
        '#drop-agendar'  : 'Agendar'
    }[id];

    for (let option in operations[id]) {

        document.querySelector(`#option-${option}`).addEventListener('click', () => onOptionChanged(option));
    }


}
