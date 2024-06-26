function pagination(total, pageSize, page)
{
    $('#tabela-usuario-atividades tbody').html(`<tr><td colspan="5"><div style="width:100%; text-align: center; margin: 1em .5em"><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div></td></tr>`);
    let _totalPages = Math.ceil(total/pageSize)
    let _pagination = `<ul class="pagination pagination-sm m-0 float-right">`;

    if(page > 0){
        _pagination += `<li class="page-item"><span class="page-link" data-page="${Number(page) - 1}">«</span></li>`
    }

    if(_totalPages > 10){
        const _range = 3
        let _pageAux = (Number(page) < _range) ? 0 : Number(page) - _range

        if(_pageAux > (Number(page) - (_range * 2))){
            if(_pageAux !== 0){
                _pagination += `<li class="page-item"><span class="page-link ${Number(page) === 0 ? 'active': ''}" data-page="0">0</span></li> `
                _pagination += `<li class="page-item"><span class="pagination-item-etc">...</span></li> `
            }
            if(Number(page) < ((_totalPages - _range - 1))){
                for(let _i = 0; _i < (_range * 2); _i++){
                    _pagination += `<li class="page-item"><span class="page-link ${Number(page) === _pageAux ? 'active': ''}" data-page="${_pageAux}">${_pageAux}</span></li> `
                    _pageAux++
                }
                _pagination += `<li class="page-item"><span class="pagination-item-etc">...</span></li> `
                _pagination += `<li class="page-item"><span class="page-link ${Number(page) === (_totalPages - 1) ? 'active': ''}" data-page="${_totalPages - 1}">${_totalPages - 1}</span></li> `
            }else{
                for(let _i = (_totalPages - (_range * 2)); _i < (_totalPages); _i++){
                    _pagination += `<li class="page-item"><span class="page-link ${Number(page) === _i ? 'active': ''}" data-page="${_i}">${_i}</span></li> `
                }
            }
        }
    }else{
        for(let _i = 0; _i < _totalPages; _i++){
            _pagination += `<li class="page-item"><span class="page-link ${_i === page ? 'active': ''}" data-page="${_i}">${_i}</span></li> `
        }
    }

    if(page < _totalPages - 1){
        _pagination += `<li class="page-item"><span class="page-link" data-page="${Number(page) + 1}">»</span></li>`
    }

    /**
     *
     <li class="page-item"><a class="page-link" href="#">«</a></li>
     <li class="page-item"><a class="page-link" href="#">1</a></li>
     <li class="page-item"><a class="page-link" href="#">2</a></li>
     <li class="page-item"><a class="page-link" href="#">3</a></li>
     <li class="page-item"><a class="page-link" href="#">»</a></li>
     </ul>
     */

    _pagination += `</ul>`;

    $('#pagination').html(_pagination)
}