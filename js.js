var lastID;

setInterval ( updateMessages, 1000 );

function initialise ( )
{
	lastID = 0;

	updateMessages ( );
}


function updateMessages ( )
{
	var newMessages = getMessagesAfter ( lastID );

	for ( var key in newMessages )
	{
		document.getElementById ( "messages" ).innerHTML = document.getElementById ( "messages" ).innerHTML + "<b>" + newMessages[key][0] + "</b> : " + newMessages[key][1] + "<br>";
	}
}

function getMessagesAfter ( id )
{
	var httpRequest;
	var messagesToReturn = new Array ( );

	httpRequest = new XMLHttpRequest ( );	
	
	httpRequest.open ( "GET", "fetch.php?lastID=" + lastID, false );
	httpRequest.send ( );

	var fetchedMessages =  JSON.parse ( httpRequest.responseText );

	for ( var id in fetchedMessages )
	{
		messagesToReturn.push ( [ fetchedMessages[id].username, fetchedMessages[id].message ] );
		lastID = fetchedMessages[id].ID;
	}

	return messagesToReturn;

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
	httpRequest.send ( 'message=' + message );

	updateMessages ( );

	document.getElementById ( 'postMessage' ).value = "";
}