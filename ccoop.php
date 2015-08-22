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
</style>

 <meta name="description" content="This file demonstrates the core economics of a cooperative. It uses variables, such as capitalization, number of members, income and redistribution of income.">

</head>

<BODY>
<h1>Core Cooperative Code</h1>
<h2>Standard micro-economics for cooperative ventures</h2>

<!- Enters key variables ->
<?php
if (isset($_GET['membersnum2']))
   {
     $membersnum = $_GET['membersnum2'];
   } else {
     $membersnum = 10;
   }
?>

<FORM METHOD="GET" ACTION="ccoop.php">
Initial Capitalization:<br>
<TEXTAREA NAME="capital1" ROWS=1 COLS=15
WRAP=soft>100000</textarea>
<br>
Number of Members:<br>
<TEXTAREA NAME="membersnum2" ROWS=1 COLS=4
WRAP=soft><?php echo $membersnum ?></textarea>

<?php
$capital1 = $_GET['capital1'];
$membersfraction = 1/$membersnum;

function percent($membersfraction){
    return $membersfraction * 100 . '%';
}

$memberinvestment = $capital1/$membersnum;

?>

<p>
Percentage Ownership of Members if All Have Equal Shares:<br>
 <?php echo percent($membersfraction) ?>

<P>
<!-- The following takes entered values of income and capitalgain and sums them into return. Then the return per share of ownership is calculated and displayed. -->

Income:<br>
<TEXTAREA NAME="income" ROWS=1 COLS=15
WRAP=soft>25000</textarea>
<br>
Capital Gain:<br>
<TEXTAREA NAME="capitalgain" ROWS=1 COLS=15
WRAP=soft>25000</textarea>
<br>

<?php
$income = $_GET['income'];
$capitalgain = $_GET['capitalgain'];
$return = $income + $capitalgain;
?>

<hr>
Calculate the following metrics based on figures entered above.
<p>
Amount invested by each member: $<?php echo $memberinvestment ?>
<p>

Return: $<?php echo $return ?><p>
<!-- <TEXTAREA NAME="return" ROWS=1 COLS=15
WRAP=soft><?php echo $return ?></textarea>
<br> -->

<?php
$returnmembershare = $return * $membersfraction;
?>

Share of Return per Member: $<?php echo $returnmembershare ?><p>
<!-- <TEXTAREA NAME="returnmembershare" ROWS=1 COLS=15
WRAP=soft><?php echo $returnmembershare ?></textarea>
<br> -->
<input type=submit value=‘submit’>
<input type=reset  value=‘reset’>
<BR>
</FORM>
</BODY>