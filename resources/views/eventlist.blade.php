<!DOCTYPE html>
<html>
<head>
    <title>Transaction Log Print</title>
</head>
<body>
<div class="container mt-5">
        <h2 class="text-center mb-3">List of Event</h2>
       
        <!-- <h2>No of Airport: {{ $count ?? '' }}</h2> -->
        <table class="table table-bordered mb-5" style="border-collapse:collapse;">
            <thead>
                <tr class="table-danger">
                    <!--<th scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">Sr No</th> --->
                    <th scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">Event ID</th>
                    <th scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">Event NO</th>
                    <th scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">Event Date</th>
                    
                </tr>
            </thead>
            <tbody>
            @if(is_array($eventpdf ?? '') || is_object($eventpdf ?? ''))
                @foreach($eventpdf as $dx)
                
                <tr>
                   
                    <!--<td scope="col" style="border:1px solid #000; text-align: center;padding: 4px;"></td> --->
                    <td scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">{{ $dx->eventid }}</td>
                    <td scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">{{ $dx->eventunqid }}</td>
                    <td scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">{{ $dx->eventdate }}</td>
                    
                </tr>
                
                @endforeach
            @endif    
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>