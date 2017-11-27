
try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}


function mainSearch(){
    $('#formSearch').submit(function (e) {
        e.preventDefault();
        alert("enviado");
    })
}

module.exports = {
    mainSearch: mainSearch()
};