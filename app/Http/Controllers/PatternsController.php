<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\DivisionByZeroExceptionx;
use \Exception;

class PatternsController extends Controller
{
    //printing star

    public function pyramid()
    {
       //$i=0;
       ///$j=0;
       
       for($i=1;$i<=5;$i++)
       {
         for($j=1;$j<=$i;$j++)
         {
            //echo $j;
            echo "*";
         }
         //echo $i;
         echo "\n";
       }
    }

      //print star in triangle

    public function triangle(Request $request)
    {

         $k =$request->n;
        
         for ($i = 0; $i <$k; $i++)
         { 
            for($j=0;$j<($k-$i);$j++) {
                echo "&nbsp";
            }
            for($x=0;$x<$i+1;$x++){
                echo "*";
            }
            echo "<br>";
           
         }
    }

      //Swapping Logic 
     
    public function Swapping(Request $request)
    {
        $a = $request->a;  
        $b = $request->b; 
        
        if($a==null && $b==null)
        {   
           echo "Varible value not set";
        }
       else{
         // Swapping Logic  
       $third = $a;  
       $a = $b;  
       $b = $third;  
       echo "After swapping:<br><br>";  
       echo "a =".$a."  b=".$b;  
       }
      
        
    }

    public  function arraypattern()
    {
       $arr = array(array(1,2,3),array(4,5,6),array(7,8,9),array(11,12,13));

        $row=4;
        $col=3;

        echo "Original Array";
        echo "<br>";
        for($i=0;$i<$row;$i++)
        {
          for($j=0;$j<$col;$j++)
          {
            echo $arr[$i][$j]."&nbsp";
            
            
          }
          echo "<br>";
        }
        echo "<br>";
        echo "OutPut: <br>";

        for($i=0;$i<$row;$i++)
        {
           if($i%2==0)
           {
            for($j=0;$j<$col;$j++)
            {
               echo $arr[$i][$j]."&nbsp"; 
            }
           }
           else
           {
              for($j=$col-1; $j>=0;$j--)
              {
               echo $arr[$i][$j]."&nbsp";
              }
           }
        }
    }

    public function arraylength()
    {
      $arr =array(1,2,3,4,5,6,7,8);
      $i=0;
      $count=0;

      foreach($arr as $a)
      {
         $count=$count+1;
      }

      echo $count;

      // while ($arr[$i]!='')
      //   {  
      //    $count=$count+1;
      //   }
      //   echo $count;
    }

    public function arraycheckelement(Request $request)
    {
      $arr =array(1,2,3,4,5,6,2,8);
      $num=$request->num;
      $count=0;

      foreach($arr as  $a)
      {
         if($num==$a)
         {
            $count=$count+1;
         }
      }
      echo "No $num is ocurre:->".$count;
    }

    public function greatestValue()
    {
      $a = array(10, 20, 52, 105, 56, 89, 96);
      $b = 0;
      $c = 0;
      foreach ($a as $key=>$val) 
      {
         if ($val > $b) {
            $b = $val;
         }
      }
     // echo $b;
      foreach ($a as $key=>$val) 
      {
         if ($val < $b) {
            $c = $val;
         }
      }
      foreach ($a as $val)
      {
         echo $val;
         echo "\n";
      }
      echo "<br>";
      echo "Second Highest Value In Array:------>".$c;
   }

    public function sumofarray()
    {
      $a = array(10, 20, 52, 105, 56, 89, 96);
      $sum=0;

      foreach($a as $val)
      {
         $sum=$sum+$val;
      }

      echo $sum;
    }

    public function reversestring()
    {
      $name="vaibhav";

      $a=strlen($name);
      //$b=
      //echo $b;

      for($i=$a-1;$i>=0;$i--)
      {
         echo $name[$i];
      }
    }

    public function tableno(Request $request)
    {
       $no=$request->no;
       $temp=$no;
      echo "<table border=1px solid black;>";
       for($i=0; $i<=9;$i++)
       {
          echo "<tr>";
          echo "<td>".$temp."\n"."</td>";
          echo "</tr>";
          $temp=$no+$temp;
         
       }
       echo "</table>";
    }

    public function arraytrial(Request $request)
    {
      $a=array(1,2,3,5,7,11,41);
      $no=$request->no;

      $b=count($a);
     // echo $b;
      for($i=0;$i<=$b-1;$i++)
      {
         if($a[$i]==$no)
         {
            echo "Found At Position->".$i;
         }
        
      }

      
      //echo "not Found";
      //echo "<h3>". $a[5]."</h3>";
    }

    public function binaryserach(Request $request)
    {
      //   $arr=array(1,2,3,4,6,9);
      //   $low=0;
      //   $max=count($arr);
      //   $mid=0;
      //   $x=3;
      //   $mid=$low+$max/2;
      //  // echo $mid;

      // for($i=$max-1;$i>=0;$i--)
      // {
      //    echo $arr[$i]."\n";
      // }

       $a="DAD";
       
       $b=strlen($a);
       $d=strrev($a); //strrev

      //  echo $a[0];
      //  echo "<br>";
      //  echo $a[$b-1];
      //  echo "<br>";
      for($i=0;$i<$b;$i++)
      {
           if($i%2==0)
           {
              echo "Evene letter---->".$a[$i];
              
              echo "<br>";
           }
      }

      //  if($a/2)
      //  {
      //   // echo "String Ending With Same Letter";
      //     echo "String are same";
      //  }
      //  else
      //  {
      //    //echo "String Ending With Different Letter";
      //      echo "String are not same";
      //  }


    }

    public function arraycheck()
    {
      $hackers = array ('Alan Kay', 'Peter Norvig', 'Linus Trovalds', 'Larry Page');

      print_r($hackers);

      // Search
      $pos = array_search('Linus Trovalds', $hackers);

      // array_seearch returns false if an element is not found
     // so we need to do a strict check here to make sure
     if ($pos !== false) {
       echo 'Linus Trovalds found at: ' . $pos;

       // Remove from array
      unset($hackers[$pos]);
      }

       print_r($hackers);
    }

    public function whilecount()
    {
      $arr=array(1,2,3,4,6,9);
      $b=count($arr);
      $i=0;
      $count=0;

      while($arr[$i]<=$b-1)
      {
         $count=$count+1;
         //$i=$i+1; 
      }
      echo $count;

    }

    public function error()
    {
      $a=2;
      $b=2;

   
      
     if($b==0)
     {
        echo "Division not posible";
     }
     else
     {
         $div=$a/$b;
         echo "Division Is:-".$div;
     }

    }

    public function factorialno(Request $request)
    {

      $no=$request->no;
      $factno=1;

      for($i=$no;$i>=1;$i--)
      {
         $factno=$i*$factno;
      }
      
      echo "Factorial of $no is =".$factno;

    }


    public function Occurring()
    {
      $arr=array(1,5,1,4,5,9,1,4);
      $arrcount=[];
      //$no=1;
      date_default_timezone_set('Asia/Kolkata');
     
      // echo "<pre>";
      //  print_r(array_count_values($arr));
      // echo "</pre>";
     foreach($arr as $val)
     {
         // if($arrcount[$val])
         // {
         //   //$arrcount=$arrcount+1;
         //   $arrcount[$val]= $arrcount[$val]+1;

         // }
         // else
         // {
         //    $arrcount[$val]=1;
         // }

         echo $val."\n";
     }
        echo "<pre>";
        //print_r($arrcount);
        echo "</pre>";

      //   echo "<br>";
      //   echo "<br>";
      //   echo date('d-m-Y');
    }

    


}
