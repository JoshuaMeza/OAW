const selectionBox = document.getElementById('sort-selection');

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

const sortNews = function(){
    selectionValue = selectionBox.value;

    if(selectionValue == "title"){
        news.sort((object1, object2) =>{
            if(object1.title < object2.title){
                return -1;
            } else if(object1.title > object2.title){
                return 1;
            } else return 0;
        });
    }

    if(selectionValue == "url"){
        news.sort((object1, object2) =>{
            if(object1.url < object2.url){
                return -1;
            } else if(object1.url > object2.url){
                return 1;
            } else return 0;
        });
    }

    if(selectionValue == "description"){
        news.sort((object1, object2) =>{
            if(object1.description < object2.description){
                return -1;
            } else if(object1.description > object2.description){
                return 1;
            } else return 0;
        });
    }

    if(selectionValue == "date"){
        news.sort((object1, object2) =>{
            if(object1.date < object2.date){
                return -1;
            } else if(object1.date > object2.date){
                return 1;
            } else return 0;
        });
    }

    if(selectionValue == "categories"){
        news.sort((object1, object2) =>{
            if(object1.categories < object2.categories){
                return -1;
            } else if(object1.categories > object2.categories){
                return 1;
            } else return 0;
        });
    }
}

selectionBox.addEventListener('change', function(){
    sortNews();
    showNews(news);
});

function showNews(news) {
    sortNews();
    var outputBox = $("#news-box");
    //  Eliminamos los hijos del div para volverlos a mostrar
    outputBox.empty();

    news.forEach(element => {
        outputBox.append(element.toString());
    });
}

// TEST: STATIC NEWS AND SHOW THEM
news = [];
news[0] = new New("Reunión de preparatorianos en torno al deporte", "26/02/22", "www.uady.com", "Celebran la tradicional carrera “Vuelve a Casa”", "Espectaculos, Tecnologia");
news[1] = new New("Firma de convenio con la CANIRAC Yucatán", "12/02/22", "www.modelo.com", "Convenio de colaboración entre nuestra institución y la Cámara Nacional de la Industria de Restaurantes y Alimentos Condimentados delegación Yucatán", "Espectaculos");
news[2] = new New("Creatividad con reciclaje: The Precious Plastic Universe", "23/01/22", "www.anahuac.com", "El reciclaje puede hacer una gran diferencia para que nuestro mundo sea más sustentable. Y con ayuda de la creatividad se pueden explorar alternativas para la reutilización del plástico en el campo del diseño.", "Tecnologia");

// Once news are obtained and sorted, call this function
showNews(news);
