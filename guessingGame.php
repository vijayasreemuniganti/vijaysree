<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Guessing Game</title>
</head>
<body>
    
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-6 col-md-6 mr-3  border rounded p-4 border-danger">
                <form action="" method="GET">
                    <div class="form-group row">
                        <label for="guessNumber" class="col-4 ml-auto" style="color:DodgerBlue;"> Please Guess a Number </label>
                        <div class="col-8 mr-auto">
                            <input type="text" name="guessNumber" placeholder="Guess A Number between 1 to 20" class="form-control col-6">
                        </div>
                    </div>

                    <button type="submit" name="submit" class="m-2 form-control btn btn-lg btn-block text-center btn-success p-2"> See The Result </button>
    
                </form>
            </div>




            <div class="col-lg-5 col-md-5 p-3 border rounded border-primary mx-auto">
                <?php

                $rand = $_SESSION['rand'];
                $guessNumber = 0;

                //echo "random number " . $rand . "<br>";


                if (isset($_GET['submit'])) {
                    //echo " Clicked <br>";
                    $counter = $_SESSION['counter'];
                    if ($counter < 4) {
                        $guessNumber = $_GET['guessNumber'];
                        //echo "guess number " . $guessNumber . "<br>";
                        $_SESSION['counter'] = $_SESSION['counter'] + 1;
                        //echo "Counter " . $_SESSION['counter'] . "<br>";
                        if ($guessNumber < $rand) {
                           echo '<img src="https://previews.123rf.com/images/arcady31/arcady311705/arcady31170500009/77165345-oops-vector-banner-with-emoji.jpg" height="130px" width="150px">';

                           echo "<h2 class='text-danger text-center'> Opps... </h2>";
                           echo "<h4 class='text-danger text-center'> Your Guessed Number is Too Low </h4>";
                           echo "<h2 class='text-danger text-center'> Please Try Again... </h2>"; 
                        }else if($guessNumber > $rand){
                            echo '<img src="https://previews.123rf.com/images/arcady31/arcady311705/arcady31170500009/77165345-oops-vector-banner-with-emoji.jpg" height="130px" width="150px">';
                            echo "<h2 class='text-primary text-center'> Opps... </h2>";
                            echo "<h4 class='text-primary text-center'> Your Guessed Number is Too High </h4>";
                             echo "<h2 class='text-primary text-center'> Please Try Again... </h2>"; 
                        }
                        else if($rand == $guessNumber) {
                            echo '<img src="https://t4.ftcdn.net/jpg/03/61/34/63/360_F_361346394_x5omMsoglwAJ2I1Dh4K53nZePHpiXylL.jpg" height="300px" width="400px">';
                            
    
                            echo "<h4 class='text-success border text-center'> You Guessed The Correct Number " . $rand . "<br>"
                                . "You Have Tried " . $_SESSION['counter'] . " Times </h4>";
                            $_SESSION['counter'] = 0;
                            echo "<script>
                             setTimeout(function(){ alert('CONGRATULATIONS !!! PLEASE RE-START THE GAME'); }, 2000);
                            </script>";
                            header('refresh: 3; url=index.php');
                        }
                    } else {
                        echo '<img src="https://previews.123rf.com/images/arcady31/arcady311705/arcady31170500009/77165345-oops-vector-banner-with-emoji.jpg" height="130px" width="150px">';
                        echo "<h2 class='text-danger text-center'> Sorry </h2>";
                        echo "<h3 class='text-danger text-center'> You have tried 5 Times </h3>";
                        echo "<h4 class='text-center'>The Random Number Was " . $rand ."</h4>";
                        echo "<script>
                            setTimeout(function(){ alert('GAME OVER :( PLEASE RE-START THE GAME'); }, 1000);
                        </script>";
                        header('refresh: 3; url=index.php');
                    }
                }


                ?>

               
            </div>
        </div>
    </div>




    
</body>

</html>