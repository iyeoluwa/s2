require('./bootstrap');

require('alpinejs');

 require('axios');


let Turbolinks = require('turbolinks')

Turbolinks.start();


import Tagify from '@yaireo/tagify';
var inputElement = document.getElementById('taginput');

// attach the tagify to an input
new Tagify(inputElement,{
    originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
});
