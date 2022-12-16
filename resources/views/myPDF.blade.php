<!DOCTYPE html>
<html>
<head>
    <title>Transaction Log Print</title>
</head>
<body>
<div class="container mt-5">
        <h2 class="text-center mb-3">Transaction Log Print</h2>
       
        <h2>No of Airport: {{ $count ?? '' }}</h2>
        <table class="table table-bordered mb-5" style="border-collapse:collapse;">
            <thead>
                <tr class="table-danger">
                    <!--<th scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">Sr No</th> --->
                    <th scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">Airport Code</th>
                    <th scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">Airport Name</th>
                    
                </tr>
            </thead>
            <tbody>
            @if(is_array($json ?? '') || is_object($json ?? ''))
                @foreach($json as $name => $dx)
                 @if($dx['country']=="India" && $dx['state']=="Maharashtra")
                <tr>
                   
                    <!--<td scope="col" style="border:1px solid #000; text-align: center;padding: 4px;"></td> --->
                    <td scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">{{ $dx['code'] }}</td>
                    <td scope="col" style="border:1px solid #000; text-align: center;padding: 4px;">{{ $dx['name'] }}</td>
                    
                </tr>
                @endif
                @endforeach
            @endif    
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>