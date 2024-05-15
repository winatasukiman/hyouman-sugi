var canvas = document.getElementById("banner-canvas"), 
    ctx = canvas.getContext("2d");
canvas.crossOrigin = "Anonymous";

////////////////////////////////////////////// FLAGS
var tempLogo = new Image();
tempLogo.src = "/main/assets/img/banner-certif/ml.png";
var tempLogoScaleSize = 1/2;
var tempLogoMarginTop = 1/8;
var tempLogoMobileMarginTop = 4/12;
var tempLogoMobileScaleSize = 0.8;

var logo = new Image();
var logoScaleSize = 0.4;

var tempTitleHeight = 22;
var selectedEsportGame = '';
var textColor = '#002448';

var mobileBannerImg = new Image();
mobileBannerImg.src = "/main/assets/img/banner-certif/BGML/BG_HPML1.jpg";

var userUpload = false;

var websiteButton = document.getElementById('download_banner');
var mobileButton = document.getElementById('download_banner_mobile');

// JSZip Dependency
// var zip = new JSZip();

////////////////////////////////////////////// EVENT LISTENER
function dlZippedCanvas(element){

    //// Zipped canvas
    // var websiteDataUrl = dlWebsiteCanvas(true);
    // var mobileDataURL = dlMobileCanvas(true).replace(/^data:image\/(png|jpg);base64,/, "");

    // var webImg = websiteDataUrl.replace(/^data:image\/(png|jpg);base64,/, "");
    // var mobImg = mobileDataURL.replace(/^data:image\/(png|jpg);base64,/, "");

    // zip.folder("banners")
    // var zipImg = zip.folder("banners");
    // zipImg.file("banner-website.png", webImg, {base64: true});
    // zipImg.file("banner-mobile.png", mobImg, {base64: true});
    
    // zip.generateAsync({type:"blob"}).then(function(content) {
    //     saveAs(content, "banners.zip");
    // });

    websiteButton.click();
    mobileButton.click();
}

function dlMobileCanvas(re=false, element=null) {

    let canvasTemp = document.getElementById("banner-canvas-mobile");
    let ctxTemp = canvasTemp.getContext("2d");

    canvasTemp.width = mobileBannerImg.width;
    canvasTemp.height = mobileBannerImg.height;

    ctxTemp.clearRect(0,0,mobileBannerImg.width, mobileBannerImg.height);

    ctxTemp.drawImage(mobileBannerImg, 0, 0);

    placeTitleDLMobile($("#tourn_name").val(), canvasTemp, ctxTemp);
    placeInfoDLMobile(canvasTemp, ctxTemp);

    // Place Logo
    data = getScaledImage(logo, ctxTemp, tempLogoMobileScaleSize);
    ctxTemp.drawImage(logo, 0, 0, logo.width, logo.height,
        data['centerShiftX'], data['centerShiftY'] * tempLogoMobileMarginTop, 
        data['newWidth'], data['newHeight']);

    var dt = canvasTemp.toDataURL('image/png');

    if (re) {
        // websiteButton.style = '';
        // mobileButton.style = '';
        return dt;   
    }

    /* Change MIME type to trick the browser to downlaod the file instead of displaying it */
    dt = dt.replace(/^data:image\/[^;]*/, 'data:application/octet-stream');

    /* In addition to <a>'s "download" attribute, you can define HTTP-style headers */
    dt = dt.replace(/^data:application\/octet-stream/, 'data:application/octet-stream;headers=Content-Disposition%3A%20attachment%3B%20filename=Canvas.png');

    element.href = dt;
};

function dlWebsiteCanvas(re=false, element=null) {
    let img = $('#tourn_preview_banner_2').get(0);
    let canvasWebTemp = document.getElementById("banner-canvas-temp");
    let ctxWebTemp = canvasWebTemp.getContext("2d");
    
    // Draw
    canvasWebTemp.width = img.width;
    canvasWebTemp.height = img.height;

    ctxWebTemp.clearRect(0,0,img.width, img.height);

    ctxWebTemp.drawImage(img, 0, 0);

    placeTitleDL($("#tourn_name").val(), canvasWebTemp, ctxWebTemp);
    placeInfoDL(canvasWebTemp, ctxWebTemp);

    // Place Logo
    data = getScaledImage(logo, ctxWebTemp, logoScaleSize);
    ctxWebTemp.drawImage(logo, 0, 0, logo.width, logo.height,
        data['centerShiftX'], data['centerShiftY'] * 1/8, data['newWidth'], data['newHeight']);

    var dt = canvasWebTemp.toDataURL('image/png');

    if (re) {
        // websiteButton.style = '';
        // mobileButton.style = '';
        return dt;   
    }

    /* Change MIME type to trick the browser to downlaod the file instead of displaying it */
    dt = dt.replace(/^data:image\/[^;]*/, 'data:application/octet-stream');

    /* In addition to <a>'s "download" attribute, you can define HTTP-style headers */
    dt = dt.replace(/^data:application\/octet-stream/, 'data:application/octet-stream;headers=Content-Disposition%3A%20attachment%3B%20filename=Canvas.png');

    element.href = dt;
};

