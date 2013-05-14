var lastID;

function initialise ( )
{
	lastID = 0;

	updateMessages ( );
	
	setInterval ( updateMessages, 500 );
}


function updateMessages ( )
{
	getMessagesAfter ( lastID );	
}

function setMessage ( newMessages )
{
	for ( var key in newMessages )
	{
		document.getElementById ( "messages" ).innerHTML = document.getElementById ( "messages" ).innerHTML + "<b>" + newMessages[key][0] + "</b> : " + newMessages[key][1] + "<br>";
	}
}

function getMessagesAfter ( id )
{
	var messagesToReturn = new Array ( );

	var httpRequest = new XMLHttpRequest ( );	
	httpRequest.onreadystatechange = fetchMessagesAfter;
	
	httpRequest.open ( "GET", "fetch.php?lastID=" + lastID, true );
	httpRequest.send ( );
	
	function fetchMessagesAfter ( )
	{
		if ( httpRequest.readyState === 4 )
		{
			var fetchedMessages =  JSON.parse ( httpRequest.responseText );
			
			for ( var id in fetchedMessages )
			{
				messagesToReturn.push ( [ fetchedMessages[id].username, fetchedMessages[id].message ] );
				lastID = fetchedMessages[id].ID;
			}
			
			setMessage ( messagesToReturn );
		}
	}

}


function postMessage ( event )
{
	
	if ( event != undefined )
	{
		if ( event.keyCode != 13 )
			return false;
	}

	var message = document.getElementById ( 'postMessage' ).value;

	var httpRequest;
	httpRequest = new XMLHttpRequest ( );	
	
	httpRequest.open ( "POST", "put.php", false );
	httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	
	document.getElementById ( 'status' ).style.color = "blue";
	document.getElementById ( 'status' ).style.textDecoration = "none";
	httpRequest.send ( 'message=' + message );
	
	updateMessages ( );
	
	document.getElementById ( 'status' ).style.color = "lightgray";
	document.getElementById ( 'status' ).style.textDecoration = "line-through";
	document.getElementById ( 'postMessage' ).value = "";
}
