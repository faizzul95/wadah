 function getAge(dateString,check) {
        var now = new Date();
        var today = new Date(now.getYear(),now. getMonth(),now.getDate());

        var yearNow = now.getYear();
        var monthNow = now.getMonth();
        var dateNow = now.getDate();

        var dob = new Date(dateString.substring(6, 10), dateString.substring(3,5)-1, dateString.substring(0,2));

        var yearDob = dob.getYear();
        var monthDob = dob.getMonth();
        var dateDob = dob.getDate();

        yearAge = yearNow - yearDob;

        if (monthNow >= monthDob)
            var monthAge = monthNow - monthDob;
        else {
            yearAge--;
            var monthAge = 12 + monthNow -monthDob;
        }

        if (dateNow >= dateDob)
            var dateAge = dateNow - dateDob;
        else {
            monthAge--;
            var dateAge = 31 + dateNow - dateDob;

            if (monthAge < 0) {
                monthAge = 11;
                yearAge--;
            }
        }


        // return yearAge + ' Tahun, ' + monthAge + ' Bulan ';// + dateAge + ' days'

        return yearAge;// + dateAge + ' days'
    }

    var getDaysInMonth = function(month,year) {
     return new Date(year, month, 0).getDate();
    }

    function icInformation(ic){
        var ic = ic.value;
        var year = ic.substr(0, 2);
        var mon = ic.substr(2, 2);
        var day = ic.substr(4, 2);
        var pob = ic.substr(7, 2);
        
        var yearnow = '';
        if(year >= 00 && year <= yearnow) {
            year = 20+year;
        }

        else if(year >= (yearnow+1) && year <= 99) {
            year = 19+year;
        }

        var icdate = day + "/" + mon + "/" + year;
        var day = ("0" + day).slice(-2);
        var month = ("0" + mon).slice(-2);
        var dob = day + "/" + mon + "/" + year;

        var tday = getDaysInMonth(parseInt(mon), parseInt(year));

        var johor = ['01', '21', '22', '23', '24'];
        var kedah = ['02', '25', '26', '27'];
        var kelantan = ['03', '28', '29'];
        var melaka = ['04','30'];
        var negerisembilan = ['05', '31', '59'];
        var pahang = ['06', '32', '33'];
        var pulaupinang = ['07', '34', '35'];
        var perak = ['08', '36', '37', '38' , '39'];
        var perlis = ['09', '40'];
        var selangor = ['10', '41', '42', '43', '44'];
        var terengganu = ['11', '45', '46'];
        var sabah = ['12', '47', '48', '49'];
        var sarawak = ['13', '50', '51', '52', '53'];
        var kl = ['14', '54', '55', '56', '57'];
        var labuan = ['15', '58'];
        var putrajaya = ['16'];


        if(jQuery.inArray(pob,johor) !== -1) {
            $('#tempatlahir').val('Johor') ;
        }

        else if(jQuery.inArray(pob,kedah) !== -1) {
             $('#tempatlahir').val('Kedah' );
        }

        else if(jQuery.inArray(pob, kelantan) !== -1) {
            $('#tempatlahir').val(' Kelantan');
        }

        else if(jQuery.inArray(pob,melaka) !== -1) {
            $('#tempatlahir').val('Melaka' );
        }

        else if(jQuery.inArray(pob, negerisembilan) !== -1) {
            $('#tempatlahir').val('Negeri Sembilan');
        }

        else if(jQuery.inArray(pob,pahang) !== -1) {
            $('#tempatlahir').val('Pahang' );
        }

        else if(jQuery.inArray(pob, pulaupinang) !== -1) {
            $('#tempatlahir').val('Pulau Pinang');
        }

        else if(jQuery.inArray(pob,perak) !== -1) {
            $('#tempatlahir').val('Perak') ;
        }

        else if(jQuery.inArray(pob,perlis) !== -1) {
            $('#tempatlahir').val('Perlis' );
        }

        else if(jQuery.inArray(pob, selangor) !== -1) {
            $('#tempatlahir').val(' Selangor');
        }

        else if(jQuery.inArray(pob, terengganu) !== -1) {
            $('#tempatlahir').val(' Terengganu');
        }

        else if(jQuery.inArray(pob,sabah) !== -1) {
            $('#tempatlahir').val('Sabah') ;
        }

        else if(jQuery.inArray(pob,sarawak) !== -1) {
            $('#tempatlahir').val(' Sarawak');
        }

        else if(jQuery.inArray(pob,kl) !== -1) {
            $('#tempatlahir').val('Kuala Lumpur');
        }

        else if(jQuery.inArray(pob,labuan) !== -1) {
            $('#tempatlahir').val('Labuan' );
        }

        else if(jQuery.inArray(pob, putrajaya) !== -1) {
            $('#tempatlahir').val(' Putrajaya');
        }

        else {
            $('#tempatlahir').val('');
        }


        if(ic != ''){
            var jantina = ic.substr(11, 1);
            if(jantina % 2 === 0){
                $("#perempuan").prop("checked" , true)
            }
            else{
                $("#lelaki").prop("checked", true)
            }

            if(mon > 12 || day > tday){
                $("#nokadpengenalan").val('');
                $(".autocolor").css("color", "#888");
                $("#dob").val('');
                $("#umur").val('');
                $("#tempatlahir").val('');
                $("#perempuan").prop("checked" , false);
                $("#lelaki").prop("checked", false);
                swal({
                title: "Maaf",
                text: 'Kad Pengenalan Tidak Sah',
                type: "info",
                closeOnConfirm: false,
                closeOnCancel: true,
                showLoaderOnConfirm: true
                });
            }
            else{
                $(".autocolor").css("color", "#27a4b0");
                $("#dob").val(dob);
                var umur = getAge(icdate,1);
                $("#umur").val(umur);
            }
        }
        else{
            $("#nokadpengenalan").val('');
            $("#dob").val('');
            $("#umur").val('');
            $(".autocolor").css("color", "#888");
            $("#tempatlahir").val('');
            $("#perempuan").prop("checked" , false);
            $("#lelaki").prop("checked", false);
        }

    }
