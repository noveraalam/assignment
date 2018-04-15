<!DOCTYPE html>
<html>

<head>
<H1> Casino Royal</H1><p>
<H3>Kuril, Dhaka</H3>
<p>Kuratoli Road</p>

<title>Let's Craps</title>
<script type="text/javascript">

// game variables
var WON = 0, LOST = 1, CONTINUE_ROLLING = 2;

     // other
     var firstRoll = true,            // true if first roll
         sumOfDice = 0,               // sum of the dice
         myPoint = 0, // point if no win/loss on first roll
         gameStatus = CONTINUE_ROLLING, // game not over yet
bankBalance = 1000;

Bet = window.prompt( "How much are you brave enough to bet?", "0" );
Bet = parseInt( Bet )// after taking bet for process one roll of the dice
     function play()
     {

        if ( firstRoll ) 
    {        // first rolling
           sumOfDice = rollDice();        

           switch ( sumOfDice ) 
       {
              case 7: case 11:         // win in the first roll
                 gameStatus = WON;
                 // clear point field
                 document.craps.point.value = ""; 
                 break;
              case 2: case 3: case 12: // lost in the first roll
                 gameStatus = LOST;
                 // clear  field
                 document.craps.point.value = ""; 
                 break;
              default:                   // remember the point
                 gameStatus = CONTINUE_ROLLING;
                 myPoint = sumOfDice;
                 document.craps.point.value = myPoint; 
                 firstRoll = false;


           }
        }
        else 
    {
           sumOfDice = rollDice();

           if ( sumOfDice == myPoint ) // win by accuaring making point
              gameStatus = WON;

           else
              if ( sumOfDice == 7 )    // lost by rolling 7
                 gameStatus = LOST;
        }

        if ( gameStatus == CONTINUE_ROLLING )
           window.status = "Roll again";
        else 
    {
           if ( gameStatus == WON )
              {
        window.status = "Player wins. " +
                 "Click Roll Dice to play again.";

         bankBalance = bankBalance + Bet;

         document.craps.moola.value = bankBalance;
        }
           else
       {
              window.status = "Player loses. " + 
                 "Click Roll Dice to play again.";

      bankBalance -= Bet;

       document.craps.moola.value = bankBalance;

           firstRoll = true;
       }
        }     
  }

     // roll the dice
     function rollDice()
     {
        var die1, die2, workSum;

        die1 = Math.floor( 1 + Math.random() * 6 );
        die2 = Math.floor( 1 + Math.random() * 6 );
        workSum = die1 + die2;

        document.craps.firstDie.value = die1;
        document.craps.secondDie.value = die2;
        document.craps.sum.value = workSum;

        return workSum;


     }
     // 
--> 
</script>
</head>
<body>
<form name = "craps" action = "">
<table border = "1">
<caption>Craps</caption>
<tr><td>Die 1</td>
<td><input name = "firstDie" type = "text" />
</td></tr>
<tr><td>Die 2</td>
<td><input name = "secondDie" type = "text" />
</td></tr>
<tr><td>Sum</td>
<td><input name = "sum" type = "text" />
</td></tr>
<tr><td>Point</td>
<td><input name = "point" type = "text" />
</td></tr>

<tr>
<td>Balance</td> 
<td rowspan="1" colspan="1">
<input name="moola" type="text" value="1000" /> 
</td>
</tr>
<tr><td><input type = "button" value = "Roll Dice" onclick = "play()" /></td></tr>
</table>
</form>
</body>
</html>