// document.getElementById("download_banner").addEventListener('click', dlWebsiteCanvas, false);

// document.getElementById("download_banner_mobile").addEventListener('click', dlMobileCanvas, false);

function onSelectNewBackground(element) {
    if (!userUpload){
        var previewBanner = document.getElementById('tourn_preview_banner_2');

        previewBanner.onload = function () {
            document.getElementById('tourn_preview_banner').src = dlWebsiteCanvas(true);
        }

        previewBanner.src = element.src;

        // Change text color
        if (previewBanner.src.includes('BG_ML1.jpg')) {
            textColor = '#002448';
        }
        else {
            textColor = '#FFFFFF';
        }

        if (previewBanner.src.includes('BG_ML')) {
            mobileBannerImg.src = previewBanner.src.replace('BG_ML', 'BG_HPML');
        }
        else if (previewBanner.src.includes('BG_PUBGFF')) {
            mobileBannerImg.src = previewBanner.src.replace('BG_PUBGFF', 'BG_HPPUBGFF');
        }
    }
}

$('#tourn_name').blur('change', function() {
    if (!userUpload) {
        // updateBannerPreview();
        document.getElementById('tourn_preview_banner').src = dlWebsiteCanvas(true);
    }
});

$('#tourn_datetime').blur('change.datetimepicker',function() {
    if (!userUpload) {
        // updateBannerPreview();
        document.getElementById('tourn_preview_banner').src = dlWebsiteCanvas(true);
    }
});

$('#tourn_game').blur('change',function() {
    if (!userUpload) {
        // updateBannerPreview();
        document.getElementById('tourn_preview_banner').src = dlWebsiteCanvas(true);
    }
});

$('#tourn_required_points').blur('change', function(){
    if (!userUpload) {
        // updateBannerPreview();
        document.getElementById('tourn_preview_banner').src = dlWebsiteCanvas(true);
    }
});

$('#tourn_max_participants').blur('change', function(){
    if (!userUpload) {
        // updateBannerPreview();
        document.getElementById('tourn_preview_banner').src = dlWebsiteCanvas(true);
    }
});

function updateBannerPreview() {
    //redraw image
    ctx.clearRect(0,0,canvas.width, canvas.height);
    drawCenterImageScaled($('#tourn_preview_banner_2').get(0), ctx, canvas);
    placeTitle($("#tourn_name").val(), canvas, ctx);
    placeInfo(canvas, ctx);
    placeLogo(canvas, ctx);
}

function placeLogo(canvas, ctx) {
    data = getScaledImage(tempLogo, ctx, tempLogoScaleSize);
    ctx.drawImage(tempLogo, 0, 0, tempLogo.width, tempLogo.height,
        data['centerShiftX'], data['centerShiftY'] * 0, data['newWidth'], data['newHeight']);
}

function placeTitle(textString, canvas, ctx) {
    tempTitleHeight = 16;
    ctx.fillStyle = textColor;
    ctx.font = '16px "Black Han Sans"';

    var textWidth = ctx.measureText(textString).width;
    var maxWidth = ctx.canvas.width * 3/4;
    if (textWidth > maxWidth) {
        var lines = tokenizeLine(textString, maxWidth, ctx);
        for (var i = 0; i < lines.length; i++) {
            var lineWidth = ctx.measureText(lines[i]).width;
            ctx.fillText(lines[i], ((canvas.width / 2) - (lineWidth / 2)), (canvas.height / 2) + i*16);
            tempTitleHeight += i*16;
        }
    }
    else {
        ctx.fillText(textString, ((canvas.width / 2) - (textWidth / 2)), (canvas.height / 2));
        tempTitleHeight = 16;
    }
}

