var lastID;
var gettingMessage;
var sending;

function initialise ( )
{
	lastID = 0;
	gettingMessage = false;
	sending = false;

	updateMessages_start ( );
	
	setInterval ( updateMessages, 5000 );
}

function updateMessages_start ( )
{
	if ( gettingMessage === false )
	{
		getLast10Messages ( );
	}
}

function getLast10Messages ( id )
{
	gettingMessage = true;
	
	var messagesToReturn = new Array ( );

	var httpRequest = new XMLHttpRequest ( );	
	httpRequest.onreadystatechange = fetchMessages_start;
	
	httpRequest.open ( "GET", "fetch.php" );
	httpRequest.send ( );
	
	function fetchMessages_start ( )
	{
		if ( httpRequest.readyState === 4 )
		{
			var fetchedMessages =  JSON.parse ( httpRequest.responseText );
			
			for ( var id in fetchedMessages )
			{
				messagesToReturn.push ( [ fetchedMessages[id].username, fetchedMessages[id].message ] );
				if ( fetchedMessages[id].ID > lastID ) 
					lastID = fetchedMessages[id].ID;
			}
			
			messagesToReturn.reverse ( );
			
			setMessage ( messagesToReturn );
			gettingMessage = false;
			
			if ( sending == true )
			{
					document.getElementById ( 'postMessage' ).value = "";
					document.getElementById ( 'status' ).style.color = "lightgray";
					sending = false;
			}
		}
	}
}


function updateMessages ( )
{
	if ( gettingMessage === false )
	{
		getMessagesAfter ( lastID );
	}
}

function setMessage ( newMessages )
{
	var key;
	for ( key in newMessages )
	{
		document.getElementById ( "messages" ).innerHTML = document.getElementById ( "messages" ).innerHTML + "<b>" + newMessages[key][0] + "</b> : " + newMessages[key][1] + "<br>";
	}
	if ( key != undefined )
		document.getElementById( "messages" ).scrollTop = document.getElementById( "messages" ).scrollHeight;	
}

function getMessagesAfter ( id )
{
	gettingMessage = true;
	
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
				if ( fetchedMessages[id].ID > lastID ) 
					lastID = fetchedMessages[id].ID;
			}
			
			setMessage ( messagesToReturn );
			gettingMessage = false;
			
			if ( sending == true )
			{
					document.getElementById ( 'postMessage' ).value = "";
					document.getElementById ( 'status' ).style.color = "lightgray";
					sending = false;
			}
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
	
	document.getElementById ( 'status' ).style.display = "inline-block";
	sending = true;

	var message = document.getElementById ( 'postMessage' ).value;

	var httpRequest;
	httpRequest = new XMLHttpRequest ( );	
	
	httpRequest.open ( "POST", "put.php", false );
	httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	
	httpRequest.send ( 'message=' + message );
	
	updateMessages ( );
	
	document.getElementById ( 'status' ).style.display = "none";
}
