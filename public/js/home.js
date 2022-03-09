const selectionBox = document.getElementById('sort-selection');
const searchContent = document.getElementById('search-content');
const btnAddNew = document.getElementById('btnAddNew');
const RSSLink = document.getElementById('RSSLink');
const btnUpdate = document.getElementById('btnUpdate');

//  Formato de fecha: YYYY/MM/DD
var news = [];

class New {
    constructor(title, date, url, description, categories) {
        this.title = title;
        this.date = date;
        this.url = url;
        this.description = description;
        this.categories = categories;
    }

    toString() {
        return '<div class="col-5 mb-3"><div class="card"><div class="card-body"><h5 class="card-title">'+ this.title +
        '</h5><h6 class="card-subtitle mb-2 text-muted">' + this.date + '</h6><p class="card-text">' + this.description + '</p>' +
        '<p class="card-text text-muted fst-italic">' + this.categories + '</p><a href="#" class="card-link">' + this.url +
        '</a></div></div></div>';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    sortNews(news);
});

const sortNews = function(news){
    selectionValue = selectionBox.value;
    switch(selectionValue){
        case "title":
            news.sort((object1, object2) =>{
                if(object1.title < object2.title){
                    return -1;
                } else if(object1.title > object2.title){
                    return 1;
                } else return 0;
            });
            break;
        case "url":
            news.sort((object1, object2) =>{
                if(object1.url < object2.url){
                    return -1;
                } else if(object1.url > object2.url){
                    return 1;
                } else return 0;
            });
            break;
        case "description":
            news.sort((object1, object2) =>{
                if(object1.description < object2.description){
                    return -1;
                } else if(object1.description > object2.description){
                    return 1;
                } else return 0;
            });
            break;
        case "date":
            news.sort((object1, object2) =>{
                date1 = new Date(object1.date);
                date2 = new Date(object2.date);
                if(date1 < date2){
                    return -1;
                } else if(date1 > date2){
                    return 1;
                } else return 0;
            });
            break;
        case "categories":
            if(selectionValue == "categories"){
                news.sort((object1, object2) =>{
                    if(object1.categories < object2.categories){
                        return -1;
                    } else if(object1.categories > object2.categories){
                        return 1;
                    } else return 0;
                });
            }
            break;

    }
    showNews(news);
}

selectionBox.addEventListener('change', function(){
    if(searchContent.value.toLowerCase().length > 0){
        filterNews();
    }
    else
        sortNews(news);
});

function showNews(news) {
    var outputBox = $("#news-box");
    //  Eliminamos los hijos del div para volverlos a mostrar
    outputBox.empty();

    if(news.length > 0){
        news.forEach(element => {
        outputBox.append(element.toString());
        });
    } else{
        showAlert("No se ha encontrado ninguna noticia, favor de añadir una url de algún feed.", "error");
    }

}

searchContent.addEventListener('keyup', function(){
    filterNews();
});

const filterNews = function(){
    var text = searchContent.value.toLowerCase();
    var outputBox = $("#news-box");
    //  Eliminamos los hijos del div para volverlos a mostrar
    outputBox.empty();
    var newsTemp = [];

    for(let newItem of news){
        title = newItem.title.toLowerCase();
        date = newItem.date.toLowerCase();
        url = newItem.url.toLowerCase();
        description = newItem.description.toLowerCase();
        categories = newItem.categories.toLowerCase();
        if(title.indexOf(text) !== -1 || date.indexOf(text) !== -1
            || url.indexOf(text) !== -1 || description.indexOf(text) !== -1
            || categories.indexOf(text) !== -1){
            outputBox.append(newItem.toString());
            newsTemp.push(newItem);
        }
    }

    if(newsTemp.length == 0){
        showAlert("No se ha encontrado ninguna coincidencia, intente nuevamente.", "error");
    } else sortNews(newsTemp);

};

btnAddNew.addEventListener('click', function(e){
    e.preventDefault();

    if(RSSLink.value.length == 0){
        showAlert("Debe proporcionar una url.", "error");
    } else {
        token = $("#create > input[name=_token]").val();
        rss_url = $("#create > .input-group > input[name=url]").val();
        $.ajax({
            type: "POST",
            url: "./añadir",
            data: {_token: token, url: rss_url},
            success: function () {
                location.reload();
            }
        }).fail(function () {
            showAlert("No se pudo añadir la fuente de noticias proporcionada.", "error");
        });
    }
})

btnUpdate.addEventListener('click', function(e){
    e.preventDefault();
    $('#updateSpinner').toggleClass('d-inline-block');
    $('#updateSpinner').toggleClass('d-none');

    token = $("#update > input[name=_token]").val();

    $.ajax({
        type: "POST",
        url: "./actualizar",
        data: {_token: token},
        success: function () {
            location.reload();
        }
    }).fail(function () {
        $('#updateSpinner').toggleClass('d-inline-block');
        $('#updateSpinner').toggleClass('d-none');
        showAlert("No se pudo añadir la fuente de noticias proporcionada.", "error");
    });
})

