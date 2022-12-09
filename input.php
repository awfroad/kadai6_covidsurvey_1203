<html>

<head>
    <meta charset="utf-8">
    <title>新型コロナウィルス感染者数</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/input.css">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
</head>

<body>

    <div class="wrapper">
        <header>
            <h1>新型コロナウィルス感染者数</h1>
        </header>

        <form action="read.php" method="post" class="form">
            <div class="select_area">
            日付:
            <select name="date_select" id="date_select"></select>
            </div>
            <!-- <div class="comprehension">
            都道府県:
                    <input type="radio" name="q2" value="1">1
                    <input type="radio" name="q2" value="2">2
                    <input type="radio" name="q2" value="3">3
                    <input type="radio" name="q2" value="3">4
                    <input type="radio" name="q2" value="3">5
            </div> -->

            <input type="submit" value="送信">

        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        const url = "./json/covid_data.json";

        let data_num = 4700
        let data_date = '';
        // let h =

        for (let i = 0; i < data_num ; i +=47){
            $.getJSON(url, (data) => {
                // data_date = data.itemList[i]['date']
                // console.log(data_date);
                $("#date_select").append(`
                <option value="${i}">
                ${data.itemList[i]['date']}
                </option>`
                )
            })
        };

    </script>
</body>

</html>