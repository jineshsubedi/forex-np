<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOREX NP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body>
    <div class="container tp60p">
        <h3>{{$datas['title']}}</h3>
        <p>{{trans('forex::forex.description')}}</p>
        <div class="" id="myTabContent">
            <div class="row mb-5">
                <div class="col-md-4 form-group">
                    <label for="">Date</label>
                    <input type="text" name="from" id="from" value="{{$datas['from']}}" class="form-control">
                </div>
                <div class="col-md-4 form-group">
                    <button type="button" class="btn btn-sm btn-success" onclick="getForex()" style="margin-top: 25px;">Filter</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Currency</th>
                            <th>Unit</th>
                            <th>Buy</th>
                            <th>Sell</th>
                        </tr>
                    </thead>
                    <tbody id="forex_body">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function() {
        $('#from').datepicker({
            dateFormat: "yy-mm-dd",
            maxDate: new Date()
        });
    })
    var token = '{{csrf_token()}}';
    getForex()

    function getForex() {
        var page = '{{$datas["page"]}}'
        var per_page = '{{$datas["per_page"]}}'
        var from = $('#from').val()
        var to = $('#from').val()

        $.ajax({
            type: "GET",
            url: "https://www.nrb.org.np/api/forex/v1/rates",
            data: '_token=' + token + '&page=' + page + '&per_page=' + per_page + '&from=' + from + '&to=' + to,
            success: function(data) {
                var rates = data.data.payload[0].rates
                var forexHtml = '';
                $.each(rates, function(index, value) {
                    forexHtml += '<tr><td>' + value.currency.name + '(' + value.currency.iso3 + ')</td><td>' + value.currency.unit + '</td><td>' + value.buy + '</td><td>' + value.sell + '</td></tr>'
                })
                $('#forex_body').html(forexHtml)
            },
            error: function(err) {
                console.log(err)
            },
        });
    }
</script>
</html>