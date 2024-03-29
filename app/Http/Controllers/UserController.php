<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;  

use App\Models\Employeetbl;

class UserController extends Controller  
{
    //fetch all user
    public function fetchUser()
    {
        $users=User::all();

        return $users;
    }

    //pdf

    public function user()
    {
      $user=DB::select("SELECT * FROM `users`");
      //return $user;

      $pdf = PDF::loadView('userpdf',compact('user'));
      return $pdf->download('Users.pdf'); 
      //return $pdf->stream('Users.pdf',array('Attachment'=>0));
    }

   //pdf generation
    public function parsingjson()
    {
         $count=0;
         $path = storage_path()."/airports.json"; 

         $json = json_decode(file_get_contents($path), true); 
         var_dump($json);
        echo '<table border=1px solid black;>';
        echo '<tr>';
       // echo '<th>Sr No</th>';
        echo '<th>Code</th>';
        echo '<th>Airport Name</th>';
        echo '</tr>'; 
        //  foreach($json as $name => $data) 
        //   {
        //     if($data['country']=="India" && $data['state']=="Maharashtra")
        //     {
        //        // echo $data['code'] ."               ".$data['name'] ."\n";
        //        $count++;
        //         echo "<tr>";
        //         echo  "<td>".$count."</td>";
        //         echo "<td>".$data['code']."</td>" ;
        //         echo "<td>".$data['name']."</td>";
        //         echo "</tr>";  
        //     }    
        //   }
          //echo "<tr>" ."Total No of Airport:"$pdf = PDF::loadView('myPDF',compact('json','count'));
         // return $pdf->download('Airport.pdf'); .$count."</tr>";
           echo "</table>"; 
           $table ="</table>"; 
          //echo "Total No of Airport:".$count;
           $pdf = PDF::loadView('myPDF',compact('json','count'));
          return $pdf->download('Airport.pdf'); 
    }


    //excelled sheet


  //   public function exporttransactionsexcel(Request $request) {
  //       $header = array("Customer ID", "Withdrawal ID","Transaction ID","Customer Name", "Account Number", "IFSC Code", "Amount", "Date","Status");
  //       $spreadsheet = new Spreadsheet();
  //       $sheet = $spreadsheet->getActiveSheet();
  //       $sheet->fromArray([$header], NULL, 'A1');
  
  //       $rowCount = 2;
  
  //       $prsddt=Carbon::parse($request->reqdate)->format('Y-m-d');
  //       //echo $prsddt;
  //       $prodx=DB::select("SELECT * FROM transactiontbl t, withdrawrequest w, kyctbl k  WHERE w.transid=t.transactionid AND (w.requestdt::date=? OR t.transactiondate=?) AND k.customerid=w.customerid AND w.reqstatus='UNAPPROVED' ORDER BY w.requestdt",[$prsddt,$prsddt]);
  //       //print_r($prodx);
  //       //echo $prodx->toSql();
  //       //return $prodx;
  //       //dd(\DB::getQueryLog());
  // //      print_r( $prodx->getBindings() );
  
  //         foreach ($prodx as $element) {
       
  //             //$sheet->fromArray([$element], NULL, 'A'.$rowCount);
  //             $sheet->setCellValue('A' . $rowCount, $element->customerid);
  //             $sheet->setCellValue('B' . $rowCount, $element->withdrawid);
  //             $sheet->setCellValue('C' . $rowCount, $element->referencetransactionid);
  //             $sheet->setCellValue('D' . $rowCount, $element->account_holder_name);
  //             $sheet->setCellValueExplicit('E' . $rowCount, $element->account_number,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
  //             $sheet->setCellValue('F' . $rowCount, $element->ifsc);
  //             $sheet->setCellValue('G' . $rowCount, $element->transactionamount);
  //             $sheet->setCellValue('H' . $rowCount, $element->requestdt);
  //             $sheet->setCellValue('I' . $rowCount, $element->reqstatus);
  //             $rowCount++;
  //         }
  
  
  //       // redirect output to client browser
  //       header('Content-Type: application/vnd.ms-excel');
  //       header('Content-Disposition: attachment;filename="transactionsfile.xlsx"');
  //       header('Cache-Control: max-age=0');
  
  //       $writer = new Xlsx($spreadsheet);
  //       //ob_start();
  //       $writer->save('php://output');
       
       
  //    }



    
   public function emplist(Request $request)
   {

    $emp=Employeetbl::Paginate(4);

    return $emp;

   }


   public function eventpdf()
   {
      $eventpdf=DB::table('Eventtbl')->get();
      //$i=0;
      $pdf = PDF::loadView('eventlist',compact('eventpdf'));
      return $pdf->download('Event.pdf'); 
      // echo '<table border=1px solid black;>';
      // echo '<tr>';
      // echo '<th>Sr NO</th>';
      // echo '<th>Event ID</th>';
      // echo '<th>Event NO</th>';
      // echo '<th>Event Date</th>';
      // echo '</tr>'; 
      
      // foreach ($eventpdf as $data)
      // {
      //   $i++;

      //         echo "<tr>";
      //         echo  "<td>".$i."</td>";
      //         echo  "<td>".$data->eventid."</td>";
      //         echo "<td>".$data->eventunqid."</td>";
      //         echo "<td>".$data->eventdate."</td>";
      //         echo "</tr>";  
         
      // }
      // echo "</table>"; 
   }
  
}
