<?php
for ($i=1; $i<=100; $i++) {
    if ($i % 3  == 0)
    {
        if ($i % 5  == 0)
        {
                //foobar
                echo "foobar";
        }else{
             //foo
             echo "foo";
        }  
    }elseif($i % 5  == 0){
        //bar
        echo "bar";
    }else{
        //phew now foobar's spotted :)
        echo $i;
    }
    //  get rid that pesky last comma
    if($i < 100 ) {echo ", ";}
}

// Switch version bit longer but i think more elegant
// echo "<br><br>";

// for ($x = 1; $x <= 100; $x ++ ) {
// 	switch ($x) {
// 		case $x % 3 == 0 && $x % 5 == 0:
// 			$foo = "foobar";
// 			break;
			
// 		case $x % 5 == 0:
// 			$foo = "bar";
// 			break;
			
// 		case $x % 3 == 0:
// 			$foo = "foo";
// 			break;
			
// 		default:
// 			$foo = $x;
			
//     }
	
// 	echo $foo;
// 	//  get rid that pesky last comma
// 	if($x < 100 ) {echo ", ";}   
    
// }
