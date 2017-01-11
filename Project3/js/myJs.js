/*




*/

var searchTerm;

function showType(type)
{

	if(type == 'title')
	{
		document.getElementById("description").style.display='none';
		document.getElementById("title").style.display='';
		document.getElementById("titleRadio").checked = true;

		if(getQueryVariable('title') != false)
		document.getElementById("title").value=getQueryVariable('title');
		
		document.getElementById("description").value='';
		

	}
	else if (type == 'description') {

		document.getElementById("title").style.display='none';
		document.getElementById("description").style.display='';
		if(getQueryVariable('description') != false)
		document.getElementById("description").value=getQueryVariable('description');

		document.getElementById("descriptionRadio").checked = true;
		
		document.getElementById("title").value='';
		

	}
	else if (type == 'all')
	{

	

		document.getElementById("title").style.display='none';
		document.getElementById("description").style.display='none';
		document.getElementById("description").value='';
		document.getElementById("title").value='';
		document.getElementById("allRadio").checked = true;
		searchTerm='';




	}


	
}
	
function replaceAll(str, find, replace) {
  return str.replace(new RegExp(find, 'g'), replace);
}

function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}

window.onload=function() { 

filterType=getQueryVariable('filterType');


	if(filterType == 'title')
	{
		
		showType('title');

	}
	else if (filterType == 'description') {


		showType('description');

		searchTerm=getQueryVariable('description');



		if(searchTerm != false && searchTerm != '')
		{


			var toReplace=searchTerm;

			$("#result p").each(function() {

				var replacement='<span style="background-color: yellow;">'+searchTerm+'</span>';

				this.innerHTML=replaceAll(this.innerHTML, toReplace,replacement );

			});

		}
		

	}
	else if (filterType == 'all')
	{
		

		showType('all');


	}
	else
	{
		showType('title');
	}

	

};
