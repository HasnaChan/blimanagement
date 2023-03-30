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
    // var val8 = document.getElementById("mybtn8");
    // var val9 = document.getElementById("mybtn9");
    // var val10 = document.getElementById("mybtn10");
    // var val11 = document.getElementById("mybtn11");
    // var val12 = document.getElementById("mybtn12");
    // var val13 = document.getElementById("mybtn13");
    // var val14 = document.getElementById("mybtn14");
    // var val15 = document.getElementById("mybtn15");
    // var val16 = document.getElementById("mybtn16");
    choosen.innerHTML = kelas
    // choosen = val2;

    document.getElementById("cont").style.display="inline";
    document.getElementById("cont").style.backgroundColor ="rgb(8, 233, 30)";
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