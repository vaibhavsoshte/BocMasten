<!DOCTYPE html>
<html>
<head>
<title>Employee PDF</title>
</head>
<body>
<h1> Employee List</h1>

<table class="table table-bordered mb-5" style="border-collapse:collapse; width:100%">
            <thead>
                <tr class="table-danger">
                    
                     <th colspan="4" style="border:1px solid #000; text-align: center;padding: 4px;">Sr.No</th>
                     <th colspan="4" style="border:1px solid #000; text-align: center;padding: 4px;">Employee ID</th> 
                     <th scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">Employee Name </th>
                     <th scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">Salary </th>
                     <th scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">Designation</th>

                </tr>
            </thead>
            <tbody>
            @php 
            $i=1;
            @endphp
            @if(is_array($user ?? '') || is_object($user ?? '')) 
                @foreach($user as $dx)
               
                <tr>

                    <td colspan="4" style="border:1px solid #000; text-align: center;padding: 4px;">{{ $i }}</td>
                    <td colspan="4" style="border:1px solid #000; text-align: center;padding: 4px;">{{ $dx->empid }}</td>
                    <td scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">{{ $dx->name }}</td>
                    <td scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">{{ $dx->salary }}</td>
                    <td scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">{{ $dx->designation }}</td>

                    <!-- $count=$count+1; -->
                    @php
                    $i++;
                    @endphp
                   
                </tr>
                @endforeach
            @endif    
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>



</body>
</html>