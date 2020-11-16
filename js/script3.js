function incarca(res) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("continut").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", res, true);
  xhttp.send();
}
function MovieAPI(){
	
	var titlu=document.getElementById("searchText").value;
	var xhttp=new XMLHttpRequest();
	xhttp.onreadystatechange=function(){
		if(this.readyState== 4 &&this.status==200) {
			jsonObj1=JSON.parse(this.responseText);
			createPage(jsonObj1);
		}
	}
	xhttp.open("GET","http://www.omdbapi.com?s="+titlu+"&apikey=a187c39",true);
	xhttp.send();
}
function createPage(jsonObj1){
	for(var i=0;i<jsonObj1.Search.length;++i)
	{
		var title=jsonObj1.Search[i].Title;
		var poster=jsonObj1.Search[i].Poster;
		var imdb=jsonObj1.Search[i].imdbID;
		document.getElementById("movies").innerHTML+="<div class=col-md-3><div class=well-text-center><img src="+poster+"><h5>"+title+"</h5><a onclick=getMovie('"+imdb+"'); href=#>Movie Details</a></div></div>";
	}
}
var jsonObj;
function getMovie(id)
{
	var titlu=document.getElementById("searchText").value;
	var xhttp=new XMLHttpRequest();
	xhttp.onreadystatechange=function(){
		if(this.readyState== 4 &&this.status==200) {
			jsonObj=JSON.parse(this.responseText);
			createPage2(jsonObj);
			
		}
	}
	xhttp.open("GET","http://www.omdbapi.com?i="+id+"&apikey=a187c39",true);
	xhttp.send();
	
}
function createPage2(jsonObj)
{
	document.getElementById("movie").innerHTML="<div class=row><div class=col-md-4><img src="+jsonObj.Poster+" class=thumbnail></div><div class=col-md-8><h2>"+jsonObj.Title+"</h2><ul class=list-group><li class=list-group-item><strong>Genre: </strong>"+jsonObj.Genre+"</li><li class=list-group-item><strong>Released:</strong> "+jsonObj.Released+"</li><li class=list-group-item><strong>Rated:</strong> "+jsonObj.Rated+"</li><li class=list-group-item><strong>IMDB Rating:</strong> "+jsonObj.imdbRating+"</li> <li class=list-group-item><strong>Director:</strong> "+jsonObj.Director+"</li> <li class=list-group-item><strong>Writer: </strong>"+jsonObj.Writer+"</li> <li class=list-group-item><strong>Actors: </strong>"+jsonObj.Actors+"</li></ul></div></div><div class=row><div class=well><h3>Plot: </h3><span>"+jsonObj.Plot+"</span><hr><a href=http://imdb.com/title/"+jsonObj.imdbID+" target=_blank class=btn-btn-primary>View IMDB</a><a href=index.php class=btn-btn-primary>Main Page</a><a onclick='cookietransfer()' class=btn-btn-primary>Add to list</a></div></div>";
	document.getElementById("hide").style.display="none";
	document.getElementById("hide1").style.display="none";	
}
function cookietransfer()
{
	document.cookie="imdb_id="+jsonObj.imdbID;
	document.cookie="title="+jsonObj.Title;
	document.cookie="genre="+jsonObj.Genre;
	document.cookie="imdbRating="+jsonObj.imdbRating;
	document.cookie="releasedate="+jsonObj.Released;
	window.location.replace("index.php");
}
