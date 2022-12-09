<?php

    $date_select = $_POST['date_select'];

    // ファイルに書き込み
    $file = fopen('data/data.txt', 'a');
    fwrite($file, $date_select . "\n");
    fclose($file);

    // ファイルから読み込み
    // $openFile = fopen('./data/data.txt', 'r');
    // while ($str = fgets($openFile)) {
    //     echo nl2br($str);
    // };
    // fclose($openFile);

?>

<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="css/reset.css">
            <link rel="stylesheet" href="css/style.css">
            <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>                            
        </head>
        <body>

            <div class="wrapper">
                <div id="stage"></div>
            </div>

            <script>

                // const url = "https://opendata.corona.go.jp/api/Covid19JapanAll";
                const url = "./json/covid_data.json";

                let myarr = [];
                let mydata = {};
                
                let data_num = 47
                
                // console.dir(myarr);
                // const month = data.map(m => m.month);
                // const monthArr = Array.from(new Set(month));
                // console.log(monthArr);
                                    
                
                for (let i = 0; i < data_num ; i++){
                    $.getJSON(url, (data) => {
                        // myarray = data.itemList[i];
                        // console.log(data.itemList[i]["date"]);
                        mydata = {
                            label : data.itemList[i]['name_jp'],
                            y : Number(data.itemList[i]['npatients']),
                            date : data.itemList[i]['date'],
                        };
                        // let date = data.itemList[i].date;
                        // let npatients = Number (data.itemList[i].npatients);
                        
                        myarr.push(mydata);
                        chart.render();
                        
                        // console.log(mydata["label"]);
                        // console.log(mydata["y"]);
                        
                    })
                };

                console.dir(myarr);
                let sortedMyarr = myarr.sort(
                    (a, b) => (a.date.getTime()) - (b.date.getTime()),
                )

                console.dir(sortedMyarr);

                // sortedMyarr = myarr.sort((a, b) => a.label - b.label);
                // console.dir(sortedMyarr);
                
                let stage = document.getElementById('stage');
                let chart = new CanvasJS.Chart(stage, {
                    title: {
                        text: "新型コロナウィルス感染者数"  //グラフタイトル
                    },
                    theme: "theme4",  //テーマ設定
                    data: [{
                        type: 'column',  //グラフの種類
                        dataPoints: myarr  //表示するデータ
                    }],
                    axisY:{
                            reversed: false  // 昇順に変更
                        } 
                    });
                    
                    </script>

        </body>


    </html>