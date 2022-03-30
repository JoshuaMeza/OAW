const selectionBox=document.getElementById("sort-selection"),searchContent=document.getElementById("search-content"),btnAddNew=document.getElementById("btnAddNew"),RSSLink=document.getElementById("RSSLink"),btnUpdate=document.getElementById("btnUpdate"),news=[];
class New{constructor(a,b,c,d,e){this.title=a;this.date=b;this.url=c;this.description=d;this.categories=e}toString(){return'<div class="col-5 mb-3"><div class="card"><div class="card-body"><h5 class="card-title">'+this.title+'</h5><h6 class="card-subtitle mb-2 text-muted">'+this.date+'</h6><p class="card-text">'+this.description+'</p><p class="card-text text-muted fst-italic">'+this.categories+'</p><a href="'+this.url+'" class="card-link">'+this.url+"</a></div></div></div>"}}
listNews.data.forEach(a=>news.push(new New(a.title,a.date,a.url,a.description,a.categories)));document.addEventListener("DOMContentLoaded",function(){sortNews(news)});
const sortNews=function(a){selectionValue=selectionBox.value;switch(selectionValue){case "title":a.sort((b,c)=>b.title<c.title?-1:b.title>c.title?1:0);break;case "url":a.sort((b,c)=>b.url<c.url?-1:b.url>c.url?1:0);break;case "description":a.sort((b,c)=>b.description<c.description?-1:b.description>c.description?1:0);break;case "date":a.sort((b,c)=>{date1=new Date(b.date);date2=new Date(c.date);return date1<date2?-1:date1>date2?1:0});break;case "categories":"categories"==selectionValue&&a.sort((b,c)=>
b.categories<c.categories?-1:b.categories>c.categories?1:0)}showNews(a)};selectionBox.addEventListener("change",function(){0<searchContent.value.toLowerCase().length?filterNews():sortNews(news)});function showNews(a){var b=$("#news-box");b.empty();0<a.length?a.forEach(c=>{b.append(c.toString())}):showAlert("No se ha encontrado ninguna noticia, favor de a\u00f1adir una url de alg\u00fan feed.","error")}searchContent.addEventListener("keyup",function(){filterNews()});
const filterNews=function(){var a=searchContent.value.toLowerCase(),b=$("#news-box");b.empty();var c=[];for(let d of news)if(title=d.title.toLowerCase(),date=d.date.toLowerCase(),url=d.url.toLowerCase(),description=d.description.toLowerCase(),categories=d.categories.toLowerCase(),-1!==title.indexOf(a)||-1!==date.indexOf(a)||-1!==url.indexOf(a)||-1!==description.indexOf(a)||-1!==categories.indexOf(a))b.append(d.toString()),c.push(d);0==c.length?showAlert("No se ha encontrado ninguna coincidencia, intente nuevamente.",
"error"):sortNews(c)};btnAddNew.addEventListener("click",function(a){a.preventDefault();0==RSSLink.value.length?showAlert("Debe proporcionar una url.","error"):(rss_url=$("#create > .input-group > input[name=url]").val(),$.ajax({type:"POST",url:"./a\u00f1adir",data:{url:rss_url},success:function(){location.reload()}}).fail(function(){showAlert("No se pudo a\u00f1adir la fuente de noticias proporcionada.","error")}))});
btnUpdate.addEventListener("click",function(a){a.preventDefault();$("#updateSpinner").toggleClass("d-inline-block");$("#updateSpinner").toggleClass("d-none");token=$("#update > input[name=_token]").val();$.ajax({type:"POST",url:"./actualizar",data:{},success:function(){location.reload()}}).fail(function(){$("#updateSpinner").toggleClass("d-inline-block");$("#updateSpinner").toggleClass("d-none");showAlert("No se pudo a\u00f1adir la fuente de noticias proporcionada.","error")})});
$(".delete-form").click(function(a){a.preventDefault();id=$(this).data("id");$.ajax({type:"POST",url:"./eliminar",data:{id},success:function(){location.reload()}}).fail(function(){showAlert("No se pudo eliminar la fuente de noticias seleccionada.","error")});return!1});