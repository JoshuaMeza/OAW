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
//  Formato de fecha: YYYY/MM/DD
news = [];
news[0] = new New("Reunión de preparatorianos en torno al deporte", "2022/02/26", "www.uady.com", "Celebran la tradicional carrera “Vuelve a Casa”", "Espectaculos, Tecnologia");
news[1] = new New("Firma de convenio con la CANIRAC Yucatán", "2022/02/12", "www.modelo.com", "Convenio de colaboración entre nuestra institución y la Cámara Nacional de la Industria de Restaurantes y Alimentos Condimentados delegación Yucatán", "Espectaculos");
news[2] = new New("Creatividad con reciclaje: The Precious Plastic Universe", "2022/01/23", "www.anahuac.com", "El reciclaje puede hacer una gran diferencia para que nuestro mundo sea más sustentable. Y con ayuda de la creatividad se pueden explorar alternativas para la reutilización del plástico en el campo del diseño.", "Tecnologia");

// Once news are obtained and sorted, call this function
showNews(news);
