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

function showNews(news) {
    var outputBox = $("#news-box");

    news.forEach(element => {
        outputBox.append(element.toString());
    });
}

// TEST: STATIC NEWS AND SHOW THEM
news = [];
news[0] = new New("Título 1", "01/02/22", "www.noticia.com", "Descripción", "Espectaculos, Tecnologia");
news[1] = new New("Título 2", "04/01/22", "www.noticia.com", "Descripción", "Espectaculos");
news[2] = new New("Título 3", "23/01/22", "www.noticia.com", "Descripción", "Tecnologia");

// Once news are obtained and sorted, call this function
showNews(news);
