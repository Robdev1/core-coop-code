<HEAD>
<STYLE>
body {
    background-color: linen;
    font-family: Helvetica, "Nimbus Sans L", "Liberation Sans", Arial, sans-serif;
     width:960px;
     }

h1 {
    color: maroon;
   } 
</STYLE>

 <meta name="description" content="This file demonstrates the core economics of a cooperative. It uses variables, such as capitalization, number of members, income and redistribution of income.">
</HEAD>

<BODY>
<h1>Core Cooperative Code</h1>
<h2>Standard micro-economics for cooperative ventures</h2>

<!- Enters key variables ->
<?php
if (isset($_GET['membersnum']))
   {
     $membersnum = $_GET['membersnum'];
   } else {
     $membersnum = 10;
   }   if (isset($_GET['capital1']))
   {
     $capital1 = $_GET['capital1'];
   } else {
     $capital1 = 10000;
   }
$capital1output = number_format($capital1, 2);?>

<FORM METHOD="GET" ACTION="ccoop.php">
Initial Capitalization:<br>
<TEXTAREA NAME="capital1" ROWS=1 COLS=15
WRAP=soft><?php echo $capital1 ?></textarea>
<br>
Number of Members:<br>
<TEXTAREA NAME="membersnum" ROWS=1 COLS=4
WRAP=soft><?php echo $membersnum ?></textarea>

<?php
$capital1 = $_GET['capital1'];
$membersfraction = 1/$membersnum;
# This function takes a decimal number, calculates its as a percent and returns it to two decimal places, appending the percentage sign on it for outputting in a line of text.
function percent($decival){
    return number_format($decival * 100, 2) . '%';
}

$memberinvestment = number_format(($capital1/$membersnum) , 2);

?>
<p><input type=submit value=‘submit’>
<input type=reset  value=‘reset’>
<BR>
</FORM>
<hr><!-- SCENARIO 1 EGALITARIAN --><h3>Scenario 1: Egalitarian</h3>
Percentage Ownership of Members if All Have Equal Shares: 
 <?php echo percent($membersfraction) ?>

<br>
Amount contributed by each member: $<?php echo $memberinvestment ?>
<br>

<hr><!-- SCENARIO 2 MAJORDOMO  - This looks at the effect of one majority stakeholder --><h3>Scenario 2: Majordomo with 51% Majority</h3>
If one member holds 51%, and the remaining shares are divided equally among the others:<p><?php$amtfor51pcter = $capital1 * .51;$amtfor51pcter = number_format($amtfor51pcter, 2, ".", ",");$numremainmembers = $membersnum - 1;$remainderdecival = .49/$numremainmembers;$amtremainmemberstotal = $capital1 * .49;$amtperremainmembers = number_format(($amtremainmemberstotal / $numremainmembers), 2);echo (" * The majority stakeholder (majordomo) member with 51% ownership contributes  $$amtfor51pcter <br>");echo (" * The other  $numremainmembers  contribute  $$amtperremainmembers each for "); echo percent($remainderdecival); echo (" portion each.<p>");?><hr><!-- SCENARIO 3 4321BFEAKDOWN--><h3>Scenario 3: 40% - 30% - 20% - 10% Ownership (4321 4-Member Breakdown)</h3><?php$membersnum4321 = 4;$member4pct = number_format((.4 * 100));$member3pct = number_format((.3 * 100));$member2pct = number_format((.2 * 100));$member1pct = number_format((.1 * 100));?>If the ownership breaks down so that four members have <?php echo (" $member4pct%, $member3pct%, $member2pct% and $member1pct%"); ?> respectively, then,<br>the members must contribute:<br><?php$member4contrib = number_format((.4 * $capital1), 2);$member3contrib = number_format((.3 * $capital1), 2);$member2contrib = number_format((.2 * $capital1), 2);$member1contrib = number_format((.1 * $capital1), 2);echo (" $ $member4contrib <br> $ $member3contrib <br> $ $member2contrib <br> $ $member1contrib <br> in order for the venture to raise $$capital1output.<p>");?>

</BODY>