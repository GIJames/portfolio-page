var players = [["1-1","1-2"],["2-1","2-2"],["3-1"]];

function transitionTo(player){
	for (i = 0; i < players.length; i++) {
			if( i !== player ){
				for (j = 0; j < players[i].length; j++){
					document.getElementById(players[i][j]).className = "player";
				}
			}
		}
	for (k = 0; k  < players[player].length; k++){
		document.getElementById(players[player][k]).className = "player-big";
	}
}

var tid = 0;

function expand(player){
	var temptid = tid = tid + 1;
	setTimeout( function(){ if( temptid == tid ) transitionTo(player);}, 150)
}