function placeTitleDL(textString, canvas, ctx) {
    tempTitleHeight = 72;
    ctx.fillStyle = textColor;
    ctx.font = '72px "Black Han Sans"';

    var textWidth = ctx.measureText(textString).width;
    var maxWidth = ctx.canvas.width * 3/4;
    if (textWidth > maxWidth) {
        var lines = tokenizeLine(textString, maxWidth, ctx);
        
        for (var i = 0; i < lines.length; i++) {
            var lineWidth = ctx.measureText(lines[i]).width;
            ctx.fillText(lines[i], ((canvas.width / 2) - (lineWidth / 2)), (canvas.height / 2) + i*72 - 24);
            tempTitleHeight += i*72;
        }
    }
    else {
        ctx.fillText(textString, ((canvas.width / 2) - (textWidth / 2)), (canvas.height / 2));
        tempTitleHeight = 72;
    }
}

function placeTitleDLMobile(textString, canvas, ctx) {
    tempTitleHeight = 56;
    ctx.fillStyle = textColor;
    ctx.font = '42px "Black Han Sans"';

    var textWidth = ctx.measureText(textString).width;
    var maxWidth = ctx.canvas.width * 3/4;
    if (textWidth > maxWidth) {
        var lines = tokenizeLine(textString, maxWidth, ctx);
        
        for (var i = 0; i < lines.length; i++) {
            var lineWidth = ctx.measureText(lines[i]).width;
            ctx.fillText(lines[i], ((canvas.width / 2) - (lineWidth / 2)), (canvas.height / 2) - 56 + i*56 - 24);
            tempTitleHeight += i*56;
        }
    }
    else {
        ctx.fillText(textString, ((canvas.width / 2) - (textWidth / 2)), (canvas.height / 2));
        tempTitleHeight = 56;
    }
}

function placeInfo(canvas, ctx) {
    var e = document.getElementById("tourn_game");
    var selectedEsportTemp = e.options[e.selectedIndex].text;
    var logoUrl = '';

    selectedEsport = selectedEsportTemp.split('-')[1];
    if (selectedEsport == null) {
        return;
    }

    // DRAW 'Category' Tournament
    ctx.fillStyle = textColor;
    ctx.font = '10px "Suez One"';
    var lineWidth = ctx.measureText(selectedEsport.replace(' ', '') + " Tournament").width;
    ctx.fillText(selectedEsport + " Tournament", (canvas.width / 2) - (lineWidth / 2), (canvas.height / 2) + tempTitleHeight - 2);

    // Draw Tourn Creator
    ctx.font = '8px "Suez One"';
    var tournCreator = "Creator: " + document.getElementById("tourn_creator").innerHTML;
    var lineWidth = ctx.measureText(tournCreator).width;
    ctx.fillText(tournCreator, (canvas.width / 2) - (lineWidth / 2), (canvas.height / 2) + tempTitleHeight - 2 + 10);

    // DRAW Tournament DATE
    var tournDatetime = $("#tourn_datetime").val();
    var lineWidth = ctx.measureText(tournDatetime).width;
    ctx.fillText(tournDatetime, (canvas.width / 2)  - (lineWidth / 2), (canvas.height / 2) + tempTitleHeight - 2 + 10 + 8);

    // DRAW TOURNAMENT PRICE
    var requiredPoints = parseInt(document.getElementById("tourn_required_points").value);
    var maxParticipants = parseInt(document.getElementById("tourn_max_participants").value);
    var totalPrize = (requiredPoints * maxParticipants).toString();
    var totalPrizeInfo = "Menangkan total hadiah " + totalPrize + " G*";
    
    ctx.font = '11px "Black Han Sans"';
    var lineWidth = ctx.measureText(totalPrizeInfo).width;
    ctx.fillText(totalPrizeInfo, (canvas.width / 2) - (lineWidth / 2), (canvas.height / 2) + tempTitleHeight - 2 + 10 + 22);
}

