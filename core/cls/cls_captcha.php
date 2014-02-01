 <?php
session_start();
/**********************
    Simple Captcha class
    usage: 
    
    page.html 
    ************************************************
        <form action="..." method="..." ... >
            ...
            <img src="captcha.class.php" alt="captcha" title="captcha" />
            <input type="text" name="cct" />
            ...
            <input type="submit" value="Evaluate" />
        </form>
    ************************************************
    captcha.php
    ************************************************
    
    checking captcha 
    ************************************************
    if($_POST['ccpt']==$_SESSION['s'])
    {
        print('OK!');
    }
*/
class captcha{

    //constructor
    public function __construct()
    {
        //header ("Content-type: image/png"); 
        //get the random string
        $_SESSION['s']=$this->sec();
        //resource imagecreatefromjpeg ( string $filename )
        //load the base image
        $img = imagecreatefromjpeg('image.jpg');
        //displaying the random text on the captcha
        //set the chars color
        $color1= imagecolorallocate($img, 5, 5, 5);
        $color2 = imagecolorallocate($img, 255, 255, 255);
        //bool imagestring ( resource $image , int $font , int $x , int $y , string $string , int $color )
        //Draw a string horizontally on the image, the first is near to white and the second black
        imagestring($img,3, 15, 5, $_SESSION['s'], $color2);
        imagestring($img,5, 3, 5, $_SESSION['s'], $color1);
        //output the image to browser
         imagejpeg($img); 
    }
    
    //return the random string
    private function sec()
    {
        //chars allowed
        $str='QAZWSXEDCRFVTGBYHNUJMIKLOPqazwsxedcrfvtgbyhnujmkiolp';
        //lenght
        $lenght=7;
        $cont=0;
        $s="";
        //loop for the random generation
        //the string is generated with a blank space between the chars "A x F t" 
        //in the main page the comparison will be made between $_SESSION['s'] and str_replace(' ','',$_POST[])
        while($cont++<$lenght)
            $s.=$str{rand(0,strlen( $str ) ) }.' ';
        //returns the generated string
        return $s;
    }
    
}


new captcha();
    
?> 