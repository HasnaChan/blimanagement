<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan FaceDec</title>
    <link rel="shortcut icon" href="static/tab pict.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="main.css"> -->
    <!-- <script src="script.js" defer></script> -->
    <style>
        body{
            /* background-image: url(/static/background.png); */
            background-color: white;
            background-size: cover;
            position: relative;
        }

        @font-face {
            font-family: Plus Jakarta Sans;
            @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');

        }

        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            width: 100%;
            flex-direction: column;
        }

        img .background {
            position: relative;
            display: flex;
        }

        .time {
            width: 100%;
            position: absolute;
            align-items: center;
            display: flex;
            flex-direction: row;
            margin-top: 1vw;
            padding: 0vw 1vw;
            color: #145272;
            font-family: sansation;
            font-size: 1.2vw;
        }

        .time img {
            width: 2.3vw;
            margin-right: 0.6vw;
        }

        .content {
            width: 100%;
            position: absolute;
            justify-content: center;
            align-items: center;
            display: flex;
            flex-direction: column;
            margin-bottom: 13vw;
            margin-top: 8vw;
        }

        .content img {
            width: 18vw;
        }

        .choose {
            width: 31vw;   
            background: #145272;
            /* mix-blend-mode: color-dodge; */
            opacity: 0;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 2.5vw;
            padding: 0.8vw 2vw;
            margin-top: .5vw;
            font-size: 1.3vw;
            font-family: sansation;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            cursor: pointer;
        }

        .choose:hover, .choose:focus{
            background: rgba(217, 217, 217, 0.46);
            /* mix-blend-mode: color-dodge; */
            opacity: 0;
        }

        .line {
            width: 31vw; 
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            background: #145272;
            /* mix-blend-mode: color-dodge; */
            opacity: 0;
            z-index: 1;
            border-radius: 2.5vw;
            margin: 1vw 0;
        }

        .line button {
            background-color: inherit;
            border: none;
            margin: 1vw 0;
        }

        .dropdownIn {
            display: none;
            position: absolute;
            min-width: 31.5%;
            overflow: auto;

        }

        .dropdownIn p {
            color: black;
            padding: 1vw;
            text-decoration: none;
            display: block;
            font-family: sansation;
        }

        .dropdown a:hover {background-color: #ddd;}

        .show {
            display: block;
        }

        .choose img {
            width: 2vw;
        }

        .choose p {
            margin-top: 0.1vw;
        }

        .continue {
            width: 13vw;
            background: rgba(133, 147, 147, 0.66);
            mix-blend-mode: exclusion;
            opacity: 0;
            border-radius: 5vw;
            margin-top: 2.2vw;
            justify-content: center;
            align-items: center;
            display: flex;
            font-family: sansation;
            padding: 1vw 0vw;
            color: #145272;
            border: none;
        }

        .continue a {
            text-decoration: none;
            color: #145272;
        }

        .up {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: space-between;
            flex-direction: row;
        }

        .back {
            background-color: #145272;
            border: 1px solid white;
            display: flex;
            align-items: center;
            margin-top: 1vw;
            margin-left: 1vw;
            padding: 0.4vw 0.5vw;
            justify-content: space-between;
            border-radius: 0.8vw;
        }

        .back:hover {
            background-color:#031120;
        }

        .back img {
            width: 1.1vw;
            margin-right: 0.3vw;
            margin-bottom: 0.3vw;
        }

        .back a {
            color: white;
            text-decoration: none;
            font-family: sansation;
            position: relative;
            display: flex;
            margin-top: 0.5px ;
        }


        .time2 {
            align-items: center;
            display: flex;
            flex-direction: row;
            padding: 0vw 1vw;
            color: #145272;
            font-family: sansation;
            font-size: 1.2vw;
        }

        .sectionRight {
            margin-top: 1vw;
            margin-right: 0.1vw;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            font-size: 0.5vw;
            /* border:1px solid red; */
            
            
        }

        .logo {
            display: flex;
            position: relative;
            /* border:1px solid green; */
            padding-left: 3vw;
            padding-bottom: 1.2vw;
        }


        .sectionRight img {
            width: 10vw;

        }

        .time2 img {
            width: 2vw;
            margin-right: 1vw;
        }

        .center {
            position: absolute;
            width: 100%;
            display: flex;
            padding-left: 4vw;
            padding-top: 4vw;
            padding-bottom: 3vw;
            /* border:2px solid red; */
        }

        .square {
            display: flex;
            justify-content: center;
            align-items:flex-end;
            margin-top: 0.5vw;
        }

        .back-col {

            z-index: 1;
            cursor: pointer;
        }

        .choose {
            z-index: 1;
        }

        .sheetBox {
            z-index: 1;
            text-decoration: none;
            font-family: sansation;
            font-size: 1vw;
            width: 12vw;
            height: 3vw;
            background-color: #145272;
            margin-top: 1vw;
            margin-left: 1vw;
            padding-left: 1vw;
            padding-right: 1vw;
            border-radius: 1vw;
            border: 0.2vw solid white;
            color: white;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
        }

        .sheetLogo {
            height: 2vw;
            width: auto;
        }

        .scanhere {
            border: 0.3vw solid #145272;
            width: 46.4vw;
            height: 35vw;
            border-radius: 2.1vw;
            margin-top: 0.5vw;
            position: relative;
        }

        .scanhere img {
            border-radius: 1.9vw;
            width: auto;
            height: 34.4vw;
            background-color: #145272;
        }

        .textDetec {
            position: absolute;
            background: #145272;
            mix-blend-mode: normal;
            box-shadow: inset 10px 5px 50px 20px rgba(102, 31, 31, 0.59);
            text-decoration: none;
            /* mix-blend-mode: normal; */
            /* box-shadow: inset 10px 5px 50px 20px rgba(102, 31, 31, 0.59); */
            width: 15vw;
            height: 3.5vw;
            border: 0.3vw solid white;
            border-radius: 2vw;
            margin-bottom: -1.75vw;
            display: flex;
            flex-direction: row;
            /* flex-wrap: wrap; */
            justify-content: space-around;
            align-items: center;
            padding-left: 2.5vw;
            padding-right: 2.5vw;
            color: #145272;
            /* text-align: center; */
        }

        .textDetec p {
            color: white;
            /* background-color: #145272; */
        }

        .reset-icon {
            height: 2vw;
            width: auto;
            color: white;
            /* background-color: #145272; */
        }
        #resetbtn{
            background-color: #145272;
            /* opacity: 100; */
            
        }
        .scan {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: sansation;
            color: #145272;
            font-size: 2vw;
            position: relative;
            padding-bottom: 2vw;
            padding-left: 11vw;
        }
        .back{
            color: white;
            cursor: pointer;
        }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type=text/javascript>
        $(function() {
          $('a#resetbtn').on('click', function(e) {
            e.preventDefault()
            $.getJSON('/background_process_test',
                function(data) {
              //do nothing
            });
            return false;
          });
        });
    </script>
    <script>
        function renderTime(){
            //Date
            var mDate = new Date()
            var mYear = mDate.getFullYear();
            if(mYear < 1000){
                mYear += 1900
            }

            var day = mDate.getDay();
            var month = mDate.getMonth();
            var daym = mDate.getDate();
            var montharray = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            //Date End

            //Time
            var currentT = new Date();
            var jam = currentT.getHours();
            var menit = currentT.getMinutes();
            var detik = currentT.getSeconds();
                if(jam == 24){
                    jam = 0;
                } 

                if(jam < 10) {
                    jam = "0" + jam;
                }

                if(menit < 10) {
                    menit = "0" + menit;
                }

                if(detik < 10) {
                    detik = "0" + detik;
                }

                var mClock = document.getElementById("clockD");

                mClock.textContent = ""  + " " + daym+ " "+ montharray[month] + " " + mYear + " , " + jam + ":" + menit+ ":" + detik;
                mClock.innerText = ""  + " " + daym+ " "+ montharray[month] + " " + mYear + " , " + jam + ":" + menit+ ":" + detik;

                setTimeout("renderTime()", 1000);
        }

        renderTime();

        function myFunction(){
            document.getElementById("mDropdown").classList.toggle("show");
        }

        window.onclick = function(event){
            if(!event.target.matches('.choose') && !event.target.matches('#chooseText') && !event.target.matches('.dropimg')) {
                var dropdown = document.getElementsByClassName("dropdownIn");
                var j;
                for(j = 0; j < dropdown.length; j++){
                    var open = dropdown[j];
                    if(open.classList.contains('show')){
                        open.classList.remove('show');
                    }
                }
            }
        }

        //for continue
        var b;
        function show_hide(){
            if(b == 1){
                document.getElementById("cont").style.display="inline";
                console.log(b)
                return b = 0;
            }
            else {
                document.getElementById("cont").style.display = "none";
                console.log(b)
                return b = 1;
            }
        }

        //for change choose
        function changeChoose(kelas){
            var choosen = document.getElementById("chooseText");
            choosen.innerHTML = kelas
            // choosen = val2;

            document.getElementById("cont").style.display="inline";
            document.getElementById("cont").style.backgroundColor ="green";
            b = 1;
            show_hide()
        }

        window.onload = () => {
            const btn = document.getElementById('cont')

            btn.onclick = () => {
                const chooseitem = document.getElementById("chooseText")

                if(chooseitem.textContent.trim() === 'Choose your class'){
                    alert("You must choose your class!")
                    return false;
                }else{
                    location.replace('/templates/scan.html')
                }


            }
        }

        function clickback(){
            location.replace('/')
        }

        function sheets(){
            location.replace('https://docs.google.com/spreadsheets/d/1ufOAHYPQHkuPDvFv4FW_Hxa1T6bIoh3-E9Gi087khMg/edit?usp=sharing')
        }

    </script>
</head>
<body onload="renderTime();">
    <div class="container">
        <div class="up">
            <div class="back-col" >
                <button class="back" onclick="clickback()" >
                    <img src="/static/back.png" alt="">
                    Back
                </button>
            </div>
            <div class="sectionRight">
                <div class="logo">
                    <img src="/static/bli management.jpg" alt="">
                </div>
                
                <div class="time2">
                    <div id = "clockD" class="clock">
                    </div>
                </div>
                <a href="https://docs.google.com/spreadsheets/d/1ufOAHYPQHkuPDvFv4FW_Hxa1T6bIoh3-E9Gi087khMg/edit?usp=sharing" onclick="sheets()" class="sheetBox">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sheetLogo">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                    </svg>                      
                    <p>View Sheets</p>
                </a>
            </div>
        </div>
        <div class="center">
            <div class="scan">
                <p>Scan your face here!</p>
                <div class="square">
                    <div class="scanhere">
                        <img src="{{ url_for('video_feed') }}" />
                    </div>
                    <a href=# id="resetbtn" class="textDetec" background-color="#145272">
                        <!-- <div class="textDetec"> -->
                        <svg class="reset-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path  background-color="#145272" color="white" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>                          
                        <p>Reset</p>
                        <!-- </div> -->
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>