function placeInfoDL(canvas, ctx) {
    var e = document.getElementById("tourn_game");
    var selectedEsportTemp = e.options[e.selectedIndex].text;
    var logoUrl = '';

    selectedEsport = selectedEsportTemp.split('-')[1];
    if (selectedEsport != null) {
        ctx.fillStyle = textColor;
        ctx.font = '40px "Suez One"';
        var category = selectedEsport.replace(' ', '') + " Tournament";
        var lineWidth = ctx.measureText(category).width;
        ctx.fillText(category, (canvas.width / 2) - (lineWidth / 2), (canvas.height / 2) + tempTitleHeight - 32);
    }

    // Draw Tourn Creator
    ctx.font = '32px "Suez One"';
    var tournCreator = "Creator: " + document.getElementById("tourn_creator").innerHTML;
    var lineWidth = ctx.measureText(tournCreator).width;
    ctx.fillText(tournCreator, (canvas.width / 2) - (lineWidth / 2), (canvas.height / 2) + tempTitleHeight - 32 + 40);

    // DRAW Tournament DATE
    var tournDatetime = $("#tourn_datetime").val();
    tournDatetime = tournDatetime.split(' - ')[0];
    var lineWidth = ctx.measureText(tournDatetime).width;
    ctx.fillText(tournDatetime, (canvas.width / 2)  - (lineWidth / 2), (canvas.height / 2) + tempTitleHeight - 32 + 40 + 32);

    // DRAW TOURNAMENT PRICE
    var requiredPoints = parseInt(document.getElementById("tourn_required_points").value);
    var maxParticipants = parseInt(document.getElementById("tourn_max_participants").value);
    var totalPrize = (requiredPoints * maxParticipants).toString();
    var totalPrizeInfo = "Menangkan total hadiah " + totalPrize + " G*";
    
    ctx.font = '44px "Black Han Sans"';
    var lineWidth = ctx.measureText(totalPrizeInfo).width;
    ctx.fillText(totalPrizeInfo, (canvas.width / 2) - (lineWidth / 2), (canvas.height / 2) + tempTitleHeight - 12 + 40 + 96);
}

function placeInfoDLMobile(canvas, ctx) {
    var e = document.getElementById("tourn_game");
    var selectedEsportTemp = e.options[e.selectedIndex].text;

    selectedEsport = selectedEsportTemp.split('-')[1];

    // DRAW 'Category' Tournament
    ctx.fillStyle = textColor;
    ctx.font = '28px "Suez One"';
    var category = selectedEsport.replace(' ', '') + " Tournament";
    var lineWidth = ctx.measureText(category).width;
    ctx.fillText(category, (canvas.width / 2) - (lineWidth / 2), (canvas.height / 2) + tempTitleHeight - 30);

    // Draw Tourn Creator
    ctx.font = '21px "Suez One"';
    var tournCreator = "Creator: " + document.getElementById("tourn_creator").innerHTML;
    var lineWidth = ctx.measureText(tournCreator).width;
    ctx.fillText(tournCreator, (canvas.width / 2) - (lineWidth / 2), (canvas.height / 2) + tempTitleHeight - 30 + 32);

    // DRAW Tournament DATE
    var tournDatetime = $("#tourn_datetime").val();
    tournDatetime = tournDatetime.split(' - ')[0];
    var lineWidth = ctx.measureText(tournDatetime).width;
    ctx.fillText(tournDatetime, (canvas.width / 2)  - (lineWidth / 2), (canvas.height / 2) + tempTitleHeight - 30 + 32 + 28);

    // DRAW TOURNAMENT PRICE
    var requiredPoints = parseInt(document.getElementById("tourn_required_points").value);
    var maxParticipants = parseInt(document.getElementById("tourn_max_participants").value);
    var totalPrize = (requiredPoints * maxParticipants).toString();
    var totalPrize = totalPrize + " G*";

    ctx.font = '31px "Black Han Sans"';
    var totalPrizeInfoHeader = "Menangkan total hadiah";
    var lineWidth = ctx.measureText(totalPrizeInfoHeader).width;
    ctx.fillText(totalPrizeInfoHeader, (canvas.width / 2) - (lineWidth / 2), 
                (canvas.height / 2) + tempTitleHeight + 24 + 128);
    
    ctx.font = '42px "Black Han Sans"';
    var textWidth = ctx.measureText(totalPrize).width;
    ctx.fillText(totalPrize, (canvas.width / 2) - (textWidth / 2), 
                (canvas.height / 2) + tempTitleHeight + 24 + 128 + 42);
}

