<?php 
if(isset($_POST['target'])){ 
        $form= '<form method="post" action="' . $_POST['target'] . '">
                <input type="text" name="' . $_POST['1'] . '"><br>     
                <input type="text" name="' . $_POST['2'] . '"><br>
                <input type="text" name="' . $_POST['3'] . '"><br>
                <input type="text" name="' . $_POST['4'] . '"><br>
                <input type="text" name="' . $_POST['5'] . '"><br>
                <input type="submit" name="submit"  value="submit"><br/>
                </form>';
                echo $form;
}
?>

<h1> Testing playground</h1>
<form method="post">
    <input type="text" name="target" placeholder="Target php file" value="register.php"><br/>
    <input type="text" name="1" placeholder="name of variable 1" value="name"><br/>
    <input type="text" name="2" placeholder="name of variable 2" value="phn"><br/>
    <input type="text" name="3" placeholder="name of variable 3" value="password"><br/>
    <input type="text" name="4" placeholder="name of variable 4" value="admn"><br/>
    <input type="text" name="5" placeholder="name of variable 5" value="email"><br/>
    <input type="submit" name="submit"  value="submit"><br/>

</form>