function onChangeEsport() {
    var e = document.getElementById("tourn_game");
    var selectedEsportTemp = e.options[e.selectedIndex].text;
    selectedEsport = selectedEsportTemp.split('-')[1];

    if (selectedEsport == null) {
        return;
    }

    if (selectedEsportTemp.includes('MLBB')) {
        logoUrl = "/main/assets/img/banner-certif/ml.png";
        tempLogoScaleSize = 3/8;

        logo.src = "/main/assets/img/banner-certif/ml1.png";
        logoScaleSize = 0.4;

        tempLogoMobileMarginTop = 4/12;
        tempLogoMobileScaleSize = 0.8;
    }
    else if (selectedEsportTemp.includes('PUBG')) {
        logoUrl = "/main/assets/img/banner-certif/pubg.png";
        tempLogoScaleSize = 2/8;

        logo.src = "/main/assets/img/banner-certif/pubg1.png";
        logoScaleSize = 0.25;

        tempLogoMobileMarginTop = 4/12;
        tempLogoMobileScaleSize = 0.4;
    }
    else if (selectedEsportTemp.includes('Dota 2')) {
        logoUrl = "/main/assets/img/banner-certif/dota.png";
        tempLogoScaleSize = 0.4;

        logo.src = "/main/assets/img/banner-certif/dota1.png";
        logoScaleSize = 0.25;

        tempLogoMobileMarginTop = 4/12;
        tempLogoMobileScaleSize = 0.4;
    }
    else if (selectedEsportTemp.includes('LoL Wild Rift')) {
        logoUrl = "/main/assets/img/banner-certif/lolwr.png";
        tempLogoScaleSize = 0.75;

        logo.src = "/main/assets/img/banner-certif/lolwr1.png";
        logoScaleSize = 0.35;

        tempLogoMobileMarginTop = 4/12;
        tempLogoMobileScaleSize = 0.6;
    }
    else if (selectedEsportTemp.includes('Free Fire')) {
        logoUrl = "/main/assets/img/banner-certif/ff.png";
        tempLogoScaleSize = 0.5;

        logo.src = "/main/assets/img/banner-certif/ff1.png";
        logoScaleSize = 0.35;

        tempLogoMobileMarginTop = 4/12;
        tempLogoMobileScaleSize = 0.4;
    }

    if (tempLogo.src != logoUrl) {
        tempLogo.src = logoUrl;
    }
}

////////////////////////////////// HELPER FUCNTION 
function drawCenterImageScaled(img, ctx, canvas) {
    var canvas = ctx.canvas;
    var hRatio = canvas.width / img.width;
    var vRatio =  canvas.height / img.height;
    var ratio  = Math.min ( hRatio, vRatio );
    var centerShift_x = ( canvas.width - img.width*ratio ) / 2;
    var centerShift_y = ( canvas.height - img.height*ratio ) / 2;  
    ctx.drawImage(img, 0,0, img.width, img.height,
                        centerShift_x,centerShift_y,img.width*ratio, img.height*ratio); 
}

function getScaledImage(img, ctx, scaleSize=0.5) {
    var canvas = ctx.canvas;

    // Scale Size
    var hRatio = canvas.width * scaleSize / img.width;
    var vRatio =  canvas.height * scaleSize / img.height;
    var ratio  = Math.min ( hRatio, vRatio );
    var centerShift_x = ( canvas.width - img.width*ratio ) / 2;
    var centerShift_y = ( canvas.height - img.height*ratio ) / 2;  
    data = {
        "centerShiftX": centerShift_x,
        "centerShiftY": centerShift_y,
        "newWidth": img.width*ratio,
        "newHeight": img.height*ratio,
        "ratio": ratio
    }
    return data
}

function tokenizeLine(text, maxWidth, ctx) {
    var words = text.split(" ");
    var currentLine = words[0];
    var tokens = [];

    for (var i = 1; i < words.length; i++) {
        var word = words[i];
        var width = ctx.measureText(currentLine + " " + word).width;
        if (width < maxWidth) {
            currentLine += " " + word;
            continue;
        } 
        tokens.push(currentLine);
        currentLine = word;
    }
    tokens.push(currentLine);
    return tokens;
}

$("#tourn_input_image").change(function() {
    readURL(this);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            // $('#tourn_preview_banner').attr('src', e.target.result);

            var imgTemp = document.getElementById('tourn_preview_banner');
            imgTemp.src = e.target.result;
            imgTemp.removeAttribute("data-toggle");
            userUpload = true;
            
            // document.getElementById('download_banner').style = 'display: none;';
            // document.getElementById('download_banner_mobile').style = 'display: none;';
            // document.getElementById('tourn_preview_banner_2').style = 'max-width:100%; max-height:100%;';
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
